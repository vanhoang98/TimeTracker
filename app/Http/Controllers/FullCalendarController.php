<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    // public function index()
    // {
    //     if(request()->ajax())
    //     {
    //         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
    //         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

    //         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
    //         return response()->json($data);
    //     }
    //     return view('fullcalendar');
    // }


    // public function create(Request $request)
    // {
    //     $insertArr = [ 'title' => $request->title,
    //                    'start' => $request->start,
    //                    'end' => $request->end
    //                 ];
    //     $event = Event::insert($insertArr);
    //     return response()->json($event);
    // }


    // public function update(Request $request)
    // {
    //     $where = array('id' => $request->id);
    //     $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
    //     $event  = Event::where($where)->update($updateArr);

    //     return response()->json($event);
    // }


    // public function destroy(Request $request)
    // {
    //     $event = Event::where('id',$request->id)->delete();

    //     return response()->json($event);
    // }
}
