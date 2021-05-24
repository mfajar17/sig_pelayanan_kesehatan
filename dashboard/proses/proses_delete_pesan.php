<?php
include "koneksi.php";

$id = $_REQUEST['id_del'];
$query="DELETE FROM pesan WHERE id='".$id."' ";
$j=$con->query($query);
if ($j==true) { ?>
    <script>
        alert("Pesan Berhasil Dihapus");
        window.location = "../pesan.php";
    </script>
 <?php 
    } else {
    echo "Error";
 }
 ?>