<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\CashVolunteer;
use App\Models\Member;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('cash_volunteers')) {
            $volunteerNames = [
                'Veli',
                'Caca',
                'Melfi',
                'Joshua',
                'Andreas',
                'Valen',
                'Maureen',
                'Evelyn',
                'Rendra',
                'Matius',
                'Matias',
                'Yoel',
                'Alvaro',
                'Djaro',
                'Andrew',
                'Peter',
                'Renata',
                'Joey',
                'Amel',
                'Ezra',
                'Yoel Natan',
            ];

            foreach ($volunteerNames as $name) {
                $exists = DB::table('cash_volunteers')->where('name', $name)->first();

                $member = null;
                if (Schema::hasTable('members')) {
                    $member = DB::table('members')->where('name', 'like', '%' . $name . '%')->first();
                }

                $phone = '08123456789';
                $memberId = null;
                $division = 'Volunteer DOT Teens';

                if ($member) {
                    $memberId = $member->id;
                    $phone = !empty($member->phone_number) ? $member->phone_number : (!empty($member->phone) ? $member->phone : '08123456789');
                    if (!empty($member->fire_cell)) {
                        $division = 'Volunteer (' . $member->fire_cell . ')';
                    } elseif (!empty($member->cell_name)) {
                        $division = 'Volunteer (' . $member->cell_name . ')';
                    }
                }

                if (!$exists) {
                    DB::table('cash_volunteers')->insert([
                        'member_id' => $memberId,
                        'name' => $name,
                        'phone' => $phone,
                        'division' => $division,
                        'monthly_due' => 20000,
                        'is_active' => 1,
                        'notes' => 'Akun Kas Volunteer DOT Teens',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tetap simpan data kas volunteer
    }
};
