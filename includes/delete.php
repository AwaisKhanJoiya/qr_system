<?php
include('db_conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM library WHERE id=$id";
$result = mysqli_query($connection, $sql);
if ($result) {
    echo '<script>alert("Book Record Deleted Successfully")</script>';
    echo '<script>window.location.href = "../library.php"</script>';
} else {
    echo mysqli_error($connection);
}
