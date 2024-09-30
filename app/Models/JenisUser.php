<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jenis_users';
    protected $primaryKey = 'id';
    protected $fillable =[
        'jenis_user','create_by','delete_mark','update_by'
    ];
    
    


    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'ID_jenis_user', 'id');
    }
    

    // public function getMenus(){
    //     return $this->belongsTomany(Menus::class, 'setting_menu_user', 'jenis_users', 'menus');
    // }

//     public function getMenus()
// {
//     return $this->belongsToMany(Menus::class, 'setting_menu_user', 'jenis_user_id', 'ID_menu');
// }
public function getMenus()
{
    return $this->belongsToMany(Menus::class, 'setting_menu_user', 'id_jenis_user', 'menu_id');
}



}
