<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightRequest;
//use App\Http\Resources\FlightResource;
use App\Models\Flight;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\FlightResource;
use App\Models\Airport;
use Illuminate\Database\Query\JoinClause;

class FlightController extends ApiController
{

    public function index(Request $request)
    {
        $tail = $request->get('tail') ? $request->get('tail') : '';
        $date_from = $request->get('date_from') ? $request->get('date_from') : null;
        $date_to = $request->get('date_to') ? $request->get('date_to') : null;
        $airports = DB::table('airports')->join('flights', 'flights.airport_id1','=','airports.id')
           ->join('aircrafts', 'aircrafts.id', '=', 'flights.aircraft_id')
        ->where('aircrafts.tail', 'LIKE', "%{$tail}%")
       ->where('takeoff', '>=', $date_from)
       ->where('landing', '<=', $date_to)->get();
         if($airports) {
        return $this->respondSuccess($airports);
        } else {
           return $this->respondNotFound();
        }

    }
}
