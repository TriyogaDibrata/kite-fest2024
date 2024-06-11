<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecapController extends Controller
{
    
    public function index(Request $request) {
        return view('judges.recaps.index');
    }
}
