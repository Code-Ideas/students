<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $fillable = ['title', 'body', 'model_id', 'model_name', 'users', 'seen_users', 'department_id', 'year_id'];

    protected $casts = ['users' => 'array', 'seen_users' => 'array'];
}
