<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'active', 'priority', 'parent_id'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true)->orderBy('priority');
    }

    public function serveice()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }
}
