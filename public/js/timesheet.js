$(document).ready(function () {
    switch_next_pre_week();
    taskCommonAction();
    showEmployeeTasks();
    calendarHeader();

    $(".draggable").draggable({
        helper: "clone",
        revert: "invalid",
        stop: function(){
            $(this).draggable('option','revert','invalid');
        }
    });

    // $(".draggable").droppable({
    //     greedy: true,
    //     drop: function(event,ui){
    //         ui.draggable.draggable('option','revert',true);
    //     }
    // });

    $(".calendar-entry-cell").droppable({
        accept: '.draggable',
        drop: function(event, ui) {
            childCount = $(this).children().length;
            if (childCount !=0)
            {
                alert("既存の工数がありますので、新規の工数を入力する事ができません!");
                return;
            }
            var $newElement = $(ui.draggable.clone());
            var $newdiv = $('<div class="calendar-entry"></div>');
            $newdiv.append($newElement).addClass("choosed-task");
            $(this).append($newdiv);

            // Get data to create a Event
            var $target = $(ui.draggable);
            var dataId = $target.attr('task-id');
            var dataMoth = $(this).attr('data-month');
            var dataDay = $(this).attr('data-day');
            var dataStart = $(this).attr('data-start');
            var dataFinish = $(this).attr('data-finish');

            // console.log(dataId, dataMoth, dataDay, dataStart, dataFinish);

            createEmployeeTasksDropped(dataId, dataMoth, dataDay, dataStart, dataFinish);

            taskCommonAction();
        }
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
                                        <div class="calendar-entry choosed-task ui-resizable">
                                            <div class="item-droplist draggable ui-draggable ui-draggable-handle" task-id="`+item.task_id+`">`+item.task_name+`</div>
                                            <div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div>
                                            <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                                        </div>
                                    `);
                                }
                            }
                        }
                    }
                }
            });

        }
    });
}

function createEmployeeTasksDropped(taskId, dataMoth, dataDay, dataStart, dataFinish) {

    var Time_start = "2022-"+dataMoth+"-"+dataDay+" "+dataStart;
    var Time_finish = "2022-"+dataMoth+"-"+dataDay+" "+dataFinish;
    $.ajax({
        url: "/api/employee/task",
        type: "POST",
        dataType: "json",
        data: {
            task_id: taskId,
            working_time_start: Time_start,
            working_time_finish: Time_finish
        },
        success: function(data) {
            alert("Create event success !")
            console.log(taskId, Time_start)
        }
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

    $(".choosed-task").resizable({
        handles: "n, s",
        grid: [ 0, 100 ],
    });

    $(".calendar-entry").bind("contextmenu", function (event) {
        event.preventDefault();
        $(".custom-menu").finish().slideDown('fast').css({
            top: event.pageY -65,
            left: event.pageX
        });
    });

    $(document).bind("click", function(e) {
        $('.custom-menu').hide();
    });

    $('.custom-menu li').mouseenter(function() {
        $(this).children('ul').stop().slideDown('fast')
    }).mouseleave(function() {
        $(this).children('ul').stop().slideUp('fast')
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
