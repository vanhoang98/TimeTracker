
    {{-- <div class="item-droplist draggable fc-event" task-id="{{ $child_task->id }}" project-id="{{ $child_task->project_id }}">{{ $child_task->name }} </div> --}}
    @if (!$child_task->children->isEmpty())
{{--        {{dd(($child_task->children))}}--}}
    <div class="item-droplist draggable fc-event" data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}","last_child" : false}'>{{ $child_task->name }} </div>
        <ul>
            @foreach ($child_task->children as $childTask)
                <li>
                    @include('frontend.pages.child_task', ['child_task' => $childTask])
                </li>
            @endforeach
        </ul>
    @else

        <div class="item-droplist draggable fc-event" data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}", "last_child" : true}'>{{ $child_task->name }} </div>
    @endif

