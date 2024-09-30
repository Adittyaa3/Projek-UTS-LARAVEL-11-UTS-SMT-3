<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageDocument extends Model
{
    use HasFactory;

    protected $table = 'message_dokumens';

    protected $fillable = [
        'file',
        'description',
        'message_id',
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
