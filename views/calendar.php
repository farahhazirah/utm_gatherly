
<div>
    <div id="calendar"></div>
</div>


<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
                left: 'prev,next today allLeave,currentState',
                center: 'title',
                // right: 'dayGridMonth,listWeek'
                right: 'dayGridMonth'
            },
        });
        calendar.render();
      });

    </script>