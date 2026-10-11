<?php

namespace Database\Seeders;

use App\Models\CashVolunteer;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CashVolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            $existing = CashVolunteer::where('name', $name)->first();

            // Cek apakah ada di tabel members untuk mengambil nomor telepon & member_id
            $member = null;
            if (Schema::hasTable('members')) {
                $member = Member::where('name', 'like', '%' . $name . '%')->first();
            }

            $phone = '08123456789';
            $memberId = null;
            $division = 'Volunteer DOT Teens';

            if ($member) {
                $memberId = $member->id;
                $phone = $member->phone_number ?: ($member->phone ?: '08123456789');
                if (!empty($member->fire_cell) || !empty($member->cell_name)) {
                    $division = 'Volunteer (' . ($member->fire_cell ?: $member->cell_name) . ')';
                }
            }

            if (!$existing) {
                CashVolunteer::create([
                    'member_id' => $memberId,
                    'name' => $name,
                    'phone' => $phone,
                    'division' => $division,
                    'monthly_due' => 20000,
                    'is_active' => true,
                    'notes' => 'Akun Kas Volunteer DOT Teens',
                ]);
            } else {
                // Perbarui jika belum terhubung dengan member
                if ($memberId && !$existing->member_id) {
                    $existing->member_id = $memberId;
                }
                if ($existing->phone === '08123456789' && $phone !== '08123456789') {
                    $existing->phone = $phone;
                }
                $existing->save();
            }
        }
    }
}
