<?php
session_start();
include 'db_conn.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) == '0') {
            echo '
                <script>alert("Account does not exist")</script>
                <script>window.location.href = "../login.php"</script>
                ';
            exit;
        }
    }
    while ($val = mysqli_fetch_assoc($result)) {
        $user_id = $val['user_id'];
        $hash = $val['password'];
        $db_email = $val['email'];
        $first_name = $val['first_name'];
        $last_name = $val['last_name'];
        $phone = $val['phone'];
        $logged_as = $val['registered_as'];

        if (password_verify($password, $hash)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $first_name . ' ' . $last_name;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['logged_as'] = $logged_as;
            echo '
                <script>alert("You have successfully logged in")</script>
                <script>window.location.href = "../index.php"</script>
                ';
        } else {
            // echo '
            // <script>alert("Password is incorrect")</script>
            // <script>window.location.href = "../login.php"</script>
            // ';
        }
    }
}
