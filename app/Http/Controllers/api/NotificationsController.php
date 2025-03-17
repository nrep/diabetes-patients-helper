<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function SaveNotification(Request $request)
    {
        $notification = Notification::create([
            'patient_id' => $request->patient_id,
            'title' => $request->title,
            'message' => $request->description,
            'status' => $request->status,
        ]);
            
        return response()->json([
            'success' => true,
            'message' => 'notification saved',
            'notification' => $notification,
        ]);
    }
    public function GetNotifications(Request $request)//get specific patient's notifications
    {
        return Notification::where('patient_id', $request->id)->get();
    }
}
