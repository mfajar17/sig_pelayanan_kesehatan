<?php 
session_start();
include "../koneksi.php";
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
if(!isset($_SESSION['username'])){
    die("Anda belum Login");
} 
$user=$_SESSION['username'];
$a="SELECT * FROM login WHERE username='".$user."' ";
$b=$con->query($a);
if ($a==FALSE) {
    echo "Hai";
}
$login=$b->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pelayanan Kesehatan Kota Malang</title>
    <!-- Favicon-->
    <link rel="icon" href="images/logo_malang.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php" style="padding-bottom: 0px; padding-top: 0px;">
                    <img class="text-center" src="../assets/img/navbar-logo.png" style="width: 250px;">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../aksi_login.php?op=out" class="btn btn-danger">LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user; ?></div>
                    <div class="email"><?php echo $login['email']; ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="input_data.php">
                            <i class="material-icons">assignment</i>
                            <span>Input Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="list_data.php">
                            <i class="material-icons">view_list</i>
                            <span>List Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="pesan.php">
                            <i class="material-icons">email</i>
                            <span>Pesan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">Rumah Sakit</div>
                            <?php
                                include "../koneksi.php";
                                $rs="SELECT * FROM marker WHERE tipe=1";
                                $j_rs=$con->query($rs);
                                $jml_rs = 0;
                                while ($data=$j_rs->fetch_array()) {
                                    $jml_rs++;
                                }
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml_rs; ?>" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text">Puskesmas</div>
                            <?php
                                include "../koneksi.php";
                                $p="SELECT * FROM marker WHERE tipe=3";
                                $j_p=$con->query($p);
                                $jml_p = 0;
                                while ($data=$j_p->fetch_array()) {
                                    $jml_p++;
                                }
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml_p; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_pharmacy</i>
                        </div>
                        <div class="content">
                            <div class="text">Apotek</div>
                            <?php
                                include "../koneksi.php";
                                $a="SELECT * FROM marker WHERE tipe=5";
                                $j_a=$con->query($a);
                                $jml_a = 0;
                                while ($data=$j_a->fetch_array()) {
                                    $jml_a++;
                                }
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml_a; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Dokter Praktek</div>
                            <?php
                                include "../koneksi.php";
                                $dp="SELECT * FROM marker WHERE tipe=2";
                                $j_dp=$con->query($dp);
                                $jml_dp = 0;
                                while ($data=$j_dp->fetch_array()) {
                                    $jml_dp++;
                                }
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml_dp; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">control_point</i>
                        </div>
                        <div class="content">
                            <div class="text">Klinik</div>
                            <?php
                                include "../koneksi.php";
                                $k="SELECT * FROM marker WHERE tipe=6";
                                $j_k=$con->query($k);
                                $jml_k = 0;
                                while ($data=$j_k->fetch_array()) {
                                    $jml_k++;
                                }
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml_k; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">emoji_people</i>
                        </div>
                        <div class="content">
                            <div class="text">Psikiater</div>
                            <?php
                                include "../koneksi.php";
                                $ps="SELECT * FROM marker WHERE tipe=4";
                                $j_ps=$con->query($ps);
                                $jml_ps = 0;
                                while ($data=$j_ps->fetch_array()) {
                                    $jml_ps++;
                                }
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jml_ps; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">

            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
