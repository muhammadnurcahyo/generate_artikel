<?php
require 'function.php';

//jika sudah masuk dashboard
if (isset($_SESSION['log'])) {
} else {
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css.map">

  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../images/favicon.png" />
  <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/logo-mini.svg" alt="logo"/></a>
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
              <img src="../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
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
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="../admin/index.php">
              <i class="mdi mdi-apps menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="admin_target.php">
              <i class="mdi mdi-eye menu-icon"></i>
              <span class="menu-title">Data Target</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-keyboard-off menu-icon"></i>
              <span class="menu-title">Data Artikel</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table mr-1"></i>
              Data Artikel | <button type="button" class="btn btn-warning btn-icon-text" data-toggle="modal" data-target="#exampleModalCenter">
                          <i class="ti-plus btn-icon-prepend"></i>                                                    
                          Tambah Data Artikel
                        </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                                        $ambildata = mysqli_query($conn, "select * from t_artikel");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($ambildata)) {
                                            $judul = $data['judul'];
                                            $image = $data['gambar'];
                                            $deskripsi = $data['deskripsi'];
                                            $idartikel = $data['idartikel'];
                                            // $ida = $data['idartikel'];
                                        ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $judul; ?></td>
                                                <td><center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#lihat_image<?= $idartikel; ?>">
                                                <i class="mdi mdi-eye"></i>
                                                </button></center></td>
                                                <td><center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#lihat_deskripsi<?= $idartikel; ?>">
                                                <i class="mdi mdi-eye"></i>
                                                </button></center></td>
                                                <td>
                                                <!-- Button trigger modal -->
                                                <center>
                                                <button type="button" class="btn btn-success" disabled>
                                                <i class="mdi mdi-eye"></i>
                                                </button>

                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_artikel<?= $idartikel; ?>">
                                                <i class="mdi mdi-account-search"></i>
                                                </button>

                                                <input type="hidden" name="idtarget" value="<?= $idartikel; ?>">

                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $idartikel; ?>">
                                                <i class="mdi mdi-fingerprint"></i>
                                                </button>
                                        </center>
                                                </td>
                                            </tr>

                                            <!-- Gambar Modal -->
                                            <div class="modal fade" id="lihat_image<?= $idartikel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Data Gambar</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                              <img src="../uploads/<?= $image; ?>" style="border-radius: 25px;" width="100%">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Deskripsi Modal -->
                                            <div class="modal fade" id="lihat_deskripsi<?= $idartikel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Data Deskripsi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                              <?= $deskripsi; ?>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Update Modal -->
                                            <div class="modal fade" id="edit_artikel<?= $idartikel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Artikel</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                Judul
                                                                <input type="text" name="judul" id="judul" class="form-control" value="<?= $judul; ?>"><br><br>
                                                                <?= "<img src='../uploads/".$image."' style='border-radius: 25px;' width='100%' id='p-img'>"; ?><br>
                                                                <br><br>
                                                                <input type="file" name="gambar" id="gambar" onchange="loadFile(event)"/><br><br>   
                                                                <img id="output" width="100%" style="border-radius: 15px;"/>
                                                                <script>

                                                                var loadFile = function(event) {
                                                                    var output = document.getElementById('output');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                    output.onload = function() {
                                                                    URL.revokeObjectURL(output.src) // free memory
                                                                    }
                                                                };
                                                                </script>
                                                                <br><br>
                                                                <p><i style="color: red;">*Abaikan jika tidak merubah gambar</i></p>
                                                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                                <textarea id="editor1" placeholder="Masukkan Deskripsi" name="deskripsi" id="exampleFormControlTextarea1" rows="3" class="form-control ckeditor"><?= $deskripsi; ?></textarea>
                                                                <script>
                                                                    CKEDITOR.replace( 'editor1' );
                                                                </script>
                                                                <br>
                                                                <input type="hidden" name="idartikel" value="<?= $idartikel; ?>">
                                                                <button type="submit" class="btn btn-primary btn-block" name="updateartikel">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delete<?= $idartikel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin hapus data "<i><?=$judul;?></i>"?
                                                               <br><br>
                                                               <input type="hidden" name="idartikel" value="<?=$idartikel;?>">
                                                                <button type="submit" class="btn btn-danger btn-block" name="hapus_artikel">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        };
                                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. TADS All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      
    
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="../Assets/datatables-demo.js"></script>

  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="upload_form"  method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="text">Judul</label>
                    <input type="text" name="judul" placeholder="Masukkan Judul" class="form-control" required> <br>
                    <img id="blah" width="100%" style="border-radius: 15px;"/><br><br>
                    <input type="file"  name="gambar" id="imgInp" onchange="loadFile(event)" style="color: teal;"/><br><br>
                    <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total" style="color: teal;"></p>                               
                    <script>
                    function _(el) {
                    return document.getElementById(el);
                    }
                    var loadFile = function(event) {
                        
                        var file = _("imgInp").files[0];
                        var formdata = new FormData();
                        formdata.append("imgInp", file);
                        var ajax = new XMLHttpRequest();
                        ajax.upload.addEventListener("progress", progressHandler, false);
                        ajax.addEventListener("load", completeHandler, false);
                        ajax.addEventListener("error", errorHandler, false);
                        ajax.addEventListener("abort", abortHandler, false);
                        ajax.open("POST", "function.php"); 
                        ajax.send(formdata);

                        if (file) {
                          blah.src = URL.createObjectURL(file)
                        }
                    };
                    function progressHandler(event) {
                        _("loaded_n_total").innerHTML = "Berhasil upload gambar " + event.loaded + " bytes of " + event.total;
                        var percent = (event.loaded / event.total) * 100;
                        _("progressBar").value = Math.round(percent);
                        _("status").innerHTML = Math.round(percent) + "% proses upload...";
                        }

                        function completeHandler(event) {
                        _("status").innerHTML = event.target.responseText;
                        }

                        function errorHandler(event) {
                        _("status").innerHTML = "Upload Failed";
                        }

                        function abortHandler(event) {
                        _("status").innerHTML = "Upload Aborted";
                        }
                    </script>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea id="editor1" placeholder="Masukkan Deskripsi" name="deskripsi" id="exampleFormControlTextarea1" rows="3" class="form-control ckeditor"></textarea>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit_artikel">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</html>

