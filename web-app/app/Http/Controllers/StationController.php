<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;


class StationController extends Controller
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
    public function store(StoreStationRequest $request)
    {

        $data = $request->validated();


        $station = $request->user()->managedStations()->create($data);


        return response()->json([
            'success' => true,
            'message' => 'Station created successfully!',
            'data' => $station
        ], 201);
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
    public function update(UpdateStationRequest $request, Station $station)
    {
        // English Comment: Update only the fields sent in the request
        $station->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Station updated successfully! 🛠️',
            'data'    => $station
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
