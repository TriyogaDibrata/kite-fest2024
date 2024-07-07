<?php

namespace App\Http\Controllers;

use App\Charts\FlightSerieChart;
use App\Charts\ParticipantChart;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(ParticipantChart $pChart, FlightSerieChart $fChart) {
        return view('dashboard.index', ['pChart' => $pChart->build(), 'fChart' => $fChart->build()]);
    }
}
