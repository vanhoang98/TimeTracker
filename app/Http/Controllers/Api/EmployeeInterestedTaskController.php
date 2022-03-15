<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeInterestedTaskController extends Controller
{
    /**
     * Add the interested task from task tree.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::insert('insert into employee_interested_tasks (employee_id, task_id) values (?, ?)', [Auth::id(), $request->task_id]);
        } catch (Exception $e){
            return response()->json(['error' => 'invalid'], 401);
        }
        return response()->json(['success' => 'success'], 200);
    }
}
