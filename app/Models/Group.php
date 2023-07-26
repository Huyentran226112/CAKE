<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table='groups';
    public function user()
    {
        return $this->hasMany(User::class, 'group_id', 'id');
        
    }
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
