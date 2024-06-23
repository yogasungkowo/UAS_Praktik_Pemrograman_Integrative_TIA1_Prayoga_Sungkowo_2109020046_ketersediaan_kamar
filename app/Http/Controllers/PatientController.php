<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\Room;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patient = patient::all();
        return response()->json($patient);
    }

    public function checkin(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string',
            'diagnose' => 'required|string',
        ]);

        $room = Room::findOrFail($request->room_id);
        if(!$room->available)
        {
            return response()->json(['message' => 'Room doesnt exist']);
        }

        $patient = patient::create([
            'room_id' => $request->room_id,
            'name' => $request->name,
            'diagnose' => $request->diagnose
        ]);

        $room->available = false;
        $room->save();

        return response()->json($patient);
    }

    public function checkout($id)
    {
        $patient = patient::findOrFail($id);
        $room = $patient->room;
        $patient->delete();

        $room->available = true;
        $room->save();

        return response()->json(['message' => 'Patient has been Checkout']);
    }
}
