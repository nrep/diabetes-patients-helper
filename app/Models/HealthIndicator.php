<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthIndicator extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'blood_sugar',
        'hba1c',
        'weight',
        'oxygen',
        'tension',
        'dates',
        'description',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

}

