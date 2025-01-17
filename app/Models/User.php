<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'ID_jenis_user',
    ];

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'ID_jenis_user', 'ID_jenis_user');
    }

    public function settingMenuUser(){
        return $this->hasMany(Menus::class,'ID_jenis_user','ID_jenis_user');
    }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

    // public function likes()
    // {
    //     return $this->hasMany(PostLike::class);
    // }

    // public function comments()
    // {
    //     return $this->hasMany(PostComment::class);
    // }


}
