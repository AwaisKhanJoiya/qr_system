<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php">QR System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <?php
        if (isset($_SESSION['loggedin'])) {
          echo '
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
          </li>';
          if ($_SESSION['logged_as'] == 'Student') {
            echo '
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="view_qr.php">QR Code</a>
            </li>
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="events.php">Events</a>
          </li>
            ';
          } else {
            echo '
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="scan_qr.php">QR Code</a>
            </li>
            
            ';
          }
          if ($_SESSION['logged_as'] == 'Student' || $_SESSION['logged_as'] == 'Teacher') {
            echo '
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="view_attendance.php">Attendance</a>
            </li>
            
            ';
          }
          if ($_SESSION['logged_as'] == 'Student' || $_SESSION['logged_as'] == 'Librarian') {
            echo '
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="library.php">Library</a>
          </li>
            
            ';
          }
          echo '
          
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="includes/logout.php">Logout</a>
          </li>
            ';
        } else {
          echo '
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="signup.php">Register</a>
          </li>
                ';
        } ?>

      </ul>
    </div>
  </div>
</nav>