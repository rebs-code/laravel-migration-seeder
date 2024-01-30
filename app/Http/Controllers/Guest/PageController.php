<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index()
    {
        $trains = Train::all();
        $today_trains = Train::where('departure_date', Carbon::today())->get();
        return view('welcome', compact('trains', 'today_trains'));
    }
}
