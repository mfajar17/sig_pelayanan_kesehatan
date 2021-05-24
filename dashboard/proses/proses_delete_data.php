<?php
include "koneksi.php";

$id = $_REQUEST['id_del'];
$query="DELETE FROM marker WHERE id='".$id."' ";
$j=$con->query($query);
if ($j==true) { ?>
    <script>
        alert("Data Berhasil Dihapus");
        window.location = "../list_data.php";
    </script>
 <?php 
    } else {
    echo "Error";
 }
 ?>