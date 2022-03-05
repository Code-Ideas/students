<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ServiceLayer extends Model
{
    protected $fillable = ['service_id', 'title', 'content', 'priority',
        'content_type', 'department_id', 'year_id', 'active'];

    protected $casts = ['collages' => 'array'];

    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true)->orderBy('priority');
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function year(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function collages(): array
    {
        if ($this->collages) {
            return Collage::whereIn('id', $this->collages)->get(['id', 'name']);
        } else {
            return [];
        }
    }

    public function attachments()
    {
        return $this->hasMany(ServiceLayerAttachment::class)->where('type', 'file');
    }
}
