<?php
session_start();
include 'db_conn.php';
if (isset($_POST['submit'])) {
    $student_id = $_POST['id'];
    $student_name = $_POST['name'];
    $date = $_POST['date'];
    if ($_SESSION['logged_as'] == 'Teacher') {
        $time = $_POST['time'];

        $query = "INSERT INTO `attendance` (`student_id`, `name`, `date`, `time`, `status`)
     VALUES ('$student_id', '$student_name', '$date','$time', 'Present')";

        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script>alert("Attendance Successfully Submitted")</script>';
            echo '<script>
            window.location.href = "../index.php"
            </script>';
        } else {
            echo '<script>alert("Attendance did not Submitted. Please try again")</script>';
            echo '<script>
            window.location.href = "../index.php"
            </script>';
        }
    } else if ($_SESSION['logged_as'] == 'Librarian') {
        $due_date = $_POST['due_date'];
        $book_id = $_POST['book_id'];
        $book_id = strtoupper($book_id);

        $query = "INSERT INTO `library` (`student_id`, `name`, `book_id`, `reg_date`, `due_date`)
     VALUES ('$student_id', '$student_name', '$book_id', '$date','$due_date')";

        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script>alert("New Record Successfully Submitted")</script>';
            echo '<script>
            window.location.href = "../index.php"
            </script>';
        } else {
            echo '<script>alert("Record did not Submitted. Please try again")</script>';
            echo '<script>
            window.location.href = "../index.php"
            </script>';
        }
    }
}
