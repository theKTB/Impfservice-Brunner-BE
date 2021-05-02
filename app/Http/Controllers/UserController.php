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



    /**
     * Hilfsmethode
     * modify / convert values if needed
     */

    private function parseRequest(Request $request): Request
    {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $from = new \DateTime($request->from);
        $to = new \DateTime($request->to);
        $request['from'] = $from;
        $request['to'] = $to;
        return $request;
    }

}
