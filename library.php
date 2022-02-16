<!DOCTYPE html>
<?php
include 'includes/header.php';
include 'includes/db_conn.php';
?>

<body id="page-top">
    <!-- Navigation-->
    <?php include 'includes/navbar.php' ?>
    <!-- Masthead-->
    <header class="masthead vh-100">
        <div class="container h-100">
            <div class="h-100 justify-content-center bg-white">
                <h2 class="text-center m-2">View Books</h2>
                <?php if ($_SESSION['logged_as'] == 'Librarian') {
                    echo '
                    <form action="library.php" style="text-align: center" method="POST">
                        <input type="text" name="id" style="margin: 20px; padding: 4px;" placeholder="Please Enter Student ID">
                        <input type="submit" name="submit" class="btn btn-primary" value="Search">
                    </form>
                    ';
                } ?>
                <div class="table mt">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Book ID</th>
                                <th>Reg Date</th>
                                <th>Due Date</th>
                                <?php
                                if ($_SESSION['logged_as'] == 'Librarian') {
                                    echo '
                                        <th>Edit</th>
                                        ';
                                }
                                ?>

                            </tr>
                        </thead>

                        <tbody>


                            <?php
                            if (isset($_POST['submit'])) {
                                if ($_SESSION['logged_as'] == 'Librarian') {
                                    $id = $_POST['id'];
                                    $id = strtoupper($id);
                                    $sql = "SELECT * FROM library WHERE student_id='$id'";
                                    $sqlResult = mysqli_query($connection, $sql);
                                    if ($sqlResult) {
                                        if (mysqli_num_rows($sqlResult) == '0') {
                                            echo '<h1>No Result found</h1>';
                                        }
                                        $sno = 0;
                                        while ($attendance_row = mysqli_fetch_assoc($sqlResult)) {
                                            $id = $attendance_row['id'];
                                            $student_id = $attendance_row['student_id'];
                                            $student_name = $attendance_row['name'];
                                            $book_id = $attendance_row['book_id'];
                                            $date = $attendance_row['reg_date'];
                                            $due_date = $attendance_row['due_date'];
                                            $sno++;
                            ?>
                                            <tr>
                                                <td><?php echo $sno ?></td>
                                                <td><?php echo $student_id ?></td>
                                                <td><?php echo $student_name ?></td>
                                                <td><?php echo $book_id ?></td>
                                                <td><?php echo $date ?></td>
                                                <td><?php echo $due_date ?></td>

                                                <td><a href="includes/delete.php?id=<?php echo $id ?>">Delete</a></td>
                                            </tr>

                                        <?php
                                        }
                                    }
                                }
                            } elseif ($_SESSION['logged_as'] == 'Student') {
                                $id = $_SESSION['user_id'];
                                $sql = "SELECT * FROM library WHERE student_id='$id'";
                                $sqlResult = mysqli_query($connection, $sql);
                                if ($sqlResult) {
                                    if (mysqli_num_rows($sqlResult) == '0') {
                                        echo '<h1>No Result found</h1>';
                                    }
                                    $sno = 0;
                                    while ($attendance_row = mysqli_fetch_assoc($sqlResult)) {
                                        $student_id = $attendance_row['student_id'];
                                        $student_name = $attendance_row['name'];
                                        $book_id = $attendance_row['book_id'];
                                        $date = $attendance_row['reg_date'];
                                        $due_date = $attendance_row['due_date'];
                                        $sno++;

                                        ?>
                                        <tr>
                                            <td><?php echo $sno ?></td>
                                            <td><?php echo $student_id ?></td>
                                            <td><?php echo $student_name ?></td>
                                            <td><?php echo $book_id ?></td>
                                            <td><?php echo $date ?></td>
                                            <td><?php echo $due_date ?></td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>






                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        </div>
    </header>
    <?php include 'includes/footer.php' ?>
</body>

</html>