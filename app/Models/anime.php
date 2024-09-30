<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;  

class anime extends Model
{
    use HasFactory;

    
    protected $table= "anime";
    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'title',
        'description',
        'number_of_episodes'
    ];

}
