$( function() {
    $(".choosed-task").resizable({handles: 'n, s'});

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
            $(".choosed-task").resizable({handles: 'n, s'});
            $(".calendar-entry").bind("contextmenu", function (event) {
                event.preventDefault();
                $(".custom-menu").finish().toggle(100).css({
                    top: event.pageY -65,
                    left: event.pageX
                });
            });

            $(document).bind("click", function(e) {
                $('.custom-menu').hide();
            });


        }
    });




} );
