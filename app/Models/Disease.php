<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'symptoms'];

    public function patientDisease() {
        return $this->hasMany(PatientDisease :: class, 'disease_id');
    }

}
