var calendar;
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var Draggable = FullCalendar.Draggable;
    var containerEl = document.getElementById('external-events');
    var interestedList = document.getElementById('interested-tasks');
    var overlapArray = [];

    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        revert: true,
        eventData: function(eventEl) {
            let dataEvent = JSON.parse(eventEl.getAttribute("data-event"));
            return {
                title: eventEl.innerText,
                task_id: dataEvent['task_id'],
                project_id: dataEvent['project_id'],
            };
        }
    });

    new Draggable(interestedList, {
        itemSelector: '.fc-event',
        revert: true,
        eventData: function(eventEl) {
            let dataEvent = JSON.parse(eventEl.getAttribute("data-event"));
            return {
                title: eventEl.innerText,
                task_id: dataEvent['task_id'],
                project_id: dataEvent['project_id'],
            };
        }
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        allDaySlot: false,
        editable: true,
        droppable: true,
        locale: 'ja',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: getAllEvents,
        eventOverlap: function(stillEvent, movingEvent) {
            if (!overlapArray.some(item => item.id === stillEvent.id)) {
                overlapArray.push(stillEvent);
            }
            return true;
        },
        eventDrop: function(info) {
            overlapArray = [];
            updateEvent(info);
        },
        eventResize: function(info){
            if (overlapArray.length){
                overlapArray.sort(function(a, b){
                    return new Date(a.start) - new Date(b.start)
                });
                var eEnd = info.event.end;
                var eStart = info.event.start;
                for (evt of overlapArray) {
                    if (eEnd > evt.start) {
                        if (eStart.getTime() === info.event.start.getTime()) {
                            info.event.setEnd(evt.start);
                            updateEvent(info);
                        }
                        else if (eStart < evt.start) {
                            let event_new = {
                                id: 'xxxxyyzz'+calendar.getEvents().length + 1,
                                title: info.event.title,
                                start: eStart,
                                end: evt.start,
                                extendedProps: info.event.extendedProps,
                            };
                            calendar.addEvent({
                                id: 'xxxxyyzz'+calendar.getEvents().length + 1,
                                title: info.event.title,
                                start: eStart,
                                end: evt.start,
                                extendedProps: info.event.extendedProps,
                            })
                            createEvent(event_new);
                        }
                        eStart = evt.end;
                    }
                }
                if (eStart > info.event.start && eStart < eEnd) {
                    let event_new = {
                        id: 'xxxxyyzz'+calendar.getEvents().length + 1,
                        title: info.event.title,
                        start: eStart,
                        end: eEnd,
                        extendedProps: info.event.extendedProps,
                    };
                    calendar.addEvent({
                        id: 'xxxxyyzz'+calendar.getEvents().length + 1,
                        title: info.event.title,
                        start: eStart,
                        end: eEnd,
                        extendedProps: info.event.extendedProps,
                    })
                    createEvent(event_new);
                }
                overlapArray = [];
            }
            else{
                console.log(JSON.stringify(info.event));
                updateEvent(info);
            }
        },

        eventReceive: function(info) {
            tzoffset = (new Date()).getTimezoneOffset() * 60000;
            start_time = new Date(info.event.start);
            end_time = new Date(new Date(start_time).setHours(start_time.getHours() + 1));
            console.log(JSON.stringify(info.event));
            if (!info.event.end){
                info.event.setEnd(new Date(start_time).setHours(start_time.getHours() + 1));
                console.log('nothing');
            }
            console.log(start_time);
            $.ajax({
                url: "/api/employee/task",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                data: {
                    task_id: info.event['extendedProps']['task_id'],
                    // project_id: info.event['extendedProps']['project_id'],
                    working_time_start: (start_time).toISOString().slice(0,19).replace('T',' '),
                    working_time_finish: (end_time).toISOString().slice(0,19).replace('T',' ')
                },
                success: function (data) {
                    console.log(data);
                    info.event.setProp('id',data);
                    // info.event.addClass('hasmenu');
                    console.log(JSON.stringify(info.event));
                }
            });
        },

        eventDidMount: function (info) {
            info.el.addEventListener("contextmenu", function (jsEvent) {
                var eventdetails =  calendar.getEventById(info.event.id);
                jsEvent.preventDefault();
                var top = jsEvent.pageY;
                var left = jsEvent.pageX;
                // Display contextmenu and bind event for menu click events
                // var contextMenu =
                $("#contextMenu").finish().slideDown('fast');
                $("#contextMenu").css({ position: 'absolute' });
                $("#contextMenu").offset({ left: left, top: top });
                $("#contextMenu").on("click", "li", { eventId: info.event.id }, function(event) {
                    var idx = $(this).index();
                    console.log(idx + '  ' + event.data.eventId);
                    var eventdetails =  calendar.getEventById(event.data.eventId);
                    switch(idx) {
                        case 0: deleteEvent(event, eventdetails); break;
                        case 1: setProcess(event); break;
                        case 2: setCategory(event); break;
                        case 3: showDetail(event); break;
                        default:
                    }
                });
                // $("#contextMenu").on("click", "li", { eventId: info.event.id }, handleSubmenu(info.event, eventdetails) );
            });
        },

    });
    function createEvent(event_info){
        $.ajax({
            url: "/api/employee/task",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            data: {
                task_id: event_info['extendedProps']['task_id'],
                working_time_start: event_info.start.toISOString().slice(0,19).replace('T',' '),
                working_time_finish: event_info.end.toISOString().slice(0,19).replace('T',' ')
            },
            success: function (data) {
                console.log('success create id ' + data);
                let event_new = calendar.getEventById(event_info.id);
                event_new.setProp('id', data );
                // event_new.addClass('hasmenu');
                console.log(JSON.stringify(event_new));
            },
            error: function (data){
                console.log('error create, revert');
            }
        });
    };
    calendar.render();
    myTaskFunction();
});

function getAllEvents(info, successCallback, failureCallback) {
    $.ajax({
        type: 'GET',
        url: '/api/employee/task',
        dataType: "json",
        success: function(response) {
            var events = [];
            $(response.data).each(function(index, item) {
                var start_time = new Date(item.working_time_start);
                start_time.setTime(start_time.getTime() - start_time.getTimezoneOffset()*60000);
                var finish_time = new Date(item.working_time_finish);
                finish_time.setTime(finish_time.getTime() - finish_time.getTimezoneOffset()*60000);
                start_time = start_time.toISOString();
                finish_time = finish_time.toISOString();
                events.push({
                    id: item.id,
                    title: item.task_name + ` [`+ item.project_id +`]`,
                    start: start_time,
                    end: finish_time,
                    extendedProps: {
                        'task_id': item.task_id,
                        'project_id': item.project_id
                    }
                });
            });
            successCallback(events);
        }
    });
}

function updateEvent(info)
{
    event_id = info.event.id;
    $.ajax({
        url: "/api/employee/task/"+event_id,
        type: "PUT",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: {
            working_time_start: info.event.start.toISOString().slice(0,19).replace('T',' '),
            working_time_finish: info.event.end.toISOString().slice(0,19).replace('T',' '),
        },
        success: function (data) {
            console.log('success update');
        },
        error: function (data){
            console.log('error update, revert');
            info.revert();
        }
    });
}

function deleteEvent(event, eventdetails) {
    $.ajax({
        url: "/api/employee/task/"+event.data.eventId,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function () {
            eventdetails.remove();
            console.log('success delete');
        },
        error: function (){
            console.log('error delete, revert');
        }
    });
}

$(document).on("click", function (e) {
    $("#contextMenu").hide();
    $("#contextMenu").unbind().click(function () {});
});

// Function for list of my tasks
function myTaskFunction() {
    $(".interest-drag").draggable({
        helper: "clone",
        revert: "invalid",
        stop: function(){
            $(this).draggable('option','revert','invalid');
        }
    });

    $("#interested-tasks").droppable({
        accept: '.interest-drag',
        drop: function(event, ui) {
            var $target = $(ui.draggable);
            var $newdiv = $(`<li>
                <div class="text-ellipsis fc-event draggable ui-draggable ui-draggable-handle interested-task"
                data-event='{ "task_id": "`+$target.data("event").task_id+`", "project_id": "`+$target.data("event").project_id+`" }'>`+$target.text()+` [`+$target.data("event").project_id+`] </div>
                <ul id='interest-menu' class="custome-interest-menu"  task-id="`+ $target.data("event").task_id +`">
                    <li class="delete-interest-task"><i class="icon-itemMenu fa fa-trash"></i>削除</li>
                </ul>
            </li>`);
            $(this).append($newdiv);
            var taskId = $target.data("event").task_id;
            $.ajax({
                url: "/api/employee/interested_task",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                data: {task_id : taskId},
                success: function (response) {
                    console.log(response);
                    console.log("Add interested task successfully!");
                },
                error: function (response){
                    console.log(response);
                    $newdiv.remove();
                }
            });
            subMenuMyTask();
        }
    });

    subMenuMyTask();
}

// Show submenu and delete function for tasks in My Tasks list
function subMenuMyTask() {
    $(".interested-task").bind("contextmenu", function (event) {
        event.preventDefault();
        $('.custome-interest-menu').hide();
        var x = event.offsetX;
        var y = event.offsetY;
        var taskId = $(this).data("event").task_id;
        var $subMenu = $(`.custome-interest-menu[task-id=`+ taskId +`]`);
        $subMenu.finish().slideDown('fast');
        $subMenu.css({left: x + "px", top: y + "px"});
    });

    // Delete my Task
    $(".delete-interest-task").click(function(){
        var $eleParent_ul =  $(this).parent();
        var $eleGrandParent = $eleParent_ul.parent();
        var taskId = $eleParent_ul.attr("task-id");
        $eleGrandParent.remove();
        $.ajax({
            url: "/api/employee/interested_task/" + taskId,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function () {
                $eleGrandParent.remove();
                console.log('success delete');
            },
            error: function (){
                console.log('error delete, revert');
            }
        });
    });

    $(document).bind("click", function(e) {
        $('.custome-interest-menu').hide();
    });
}
