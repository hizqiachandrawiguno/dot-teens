<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashVolunteer;
use App\Models\CashPeriod;
use App\Models\CashPayment;
use App\Models\CashExpense;
use App\Models\CashInflow;
use App\Models\CashSetting;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CashController extends Controller
{
    /**
     * Memastikan tabel-tabel kas sudah tersedia otomatis di database
     */
    public static function ensureTablesExist(): void
    {
        if (!Schema::hasTable('cash_volunteers')) {
            Schema::create('cash_volunteers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->string('name');
                $table->string('phone', 30);
                $table->string('division', 100)->default('Pengerja / Volunteer');
                $table->unsignedInteger('monthly_due')->default(10000);
                $table->boolean('is_active')->default(true);
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('cash_periods')) {
            Schema::create('cash_periods', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->unsignedInteger('amount')->default(10000);
                $table->date('due_date')->nullable();
                $table->boolean('is_active')->default(true);
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('cash_payments')) {
            Schema::create('cash_payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cash_volunteer_id')->constrained('cash_volunteers')->cascadeOnDelete();
                $table->foreignId('cash_period_id')->constrained('cash_periods')->cascadeOnDelete();
                $table->unsignedInteger('amount_paid');
                $table->date('paid_at');
                $table->string('payment_method', 30)->default('cash');
                $table->string('proof_image')->nullable();
                $table->text('notes')->nullable();
                $table->string('recorded_by')->default('Bendahara');
                $table->timestamps();

                $table->unique(['cash_volunteer_id', 'cash_period_id']);
            });
        }

        if (!Schema::hasTable('cash_expenses')) {
            Schema::create('cash_expenses', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->unsignedInteger('amount');
                $table->date('expense_date');
                $table->string('category', 100)->default('Operasional');
                $table->text('notes')->nullable();
                $table->string('receipt_image')->nullable();
                $table->string('recorded_by')->default('Bendahara');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('cash_inflows')) {
            Schema::create('cash_inflows', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('category', 50)->default('dana_usaha'); // dana_usaha, janji_iman, donatur, lain_lain
                $table->unsignedBigInteger('amount');
                $table->date('received_date');
                $table->string('payer_name')->nullable();
                $table->string('phone', 30)->nullable();
                $table->string('payment_method', 30)->default('transfer'); // transfer, cash, qris
                $table->text('notes')->nullable();
                $table->string('proof_image')->nullable();
                $table->string('recorded_by')->default('Bendahara');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('cash_settings')) {
            Schema::create('cash_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Dashboard Utama Kas & Cash Flow DOT Teens
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if (!in_array($user->role, ['super_admin', 'bendahara'])) {
            abort(403, 'Akses terbatas untuk Bendahara atau Super Admin.');
        }

        self::ensureTablesExist();

        // Seed periode awal jika belum ada sama sekali
        if (CashPeriod::count() == 0) {
            CashPeriod::create([
                'name' => 'Kas September 2026',
                'amount' => 10000,
                'due_date' => '2026-09-30',
                'is_active' => true,
            ]);
            CashPeriod::create([
                'name' => 'Kas Oktober 2026',
                'amount' => 10000,
                'due_date' => '2026-10-31',
                'is_active' => true,
            ]);
        }

        // Ambil info rekening & template pesan
        $savedBankInfo = CashSetting::get('bank_info');
        if (!$savedBankInfo || str_contains($savedBankInfo, '1234567890')) {
            CashSetting::set('bank_info', 'BCA 6390086774 a.n Hizqia Chandra Wiguno');
            $bankInfo = 'BCA 6390086774 a.n Hizqia Chandra Wiguno';
        } else {
            $bankInfo = $savedBankInfo;
        }
        $defaultNominal = CashSetting::get('default_nominal', '10000');

        // ==========================================
        // 1. DATA VOLUNTEER & KAS BULANAN
        // ==========================================
        $volunteerQuery = CashVolunteer::query()->where('is_active', true);
        if ($request->filled('division')) {
            $volunteerQuery->where('division', $request->division);
        }
        if ($request->filled('search')) {
            $volunteerQuery->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        $volunteers = $volunteerQuery->with('payments')->orderBy('name', 'asc')->get();
        $allPeriods = CashPeriod::where('is_active', true)->orderBy('id', 'asc')->get();

        $totalTunggakanKeseluruhan = 0;
        $volunteerSummary = [];

        foreach ($volunteers as $v) {
            $unpaidPeriods = $v->getUnpaidPeriods($allPeriods);
            $tunggakanAmount = $unpaidPeriods->sum('amount');
            $totalTunggakanKeseluruhan += $tunggakanAmount;

            $volunteerSummary[] = [
                'model' => $v,
                'unpaid_periods' => $unpaidPeriods,
                'total_tunggakan' => $tunggakanAmount,
                'wa_link' => $v->generateWaLink($unpaidPeriods, $bankInfo),
                'paid_count' => $v->payments->count(),
            ];
        }

        // ==========================================
        // 2. KALKULASI ARUS KAS / CASHFLOW TERPADU
        // ==========================================
        $totalKasVolunteer = (int) CashPayment::sum('amount_paid');
        $totalDanaUsaha = (int) CashInflow::where('category', 'dana_usaha')->sum('amount');
        $totalJanjiIman = (int) CashInflow::where('category', 'janji_iman')->sum('amount');
        $totalDonatur = (int) CashInflow::where('category', 'donatur')->sum('amount');
        $totalLainLainInflow = (int) CashInflow::where('category', 'lain_lain')->sum('amount');
        $totalInflows = $totalDanaUsaha + $totalJanjiIman + $totalDonatur + $totalLainLainInflow;

        // Total Masuk (Semua Sumber: Kas + Danus + Janji Iman + Donatur)
        $totalMasuk = $totalKasVolunteer + $totalInflows;

        // Total Keluar
        $totalKeluar = (int) CashExpense::sum('amount');

        // Saldo Kas Riil
        $saldoAkhir = $totalMasuk - $totalKeluar;

        // Perhitungan Bulan Ini
        $currentMonth = date('Y-m');
        $kasVolBulanIni = (int) CashPayment::where('paid_at', 'like', "$currentMonth%")->sum('amount_paid');
        $inflowBulanIni = (int) CashInflow::where('received_date', 'like', "$currentMonth%")->sum('amount');
        $masukBulanIni = $kasVolBulanIni + $inflowBulanIni;
        $keluarBulanIni = (int) CashExpense::where('expense_date', 'like', "$currentMonth%")->sum('amount');
        $netBulanIni = $masukBulanIni - $keluarBulanIni;

        // Breakdown Pengeluaran per Kategori ("Pengeluaran untuk apa aja")
        $expensesByCategory = CashExpense::selectRaw('category, SUM(amount) as total_amount, COUNT(id) as total_tx')
            ->groupBy('category')
            ->orderByDesc('total_amount')
            ->get();

        // ==========================================
        // 3. DAFTAR PEMASUKAN KHUSUS (INFLOWS)
        // ==========================================
        $inflowQuery = CashInflow::query();
        if ($request->filled('inflow_cat') && $request->inflow_cat !== 'all') {
            $inflowQuery->where('category', $request->inflow_cat);
        }
        if ($request->filled('inflow_search')) {
            $inflowQuery->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->inflow_search . '%')
                  ->orWhere('payer_name', 'like', '%' . $request->inflow_search . '%')
                  ->orWhere('notes', 'like', '%' . $request->inflow_search . '%');
            });
        }
        $allInflows = $inflowQuery->latest('received_date')->latest('id')->paginate(15, ['*'], 'inflows_page');

        // ==========================================
        // 4. DAFTAR PENGELUARAN (EXPENSES)
        // ==========================================
        $expenseQuery = CashExpense::query();
        if ($request->filled('expense_cat') && $request->expense_cat !== 'all') {
            $expenseQuery->where('category', $request->expense_cat);
        }
        if ($request->filled('expense_search')) {
            $expenseQuery->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->expense_search . '%')
                  ->orWhere('notes', 'like', '%' . $request->expense_search . '%');
            });
        }
        $allExpenses = $expenseQuery->latest('expense_date')->latest('id')->paginate(15, ['*'], 'expenses_page');

        // ==========================================
        // 5. BUKU KAS UMUM (GENERAL CASH FLOW LEDGER)
        // Gabungan semua transaksi secara kronologis + Running Balance
        // ==========================================
        $ledgerItems = collect();

        // A. Dari Kas Volunteer
        $allPayments = CashPayment::with(['volunteer', 'period'])->get();
        foreach ($allPayments as $p) {
            $volName = $p->volunteer->name ?? 'Pengerja';
            $perName = $p->period->name ?? 'Periode';
            $ledgerItems->push((object)[
                'id' => $p->id,
                'source_type' => 'kas_payment',
                'date' => $p->paid_at->format('Y-m-d'),
                'type' => 'inflow',
                'category_key' => 'kas_volunteer',
                'category_label' => 'Kas Pengerja',
                'category_bg' => 'rgba(255, 255, 255, 0.05)',
                'category_color' => '#CBD5E1',
                'category_icon' => 'fa-users',
                'title' => "Iuran {$perName} - {$volName}",
                'person' => $volName,
                'amount' => (int) $p->amount_paid,
                'payment_method' => $p->payment_method,
                'notes' => $p->notes,
                'proof_url' => $p->proof_image ? (file_exists(public_path('uploads/cash_proofs/' . basename($p->proof_image))) ? asset('uploads/cash_proofs/' . basename($p->proof_image)) : asset($p->proof_image)) : null,
                'recorded_by' => $p->recorded_by ?? 'Bendahara',
                'delete_route' => route('admin.kas.payment.delete', $p->id),
                'created_at' => $p->created_at,
            ]);
        }

        // B. Dari Inflows (Dana Usaha, Janji Iman, Donatur, Lainnya)
        $rawInflows = CashInflow::all();
        foreach ($rawInflows as $inf) {
            $catInfo = $inf->category_info;
            $ledgerItems->push((object)[
                'id' => $inf->id,
                'source_type' => 'inflow',
                'date' => $inf->received_date->format('Y-m-d'),
                'type' => 'inflow',
                'category_key' => $inf->category,
                'category_label' => $catInfo['label'],
                'category_bg' => $catInfo['bg'],
                'category_color' => $catInfo['color'],
                'category_icon' => $catInfo['icon'],
                'title' => $inf->title,
                'person' => $inf->payer_name ?: 'Donatur / Pembeli',
                'amount' => (int) $inf->amount,
                'payment_method' => $inf->payment_method,
                'notes' => $inf->notes,
                'proof_url' => $inf->proof_url,
                'recorded_by' => $inf->recorded_by ?? 'Bendahara',
                'delete_route' => route('admin.kas.inflow.delete', $inf->id),
                'created_at' => $inf->created_at,
            ]);
        }

        // C. Dari Pengeluaran (Expenses)
        $rawExpenses = CashExpense::all();
        foreach ($rawExpenses as $exp) {
            $catInfo = $exp->category_info;
            $ledgerItems->push((object)[
                'id' => $exp->id,
                'source_type' => 'expense',
                'date' => $exp->expense_date->format('Y-m-d'),
                'type' => 'expense',
                'category_key' => 'pengeluaran',
                'category_label' => $catInfo['label'],
                'category_bg' => $catInfo['bg'],
                'category_color' => $catInfo['color'],
                'category_icon' => $catInfo['icon'],
                'title' => $exp->title,
                'person' => $exp->category ?: 'Operasional',
                'amount' => (int) $exp->amount,
                'payment_method' => 'cash',
                'notes' => $exp->notes,
                'proof_url' => $exp->receipt_url,
                'recorded_by' => $exp->recorded_by ?? 'Bendahara',
                'delete_route' => route('admin.kas.expense.delete', $exp->id),
                'created_at' => $exp->created_at,
            ]);
        }

        // Hitung Saldo Berjalan (Urut kronologis tertua ke terbaru)
        $sortedChronological = $ledgerItems->sortBy([
            ['date', 'asc'],
            ['created_at', 'asc'],
            ['id', 'asc'],
        ])->values();

        $running = 0;
        foreach ($sortedChronological as $item) {
            if ($item->type === 'inflow') {
                $running += $item->amount;
            } else {
                $running -= $item->amount;
            }
            $item->running_balance = $running;
        }

        // Untuk tampilan Buku Kas Ledger, tampilkan transaksi terbaru di paling atas
        $ledgerDisplay = $sortedChronological->reverse()->values();

        // Terapkan filter jika ada
        if ($request->filled('ledger_type') && $request->ledger_type !== 'all') {
            $ledgerDisplay = $ledgerDisplay->where('type', $request->ledger_type)->values();
        }
        if ($request->filled('ledger_cat') && $request->ledger_cat !== 'all') {
            $ledgerDisplay = $ledgerDisplay->where('category_key', $request->ledger_cat)->values();
        }
        if ($request->filled('ledger_month')) {
            $ledgerDisplay = $ledgerDisplay->filter(function($i) use ($request) {
                return str_starts_with($i->date, $request->ledger_month);
            })->values();
        }

        // Data transaksi ringkas terbaru
        $recentPayments = CashPayment::with(['volunteer', 'period'])->latest()->take(6)->get();
        $recentExpenses = CashExpense::latest()->take(6)->get();
        $recentInflows = CashInflow::latest()->take(6)->get();

        // Ambil daftar divisi unik untuk filter
        $divisions = CashVolunteer::distinct()->pluck('division')->filter()->values();

        // Log CCTV jika ada tabel activity_logs
        if (Schema::hasTable('activity_logs')) {
            $cctv_kas = ActivityLog::where('action', 'like', '%KAS%')
                ->orWhere('action', 'like', '%CASHFLOW%')
                ->latest()->take(15)->get();
        } else {
            $cctv_kas = collect();
        }

        return view('admin.kas.index', compact(
            'user',
            'volunteers',
            'volunteerSummary',
            'allPeriods',
            'totalKasVolunteer',
            'totalDanaUsaha',
            'totalJanjiIman',
            'totalDonatur',
            'totalLainLainInflow',
            'totalInflows',
            'totalMasuk',
            'totalKeluar',
            'saldoAkhir',
            'masukBulanIni',
            'keluarBulanIni',
            'netBulanIni',
            'totalTunggakanKeseluruhan',
            'bankInfo',
            'defaultNominal',
            'recentPayments',
            'recentExpenses',
            'recentInflows',
            'allInflows',
            'allExpenses',
            'ledgerDisplay',
            'expensesByCategory',
            'divisions',
            'cctv_kas'
        ));
    }

    /**
     * Catat Pemasukan Baru (Dana Usaha, Janji Iman, Dana Donatur, Lainnya)
     */
    public function storeInflow(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:dana_usaha,janji_iman,donatur,lain_lain',
            'amount' => 'required|numeric|min:1',
            'received_date' => 'required|date',
            'payer_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'payment_method' => 'required|in:transfer,cash,qris',
            'notes' => 'nullable|string',
            'proof_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $proofPath = null;
        if ($request->hasFile('proof_image')) {
            $destDir = public_path('uploads/cash_inflows');
            if (!file_exists($destDir)) {
                mkdir($destDir, 0755, true);
            }
            $fileName = 'inflow_' . time() . '_' . uniqid() . '.' . $request->file('proof_image')->extension();
            $request->file('proof_image')->move($destDir, $fileName);
            $proofPath = 'uploads/cash_inflows/' . $fileName;
        }

        $user = auth()->user();

        $inflow = CashInflow::create([
            'title' => $request->title,
            'category' => $request->category,
            'amount' => (int) $request->amount,
            'received_date' => $request->received_date,
            'payer_name' => $request->payer_name,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'proof_image' => $proofPath,
            'recorded_by' => $user->name,
        ]);

        if (Schema::hasTable('activity_logs')) {
            $categoryLabel = $inflow->category_info['label'] ?? 'Pemasukan';
            ActivityLog::create([
                'user_name' => $user->name,
                'role' => $user->role,
                'action' => 'CATAT PEMASUKAN CASHFLOW',
                'description' => "{$user->name} mencatat pemasukan [{$categoryLabel}]: {$inflow->title} (Rp " . number_format($inflow->amount, 0, ',', '.') . ") dari {$inflow->payer_name}",
            ]);
        }

        return back()->with('success', "Pemasukan {$inflow->category_info['label']} sebesar Rp " . number_format($inflow->amount, 0, ',', '.') . " berhasil dicatat.");
    }

    /**
     * Hapus Pemasukan Cashflow
     */
    public function deleteInflow($id)
    {
        $inflow = CashInflow::findOrFail($id);
        $title = $inflow->title;
        $amount = $inflow->amount;

        if ($inflow->proof_image && file_exists(public_path($inflow->proof_image))) {
            @unlink(public_path($inflow->proof_image));
        }

        $inflow->delete();

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'HAPUS PEMASUKAN CASHFLOW',
                'description' => auth()->user()->name . " menghapus pemasukan {$title} (Rp " . number_format($amount, 0, ',', '.') . ")",
            ]);
        }

        return back()->with('success', 'Data pemasukan berhasil dihapus.');
    }

    /**
     * Catat Pengeluaran Kas (Buku Kas Keluar & Nota)
     */
    public function storeExpense(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'expense_date' => 'required|date',
            'category' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'receipt_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $receiptPath = null;
        if ($request->hasFile('receipt_image')) {
            $destDir = public_path('uploads/cash_receipts');
            if (!file_exists($destDir)) {
                mkdir($destDir, 0755, true);
            }
            $fileName = 'receipt_' . time() . '_' . uniqid() . '.' . $request->file('receipt_image')->extension();
            $request->file('receipt_image')->move($destDir, $fileName);
            $receiptPath = 'uploads/cash_receipts/' . $fileName;
        }

        $user = auth()->user();

        $expense = CashExpense::create([
            'title' => $request->title,
            'amount' => (int) $request->amount,
            'expense_date' => $request->expense_date,
            'category' => $request->category,
            'notes' => $request->notes,
            'receipt_image' => $receiptPath,
            'recorded_by' => $user->name,
        ]);

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => $user->name,
                'role' => $user->role,
                'action' => 'CATAT PENGELUARAN CASHFLOW',
                'description' => "{$user->name} mencatat pengeluaran [{$request->category}]: {$request->title} (Rp " . number_format($request->amount, 0, ',', '.') . ")",
            ]);
        }

        return back()->with('success', 'Pengeluaran kas berhasil dicatat.');
    }

    /**
     * Hapus Pengeluaran Kas
     */
    public function deleteExpense($id)
    {
        $expense = CashExpense::findOrFail($id);
        $title = $expense->title;

        if ($expense->receipt_image && file_exists(public_path($expense->receipt_image))) {
            @unlink(public_path($expense->receipt_image));
        }

        $expense->delete();

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'HAPUS PENGELUARAN CASHFLOW',
                'description' => auth()->user()->name . " menghapus data pengeluaran kas: {$title}",
            ]);
        }

        return back()->with('success', 'Data pengeluaran berhasil dihapus.');
    }

    /**
     * Catat Pembayaran Kas Volunteer (Bisa pilih 1 atau beberapa periode sekaligus)
     */
    public function storePayment(Request $request)
    {
        $request->validate([
            'cash_volunteer_id' => 'required|exists:cash_volunteers,id',
            'period_ids' => 'required|array|min:1',
            'period_ids.*' => 'exists:cash_periods,id',
            'paid_at' => 'required|date',
            'payment_method' => 'required|in:cash,transfer',
            'notes' => 'nullable|string',
            'proof_image' => 'nullable|image|max:3072',
        ]);

        $volunteer = CashVolunteer::findOrFail($request->cash_volunteer_id);
        $user = auth()->user();

        // Upload bukti jika ada
        $proofPath = null;
        if ($request->hasFile('proof_image')) {
            $destDir = public_path('uploads/cash_proofs');
            if (!file_exists($destDir)) {
                mkdir($destDir, 0755, true);
            }
            $fileName = 'proof_' . time() . '_' . uniqid() . '.' . $request->file('proof_image')->extension();
            $request->file('proof_image')->move($destDir, $fileName);
            $proofPath = 'uploads/cash_proofs/' . $fileName;
        }

        $recordedCount = 0;
        foreach ($request->period_ids as $periodId) {
            $period = CashPeriod::find($periodId);
            if (!$period) continue;

            CashPayment::updateOrCreate(
                [
                    'cash_volunteer_id' => $volunteer->id,
                    'cash_period_id' => $period->id,
                ],
                [
                    'amount_paid' => $period->amount,
                    'paid_at' => $request->paid_at,
                    'payment_method' => $request->payment_method,
                    'proof_image' => $proofPath,
                    'notes' => $request->notes,
                    'recorded_by' => $user->name,
                ]
            );
            $recordedCount++;
        }

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => $user->name,
                'role' => $user->role,
                'action' => 'CATAT PEMBAYARAN KAS',
                'description' => "{$user->name} mencatat pembayaran {$recordedCount} periode kas untuk {$volunteer->name}",
            ]);
        }

        return back()->with('success', "Berhasil mencatat pembayaran kas {$volunteer->name} untuk {$recordedCount} periode.");
    }

    /**
     * Hapus Pembayaran Kas Volunteer
     */
    public function deletePayment($id)
    {
        $payment = CashPayment::with(['volunteer', 'period'])->findOrFail($id);
        $volunteerName = $payment->volunteer->name ?? 'Pengerja';
        $periodName = $payment->period->name ?? 'Periode';

        $payment->delete();

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'HAPUS PEMBAYARAN KAS',
                'description' => auth()->user()->name . " menghapus data pembayaran {$periodName} untuk {$volunteerName}",
            ]);
        }

        return back()->with('success', 'Data pembayaran berhasil dihapus.');
    }

    /**
     * Fitur One-Click WhatsApp: Rekam CCTV & Redirect ke WhatsApp Web/App
     */
    public function sendWaReminder($id)
    {
        $user = auth()->user();
        $volunteer = CashVolunteer::with('payments')->findOrFail($id);
        $allPeriods = CashPeriod::where('is_active', true)->orderBy('id', 'asc')->get();
        $unpaidPeriods = $volunteer->getUnpaidPeriods($allPeriods);

        if ($unpaidPeriods->isEmpty()) {
            return back()->with('success', "Pengerja {$volunteer->name} sudah lunas semua kasnya!");
        }

        $bankInfo = CashSetting::get('bank_info', 'BCA 6390086774 a.n Hizqia Chandra Wiguno');
        $waUrl = $volunteer->generateWaLink($unpaidPeriods, $bankInfo);

        // Rekam CCTV Log
        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => $user->name,
                'role' => $user->role,
                'action' => 'KIRIM WA KAS',
                'description' => "{$user->name} mengirimkan pengingat tunggakan kas via WhatsApp ke {$volunteer->name} (Total: Rp " . number_format($unpaidPeriods->sum('amount'), 0, ',', '.') . ")",
            ]);
        }

        return redirect()->away($waUrl);
    }

    /**
     * Tambah Pengerja / Volunteer Baru
     */
    public function storeVolunteer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'division' => 'required|string|max:100',
            'monthly_due' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $volunteer = CashVolunteer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'division' => $request->division,
            'monthly_due' => $request->monthly_due ?: 10000,
            'notes' => $request->notes,
            'is_active' => true,
        ]);

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'TAMBAH PENGERJA KAS',
                'description' => auth()->user()->name . " menambahkan pengerja baru: {$volunteer->name} ({$volunteer->division})",
            ]);
        }

        return back()->with('success', "Pengerja {$volunteer->name} berhasil ditambahkan ke daftar kas.");
    }

    /**
     * Update Pengerja / Volunteer
     */
    public function updateVolunteer(Request $request, $id)
    {
        $volunteer = CashVolunteer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'division' => 'required|string|max:100',
            'is_active' => 'required|boolean',
            'notes' => 'nullable|string',
        ]);

        $volunteer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'division' => $request->division,
            'is_active' => $request->is_active,
            'notes' => $request->notes,
        ]);

        return back()->with('success', "Data pengerja {$volunteer->name} berhasil diperbarui.");
    }

    /**
     * Hapus Pengerja
     */
    public function deleteVolunteer($id)
    {
        $volunteer = CashVolunteer::findOrFail($id);
        $name = $volunteer->name;
        $volunteer->delete();

        return back()->with('success', "Pengerja {$name} berhasil dihapus dari sistem kas.");
    }

    /**
     * Sinkronisasi Otomatis dari Tabel Pengurus (Users) ke Pengerja Kas
     */
    public function syncFromUsers()
    {
        $users = User::where('status', 'approved')->get();
        $importedCount = 0;

        foreach ($users as $u) {
            $exists = CashVolunteer::where('name', $u->name)->first();
            if (!$exists) {
                $divName = match($u->role) {
                    'volunteer' => 'Volunteer / Usher',
                    'bendahara' => 'Bendahara',
                    'div_cell' => 'Divisi Cell',
                    'div_acara' => 'Divisi Acara',
                    'div_sosmed' => 'Divisi Media & Sosmed',
                    'div_musik' => 'Divisi Musik',
                    'div_prayer' => 'Divisi Prayer',
                    'div_pastoral' => 'Divisi Pastoral',
                    'super_admin' => 'Super Admin',
                    default => 'Pengerja DOT'
                };

                CashVolunteer::create([
                    'user_id' => $u->id,
                    'name' => $u->name,
                    'phone' => '08123456789',
                    'division' => $divName,
                    'monthly_due' => 10000,
                    'is_active' => true,
                    'notes' => 'Sinkronisasi otomatis dari akun pengurus website',
                ]);
                $importedCount++;
            }
        }

        return back()->with('success', "Berhasil mensinkronkan {$importedCount} akun pengurus ke daftar kas pengerja.");
    }

    /**
     * Tambah Periode Kas Baru (contoh: Kas November 2026)
     */
    public function storePeriod(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'amount' => 'required|numeric|min:1000',
            'due_date' => 'nullable|date',
        ]);

        $period = CashPeriod::create([
            'name' => $request->name,
            'amount' => (int) $request->amount,
            'due_date' => $request->due_date,
            'is_active' => true,
        ]);

        if (Schema::hasTable('activity_logs')) {
            ActivityLog::create([
                'user_name' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'BUAT PERIODE KAS',
                'description' => auth()->user()->name . " membuka periode kas baru: {$period->name} (Rp " . number_format($period->amount, 0, ',', '.') . ")",
            ]);
        }

        return back()->with('success', "Periode {$period->name} berhasil dibuat.");
    }

    /**
     * Simpan Pengaturan Kas (Info Rekening Bank & Nominal Kas Default)
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'bank_info' => 'required|string|max:255',
            'default_nominal' => 'nullable|numeric|min:1000',
        ]);

        CashSetting::set('bank_info', $request->bank_info);
        if ($request->filled('default_nominal')) {
            CashSetting::set('default_nominal', $request->default_nominal);
        }

        return back()->with('success', 'Pengaturan info rekening kas berhasil disimpan.');
    }

    /**
     * Export Rekap Iuran Kas Volunteer ke CSV
     */
    public function exportCsv()
    {
        $fileName = 'Rekap_Kas_Volunteer_DOT_' . date('Y_m_d') . '.csv';

        $volunteers = CashVolunteer::with('payments')->where('is_active', true)->orderBy('name', 'asc')->get();
        $periods = CashPeriod::where('is_active', true)->orderBy('id', 'asc')->get();

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function () use ($volunteers, $periods) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            $headerCols = ['No', 'Nama Pengerja', 'Divisi', 'No. WhatsApp', 'Status Kas', 'Total Tunggakan (Rp)'];
            foreach ($periods as $p) {
                $headerCols[] = $p->name;
            }
            fputcsv($file, $headerCols);

            $no = 1;
            foreach ($volunteers as $v) {
                $unpaid = $v->getUnpaidPeriods($periods);
                $totalTunggakan = $unpaid->sum('amount');
                $status = ($totalTunggakan == 0) ? 'LUNAS' : 'MENUNGGAK';

                $row = [
                    $no++,
                    $v->name,
                    $v->division,
                    $v->phone,
                    $status,
                    $totalTunggakan,
                ];

                $paidPeriodIds = $v->payments->pluck('cash_period_id')->toArray();
                foreach ($periods as $p) {
                    $row[] = in_array($p->id, $paidPeriodIds) ? 'Lunas' : 'Belum';
                }

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export Buku Kas Arus Kas (Cash Flow Ledger) Lengkap ke CSV / Excel
     */
    public function exportCashflowCsv(Request $request)
    {
        $fileName = 'Laporan_Cashflow_DOT_Teens_' . date('Y_m_d_His') . '.csv';

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');
            // Menambahkan UTF-8 BOM agar rapi saat dibuka di Microsoft Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Judul Dokumen
            fputcsv($file, ['LAPORAN ARUS KAS (CASH FLOW) BENDAHARA - DOT TEENS']);
            fputcsv($file, ['Tanggal Unduh:', date('d F Y H:i:s')]);
            fputcsv($file, []);

            // Header Kolom Tabel
            fputcsv($file, [
                'No',
                'Tanggal',
                'Tipe Arus Kas',
                'Kategori',
                'Keperluan / Judul Transaksi',
                'Sumber Dana / Donatur / Pengerja',
                'Pemasukan (Rp)',
                'Pengeluaran (Rp)',
                'Saldo Berjalan (Rp)',
                'Metode Bayar',
                'Dicatat Oleh',
                'Catatan / Keterangan',
            ]);

            // Kumpulkan semua transaksi
            $ledger = collect();

            // Kas Pengerja
            $payments = CashPayment::with(['volunteer', 'period'])->get();
            foreach ($payments as $p) {
                $ledger->push((object)[
                    'date' => $p->paid_at->format('Y-m-d'),
                    'type' => 'PEMASUKAN',
                    'category' => 'Kas Pengerja',
                    'title' => "Iuran " . ($p->period->name ?? 'Kas') . " - " . ($p->volunteer->name ?? 'Pengerja'),
                    'person' => $p->volunteer->name ?? 'Pengerja',
                    'inflow' => (int) $p->amount_paid,
                    'expense' => 0,
                    'method' => strtoupper($p->payment_method),
                    'recorded_by' => $p->recorded_by ?? 'Bendahara',
                    'notes' => $p->notes ?? '',
                    'created_at' => $p->created_at,
                ]);
            }

            // Pemasukan Khusus (Danus, Janji Iman, Donatur, Lainnya)
            $inflows = CashInflow::all();
            foreach ($inflows as $inf) {
                $ledger->push((object)[
                    'date' => $inf->received_date->format('Y-m-d'),
                    'type' => 'PEMASUKAN',
                    'category' => $inf->category_info['label'] ?? 'Pemasukan',
                    'title' => $inf->title,
                    'person' => $inf->payer_name ?: 'Donatur / Pembeli',
                    'inflow' => (int) $inf->amount,
                    'expense' => 0,
                    'method' => strtoupper($inf->payment_method),
                    'recorded_by' => $inf->recorded_by ?? 'Bendahara',
                    'notes' => $inf->notes ?? '',
                    'created_at' => $inf->created_at,
                ]);
            }

            // Pengeluaran (Expenses)
            $expenses = CashExpense::all();
            foreach ($expenses as $exp) {
                $ledger->push((object)[
                    'date' => $exp->expense_date->format('Y-m-d'),
                    'type' => 'PENGELUARAN',
                    'category' => $exp->category_info['label'] ?? $exp->category,
                    'title' => $exp->title,
                    'person' => $exp->category ?: 'Operasional',
                    'inflow' => 0,
                    'expense' => (int) $exp->amount,
                    'method' => 'CASH',
                    'recorded_by' => $exp->recorded_by ?? 'Bendahara',
                    'notes' => $exp->notes ?? '',
                    'created_at' => $exp->created_at,
                ]);
            }

            // Sort tertua ke terbaru untuk hitung saldo berjalan
            $sorted = $ledger->sortBy([
                ['date', 'asc'],
                ['created_at', 'asc'],
            ])->values();

            $running = 0;
            $totalIn = 0;
            $totalOut = 0;
            $no = 1;

            foreach ($sorted as $item) {
                $running += ($item->inflow - $item->expense);
                $totalIn += $item->inflow;
                $totalOut += $item->expense;

                fputcsv($file, [
                    $no++,
                    $item->date,
                    $item->type,
                    $item->category,
                    $item->title,
                    $item->person,
                    $item->inflow > 0 ? $item->inflow : '',
                    $item->expense > 0 ? $item->expense : '',
                    $running,
                    $item->method,
                    $item->recorded_by,
                    $item->notes,
                ]);
            }

            // Baris Total Akumulasi
            fputcsv($file, []);
            fputcsv($file, [
                '',
                'TOTAL AKUMULASI',
                '',
                '',
                '',
                '',
                $totalIn,
                $totalOut,
                $totalIn - $totalOut,
                '',
                '',
                '',
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
