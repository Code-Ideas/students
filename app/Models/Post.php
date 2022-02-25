<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasPhoto;

    protected $fillable = ['title', 'body', 'type', 'collage_id', 'priority', 'active'];

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }
}
