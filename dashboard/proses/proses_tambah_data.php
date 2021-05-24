<?php
include "koneksi.php";

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

$query="INSERT INTO marker (nama, alamat, longitude, latitude, tipe, awal_hari, akhir_hari, awal_jam, akhir_jam, note, gambar) VALUES('".$nama."', '".$alamat."', '".$longitude."', '".$latitude."', '".$tipe."', '".$awal_hari."', '".$akhir_hari."', '".$awal_jam."', '".$akhir_jam."', '".$note."', '".$filename."')";
$j=$con->query($query);
if ($j==true) { ?>
    <script>
        alert("Data Berhasil Disimpan");
        window.location = "../input_data.php";
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