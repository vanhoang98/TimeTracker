<li class="f-size-small" >
    <div class="item-droplist draggable fc-event interest-drag" data-event='{ "task_id": "{{ $child_task->id }}", "project_id": "{{ $child_task->project_id }}" }'>{{ $child_task->name }}</div>
    @if ($child_task->childrenTasks)
        <ul>
            @foreach ($child_task->childrenTasks as $childTask)
                @include('frontend.pages.child_task', ['child_task' => $childTask])
            @endforeach
        </ul>
    @endif
</li>
