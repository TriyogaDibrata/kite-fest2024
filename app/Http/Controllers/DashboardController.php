<?php

namespace App\Http\Controllers;

use App\Charts\FlightSerieChart;
use App\Charts\ParticipantChart;
use App\Models\Category;
use App\Models\Flight;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(ParticipantChart $pChart, FlightSerieChart $fChart) {
        // $flight = Flight::select('*')->get()->groupBy(['date','serie']);
        $data = Participant::rightJoin('categories as c', function($item) {
            $item->on('participants.category_id', 'c.id');
        })
        ->select('c.name', DB::raw('count(participants.id) as total'))
        ->groupBy('c.id')
        ->get();
        
        $participant = Participant::rightJoin('categories as c', function($q) {
            $q->on('participants.category_id', 'c.id');
        })
        ->rightJoin('flights as f', function($q) {
            $q->on('participants.flight_id', 'f.id');
        })
        ->select('participants.name as nama_pelayang', 'participants.chest_no as nomor_peserta', 'c.name as kategori', 'f.date as date', 'f.serie as seri_terbang', 'f.session as sesi_terbang')
        ->get()
        ->groupBy(['date', 'seri_terbang', 'sesi_terbang']);

        // dd($participant);
        
        $categories = Category::with('flights', 'participants')->get();

        $ptest = Participant::query();

        $dateFlight = Flight::groupBy('date')->pluck('date')->toArray();
        $flightQuery = Flight::query();
        // $flight = Flight::select('serie', 'session', 'date', 'start', 'end', 'id')->where('date', $dateFlight[0])->get()->groupBy('serie');
        // dd($flight);

        return view('dashboard.index', ['pChart' => $pChart->build(), 'fChart' => $fChart->build()], compact(['participant', 'categories', 'dateFlight', 'flightQuery']));
    }
}
