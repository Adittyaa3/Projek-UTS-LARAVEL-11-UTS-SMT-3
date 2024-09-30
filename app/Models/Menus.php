<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'menu_name', 'menu_link', 'menu_icon'
    ];

    // Relasi ke MenuLevel
    // public function menuLevel()
    // {
    //     return $this->belongsTo(MenuLevel::class, 'ID_level');
    // }
}
