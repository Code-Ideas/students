<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ['name', 'active'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true)->orderBy('id');
    }
}
