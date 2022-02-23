<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'type', 'active', 'priority', 'parent_id', 'collage_id'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true)->orderBy('priority');
    }

    public function serveice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    public function subServices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    public function collage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Collage::class);
    }
}
