<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalDepartment extends Model
{
    protected $fillable = ['name', 'active'];

    public function medicalReservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MedicalReservation::class, 'medical_department_id');
    }

}
