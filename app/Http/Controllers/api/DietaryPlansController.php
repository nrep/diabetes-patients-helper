<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DietaryPlan;
use Illuminate\Http\Request;

class DietaryPlansController extends Controller
{
    public function GetDietaryPlans(Request $request)  //retrieve dietary plans of a specific patient
    {
        return DietaryPlan::where('patient_id', $request->id)->get();
    }
    public function SaveDietaryPlan(Request $request) //save dietary plans of a specific patient
    {
        $dietaryplan = DietaryPlan::create([
            'patient_id' => $request->patient_id,           
            'plan' => $request->plan,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,           
            'description' => $request->description,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'dietary plan saved',
            'dietaryplan' => $dietaryplan,
        ]);

    }
    
}
