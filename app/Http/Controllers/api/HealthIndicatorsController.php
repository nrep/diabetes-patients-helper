<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\HealthIndicator;
use Illuminate\Http\Request;

class HealthIndicatorsController extends Controller
{
    public function GetHealthIndicators(Request $request)  //retrieve health indicators of a specific patient
    {
        return HealthIndicator::where('patient_id', $request->id)->get();
    }
    public function SaveHealthIndicator(Request $request) //save health indicators of a specific patient
    {
        $healthindicator = HealthIndicator::create([
            'patient_id' => $request->patient_id,           
            'blood_sugar' => $request->blood_sugar,
            'hba1c' => $request->hba1c,
            'weight' => $request->weight,
            'oxygen' => $request->oxygen,
            'tension' => $request->notes,
            'dates' => $request->dates,
            'description' => $request->description,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'health indicator saved',
            'healthindicator' => $healthindicator,
        ]);

    }
    

}
