<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ILiterate extends Model
{
    protected $fillable = ['user_id', 'name','illiterate_id','address','classroom_type','classroom'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getClassAttribute()
    {
        $classroom = '';
        $type = '';
        if ($this->classroom == 'home') {
            $classroom = 'منزل';
        } elseif ($this->classroom == 'mosque') {
            $classroom = 'مسجد';
        } elseif ($this->classroom == 'association') {
            $classroom = 'جمعية';
        } else {
            $classroom = 'كلية';
        }
        if ($this->classroom_type == 'energizing') {
            $type = 'تنشيطي';
        } elseif ($this->classroom_type == 'immediate_exam') {
            $type = 'امتحان فوري';
        } else {
            $type = 'حر';
        }

        return $type .' - '.$classroom;
    }
}
