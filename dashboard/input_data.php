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

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet' />
    
    <style>
    #map { width: 300px; height: 310px;}
    .mapboxgl-popup {
    max-width: 200px;
    }
    </style>
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
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="active">
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
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Advanced Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Basic Validation -->
                    <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Input Data Lokasi</h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <form id="form_validation" action="proses/proses_tambah_data.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-4" style="margin-bottom: 0px;">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <h5>Nama</h5>
                                                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lokasi" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <h5>Alamat</h5>
                                                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control no-resize" placeholder="Masukkan Alamat Lokasi" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-float">
                                                                <h5 style="padding-bottom: 5px;">Pilih Tipe</h5>
                                                                <!-- <label for="tipe" class="form-label" style="padding-bottom: 5px;">Pilih Tipe</label> -->
                                                                <select name="tipe" id="tipe" class="form-select show-tick">
                                                                    <?php
                                                                    include "koneksi.php";
                                                                    $i="SELECT * FROM tipe";
                                                                    $j=$con->query($i);
                                                                    if ($i==FALSE) {
                                                                        echo "Hai";
                                                                        }
                                                                    while ($data=$j->fetch_array()) {
                                                                    ?>
                                                                        <option value="<?php echo $data['id_tipe']; ?>"><?php echo $data['nama_tipe']; ?></option>
                                                                    <?php 
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <h5>Gambar</h5>
                                                                    <input type="file" class="form-control" name="image" id="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12" style="margin-bottom: 0px;">
                                                                    <h5 style="padding-bottom: 5px;">Hari Buka</h5>
                                                                    <div class="form-group form-float">
                                                                        <select name="awal_hari" id="awal_hari" class="form-select show-tick">
                                                                            <option value="Senin">Senin</option>
                                                                            <option value="Selasa">Selasa</option>
                                                                            <option value="Rabu">Rabu</option>
                                                                            <option value="Kamis">Kamis</option>
                                                                            <option value="Jumat">Jumat</option>
                                                                            <option value="Sabtu">Sabtu</option>
                                                                            <option value="Minggu">Minggu</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group form-float">
                                                                        <select name="akhir_hari" id="akhir_hari" class="form-select show-tick">
                                                                            <option value="Senin">Senin</option>
                                                                            <option value="Selasa">Selasa</option>
                                                                            <option value="Rabu">Rabu</option>
                                                                            <option value="Kamis">Kamis</option>
                                                                            <option value="Jumat">Jumat</option>
                                                                            <option value="Sabtu">Sabtu</option>
                                                                            <option value="Minggu">Minggu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                                    <h5>Jam Buka</h5>
                                                                    <div class="row clearfix">
                                                                        <div class="col-lg-6">
                                                                            <input type="time" class="form-control" name="awal_jam" id="awal_jam" required>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <input type="time" class="form-control" name="akhir_jam" id="akhir_jam"required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <h5>Catatan</h5>
                                                                    <textarea name="note" id="note" cols="30" rows="5" class="form-control no-resize" placeholder="Masukkan Catatan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <h5>Longitude</h5>
                                                                            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Drag lokasi map" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <h5>Latitude</h5>
                                                                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Drag lokasi map" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="map"></div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary waves-effect text-left" type="submit">SUBMIT</button>
                                                </form>
                                            </div>
                                            <script>
                                                    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFqYXIxNzA0IiwiYSI6ImNrbjc0ZDQzbTBrZTkyeHFkcGFrYTV2eXYifQ.1hNQRufizu5s5NjPThoEZg';
                                                    var map = new mapboxgl.Map({
                                                        container: 'map',
                                                        style: 'mapbox://styles/mapbox/streets-v11',
                                                        center: [112.632632, -7.966620],
                                                        zoom: 11
                                                    }); 

                                                    var marker = new mapboxgl.Marker({
                                                        draggable: true
                                                    })
                                                    .setLngLat([112.632632, -7.966620])
                                                    .addTo(map);
                                                     
                                                    function onDragEnd() {
                                                        var lngLat = marker.getLngLat();
                                                        document.getElementById("longitude").value = lngLat.lng;
                                                        document.getElementById("latitude").value = lngLat.lat;
                                                    }
                                             
                                                    marker.on('dragend', onDragEnd);

                                                    map.addControl(new mapboxgl.NavigationControl());
                                                </script>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                    </div>
                    <!-- #END# Basic Validation -->
                </div>
            </div>
            <!-- #END# Advanced Select -->
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

    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
