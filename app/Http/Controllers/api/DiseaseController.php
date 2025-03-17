<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index(Request $request)  //retrieve all disease
    {
        return Disease::All();
    }
    public function SaveDisease(Request $request) //save disease
    {
        $disease = Disease::create([
            'name' => $request->name,
            'symptoms' => $request->symptoms,
            'description' => $request->description,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'disease saved',
            'disease' => $disease,
        ]);

    }
    
}
