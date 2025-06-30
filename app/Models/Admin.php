<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
 protected $table = 'users';

     protected static function booted()
{
    static::addGlobalScope('admin', function ($query) {
        $query->where('role', 'admin');
    });
}


}
