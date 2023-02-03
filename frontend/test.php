<?php
error_log(0);
require '../admin/function.php';

$time = "1300";    
$time = substr($time,0,2).'asd'.substr($time,2,2);


$ambildata = mysqli_query($conn, "select * from t_artikel order by rand(), idartikel");
$get_link = mysqli_query($conn, "select * from target order by rand(), link_target");


while ($data = mysqli_fetch_array($ambildata)) {
  $deskripsi = $data['deskripsi'];
  $gambar = $data['gambar'];
  $judul = $data['judul'];
}

while ($fetch = mysqli_fetch_array($get_link)){
  $link = $fetch['link_target'];
  $keyword = $fetch['keyword'];
}

// $string = "abc123"; //sebagai $deskripsi nantinya

// $random_position = rand(0,strlen($string)-1); //posisi yang akan di sisipkan

// $chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789-_"; // diambil dari $keyword


// $newString = substr($string,0,$random_position).$chars.substr($string,$random_position);
// echo $newString;



?>