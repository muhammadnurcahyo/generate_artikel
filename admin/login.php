<?php
require('function.php');

//cek login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);


  //mencocokan data dengan database
  $cek_db = mysqli_query($conn, "Select * from login where email='$email' and password= '$password'");

  //hasil
  $hasil = mysqli_num_rows($cek_db);

  if ($hasil > 0) {
    $_SESSION['log'] = 'true';
    header('location:index.php');
  } else {
    header('location:login.php');
  }
  ;
}
;

//untuk memastikan jika sudah login akan masuk ke index, jk blm akan di login
if (isset($_SESSION['log'])) {
  header('location:index.php');
} else {

}

?>


<!DOCTYPE html>
<html lang="en">

<!-- cek update -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <!-- logo here -->
              </div>
              <h6 class="font-weight-light" style="text-align: center;">Sign in to continue.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label for="small mb-1" for="inputEmailAddress">Email</label>
                  <input class="form-control form-control-lg" id="exampleInputEmail1" name="email" type="email"
                    placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <label for="small mb-1" for="password">Password</label>
                  <input type="password" class="form-control form-control-lg" id="inputPassword" name="password"
                    placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-primary col-lg-12" name="login">
                    login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">

                  </div>
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>