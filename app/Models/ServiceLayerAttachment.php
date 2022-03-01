<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceLayerAttachment extends Model
{
    protected $fillable = ['file_name', 'service_layer_id', 'path', 'type'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($photo) {
            if (static::where('path', $photo->path)->exists()) {
                Storage::disk('public')->delete($photo->path);
            }
        });
    }

    public function serviceLayer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceLayer::class);
    }
}
