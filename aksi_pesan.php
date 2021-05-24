<?php
include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$pesan = $_POST['pesan'];

$query="INSERT INTO pesan (nama, email, nomor, pesan) VALUES('".$nama."', '".$email."', '".$nomor."', '".$pesan."')";
$j=$con->query($query);
if ($j==true) { ?>
    <script>
        alert("Pesan Berhasil Dikirim");
        window.location = "index.php";
    </script>
 <?php 
    } else {
    echo "Error";
 }
?>