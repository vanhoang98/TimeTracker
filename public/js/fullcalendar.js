document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var Draggable = FullCalendar.Draggable;
    var containerEl = document.getElementById('external-events');
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
                                id: calendar.getEvents().length + 1,
                                title: info.event.title,
                                start: eStart,
                                end: evt.start,
                                extendedProps: info.event.extendedProps,
                            };
                            calendar.addEvent({
                                id: calendar.getEvents().length + 1,
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
                        id: calendar.getEvents().length + 1,
                        title: info.event.title,
                        start: eStart,
                        end: eEnd,
                        extendedProps: info.event.extendedProps,
                    };
                    calendar.addEvent({
                        id: calendar.getEvents().length + 1,
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
            $.ajax({
                url: "/api/employee/task",
                type: "POST",
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
                    console.log(JSON.stringify(info.event));
                }
            });
        }
    });
    function createEvent(event_info){
        $.ajax({
            url: "/api/employee/task",
            type: "POST",
            dataType: "json",
            data: {
                task_id: event_info['extendedProps']['task_id'],
                working_time_start: event_info.start.toISOString().slice(0,19).replace('T',' '),
                working_time_finish: event_info.end.toISOString().slice(0,19).replace('T',' ')
            },
            success: function (data) {
                console.log('success create id ' + data);
                let event_new = calendar.getEventById(calendar.getEvents().length);
                event_new.setProp('id', data );
                console.log(JSON.stringify(event_new));
            },
            error: function (data){
                console.log('error create, revert');
            }
        });
    }
    calendar.render();
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
                    title: item.task_name,
                    start: start_time,
                    end: finish_time,
                    extendedProps: {
                        'task_id': item.task_id
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
        dataType: "json",
        data: {
            working_time_start: info.event.start.toISOString().slice(0,19).replace('T',' '),
            working_time_finish: info.event.end.toISOString().slice(0,19).replace('T',' ')
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




