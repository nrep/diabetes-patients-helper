<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientDisease;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function Patients(Request $request)  //retrieve all patients
    {
        return Patient::All();
    }
    public function Patient(Request $request)  //get a specific patient based on id
    {
        return Patient::where('id', $request->id)->get();
    }
    public function PatientDisease(Request $request) //get patient's desease based on patient's id
    {
        return PatientDisease::where('patient_id', $request->id)->get();

    }

    



}
