<?php include 'includes/header.php' ?>

<body id="page-top">
  <!-- Navigation-->
  <?php include 'includes/navbar.php' ?>
  <!-- Masthead-->
  <header class="masthead vh-100">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div style="flex-direction: column" class="d-flex">
          <video id="preview" width="400px" height="400px"></video>
        </div>
      </div>
    </div>
  </header>
  <?php include 'includes/footer.php' ?>
  <script src="js/jquery.js"></script>

  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({
      video: document.getElementById('preview')
    });
    scanner.addListener('scan', function(content) {
      window.location.href = "qr_result.php?id=" + content;
    });
    Instascan.Camera.getCameras().then(function(cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function(e) {
      console.error(e);
    });
  </script>
</body>

</html>