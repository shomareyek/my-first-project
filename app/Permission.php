<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'label', 'group_name', 'route_name'];

    public function getGroupAttribute()
    {
        switch ($this->attributes['group_name']){
            case 'dashboard':
                return 'داشبرد';
                break;
            case 'admin':
                return 'مدیریت';
                break;
            case 'active-sessions':
                return 'امنیت';
                break;
            case 'setting':
                return 'تنظیمات';
                break;
        }
    }
}
