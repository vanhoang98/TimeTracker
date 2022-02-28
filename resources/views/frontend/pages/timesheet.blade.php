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

                    <ul class="item-tree">
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

    <div class="l-main">
        <div class="l-main__container">
            <div class="l-nav-action">
                <div class="datepicker-range">
                    <ul>
                        <li class="manual-mode icon-cmn">
                            <p href="" class="pre-week">
                                <img src="{{ asset('images/icon-prev.png') }}" alt="">
                            </p>
                        </li>
                        <li class="manual-mode">
                            <a href="">
                                <span id ='dayOfWeek'></span>
                            </a>
                        </li>
                        <li class="manual-mode icon-cmn">
                            <p href="" class="next-week">
                                <img src="{{ asset('images/icon-next.png') }}" alt="">
                            </p>
                        </li>
                        <li class="manual-mode icon-cmn">
                            <p href="" class="">
                                <img src="{{ asset('images/icon-calendar.png') }}" alt="">
                            </p>
                        </li>
                        <li class="manual-mode icon-cmn">
                            <p href="" class="day-calendar">
                                <img src="{{ asset('images/icon-day.png') }}" alt="">
                            </p>
                        </li>
                        <li class="manual-mode icon-cmn">
                            <p href="" class="week-calendar">
                                <img src="{{ asset('images/icon-week.png') }}" alt="">
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="timepicker-range">

                </div>
                <div class="list-action-outline">

                </div>
            </div>
            <div class="l-main-calendar-picker">
                <div class="calendar-header">
                    <div class="calendar-time-col"></div>
                </div>

                <div class="calendar-body">
                    <div class="calendar-body-wrapper">
                        <div class="calendar-time-col">
                            <div class="time-wrapper">
                                @foreach (range(0, 9) as $hour)
                                    <div class="calendar-time-cell"><span style="float: right; font-size: 20px">0{{ $hour }}:00</span></div>
                                @endforeach
                                @foreach (range(10, 23) as $hour)
                                    <div class="calendar-time-cell"><span style="float: right; font-size: 20px">{{ $hour }}:00</span></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
