<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use App\Models\Vaccination;

class VaccinationController extends Controller
{
    public function getAllVaccinations()
    {
        $vaccinations = Vaccination::with(['location'])->get();
        return $vaccinations;
    }

    public function findByLocation(string $id)
    {
        $vaccinations = Vaccination::where('location_id', $id)->with(['location'])->get();
        return $vaccinations;
    }

    public function findById(string $id)
    {
        $vaccination = Vaccination::where('id', $id)->with(['location'])->get()->first();
        return $vaccination;


    }

}
