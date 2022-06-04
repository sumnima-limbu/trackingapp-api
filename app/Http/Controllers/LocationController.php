<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index()
    {
        try {

            $locations = Location::where('user_id', Auth::id())->latest()->get();


            $response = [
                'success' => true,
                'data' => $locations
            ];

            return response($response, 200);
        } catch (\Exception $e) {

            $response = [
                'message' => 'Something went wrong',
                'success' => false
            ];

            return response($response, 500);
        }
    }

    public function create(Request $request) {
        try {
            Location::create([
                'user_id' => Auth::id(),
                'latitude' => $request->get('latitude'),
                'longitude' => $request->get('longitude'),
            ]);

            $response = [
                'success' => true,
                'message' => 'Added location'
            ];

            return response($response, 200);
        } catch (\Exception $e) {

            $response = [
                'message' => 'Something went wrong',
                'success' => false
            ];

            return response($response, 500);
        }
    }
}
