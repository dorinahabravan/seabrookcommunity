<?php 
session_start();

include("classes/loaderclass.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Picker with MySQL Dates</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include jQuery UI for the date picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <h2>Date Picker with MySQL Dates</h2>

    <form action="searchevent.php" method="post">
        <label for="datepicker">Select Date:</label>
        <input type="text" id="datepicker" name="date" required>
        <input type="submit" name="search" value="Search">
    </form>

    <?php
    // Your PHP code for handling the form submission and querying the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
        $date = $_POST["date"];

        // Your MySQL query logic here...
        $sql ="SELECT date FROM events";
$DB = new ControllerDatabase();
$result = $DB->read($sql);
    }
    ?>

    <script>
        $(function() {
            // Use jQuery UI to initialize the date picker
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd", // MySQL date format
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</body>
</html>
