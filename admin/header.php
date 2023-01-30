<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css.map">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
  <!-- <script src="../ckfinder/ckfinder.js"></script> -->
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>




</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../images/logo.svg" class="mr-2"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="https://github.com/favicon.ico" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <!-- <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme" onclick="changeBgColor1('#ffffff');"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme" onclick="changeBgColor1('#232227');"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
           -->

          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success" onclick="changeBgColor2('#57B657');"></div>
            <div class="tiles warning" onclick="changeBgColor2('#ffc480');"></div>
            <div class="tiles danger" onclick="changeBgColor2('#FF4747');"></div>
            <div class="tiles info" onclick="changeBgColor2('#248AFD');"></div>
            <div class="tiles dark" onclick="changeBgColor2('#495560');"></div>
            <div class="tiles default" onclick="changeBgColor2('#ffffff');"></div>
          </div>
        </div>
      </div>

      <!-- header & sidebar akan berubah warna -->
      <!-- <script>
      function changeBgColor2(color){
          if (color) window.localStorage.setItem('bgColor', color);
          else if (!(color = window.localStorage.getItem('bgColor'))) return;
          var elements = document.querySelectorAll(".navbar-menu-wrapper,.navbar-brand-wrapper,.sidebar")
          for (var i = 0; i < elements.length; i++) {
              elements[i].style.background=color;
          }
      }

      window.addEventListener('DOMContentLoaded', () => changeBgColor2());
      </script> -->

      <!-- hanya header yang akan berubah warna -->
      <script>
        function changeBgColor2(color) {
          if (color) window.localStorage.setItem('bgColor', color);
          else if (!(color = window.localStorage.getItem('bgColor'))) return;
          var elements = document.querySelectorAll(".navbar-menu-wrapper,.navbar-brand-wrapper")
          for (var i = 0; i < elements.length; i++) {
            elements[i].style.background = color;
          }
        }

        window.addEventListener('DOMContentLoaded', () => changeBgColor2());
      </script>