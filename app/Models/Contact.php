<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'message','admin_department_id', 'user_id'];

    public function adminDepartment():  \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AdminDepartment::class);
    }
}
