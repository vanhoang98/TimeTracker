<li class="f-size-small" >
    <div class="item-droplist">{{ $child_task->name }} </div>
    @if ($child_task->childrenTasks)
        <ul>
            @foreach ($child_task->childrenTasks as $childTask)
                @include('frontend.pages.child_task', ['child_task' => $childTask])
            @endforeach
        </ul>
    @endif
</li>
