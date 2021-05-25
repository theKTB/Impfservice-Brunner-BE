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

        $user2 = new User;
        $user2->socialNumber = "1234010190";
        $user2->firstName = "Toni";
        $user2->lastName = "Tester";
        $user2->gender = "m";
        $user2->street = "Oberlebing";
        $user2->houseNumber = "100";
        $user2->zipCode = "4320";
        $user2->city = "Allerheiligen im Mühlkreis";
        $user2->admin = false;
        $user2->email = "tt@mail.com";
        $user2->password = bcrypt('secret');
        $user2->save();

        $user3 = new User;
        $user3->socialNumber = "1234020280";
        $user3->firstName = "Anja";
        $user3->lastName = "Admin";
        $user3->gender = "w";
        $user3->street = "Straße";
        $user3->houseNumber = "1";
        $user3->zipCode = "1111";
        $user3->city = "Hintertupfingen";
        $user3->admin = true;
        $user3->email = "aa@mail.com";
        $user3->password = bcrypt('secret');
        $user3->save();

        $user4 = new User;
        $user4->socialNumber = "1234030370";
        $user4->firstName = "Fritz";
        $user4->lastName = "Franz";
        $user4->gender = "m";
        $user4->street = "Regenweg";
        $user4->houseNumber = "12";
        $user4->zipCode = "1111";
        $user4->city = "Hintertupfingen";
        $user4->admin = false;
        $user4->email = "ff@mail.com";
        $user4->password = bcrypt('secret');
        $user4->save();
    }
}
