<?php

namespace App\Http\Controllers\Dashboard\Offers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\OfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return response()->json(['message'=>'offers retrieved successfully','offers'=>$offers]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $data = $request->validated();

        $offer = Offer::create($data);
        return response()->json(['message'=>'offer added successfully']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(OfferRequest $request, Offer $offer)
    {
        $data = $request->validated();
        $offer->update($data);
        return response()->json(['message'=>'offer updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return response()->json(['message'=>'offer deleted successfully']);

    }
}
