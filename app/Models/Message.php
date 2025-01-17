<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'user_id',
        'sender',
        'message_reference',
        'subject',
        'message_text',
        'message_status',
        'no_mk',
        'create_by',
        'create_date',
        'delete_mark',
        'update_by',
        'update_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(MessageCategory::class, 'no_mk', 'no_mk');
    }

    public function documents()
    {
        return $this->hasMany(MessageDocument::class, 'message_id', 'message_id');
    }

    public function recipients()
    {
        return $this->hasMany(MessageTo::class, 'message_id', 'message_id');
    }
}
