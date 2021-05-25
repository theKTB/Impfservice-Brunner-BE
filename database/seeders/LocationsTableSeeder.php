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

        $location4 = new Location;
        $location4->name = "Gemeinde Schwertberg";
        $location4->street = "Hauptstraße";
        $location4->houseNumber = "3";
        $location4->zipCode = "4311";
        $location4->city = "Schwertberg";
        $location4->save();

        $location5 = new Location;
        $location5->name = "Kindergarten Arbing";
        $location5->street = "Am Schlossberg";
        $location5->houseNumber = "21";
        $location5->zipCode = "4341";
        $location5->city = "Arbing";
        $location5->save();

        $location6 = new Location;
        $location6->name = "Allerheiligen Gemeindeamt";
        $location6->street = "Allerheiligen";
        $location6->houseNumber = "48";
        $location6->zipCode = "4320";
        $location6->city = "Allerheiligen";
        $location6->save();

    }
}
