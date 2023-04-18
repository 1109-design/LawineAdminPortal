<?php

namespace App\Http\Controllers;

use App\Models\CrashLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrashLocationController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function storeCrashData(Request $request)
    {
//        Log::info('one two');
        $validatedData = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'device_id' => 'required|string',
        ]);

        try {
            $crashLocation = new CrashLocation();
            $crashLocation->latitude = $request->input('latitude');
            $crashLocation->longitude = $request->input('longitude');
            $crashLocation->device_id = $request->input('device_id');
            $crashLocation->save();

            return response()->json(['message' => 'Location data saved'], 201);
        }
        catch(\Exception $exception)
        {
            return response()->json(['message' =>  'Failed due to'.' '.$exception->getMessage()], 401);

        }
    }
}
