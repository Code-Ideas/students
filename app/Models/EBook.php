<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EBook extends Model
{
    protected $fillable = ['title', 'path', 'staff_id', 'collage_id', 'department_id', 'year_id',
        'published', 'approved', 'admin_id', 'return_reason'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($eBook) {
            if ($eBook->path) {
                Storage::disk('public')->delete($eBook->path);
            }
        });
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeApproved(Builder $builder)
    {
        $builder->where('approved', true);
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopePublished(Builder $builder)
    {
        $builder->where('published', true);
    }

    /**
     * @return string
     */
    public function getBookPathAttribute()
    {
        return asset('storage/' . $this->path);
    }

    public function staff(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'staff_id');
    }

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function collage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Collage::class, 'collage_id');
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function year(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
