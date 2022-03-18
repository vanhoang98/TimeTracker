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
                <div class="item-head item-dropdown">マイワークアイテム</div>
                <ul class="item-body item-root">
                    <li class="text-ellipsis draggable">担当中のタスク1</li>
                    <li class="text-ellipsis draggable">担当中のタスク2</li>
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
                                @foreach($project->tasks as $childTask)
                                    <li class="f-size-small" >
                                    @include('frontend.pages.child_task', ['child_task' => $childTask])
                                    </li>
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
</div>
