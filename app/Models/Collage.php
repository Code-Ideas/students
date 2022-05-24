<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    protected $fillable = ['name', 'logo', 'active', 'priority', 'link', 'years'];

    protected $casts = ['years' => 'array'];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public function years()
    {
        if ($this->years) {
            return Year::whereIn('id', $this->years)->get(['id', 'name']);
        } else {
            return [];
        }
    }
}
