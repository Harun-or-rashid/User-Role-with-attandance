<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded=[];

    protected $table = "roles";

//    public function users()
//    {
//        $this->hasMany(User::class);
//
//}

    public function roleUsers()
    {
        $this->hasMany(RoleUser::class);
}
}
