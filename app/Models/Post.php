<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasPhoto;

    protected $fillable = ['title', 'body', 'service_id', 'priority', 'active'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
