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
        $user->socialNumber = "3273301291";
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


        $user1 = new User;
        $user1->socialNumber = "0000040118";
        $user1->firstName = "Bobby";
        $user1->lastName = "Brunner";
        $user1->gender = "m";
        $user1->street = "Oberlebing";
        $user1->houseNumber = "99";
        $user1->zipCode = "4320";
        $user1->city = "Allerheiligen im Mühlkreis";
        $user1->admin = false;
        $user1->email = "bb@mail.com";
        //Passwort muss verschlüsselt werden
        $user1->password = bcrypt('secret');
        $user1->save();
    }
}
