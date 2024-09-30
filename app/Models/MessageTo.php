<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageTo extends Model
{
    use HasFactory;

    protected $table = 'message_tos';

    protected $fillable = [
        'message_id',
        'to',
        'cc',
        'create_by',
        'create_date',
        'delete_mark',
        'update_by',
        'update_date',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id', 'message_id');
    }
}
