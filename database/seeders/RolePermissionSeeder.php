<?php

namespace Database\Seeders;
use App\Models\Role as ModelsRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>'super_admin']);
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);


 
        Role::create(['name'=>'admin']);
        Permission::create(['name'=>'tambah-anime']);
        Permission::create(['name'=>'edit-anime']);
        Permission::create(['name'=>'hapus-anime']);
        Permission::create(['name'=>'lihat-anime']);

        Role::create(['name'=>'user']);
   

  

        $SuperAdmin = Role::findByName('super_admin');
        $SuperAdmin->givePermissionTo('tambah-user');
        $SuperAdmin->givePermissionTo('edit-user');
        $SuperAdmin->givePermissionTo('hapus-user');
        $SuperAdmin->givePermissionTo('lihat-user');


        $admin = Role::findByName('admin');
        $admin->givePermissionTo('tambah-anime');
        $admin->givePermissionTo('edit-anime');
        $admin->givePermissionTo('hapus-anime');
        $admin->givePermissionTo('lihat-anime');

        $user= Role::findByName('user');
        $user->givePermissionTo('lihat-anime');

    }
}
