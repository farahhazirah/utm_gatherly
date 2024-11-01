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

<!-- Add custom CSS to style all buttons -->
<style>
  .fc-button {
    background-color: #8c2f39 !important; /* Set background color for all buttons */
    color: #fff !important; /* Set text color to white */
    border: none !important; /* Remove border */
    padding: 5px 10px; /* Adjust padding */
    border-radius: 5px; /* Rounded corners */
  }
  .fc-button:hover {
    background-color: #a0303e !important; /* Darker shade for hover effect */
  }
  /* Set a light grey background color for Saturdays and Sundays */
  .fc-day-sat, .fc-day-sun {
    background-color: #f0f0f0 !important; /* Light grey */
  }

  /* Adjust color for the days in month view */
  .fc-daygrid-day.fc-day-sat, .fc-daygrid-day.fc-day-sun {
    background-color: #f0f0f0 !important;
  }
</style>

<!-- Add Event Form -->
<?php include 'views/add_event.php'; ?>
<!-- End Add Event Form -->

<script src='plugins/fullcalendar/dist/index.global.min.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'today addEventButton'
      },
      customButtons: {
        addEventButton: {
          text: 'Add Event',
          click: function() {
            $('#event_entry_modal').modal('show'); // Show the modal
          }
        }
      },
      // Fetch events from the database
      events: function(fetchInfo, successCallback, failureCallback) {
          fetch('controller/getEvents.php') // Adjust path if necessary
              .then(response => response.json())
              .then(data => {
                  successCallback(data); // Pass the events to FullCalendar
              })
              .catch(error => {
                  console.error('Error fetching events:', error);
                  failureCallback(error); // Handle error
              });
      }
    });

    calendar.render();
  });

  function save_event() {
    
    var event_name = $("#event_name").val();
    var event_start_date = $("#event_start_date").val();
    var event_end_date = $("#event_end_date").val();
    var event_description = $("#event_description").val();
    console.log(event_name);

    if (event_name == "" || event_start_date == "" || event_end_date == "" ) {
      alert("Please enter all required details.");
      return false;
    }

    $.ajax({
      url: "controller/CalendarController.php",
      type: "POST",
      dataType: 'json',
      data: {
        event_name: event_name,
        event_start_date: event_start_date,
        event_end_date: event_end_date,
        event_description: event_description
      },
      success: function(response) {
        $('#event_entry_modal').modal('hide');
        if (response.status == true) {
          alert(response.msg);
          location.reload();
        } else {
          alert(response.msg);
        }
      },
      error: function(xhr, status) {
        console.log('ajax error = ' + xhr.statusText);
      }
    });
    return false;
  }
</script>
