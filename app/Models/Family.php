<?php

namespace App\Models;

class Family extends Model {
    protected $fillable = ['name'];
    public function users() {
        return $this->hasMany(User::class);
    }
    
}