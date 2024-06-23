<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $room = Room::all();
        return response()->json($room);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string',
            'room_number' => 'required|string',
            'level' => 'required|in:VVIP,VIP,Economy',
            'available' => 'required|integer|min:1',
        ]);


        $room = Room::create([
            'room_name' => $request->room_name,
            'room_number' => $request->room_number,
            'level' => $request->level,
            'available' => $request->available
        ]);

        return response()->json($room);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'required|string',
            'room_number' => 'required|string',
            'level' => 'required|in:VVIP,VIP,Economy',
            'available' => 'required|integer|min:1'
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Room Hasbeen deleted']);
    }


}