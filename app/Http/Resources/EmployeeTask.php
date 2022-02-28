<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeTask extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->pivot->id,
            'employee_id' => $this->pivot->employee_id,
            'task_id' => $this->pivot->task_id,
            'task_name' => $this->name,
            'project_id' => $this->project_id,
            'working_time_start' => $this->pivot->working_time_start,
            'working_time_finish' => $this->pivot->working_time_finish,
        ];
    }
}
