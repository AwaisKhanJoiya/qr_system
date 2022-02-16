<?php
include 'includes/db_conn.php';
include 'includes/header.php';



?>


<body class="text-center d-flex justify-content-center align-items-center vh-100" data-new-gr-c-s-check-loaded="14.1001.0" data-gr-ext-installed="">

    <main class="form-signin w-25">
        <form action="includes/login_process.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating mb-4" align="start">
                <label for="floatingInput">Email address</label>
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="form-floating mb-4" align="start">
                <label for="floatingPassword">Password</label>
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
            <div class="text-center text-dark mt-3">Do not have an account? <a class="text-dark" href="signup.php">Register
                    Now</a></div>
            <p class="mt-5 mb-3 text-muted">© 2017–2021</p>

        </form>

    </main>





</body>

</html>