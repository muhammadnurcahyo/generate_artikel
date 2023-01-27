<?php 
 require 'function.php';
 require 'header-view.php';

  
 $result = mysqli_query($conn, "SELECT * FROM t_artikel order by rand(), idartikel");
  
 while($data = mysqli_fetch_array($result))
 {
     $deskripsi = $data['deskripsi'];
     $img = $data['gambar'];
 }
 ?>

<body>
<?php
    echo "<img src='../uploads/" . $img . "'></img>";
    echo $deskripsi; 
?>
    
</body>
