<?php

namespace App\Http\Controllers\Dashboard\Facility;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Facility\FacilityRequest;

class FacilityController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FacilityRequest $request)
    {
        $data = $request->validated();
        $facility = Facility::create($data);

        return response()->json(['message'=>'Facility added successfully']);
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
    public function update(FacilityRequest $request, Facility $facility)
    {
        $data = $request->validated();
        $facility->update($data);

        return response()->json(['message'=>'Facility updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return response()->json(['message'=>'Facility deleted successfully']);

    }

}
