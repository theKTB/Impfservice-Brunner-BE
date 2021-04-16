<?php

namespace App\Http\Controllers;

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

    public function findByLocation(string $id)
    {
        $vaccinations = Vaccination::where('location_id', $id)->with(['location'])->get();
        return $vaccinations;
    }

    public function findById(string $id)
    {
        $vaccination = Vaccination::where('id', $id)->with(['location'])->get()->first();
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
            // return a vaild http response
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
