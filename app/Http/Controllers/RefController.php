<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flight;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefController extends Controller
{
    
    public function categoryList(Request $request) 
    {
        if($request->ajax()) {
            $categories = Category::select('name as text', 'id')->get()->toArray();

            return response()->json($categories);
        }
    }

    public function flightList(Request $request) 
    {
        if($request->ajax()) {
            $flights = Flight::where('category_id', $request->category_id)->get();
            
            $data = [];

            for($i = 0; $i < count($flights); $i++) {
                $count_participant = Participant::where('flight_id', $flights[$i]->id)->count();
                $remain_quota = $flights[$i]->limit - $count_participant;
                if($remain_quota > 1) {
                    $data[$i] = [
                        'text' => $flights[$i]->serie . $flights[$i]->session ." - ". Carbon::parse($flights[$i]->date)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY') . " --- Sisa Quota : " . $remain_quota,
                        'id' => $flights[$i]->id
                    ];
                }
            }
            return response()->json($data);
        }
    }

    public function participantList(Request $request) 
    {
        if($request->ajax()) {
            $participants = Participant::where('category_id', $request->category_id)->get();
            
            $data = [];

            for($i = 0; $i < count($participants); $i++) {
                
                    $data[$i] = [
                        'text' => explode("-", $participants[$i]->chest_no)[1] . " - " . $participants[$i]->name,
                        'id' => $participants[$i]->id
                    ];
            }
            return response()->json($data);
        }
    }

}
