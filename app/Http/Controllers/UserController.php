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

    public function vaccinate(string $id)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id', $id)->first();
            if ($user != null) {
                if(!$user->vaccination_id && !$user->vaccinated){
                        $user->vaccinated = true;
                        $user->save();
                } else {
                    return response()->json("user is already vaccinated", 201);
                }
            }
            DB::commit();
            return response()->json($user, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating vaccination failed: " . $e->getMessage(), 420);
        }

    }

}
