<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $id = strtoupper($id);
    $password = $_POST['password'];
    $cPass = $_POST['confirm_password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);


    $query = "SELECT * FROM users WHERE user_id='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        if (mysqli_num_rows($result) == '0') {
            $checkEmail = "SELECT * FROM users WHERE email='$email'";
            $emailResult = mysqli_query($connection, $checkEmail);
            if ($emailResult) {
                if (mysqli_num_rows($emailResult) == '0') {

                    if ($password === $cPass) {
                        if (strpos($id, '.EN.') !== false) {
                            $insertQuery = "INSERT INTO `users` (`user_id`, `first_name`,`last_name`,`email`, `phone` ,`password`, `registered_as`)
                    VALUES('$id', '$first_name', '$last_name', '$email', '$phone', '$hash', 'Student')";
                        } else if (strpos($id, '.LIB.') !== false) {
                            $insertQuery = "INSERT INTO `users` (`user_id`, `first_name`,`last_name`,`email`, `phone` ,`password`, `registered_as`)
                    VALUES('$id', '$first_name', '$last_name', '$email', '$phone', '$hash', 'Librarian')";
                        } else if (strpos($id, '.PROF.') !== false) {
                            $insertQuery = "INSERT INTO `users` (`user_id`, `first_name`,`last_name`,`email`, `phone` ,`password`, `registered_as`)
                    VALUES('$id', '$first_name', '$last_name', '$email', '$phone', '$hash', 'Teacher')";
                        } else {
                            echo '
                    <script>alert("Please Enter valid ID")</script>
                    <script>window.location.href = "../signup.php"</script>
                    ';
                            exit;
                        }
                        $result = mysqli_query($connection, $insertQuery);
                        if ($result) {
                            include('../phpqrcode/qrlib.php');
                            $filename = $id . '.png';
                            $filepath = '../img/' . $filename;
                            if (file_exists($filepath)) {
                                unlink($filepath);
                            }
                            $path = '../img/';

                            QRcode::png($id, $path . '' . $id . '.png');

                            echo '
                <script>alert("Your Account has been created Successfully. Please Login Now")</script>
                <script>window.location.href = "../login.php"</script>
                ';
                        } else {
                            echo '
                <script>alert("We are facing some error. Please Try again")</script>
                <script>window.location.href = "../signup.php"</script>
                ';
                        }
                    } else {
                        echo '
            <script>alert("Passwords do not match. Please try again")</script>
            <script>window.location.href = "../signup.php"</script>
            ';
                    }
                } else {
                    echo '
            <script>alert("User with this email already exists.")</script>
            <script>window.location.href = "../signup.php"</script>
            ';
                }
            }
        } else {
            echo '
                <script>alert("User with this ID already exists.")</script>
                <script>window.location.href = "../signup.php"</script>
                ';
        }
    }
}
