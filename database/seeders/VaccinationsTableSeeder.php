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
        $location = Location::where('id', 1)->get()->first();
        $location2 = Location::where('id', 2)->get()->first();
        $location3 = Location::where('id', 3)->get()->first();

        $vaccination = new Vaccination;
        $vaccination->from = new DateTime("20.02.2021 12:00:00");
        $vaccination->to = new DateTime("20.02.2021 14:00:00");
        $vaccination->maxPatients = "5";
        $vaccination->location()->associate($location);
        $vaccination->save();

        $vaccination2 = new Vaccination;
        $vaccination2->from = new DateTime("21.02.2021 12:00:00");
        $vaccination2->to = new DateTime("21.02.2021 17:00:00");
        $vaccination2->maxPatients = "7";
        $vaccination2->location()->associate($location);
        $vaccination2->save();

        $vaccination3 = new Vaccination;
        $vaccination3->from = new DateTime("22.02.2021 13:00:00");
        $vaccination3->to = new DateTime("22.02.2021 19:00:00");
        $vaccination3->maxPatients = "5";
        $vaccination3->location()->associate($location);
        $vaccination3->save();

        $vaccination4 = new Vaccination;
        $vaccination4->from = new DateTime("23.02.2021 12:00:00");
        $vaccination4->to = new DateTime("23.02.2021 17:00:00");
        $vaccination4->maxPatients = "7";
        $vaccination4->location()->associate($location2);
        $vaccination4->save();

        $vaccination5 = new Vaccination;
        $vaccination5->from = new DateTime("24.02.2021 13:00:00");
        $vaccination5->to = new DateTime("24.02.2021 19:00:00");
        $vaccination5->maxPatients = "5";
        $vaccination5->location()->associate($location2);
        $vaccination5->save();

        $vaccination6 = new Vaccination;
        $vaccination6->from = new DateTime("22.02.2021 12:00:00");
        $vaccination6->to = new DateTime("22.02.2021 17:00:00");
        $vaccination6->maxPatients = "7";
        $vaccination6->location()->associate($location3);
        $vaccination6->save();
    }
}
