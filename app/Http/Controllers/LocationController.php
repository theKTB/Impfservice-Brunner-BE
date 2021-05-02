<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getAllLocations()
    {
        $locations = Location::all()->get();
        return $locations;
    }

    public function getLocationById(string $id)
    {
        $location = Location::where('id', $id)->get()->first();
        return $location;
    }
}
