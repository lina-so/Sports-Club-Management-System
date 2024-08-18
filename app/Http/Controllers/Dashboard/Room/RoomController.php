<?php

namespace App\Http\Controllers\Dashboard\Room;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room\RoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json(['message'=>'rooms retrieved successfully','rooms'=>$rooms]);

    }

    public function store(RoomRequest $request)
    {
        $data = $request->validated();
        $room = Room::create($data);

        return response()->json(['message'=>'room added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, Room $room)
    {
        // dd($request);
        $data = $request->validated();
        $room->update($data);

        return response()->json(['message'=>'room updated successfully']);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(['message'=>'room deleted successfully']);

    }
}
