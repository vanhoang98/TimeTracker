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
        return $this->employee->tasks()->attach($request->task_id, [
            'working_time_start' => $request->working_time_start,
            'working_time_finish' => $request->working_time_finish,
            'process_category_id' => 1,
            'task_category_id' => 1,
            'detail' => 'test test',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param EmployeeTask $id
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
     * @param EmployeeTask $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;
        $employee_task = DB::table('employee_task')
            ->where('id',$id)
            ->update([
                'working_time_start' => $request->working_time_start,
                'working_time_finish' => $request->working_time_finish,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmployeeTask $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->employee->tasks()->wherePivot('id',$id)->detach();
    }
}
