<?php
include 'includes/db_conn.php';
include 'includes/header.php';
// include 'navbar.php';
?>


<body class="flex-column text-center d-flex justify-content-center align-items-center vh-100 bg-dark" data-new-gr-c-s-check-loaded="14.1001.0" data-gr-ext-installed="">
    <div class="signup-form bg-light">
        <form class="p-4 mb-3" action="includes/registeration.php" method="post">
            <h2 class="mb-3">Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="id" placeholder="Your ID" required="required">
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="required" pattern="[0-9]{10}" title="Please Enter 10 digits Phone Number">
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <?php if (isset($_SESSION['error'])) { ?>
                <span class="text-warning"><?php echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                        } ?></span>
                <div class="form-group mt-4">
                    <input type="submit" name="submit" class="btn btn-success btn-lg btn-block w-100">
                </div>
        </form>
    </div>
    <div class="text-center text-white">Already have an account? <a class="text-white" href="login.php">Sign
            in</a></div>

</body>