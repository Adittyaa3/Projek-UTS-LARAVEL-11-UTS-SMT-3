<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table= "mahasiswa";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'nim', 'angkatan','nomor_hp'];

}
