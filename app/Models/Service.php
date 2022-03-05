<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'type', 'active', 'priority', 'parent_id', 'link', 'collages'];

    protected $casts = ['collages' => 'array'];

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

    public function layers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ServiceLayer::class, 'service_id');
    }

    public function collages()
    {
        if ($this->collages) {
            return Collage::whereIn('id', $this->collages)->get(['id', 'name']);
        } else {
            return [];
        }
    }
}
