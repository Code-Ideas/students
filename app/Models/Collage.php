<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    protected $fillable = ['name', 'logo', 'active', 'priority'];
}
