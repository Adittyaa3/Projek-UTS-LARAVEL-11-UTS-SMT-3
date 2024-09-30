<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'adit',
            'email' => 'adit@gmail.com',
            'password' => bcrypt(12345678),
            'ID_jenis_user' => 1,
        ]);

    User::create([
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'password' => bcrypt(12345678),
      'ID_jenis_user' => 2,
  ]);

   User::create([
    'name' => 'superadmin',
    'email' => 'superadmin@gmail.com',
    'password' => bcrypt(12345678),
    'ID_jenis_user' => 3,
]);










    

}
}
