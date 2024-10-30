<div class="row">
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Calendar</h5>
        <hr>
        <div id="calendar" style="height: 800px;"></div>
      </div>
    </div>
  </div>
  
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Filter</h5>
        <hr>
      </div>
    </div>
  </div>
</div>

<script src='plugins/fullcalendar/dist/index.global.min.js'></script>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
          },
          // themeSystem: 'bootstrap5',
        });
        calendar.render();
      });

    </script>