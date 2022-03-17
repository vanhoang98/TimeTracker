<div class="l-wrapper">
    <div class="l-sidebar__header">
        <div class="l-sidebar__header__inner">
            <button class="h-nav-toggle"></button>
            <div class="h-account-dropdown">
                <div class="user-img icon-cmn">
                    <img src="{{ asset('images/icon-user-profile.png') }}" alt="">
                </div>
                <div class="user-name"><p>自分</p></div>
            </div>

            <div class="h-list-title">
                <ul>
                    <li class="active-nav"><a href="">工数入力</a></li>
                </ul>
            </div>

            <div class="h-custom-block">
                <ul>
                    <li class="icon-cmn">
                        <a href="">
                            <img src="{{ asset('images/icon-list.png') }}" alt="">
                        </a>
                    </li>
                    <li class="manual-mode icon-cmn">
                        <a href="">
                            <img src="{{ asset('images/icon-list.png') }}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="l-sidebar__container">
        <ul class="l-sidebar__nav">
            <li class="l-sidebar__item">
                <div class="item-head item-dropdown">マイタスク</div>
                <ul class="item-body item-root interested_list" id='interested-tasks'>
                    @foreach($interested_tasks as $task)
                        <li>
                            <div class="text-ellipsis fc-event draggable ui-draggable ui-draggable-handle interested-task" data-event='{ "task_id": "{{ $task->id }}", "project_id": "{{ $task->project_id }}" }'>{{$task->name}} [{{$task->project_id}}] </div>
                            <ul id='interest-menu' class="custome-interest-menu"  task-id="{{ $task->id }}">
                                <li class="delete-interest-task"><i class="icon-itemMenu fa fa-trash"></i>削除</li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="l-sidebar__item">
                <div class="item-head item-dropdown">ワークアイテムツリー</div>
                <div class="item-body">
                    <div class="item-des-list">
                        <dl>
                            <dt>アイテムタイプ:</dt>
                            <dd>
                                <select>
                                    <option value="">すべて</option>
                                    <option value="">すべて</option>
                                </select>
                            </dd>
                        </dl>

                        <dl>
                            <dt>フィルタ:</dt>
                            <dd>
                                <select>
                                    <option value="">割り当てられたワークアイテム</option>
                                    <option value="">割り当てられたワークアイテム</option>
                                </select>
                            </dd>
                        </dl>

                        <dl>
                            <dt>キーワード:</dt>
                            <dd>
                                <input type="text" name="" id="">
                            </dd>
                        </dl>
                    </div>

                    <ul class="item-tree" id='external-events'>
                        @foreach($task_tree as $project)
                        <li>
                            <div class="item-dropdown" id="{{$project->id}}">{{$project->name}}</div>
                            <ul>
                                @foreach($project->children_tasks as $childTask)
                                    @include('frontend.pages.child_task', ['child_task' => $childTask])
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div>
        <div id='calendar'></div>
    </div>
    <ul id='contextMenu' class="custom-menu" role="menu">
        <li class="delete-task"><i class="icon-itemMenu fa fa-trash"></i>削除</li><hr>
        <li><i class="icon-itemMenu fa fa-square"></i>工程分類<i class="arrow-right fa fa-chevron-right"></i>
            <ul class="process-subMenu">
                <li><a class="dropdown-item" href="#">要求分析</a></li>
                <li><a class="dropdown-item" href="#">基本設計</a></li>
                <li><a class="dropdown-item" href="#">開発</a></li>
            </ul>
        </li>
        <li><i class="icon-itemMenu fa fa-square-o"></i>作業分類<i class="arrow-right fa fa-chevron-right"></i>
            <ul class="process-subMenu">
                <li><a class="dropdown-item" href="#">レビュー</a></li>
                <li><a class="dropdown-item" href="#">手戻り</a></li>
                <li><a class="dropdown-item" href="#">修正</a></li>
                <li><a class="dropdown-item" href="#">管理</a></li>
            </ul>
        </li><hr>
        <li><i class="icon-itemMenu fa fa-comment-o"></i>詳細表示</li>
    </ul>
</div>
