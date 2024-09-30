<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMenuUser extends Model
{
    protected $table = 'setting_menu_user';
    protected $primaryKey = 'no_seting'; // Harus konsisten dengan field di database
    public $incrementing = true; // Jika primary key numeric auto-increment
    protected $keyType = 'int'; // Sesuaikan dengan tipe data yang digunakan

    protected $fillable = [
        'no_seting', // Sesuaikan dengan primary key
        'ID_jenis_user', // Sesuaikan dengan foreign key
        'ID_menu', // Sesuaikan dengan foreign key di menus
        'create_by',
        'create_date',
        'delete_mark',
        'update_by',
        'update_date',
    ];

    public function menu()
    {
        return $this->belongsTo(Menus::class, 'ID_menu', 'ID_menu');
    }

    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'ID_jenis_user', 'id'); // Pastikan 'id' benar di database
    }
}


// class SettingMenuUser extends Model
// {
//     protected $table = 'setting_menu_user';
//     protected $primaryKey = 'no_seting';
//     public $incrementing = false;
//     protected $keyType = 'string';

//     protected $fillable = [
//         'ID_setting',
//         'ID_jenis_user',
//         'ID_menu',
//         'create_by',
//         'create_date',
//         'delete_mark',
//         'update_by',
//         'update_date',
//     ];

//     public function menu()
//     {
//         return $this->belongsTo(Menus::class, 'ID_menu', 'ID_menu');
//     }

//     public function jenisUser()
//     {
//         return $this->belongsTo(JenisUser::class, 'ID_jenis_user', 'id');
//     }
    
// }