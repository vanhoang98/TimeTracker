document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var Draggable = FullCalendar.Draggable;
    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');
    var overlapArray = [];

    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        revert: true,
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText,
                task_id: eventEl.task_id,
                project_id: eventEl.project_id,
            };
        }
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        allDaySlot: false,
        defaultDate: new Date(),
        editable: true,
        droppable: true,
        timeZone: 'Asia/Tokyo',
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
        eventDrop : function updateEvent(info) {
            overlapArray = [];
        },
        eventResize: function(info){
            if (overlapArray.length){
                overlapArray.sort(function(a, b){
                    return new Date(a.start) - new Date(b.start)
                });
                var eEnd = info.event.end;
                var eStart = info.event.start;
                for (event of overlapArray) {
                    if (eEnd > event.start) {
                        if (eStart.getTime() === info.event.start.getTime()) {
                            info.event.setEnd(event.start)
                        }
                        else if (eStart < event.start) {
                            calendar.addEvent({
                            id: calendar.getEvents().length + 1,
                            title: info.event.title,
                            start: eStart,
                            end: event.start,
                        })
                    }
                    eStart = event.end;
                    }
                }
                if (eStart > info.event.start && eStart < eEnd) {
                    calendar.addEvent({
                        id: calendar.getEvents().length + 1,
                        title: info.event.title,
                        start: eStart,
                        end: eEnd,
                    })
                }
                overlapArray = [];
            }
        },

        eventReceive: function(info) {
            start_time = new Date(info.event.start);
            end_time = new Date(new Date(start_time).setHours(start_time.getHours() + 1));


            var eventData = {
                task_id: ,
                working_time_start: start_time.toISOString().replace('T',' '),
                working_time_finish: end_time.toISOString().replace('T',' ')
            };
            console.log(eventData);

            $.ajax({
                url: "/api/employee/task",
                type: "POST",
                dataType: "json",
                data: {
                    task_id: ,
                    working_time_start: start_time.toISOString().replace('T',' '),
                    working_time_finish: end_time.toISOString().replace('T',' ')
                }
            });
        }
    });

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
                var finish_time = new Date(item.working_time_finish);
                start_time = start_time.toISOString();
                finish_time = finish_time.toISOString();
                events.push({
                    id: item.id,
                    title: item.task_name,
                    start: start_time,
                    end: finish_time,
                    resourceId: item.task_id
                });
            });
            successCallback(events);
        }
    });
}



