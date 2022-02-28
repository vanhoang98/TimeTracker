$(document).ready(function () {
    switch_next_pre_week();
    showEmployeeTasks();
    calendarHeader();

    $(".draggable").draggable({
        helper: "clone",
        revert: "invalid",
        stop: function(){
            $(this).draggable('option','revert','invalid');
        }
    });


    $(".calendar-entry-cell").droppable({
        accept: '.draggable',
        drop: function(event, ui) {
            childCount = $(this).children().length;
            if (childCount !=0) {
                alert("既存の工数がありますので、新規の工数を入力する事ができません!");
                return;
            }

            var $target = $(ui.draggable);
            // Drop task to create Event in Calendar
            // var $newElement = $(ui.draggable.clone());
            // var $newdiv = $('<div class="calendar-entry"></div>');
            // $newdiv.attr('project-id', $target.attr('project-id'));
            // $newdiv.append($newElement).append(`<p>[Project ID: `+$target.attr('project-id')+`]</p>`);

            var $newdiv = $(`
                <div class="calendar-entry ui-resizable" project-id="`+$target.attr('project-id')+`">
                    <div class="item-droplist draggable ui-draggable ui-draggable-handle" task-id="`+$target.attr('task-id')+`">`+$target.text()+`</div>
                    <p>[Project ID: `+$target.attr('project-id')+`]</p>
                    <div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                    <ul class='custom-menu'>
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
            `);


            $(this).append($newdiv);

            // Get data to create Event
            var dataId = $target.attr('task-id');
            var dataMonth = $(this).attr('data-month');
            var dataDay = $(this).attr('data-day');
            var dataStart = $(this).attr('data-start');
            var dataFinish = $(this).attr('data-finish');
            createEmployeeTasksDropped(dataId, dataMonth, dataDay, dataStart, dataFinish);
            taskCommonAction();
        },
    });

});

function showEmployeeTasks() {
    $.ajax({
        type: "GET",
        url: "/api/employee/task",
        dataType: "json",
        success: function (response) {
            $.each(response.data, function(index, item) {
                console.log(item);
                var dateData = new Date(item.working_time_start);
                for (let i=0; i < 31; i++) {
                    if(i == dateData.getDate()) {
                        for (let a = 0; a < 24; a++) {
                            if(a == dateData.getHours()) {
                                var divParent = $('.calendar-entry-cell[data-day="' + i + '"]').filter('.calendar-entry-cell[data-start="' + a + '"]');
                                if (i == dateData.getDate() && a == dateData.getHours()) {
                                    divParent.append(`
                                        <div class="calendar-entry ui-resizable" project-id="`+item.project_id+`">
                                            <div class="item-droplist draggable ui-draggable ui-draggable-handle" task-id="`+item.task_id+`" employeeTask-id="`+item.id+`">`+item.task_name+`</div>
                                            <p>[Project ID: `+item.project_id+`]</p>
                                            <div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div>
                                            <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                                            <ul class='custom-menu' employeeTask-id="`+item.id+`">
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
                                    `);
                                }
                            }
                        }
                    }
                }
            });
            taskCommonAction();
        }
    });
}

function createEmployeeTasksDropped(taskId, dataMonth, dataDay, dataStart, dataFinish) {
    var Time_start = "2022-"+dataMonth+"-"+dataDay+" "+dataStart;
    var Time_finish = "2022-"+dataMonth+"-"+dataDay+" "+dataFinish;
    $.ajax({
        url: "/api/employee/task",
        type: "POST",
        dataType: "json",
        data: {
            task_id: taskId,
            working_time_start: Time_start,
            working_time_finish: Time_finish
        },
        complete: function (result) {
            console.log(result);
        },

    });
}

function calendarHeader() {
    $('.day-calendar').click(function() {
        today = new Date();
        if ($('.calendar-header-cell').length == 7) {
            days = document.getElementsByClassName("calendar-header-cell");
            for (let i = 0; i < days.length; i++) {
                console.log(days.item(i))
            }
        }
    })
}

function taskCommonAction() {
    // Resize time of employee Task
    $(".calendar-entry").resizable({
        handles: "n, s",
        grid: [ 0, 100 ],
    });

    // Show submenu of employee Task
    $(".calendar-entry").bind("contextmenu", function (event) {
        event.preventDefault();
        $('.custom-menu').hide();
        var employeetaskId = $(this).children('.draggable').attr("employeetask-id");
        var $subMenu = $(`.custom-menu[employeetask-id=`+ employeetaskId +`]`);
        $subMenu.finish().slideDown('fast');
    });

    $(document).bind("click", function(e) {
        $('.custom-menu').hide();
    });

    $('.custom-menu li').mouseenter(function() {
        $(this).children('ul').stop().slideDown('fast')
    }).mouseleave(function() {
        $(this).children('ul').stop().slideUp('fast')
    });

    // Delete employee Task
    $(".delete-task").click(function(){
        var $eleParent_ul =  $(this).parent();
        var $eleGrandParent = $eleParent_ul.parent();
        console.log($eleGrandParent);
        var employeeTaskId = $eleParent_ul.attr("employeetask-id");
        $.ajax({
            url: "/api/employee/task/" + employeeTaskId,
            type: "DELETE",
            dataType: "json",
            data: { task_id: employeeTaskId }
        });
        $eleGrandParent.remove();
    });
}

function switch_next_pre_week() {
    var dt = new Date();
    var currentWeekDay = dt.getDay();
    var lessDays = currentWeekDay == 0 ? 6 : currentWeekDay - 1;

    list_days = [];
    for (let i = 0; i < 7; i++) {
        var x = {};
        const name = ["月", "火", "水", "木", "金", "土", "日"];
        date = new Date(new Date(dt).setDate(dt.getDate() - lessDays + i));
        x.date = date;
        x.month = date.getMonth() + 1;
        x.day = date.getDate();
        x.dayName = name[i];
        list_days.push(x);
    }

    document.getElementById("firstday").innerHTML = list_days[0].month + '/' + list_days[0].day;
    document.getElementById("lastday").innerHTML = list_days[6].month + '/' + list_days[6].day;

    for (let i of list_days) {
        if (i.day === dt.getDate() && i.month === dt.getMonth() + 1) {
            $('.calendar-header').append(`
                <div class="calendar-header-cell" style="background-color: #c1ddf1" id=${i.day}>
                    <div class="day">
                        <b>${i.month}</b>
                        <b>/</b>
                        <b>${i.day}</b>
                        <b>(${i.dayName})</b>
                    </div>
                </div>
            `)
        } else {
            $('.calendar-header').append(`
                <div class="calendar-header-cell" id=${i.day}>
                    <div class="day">
                        <b>${i.month}</b>
                        <b>/</b>
                        <b>${i.day}</b>
                        <b>(${i.dayName})</b>
                    </div>
                </div>
            `)
        }

        text = ''
        for (let a = 0; a < 24; a++) {
            text += `<div class="calendar-entry-cell" data-month = ${i.month} data-day = ${i.day} data-start = ${a} data-finish = ${a + 1}></div>`
        }

        $('.calendar-body-wrapper').append(`
            <div class="calendar-entry-col">
                <div class="drag-new-entry">
                    <div class="weekly-grid">
                        ${text}
                    </div>
                </div>
            </div>
        `)
    }

    $('.next-week').click(function() {
        for (let i of list_days) {
            nextWeek = i.date.setDate(i.date.getDate() + 7);
            date = new Date(nextWeek);
            i.month = date.getMonth() + 1;
            i.day = date.getDate();
        }
        $(".calendar-header-cell").remove();
        document.getElementById("firstday").innerHTML = list_days[0].month + '/' + list_days[0].day;
        document.getElementById("lastday").innerHTML = list_days[6].month + '/' + list_days[6].day;

        for (let i of list_days) {
            if (i.day === dt.getDate() && i.month === dt.getMonth() + 1) {
                $('.calendar-header').append(`
                    <div class="calendar-header-cell" style="background-color: #c1ddf1" id${i.day}>
                        <div class="day">
                            <b>${i.month}</b>
                            <b>/</b>
                            <b>${i.day}</b>
                            <b>(${i.dayName})</b>
                        </div>
                    </div>
                `)
            } else {
                $('.calendar-header').append(`
                    <div class="calendar-header-cell" id=${i.day}>
                        <div class="day">
                            <b>${i.month}</b>
                            <b>/</b>
                            <b>${i.day}</b>
                            <b>(${i.dayName})</b>
                        </div>
                    </div>
                `)
            }
        }
    })

    $('.pre-week').click(function() {
        for (let i of list_days) {
            lastWeek = i.date.setDate(i.date.getDate() - 7);
            date = new Date(lastWeek);
            i.month = date.getMonth() + 1;
            i.day = date.getDate();
        }
        $(".calendar-header-cell").remove();
        document.getElementById("firstday").innerHTML = list_days[0].month + '/' + list_days[0].day;
        document.getElementById("lastday").innerHTML = list_days[6].month + '/' + list_days[6].day;

        for (let i of list_days) {
            if (i.day === dt.getDate() && i.month === dt.getMonth() + 1) {
                $('.calendar-header').append(`
                    <div class="calendar-header-cell" style="background-color: #c1ddf1" id=${i.day}>
                        <div class="day">
                            <b>${i.month}</b>
                            <b>/</b>
                            <b>${i.day}</b>
                            <b>(${i.dayName})</b>
                        </div>
                    </div>
                `)
            } else {
                $('.calendar-header').append(`
                    <div class="calendar-header-cell" id=${i.day}>
                        <div class="day">
                            <b>${i.month}</b>
                            <b>/</b>
                            <b>${i.day}</b>
                            <b>(${i.dayName})</b>
                        </div>
                    </div>
                `)
            }
        }
    })
}
