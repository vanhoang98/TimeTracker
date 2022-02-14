$( function() {
    switch_next_pre_week();
    taskCommon();

    $(".draggable").draggable({
        helper: "clone",
        revert: "true",
    });

    $(".calendar-entry-cell").droppable({
        accept: '.draggable',
        drop: function(event, ui) {
            var $newElement = $(ui.draggable.clone());
            var $newdiv = $('<div class="calendar-entry" style="background-color: pink;color: darkred;border-radius: 1.25rem;"></div>');
            $newdiv.append($newElement).addClass("choosed-task");
            $(this).append($newdiv);
            taskCommon();
        }
    });

} );


function taskCommon() {
    $(".choosed-task").resizable({handles: 'n, s'});

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
        if (i.day === dt.getDate()) {
            $('.calendar-header').append(`
                <div class="calendar-header-cell" style="background-color: #c1ddf1">
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
                <div class="calendar-header-cell">
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
            if (i.day === dt.getDate()) {
                $('.calendar-header').append(`
                    <div class="calendar-header-cell" style="background-color: #c1ddf1">
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
                    <div class="calendar-header-cell">
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
            if (i.day === dt.getDate()) {
                $('.calendar-header').append(`
                    <div class="calendar-header-cell" style="background-color: #c1ddf1">
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
                    <div class="calendar-header-cell">
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
