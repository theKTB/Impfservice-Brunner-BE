<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new Location;
        $location->name = "Perg Stadt";
        $location->street = "Fadingerstraße";
        $location->houseNumber = "2";
        $location->zipCode = "4320";
        $location->city = "Perg";
        $location->save();

        $location2 = new Location;
        $location2->name = "Mauthausen Donaupark";
        $location2->street = "Donaupark";
        $location2->houseNumber = "21-24";
        $location2->zipCode = "4310";
        $location2->city = "Mauthausen";
        $location2->save();

        $location3 = new Location;
        $location3->name = "Mauthausen Donausaal";
        $location3->street = "Donaustraße";
        $location3->houseNumber = "13";
        $location3->zipCode = "4310";
        $location3->city = "Mauthausen";
        $location3->save();

    }
}
