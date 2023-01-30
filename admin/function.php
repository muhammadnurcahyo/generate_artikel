<?php
session_start();

// koneksi db
$conn = mysqli_connect("localhost", "root", "", "artikel");


//tambah data target
if (isset($_POST['addnewsubmit'])) {
    $keyword = $_POST['keyword'];
    $link_target = $_POST['link_target'];

    $tambahdata = mysqli_query($conn, "insert into target (keyword, link_target) values('$keyword','$link_target') ");

    if ($tambahdata) {
        header('location:admin_target.php');
    } else {
        echo 'gagal';
        header('location:admin_target.php');
    }
}

//tambah data artikel
if (isset($_POST['submit_artikel'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    if ($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../uploads/' . $nama_gambar_baru); //memindah file gambar ke folder uploads
            $tambahdata = mysqli_query($conn, "insert into t_artikel (judul, gambar, deskripsi) values('$judul', '$nama_gambar_baru', '$deskripsi') ");
            if (!$tambahdata) {
                die("Query gagal dijalankan: " . mysqli_errno($conn) .
                    " - " . mysqli_error($conn));
            } else {
                // 
                
            }

        } else {
            // no expression = file yang di upload bukan gambar
        }
    } else {
        $query = "INSERT INTO t_artikel (judul, gambar, deskripsi) VALUES ('$judul', NULL, '$deskripsi')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='admin_artikel.php';</script>";

        }
    }

}


//update target
if (isset($_POST['updatetarget'])) {
    $idt = $_POST['idt'];
    $keyword = $_POST['keyword'];
    $link_target = $_POST['link_target'];

    $update = mysqli_query($conn, "update target set keyword='$keyword', link_target='$link_target' where idtarget='$idt'");

    if ($update) {
        header('location:admin_target.php');
    } else {
        echo 'gagal';
        header('location:admin_target.php');
    }
}

if (isset($_POST['updateartikel'])) {
    $idartikel = $_POST['idartikel'];
    $judul = $_POST['judul'];
    $gambar = isset($_FILES['gambar']['name']) ? $_FILES['gambar']['name'] : '';
    $deskripsi = $_POST['deskripsi'];
    if ($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../uploads/' . $nama_gambar_baru);
            $update = mysqli_query($conn, "update t_artikel set judul='$judul', gambar='$nama_gambar_baru', deskripsi='$deskripsi' where idartikel='$idartikel'");
            if (!$update) {
                die("Query gagal dijalankan: " . mysqli_errno($conn) .
                    " - " . mysqli_error($conn));
            } else {

            }
        } else {

        }
    } else {
        $update = mysqli_query($conn, "update t_artikel set judul='$judul', deskripsi='$deskripsi' where idartikel='$idartikel'");
        if (!$update) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {

        }
    }

}

// hapus data target
if (isset($_POST['hapus_target'])) {
    $idt = $_POST['idt'];
    $hapus = mysqli_query($conn, "delete from target where idtarget='$idt'");

    if ($hapus) {
        header('location:admin_target.php');
    } else {
        echo 'gagal';
        header('location:admin_target.php');
    }
}


// hapus data artikel
if (isset($_POST['hapus_artikel'])) {
    $idartikel = $_POST['idartikel'];
    $hapus = mysqli_query($conn, "delete from t_artikel where idartikel='$idartikel'");

    if ($hapus) {
        header('location:admin_artikel.php');
    } else {
        echo 'gagal';
        header('location:admin_artikel.php');
    }
}
?>