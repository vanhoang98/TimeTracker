<li class="f-size-small" >
    <div class="item-droplist draggable" task-id="{{ $child_task->id }}" project-id="{{ $child_task->project_id }}">{{ $child_task->name }} </div>
    @if ($child_task->childrenTasks)
        <ul>
            @foreach ($child_task->childrenTasks as $childTask)
                @include('frontend.pages.child_task', ['child_task' => $childTask])
            @endforeach
        </ul>
    @endif
</li>
