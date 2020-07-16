<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $guarded=[];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function role()
    {
        $this->belongsTo(Role::class);
    }
}
