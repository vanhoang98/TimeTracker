<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeInterestedTaskController extends Controller
{
    private $employee;

    public function __construct()
    {
        $this->employee = Employee::find(1);
        // $this->employee = Employee::find(Auth::id());
    }

    /**
     * Add the interested task from task tree.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = $this->employee->interestedTasks()->where('task_id', $request->task_id)->first();
        if ($check != null) {
            return response()->json(['error' => 'invalid'], 401);
        }
        $this->employee->interestedTasks()->syncWithoutDetaching([$request->task_id => ['is_last_child' => $request->is_last_child]]);
        return response()->json(['success' => 'success'], 200);

    }

    public function destroy($id)
    {
        try {
            $this->employee->interestedTasks()->detach($id);
        } catch (Exception $e) {

            return response()->json(['error' => 'invalid'], 401);
        }
        return response()->json(['success' => 'success'], 200);
    }
}
