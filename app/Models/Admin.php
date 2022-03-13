<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'role', 'password', 'active', 'collage_id', 'admin_department_id'];

    protected $hidden = ['password', 'remember_token'];

    public function collage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Collage::class);
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AdminDepartment::class, 'admin_department_id');
    }

    public function staffDepartment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class, 'admin_department_id');
    }

    public function eBooks()
    {
        return $this->hasMany(EBook::class, 'staff_id');
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true);
    }

    public function scopeAdmins(Builder $builder)
    {
        $builder->where('role', 'admin');
    }

    public function scopeSupervisors(Builder $builder)
    {
        $builder->where('role', 'supervisor');
    }

    public function scopeStaff(Builder $builder)
    {
        $builder->where('role', 'staff');
    }
}
