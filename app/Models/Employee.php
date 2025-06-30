<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
 protected $table = 'users';

     protected static function booted()
{
    static::addGlobalScope('employee', function ($query) {
        $query->where('role', 'employee');
    });
}

}
