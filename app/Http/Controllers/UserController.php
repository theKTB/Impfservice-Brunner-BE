<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Vaccination;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::with(['vaccination'])->get();
        return $users;
    }

    public function getUserById(string $id)
    {
        $user = User::where('id', $id)->with(['vaccination'])->get()->first();
        return $user;
    }

}
