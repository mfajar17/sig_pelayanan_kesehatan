<?php
include "koneksi.php";
$id = $_REQUEST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$tipe = $_POST['tipe'];
$awal_hari = $_POST['awal_hari'];
$awal_jam = $_POST['awal_jam'];
$akhir_hari = $_POST['akhir_hari'];
$akhir_jam = $_POST['akhir_jam'];
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];   
$folder = "../images/".$filename;
$note = $_POST['note'];

if ($filename == null) {
	$query="UPDATE marker SET nama='".$nama."', alamat='".$alamat."', longitude='".$longitude."', latitude='".$latitude."', tipe='".$tipe."', awal_hari='".$awal_hari."', akhir_hari='".$akhir_hari."', awal_jam='".$awal_jam."', akhir_jam='".$akhir_jam."', note='".$note."' WHERE id='".$id."' ";
	$j=$con->query($query);	
} else {
	$query="UPDATE marker SET nama='".$nama."', alamat='".$alamat."', longitude='".$longitude."', latitude='".$latitude."', tipe='".$tipe."', awal_hari='".$awal_hari."', akhir_hari='".$akhir_hari."', awal_jam='".$awal_jam."', akhir_jam='".$akhir_jam."', note='".$note."', gambar='".$filename."' WHERE id='".$id."' ";
	$j=$con->query($query);
}
if ($j==true) { ?>
    <script>
        alert("Data Berhasil Diupdate");
        window.location = "../list_data.php";
    </script>
 <?php 
    } else {
    echo "Error";
 	}

if (move_uploaded_file($tempname, $folder))  {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
?>