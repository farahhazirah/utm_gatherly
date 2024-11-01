<?php


// eventController.php

// Function to handle event submission
function action saveEvent() {
    require_once '../config/db.php';
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $eventName = $_POST['event_name'];
        $eventStartDate = date($_POST['event_start_date']);
        $eventEndDate = date($_POST['event_end_date']);
        $eventDescription = $_POST['event_description'];

        // Validate input
        $errors = [];
        if (empty($eventName)) {
            $errors[] = "Event name is required.";
        }
        if (empty($eventStartDate)) {
            $errors[] = "Event start date is required.";
        }
        if (empty($eventEndDate)) {
            $errors[] = "Event end date is required.";
        }
        if (empty($eventDescription)) {
            $errors[] = "Event description is required.";
        }
        if (strtotime($eventStartDate) > strtotime($eventEndDate)) {
            $errors[] = "Event start date cannot be later than end date.";
        }

        // If there are no errors, proceed to save the data
        if (empty($errors)) {

            $insert_query = "INSERT INTO 'events' ('event_name', 'start_date' , 'end_date', 'event_description')  VALUES ('".$eventName."', '".$eventStartDate."', '".$eventEndDate."', '".$eventDescription."')";
            if(mysqli_query($conn. $insert_query))
            {
                $data = array(
                    'status' => true,
                    'msg' => 'Event added successfully!'
                );
            }
            else
            {
                $data = array(
                    'status' => false,
                    'msg' => 'Sorry, Event not added'
                );
            }

            echo json_encode($data);
            // try {
            //     // Prepare the SQL statement with column names specified
            //     $stmt = $conn->prepare("INSERT INTO events (event_name, start_date , end_date, event_description) VALUES ($eventName, $eventStartDate, $eventEndDate, $eventDescription)");
                
            //     // Execute the prepared statement with the actual values
            //     $stmt->execute([$eventName, $eventStartDate, $eventEndDate, $eventDescription]);
            
                // Return success response in JSON format
                echo json_encode(['status' => true, 
                                'msg' => "Event saved successfully!"]);
            } catch (PDOException $e) {
                // Return error response in JSON format
                echo json_encode(['status' => false, 'msg' => "Database error: " . $e->getMessage()]);
            }
        } else {
            // Return errors in JSON format
            echo json_encode(['status' => false, 'msg' => implode(', ', $errors)]);
        }
    } else {
        // Handle the case where the form was not submitted properly
        echo "Invalid request method.";
}


// Call the saveEvent function when the script runs
saveEvent();
?>
