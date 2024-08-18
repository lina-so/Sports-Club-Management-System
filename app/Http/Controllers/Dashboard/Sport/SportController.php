<?php

namespace App\Http\Controllers\Dashboard\Sport;

use App\Models\Room;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\SportRequest;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return response()->json(['message'=>'sports retrieved successfully','sports'=>$sports]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SportRequest $request)
    {
        $data = $request->validated();

        return DB::transaction(function () use ($data , $request) {
            $sport = Sport::create($data);

            $sport->days()->attach($request->input('days'));
            $sport->facilities()->attach($request->input('facilities'));

            return response()->json(['message'=>'sport added successfully']);
        });

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
    public function update(SportRequest $request, Sport $sport)
    {
        $data = $request->validated();
        return DB::transaction(function () use ($data , $request , $sport) {
            $sport->update($data);

            $sport->days()->sync($request->input('days'));
            $sport->facilities()->syncWithoutDetaching($request->input('facilities'));

            return response()->json(['message'=>'sport updated successfully']);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return response()->json(['message'=>'sport deleted successfully']);

    }
}
