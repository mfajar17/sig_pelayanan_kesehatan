<?php
$server = "localhost";
$username = "root";
$password ="";
$db = "sig_pelayanan_kesehatan";

$con = mysqli_connect($server, $username, $password, $db);
if ($con -> connect_error) {
    echo "Koneksi Error!";
    exit(); 
}
?>