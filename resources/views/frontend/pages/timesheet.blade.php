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
                    <li class="text-ellipsis active-title">タスク①</li>
                    <li class="text-ellipsis">タスク②</li>
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
                            <div class="item-dropdown active-title">プロジェクト①</div>
                            <ul>
                                <li class="f-size-small">
                                    <div class="item-droplist">タスク①</div>
                                    <ul>
                                        <li>サブタスク①</li>
                                        <li>サブタスク②</li>
                                    </ul>
                                </li>

                                <li class="f-size-large">
                                    <div class="item-droplist">タスク②</div>
                                    <ul>
                                        <li>
                                            <div class="item-droplist">サブタスク①</div>
                                            <ul>
                                                <li>サブタスク①</li>
                                                <li>サブタスク②</li>
                                            </ul>
                                        </li>
                                        <li>サブタスク②</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    {{-- <div class="l-main">
        <div class="l-main__container">
            <div class="l-nav-action">
                <div class="datepicker-range">

                </div>
                <div class="timepicker-range">

                </div>
                <div class="list-action-outline">

                </div>
            </div>
            <div class="l-main-calendar-picker">
                <div class="calendar-header">
                    <div class="calendar-time-col"></div>
                    <div class="calendar-header-cell">
                        <div class="day"><span>1/16</span>(日)</div>
                        <div class="time"><span></span></div>
                    </div>

                    <div class="calendar-header-cell">
                        <div class="day"><span>1/17</span>(月)</div>
                        <div class="time"><span></span></div>
                    </div>

                    <div class="calendar-header-cell">
                        <div class="day"><span>1/18</span>(火)</div>
                        <div class="time"><span></span></div>
                    </div>

                    <div class="calendar-header-cell">
                        <div class="day"><span>1/19</span>(水)</div>
                        <div class="time"><span></span></div>
                    </div>

                    <div class="calendar-header-cell">
                        <div class="day"><span>1/20</span>(木)</div>
                        <div class="time"><span></span></div>
                    </div>

                    <div class="calendar-header-cell">
                        <div class="day"><span>1/21</span>(金)</div>
                        <div class="time"><span></span></div>
                    </div>

                    <div class="calendar-header-cell">
                        <div class="day"><span>1/22</span>(土)</div>
                        <div class="time"><span></span></div>
                    </div>
                </div>

                <div class="calendar-body">
                    <div class="calendar-body-wrapper">
                        <div class="calendar-time-col">
                            <div class="time-wrapper">
                                <div class="calendar-time-cell"><span>01:00</span></div>
                                <div class="calendar-time-cell"><span>09:00</span></div>
                                <div class="calendar-time-cell"><span>10:00</span></div>
                                <div class="calendar-time-cell"><span>11:00</span></div>
                                <div class="calendar-time-cell"><span>13:00</span></div>
                                <div class="calendar-time-cell"><span>17:00</span></div>
                            </div>
                        </div>

                        <div class="calendar-entry-col">
                            <div class="drag-new-entry">
                                <div class="daily-time-entries">
                                    <div class="calendar-entries-wrapper">
                                        <div class="calendar-entry" style="height: 90px;">
                                            <span>コープ葬祭では搬送料金もプランによっては料金に含まれています。</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="weekly-grid">
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                    <div class="calendar-entry-cell"></div>
                                </div>
                            </div>
                        </div>

                        <div class="calendar-entry-col">
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
                        </div>

                        <div class="calendar-entry-col">
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
                        </div>

                        <div class="calendar-entry-col">
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
                        </div>

                        <div class="calendar-entry-col">
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
                        </div>

                        <div class="calendar-entry-col">
                            <div class="drag-new-entry">
                                <div class="weekly-grid">
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                </div>
                            </div>
                        </div>

                        <div class="calendar-entry-col">
                            <div class="drag-new-entry">
                                <div class="weekly-grid">
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                    <div class="calendar-entry-cell cell-bg-grey"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</div>
