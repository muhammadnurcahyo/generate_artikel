<?php
   session_start();
   
   // koneksi db
    $conn = mysqli_connect("localhost","root","","artikel");

    
   //tambah data target
    if(isset($_POST['addnewsubmit'])){
        $keyword = $_POST['keyword'];
        $link_target = $_POST['link_target'];

        $tambahdata = mysqli_query($conn, "insert into target (keyword, link_target) values('$keyword','$link_target') ");

        if($tambahdata){
            header('location:admin_target.php');
        } else {
            echo 'gagal';
            header('location:admin_target.php');
        }
    }

     
    //tambah data artikel
    if(isset($_POST['submit_artikel'])){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        $tambahdata = mysqli_query($conn, "insert into t_artikel (judul, deskripsi) values('$judul','$deskripsi') ");

        if($tambahdata){
            header('location:admin_artikel.php');
        } else {
            echo 'gagal';
            header('location:admin_artikel.php');
        }
    }


    //update target
    if(isset($_POST['updatetarget'])){
        $idt = $_POST['idt'];
        $keyword = $_POST['keyword'];
        $link_target = $_POST['link_target'];

        $update = mysqli_query($conn, "update target set keyword='$keyword', link_target='$link_target' where idtarget='$idt'");

        if($update){
            header('location:admin_target.php');
        } else {
            echo 'gagal';
            header('location:admin_target.php');
        }
    }

      //update artikel
      if(isset($_POST['updateartikel'])){
        $idartikel = $_POST['idartikel'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        $update = mysqli_query($conn, "update t_artikel set judul='$judul', deskripsi='$deskripsi' where idartikel='$idartikel'");

        if($update){
            header('location:admin_artikel.php');
        } else {
            echo 'gagal';
            header('location:admin_artikel.php');
        }
    }

    // hapus data target
    if(isset($_POST['hapus_target'])){
        $idt = $_POST['idt'];
        $hapus = mysqli_query($conn, "delete from target where idtarget='$idt'");

        if($hapus){
            header('location:admin_target.php');
        } else {
            echo 'gagal';
            header('location:admin_target.php');
        }
    }

    
    // hapus data artikel
    if(isset($_POST['hapus_artikel'])){
        $idartikel = $_POST['idartikel'];
        $hapus = mysqli_query($conn, "delete from t_artikel where idartikel='$idartikel'");

        if($hapus){
            header('location:admin_artikel.php');
        } else {
            echo 'gagal';
            header('location:admin_artikel.php');
        }
    }
?>
