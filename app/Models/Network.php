<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Network extends Model
{
    /** @use HasFactory<\Database\Factories\NetworkFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'updated_id'
    ];
    public function user()
        {
            return $this->belongsTo(User::class);
        }
    public function updatedby()
    {
        return $this->belongsTo(User::class, 'updated_id');
    }
    public function stores(): HasMany
    {
        return $this->hasMany(Stores::class);
    }
}
