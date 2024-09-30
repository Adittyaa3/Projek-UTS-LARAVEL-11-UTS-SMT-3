<?php

namespace Database\Seeders;

use App\Models\JenisUser;
use Illuminate\Database\Seeder;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisUser::create([
            'jenis_user' => 'user',
            'create_by' => 'system', // Replace with the creator's name as needed
            'delete_mark' => '0', // Default value
            'update_by' => null, // Initial value, can be set later
        ]);

        JenisUser::create([
            'jenis_user' => 'admin',
            'create_by' => 'system',
            'delete_mark' => '0',
            'update_by' => null,
        ]);

        JenisUser::create([
            'jenis_user' => 'super admin',
            'create_by' => 'system',
            'delete_mark' => '0',
            'update_by' => null,
        ]);
    }
}
