<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //test user
        $user = new User;
        $user->ssNo = "3273301291";
        $user->firstName = "Kathrin";
        $user->lastName = "Brunner";
        $user->gender = "w";
        $user->phone = "0664/60048114";
        $user->street = "Oberlebing";
        $user->houseNumber = "99";
        $user->zipCode = "4320";
        $user->city = "Allerheiligen im Mühlkreis";
        $user->admin = true;
        $user->email = "kb@mail.com";
        //Passwort muss verschlüsselt werden
        $user->password = bcrypt('secret');
        $user->save();
    }
}
