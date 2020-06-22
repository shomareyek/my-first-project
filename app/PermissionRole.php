<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $fillable = ['role_id', 'permission_id'];
    public $timestamps = false;

    public function getPermissionNameAttribute()
    {
        $permission = Permission::where('id', $this->attributes['permission_id'])->first();
        return $permission->label;
    }
}
