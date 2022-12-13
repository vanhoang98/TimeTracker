@if (!$child_task->children->isEmpty())
    <div class="nav-link"
         data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}","last_child" : "0"}'>
        <i class="fas fa-folder"></i>
        <p>{{ $child_task->name }} </p>
        <i class="right fas fa-angle-left"></i>
    </div>
    <ul class="nav nav-treeview">
        @foreach ($child_task->children as $childTask)
            <li class="nav-item">
                @include('user.layouts.childtask', ['child_task' => $childTask])
            </li>
        @endforeach
    </ul>
@else
    <div class="nav-link"
         data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}", "last_child" : "1"}'>
        <i class="fas fa-file"></i>
        <p>{{ $child_task->name }} </p>
    </div>
@endif

