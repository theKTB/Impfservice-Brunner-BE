<?php

namespace Database\Seeders;

use DateTime;
use App\Models\Location;
use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccination = new Vaccination;
        $vaccination->date = new DateTime("2021-05-08");
        $vaccination->from = new DateTime("12:00:00");
        $vaccination->to = new DateTime("14:00:00");
        $vaccination->maxPatients = "5";

        $location = Location::all()->first();
        $vaccination->location()->associate($location);
        $vaccination->save();
    }
}
