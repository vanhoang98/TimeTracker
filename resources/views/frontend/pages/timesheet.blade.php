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
                    <li class="text-ellipsis draggable">タスク①</li>
                    <li class="text-ellipsis draggable">タスク②</li>
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
                        <li>
                            <div class="item-dropdown active-title draggable">プロジェクト①</div>
                            <ul>
                                <li class="f-size-small">
                                    <div class="item-droplist draggable">タスク①</div>
                                    <ul>
                                        <li class="draggable">サブタスク①</li>
                                        <li class="draggable">サブタスク②</li>
                                    </ul>
                                </li>

                                <li class="f-size-large">
                                    <div class="item-droplist draggable">タスク②</div>
                                    <ul>
                                        <li>
                                            <div class="item-droplist draggable">サブタスク①</div>
                                            <ul>
                                                <li class="draggable">サブタスク①</li>
                                                <li class="draggable">サブタスク②</li>
                                            </ul>
                                        </li>
                                        <li class="draggable">サブタスク②</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
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
                            <span id = 'firstday'></span>
                            <span> ~ </span>
                            <span id = 'lastday'></span>
                        </a>
                    </li>
                    <li class="manual-mode icon-cmn">
                        <p href="" class="next-week">
                            <img src="{{ asset('images/icon-next.png') }}" alt="">
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
                                @foreach (range(1, 9) as $hour)
                                    <div class="calendar-time-cell"><span style="float: right; font-size: 20px">0{{ $hour }}:00</span></div>
                                @endforeach
                                @foreach (range(10, 24) as $hour)
                                    <div class="calendar-time-cell"><span style="float: right; font-size: 20px">{{ $hour }}:00</span></div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="calendar-entry-col">
                            <div class="drag-new-entry">
                                <div class="weekly-grid">
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                </div>
                            </div>
                        </div> --}}

                        @foreach (range(1, 5) as $item)
                            <div class="calendar-entry-col">
                                <div class="drag-new-entry">
                                    <div class="weekly-grid">
                                        @foreach (range(1, 24) as $item)
                                            <div class="calendar-entry-cell"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach (range(1, 2) as $item)
                            <div class="calendar-entry-col" style="background: #f0f0f0">
                                <div class="drag-new-entry">
                                    <div class="weekly-grid">
                                        @foreach (range(1, 24) as $item)
                                            <div class="calendar-entry-cell"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <ul class='custom-menu'>
                        <li><i class="icon-itemMenu fa fa-trash"></i>削除</li><hr>
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
            </div>
        </div>
    </div>
</div>
