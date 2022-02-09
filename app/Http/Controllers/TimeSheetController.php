<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeSheetController extends Controller
{
    public function index()
    {
        $days = [];
        $start = Carbon::now()->startOfWeek();
        $end = Carbon::now()->endOfWeek();
        for ($day = $start->copy(); $day->lte($end); $day->addDay()) {
            array_push($days, (object)[
                'day' => $day->format('m/d'),
                'name' => $day->format('l'),
            ]);
        }
        
        return view('frontend.layouts.master', compact(['days', 'start', 'end']));
    }
}
