<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeTask as EmployeeTaskResource;
use Illuminate\Support\Facades\DB;

class EmployeeTaskController extends Controller
{
    private $employee;

    public function __construct()
    {
        $this->employee = Employee::find(1);
    }

    /**
     * Display a listing of tasks of employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_tasks =  $this->employee->tasks()->get();
        return EmployeeTaskResource::collection($employee_tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('employee_task')->insertGetId(
        [
            'employee_id' => $this->employee->id,
            'task_id' => $request->task_id,
            'working_time_start' => $request->working_time_start,
            'working_time_finish' => $request->working_time_finish,
            'process_category_id' => 1,
            'task_category_id' => 1,
            'detail' => 'test test',
        ]);
        return $id;
//        return $this->employee->tasks()->attach($request->task_id, [
//            'working_time_start' => $request->working_time_start,
//            'working_time_finish' => $request->working_time_finish,
//            'process_category_id' => 1,
//            'task_category_id' => 1,
//            'detail' => 'test test',
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int EmployeeTask $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee_task =  $this->employee->tasks->where('pivot.id',$id)->first();
        return new EmployeeTaskResource($employee_task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $employee_task = DB::table('employee_task')
                ->where('id',$id)
                ->update([
                    'working_time_start' => $request->working_time_start,
                    'working_time_finish' => $request->working_time_finish,
                ]);
        } catch (Exception $e){
            return response()->json(['error' => 'invalid'], 401);
        }
        return response()->json(['success' => 'success'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->employee->tasks()->wherePivot('id',$id)->detach();
        } catch (Exception $e){
            return response()->json(['error' => 'invalid'], 401);
        }
        return response()->json(['success' => 'success'], 200);

    }
}
