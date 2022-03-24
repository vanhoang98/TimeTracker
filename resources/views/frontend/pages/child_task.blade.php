@if (!$child_task->children->isEmpty())
    <div class="item-droplist draggable fc-event" data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}","last_child" : false}'>
        <img src="{{ asset('images/icon-task.png') }}" style="width: 25px; padding-bottom: 4px" alt="">
        <span>{{ $child_task->name }} </span>
    </div>
    <ul>
        @foreach ($child_task->children as $childTask)
            <li>
                @include('frontend.pages.child_task', ['child_task' => $childTask])
            </li>
        @endforeach
    </ul>
@else
    <div class="item-droplist draggable fc-event" data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}", "last_child" : true}'> 
        <img src="{{ asset('images/icon-last-task.png') }}" style="width: 25px; padding-bottom: 1px" alt="">
        <span>{{ $child_task->name }}</span>
    </div>
@endif

