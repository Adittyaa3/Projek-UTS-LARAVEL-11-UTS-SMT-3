<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageCategory extends Model
{
    use HasFactory;

    protected $table = 'message_kategories';

    protected $fillable = [
        'description',
        'create_by',
        'create_date',
        'delete_mark',
        'update_by',
        'update_date',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'no_mk', 'no_mk');
    }
}
