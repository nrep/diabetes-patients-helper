<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDisease extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'disease_id',
        'diagnosed_at',
        'notes',
    ];

    
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function desease(){
        return $this->belongsTo(Disease::class);
    }
}
