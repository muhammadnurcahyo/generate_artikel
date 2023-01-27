<?php 
 require 'function.php';
 require 'header-view.php';


 $idt = $_GET['idartikel'];
  
 $result = mysqli_query($conn, "SELECT * FROM t_artikel WHERE idartikel=$idt");
  
 while($data = mysqli_fetch_array($result))
 {
     $deskripsi = $data['deskripsi'];
 }
 ?>

<body>
<?php echo $deskripsi; ?>
    
</body>
