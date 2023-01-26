<?php
require 'function.php';

//jika sudah masuk dashboard
if (isset($_SESSION['log'])) {
} else {
    header('location:login.php');
}

require 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link " href="../admin/index.php">
              <i class="mdi mdi-apps menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../admin/admin_target.php">
              <i class="mdi mdi-eye-off menu-icon"></i>
              <span class="menu-title">Data Target</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../admin/admin_artikel.php" >
              <i class="mdi mdi-keyboard menu-icon"></i>
              <span class="menu-title">Data Artikel</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table mr-1"></i>
              Data Target | <button type="button" class="btn btn-warning btn-icon-text" data-toggle="modal" data-target="#exampleModalCenter">
                          <i class="ti-plus btn-icon-prepend"></i>                                                    
                          Tambah Data Target
                        </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No.</th>
                    <th>Keyword</th>
                    <th>Link</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                                        $ambildata = mysqli_query($conn, "select * from target");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($ambildata)) {
                                            $keyword = $data['keyword'];
                                            $link_target = $data['link_target'];
                                            $idt = $data['idtarget']
                                        ?>
                    <tr>
                    <td><?= $i++; ?></td>
                                                <td><?= $keyword; ?></td>
                                                <td><a href="<?= $link_target; ?>"><?= $link_target; ?></a></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <center>
                                                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#edit<?= $idt; ?>">
                                                    <i class="mdi mdi-account-search"></i>
                                                    </button>


                                                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#delete<?= $idt; ?>">
                                                    <i class="mdi mdi-fingerprint"></i>

                                                    </button>
                                                    </center>
                                                </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="edit<?=$idt;?>" >
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Target</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <label for="text">Keywords</label>
                                                                <input type="text" name="keyword" value="<?=$keyword;?>" class="form-control" required> <br>
                                                                <label for="text">Link URL</label>
                                                                <input type="text" name="link_target" value="<?=$link_target;?>" class="form-control" required>
                                                                <br>
                                                                <input type="hidden" name="idt" value="<?=$idt;?>">
                                                                <button type="submit" class="btn btn-primary btn-block" name="updatetarget">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delete<?= $idt; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle"><b>Data target akan dihapus...</b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin hapus data "<i><?=$keyword;?></i>" ?
                                                               <br><br>
                                                               <input type="hidden" name="idt" value="<?=$idt;?>">
                                                                <button type="submit" class="btn btn-danger btn-block" name="hapus_target">Hapus</button>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Target</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post">
                <div class="modal-body">
                    <label for="text">Keywords</label>
                    <input type="text" name="keyword" placeholder="Masukan Keywords" class="form-control" required> <br>
                    <label for="text">Link URL</label>
                    <input type="text" name="link_target" placeholder="Masukan URL Target" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block" name="addnewsubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


</html>

