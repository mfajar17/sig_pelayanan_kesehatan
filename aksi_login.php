<?php 
session_start();
include "koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];

$op=$_GET['op'];

if($op=="in"){
    $query_1="SELECT * from login where username='$user' AND password=md5('$pass')";
    $h_1=$con->query($query_1);
    if (mysqli_num_rows($h_1)==1) {  
    	$d_1 = $h_1->fetch_array();
        $_SESSION['username']=$d_1['username'];
        header('Location: dashboard/index.php');
    } else {
        die("password atau username salah <a href=\"javascript:history.back()\">kembali</a>");        
    }
    
} else if ($op=="out"){
    unset($_SESSION['username']);
    header("location:index.php");
}
?>