<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Vaccination;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class VaccinationController extends Controller
{
    public function getAllVaccinations()
    {
        $vaccinations = Vaccination::with(['location'])->get();
        return $vaccinations;
    }


    public function getVaccinationById(string $id)
    {
        $vaccination = Vaccination::where('id', $id)->with(['users', 'location'])->first();
        return $vaccination;
    }

    /**
     * create new vaccination
     */
    public function create(Request $request) : JsonResponse  {
        $request = $this->parseRequest($request);

        /*+
        *  use a transaction for saving model including relations
        * if one query fails, complete SQL statements will be rolled back
        */
        DB::beginTransaction();
        try {
            $vaccination = Vaccination::create($request->all());
            DB::commit();
            // return a valid http response
            return response()->json($vaccination, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving vaccination failed: " . $e->getMessage(), 420);
        }
    }


    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $vaccination = Vaccination::with(['location'])
                ->where('id', $id)->first();
            if ($vaccination != null) {
                $request = $this->parseRequest($request);
                $vaccination->update($request->all());
                $vaccination->save();
            }
            DB::commit();
            $vaccination1 = Vaccination::with(['location'])
                ->where('id', $id)->first();
            // return a valid http response
            return response()->json($vaccination1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating vaccination failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * returns 200 if book deleted successfully, throws excpetion if not
     */
    public function delete(string $id) : JsonResponse
    {
        $vaccination = Vaccination::where('id', $id)->first();
        if ($vaccination != null) {
            $vaccination->delete();
        }
        else
            throw new \Exception("vaccination couldn't be deleted - it does not exist");
        return response()->json('vaccination (' . $id . ') successfully deleted', 200);
    }



    public function associateVaccination(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id', $request->userId)->first();
            $vaccination = Vaccination::where('id', $request->vaccinationId)->first();
            if ($user != null && $vaccination != null) {
                if($user->vaccination_id == null){
                    $maxPatients = $vaccination['maxPatients'];
                    if($maxPatients > 0){
                        $user->vaccination()->associate($vaccination);
                        $user->save();
                        $vaccination->maxPatients = ((int)$maxPatients - 1);
                        $vaccination->save();
                    } else {
                        return response()->json("max patients is 0", 201);
                    }
                } else {
                    return response()->json("user has already a vaccination", 201);
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


    /**
     * Hilfsmethode
     * modify / convert values if needed
     */

    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $from = new \DateTime($request->from);
        $to = new \DateTime($request->to);
        $request['from'] = $from;
        $request['to'] = $to;
        return $request;
    }

}
