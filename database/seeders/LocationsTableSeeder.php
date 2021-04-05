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

    }
}
