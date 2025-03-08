<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'age',
        'gender',
        'username',
        'email',
        'password',
    ];


    public function healthIndicators() {
        return $this->hasMany(HealthIndicator :: class, 'patient_id');
    }

    public function patientDisease() {
        return $this->hasMany(PatientDisease :: class, 'patient_id');
    }

}