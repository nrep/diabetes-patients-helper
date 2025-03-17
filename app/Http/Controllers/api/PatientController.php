<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientDisease;
use Hash;
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
    public function GetPatientDisease(Request $request) //get patient's desease based on patient's id
    {
        return PatientDisease::where('patient_id', $request->id)->get();

    }
    public function Register(Request $request) //saving new user 
    {
        $patient = Patient::create([
            'name' => $request->name,
            'address' => $request->email,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'username' => $request->username,
            'password' => Hash::make(uniqid()),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'patient created',
            'patient' => $patient,
        ]);
    }

    public function SavePatientDisease(Request $request) //save patient diseases
    {
        $patientdesease = PatientDisease::create([
            'patient_id' => $request->patient_id,
            'disease_id' => $request->disease_id,
            'diagnosed_at' => $request->diagnosed_at,
            'notes' => $request->notes,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Disease assigned to patient successfully',
            
        ]);

    }

}
