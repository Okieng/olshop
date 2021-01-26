<?php 

session_start();

session_destroy();

echo "<script>alert('Logout Sukses');</script>";
echo "<script>location='index.php'</script>";


 ?>