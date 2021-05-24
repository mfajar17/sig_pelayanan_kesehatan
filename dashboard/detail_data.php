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
    #map { width: 300px; height: 300px;}
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
                    <li>
                        <a href="input_data.php">
                            <i class="material-icons">assignment</i>
                            <span>Input Data</span>
                        </a>
                    </li>
                    <li class="active">
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
                                    <h2>Detail Data</h2>
                                </div>
                                <div class="body">
                                    <?php
                                        $id = $_REQUEST['id'];
                                        $i="SELECT * FROM marker,tipe WHERE tipe.id_tipe = marker.tipe AND id='".$id."' ";
                                        $j=$con->query($i);
                                        if ($i==FALSE) {
                                            echo "Hai";
                                            }
                                        while ($data=$j->fetch_array()) {
                                    ?>
                                    <div class="row clearfix">
                                        <div class="col-lg-4" style="margin-bottom: 0px;">
                                            <div class="form-group form-float">
                                                <h5>Nama</h5>
                                                <p><?php echo $data['nama']; ?></p>
                                            </div>
                                            <div class="form-group form-float">
                                                <h5>Alamat</h5>
                                                <p><?php echo $data['alamat']; ?></p>
                                            </div>
                                            <div class="form-group form-float">
                                                <h5>Gambar</h5>
                                                <img src="images/<?php 
                                                if ($data['gambar']==NULL){
                                                        echo "default.jpg";
                                                    } else {
                                                        echo $data['gambar'];
                                                    } 
                                                ?>" width="250" height="150">
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="margin-bottom: 0px;">
                                            <div class="form-group form-float">
                                                <h5>Hari Buka</h5>
                                                <p><?php echo $data['awal_hari']; ?> - <?php echo $data['akhir_hari']; ?></p>
                                            </div>
                                            <div class="form-group form-float">
                                                <h5>Jam Buka</h5>
                                                <p><?php echo date('H:i',strtotime($data["awal_jam"])); ?> - <?php echo date('H:i',strtotime($data["akhir_jam"])); ?></p>
                                            </div>
                                            <div class="form-group form-float">
                                                <h5>Catatan</h5>
                                                <p><?php echo $data['note']; ?></p>
                                            </div>
                                            <div class="form-group form-float">
                                                <h5>Tipe</h5>
                                                <p><?php echo $data['nama_tipe']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5" style="margin-bottom: 0px;">
                                            <div class="row clearfix">
                                                <div class="col-lg-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="form-group form-float">
                                                        <h5>Longitude</h5>
                                                        <input type="text" class="form-control" name="longitude" id="longitude" value="<?php echo $data['longitude']; ?>" placeholder="Drag lokasi map" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="form-group form-float">
                                                        <h5>Latitude</h5>
                                                        <input type="text" class="form-control" name="latitude" id="latitude" value="<?php echo $data['latitude']; ?>" placeholder="Drag lokasi map" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="map"></div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <a href="list_data.php" class="btn bg-green waves-effect">Kembali</a>
                                </div>
                                <script>
                                    var long = document.getElementById("longitude").value;
                                    var lati = document.getElementById("latitude").value;

                                    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFqYXIxNzA0IiwiYSI6ImNrbjc0ZDQzbTBrZTkyeHFkcGFrYTV2eXYifQ.1hNQRufizu5s5NjPThoEZg';
                                    var map = new mapboxgl.Map({
                                        container: 'map',
                                        style: 'mapbox://styles/mapbox/streets-v11',
                                        center: [long, lati],                                            
                                        zoom: 12
                                    });

                                    map.on('load', function () {
                                        // Add an image to use as a custom marker
                                        map.loadImage(
                                        'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
                                            function (error, image) {
                                                if (error) throw error;
                                                map.addImage('custom-marker', image);
                                                // Add a GeoJSON source with 2 points
                                                map.addSource('points', {
                                                    'type': 'geojson',
                                                    'data': {
                                                        'type': 'FeatureCollection',
                                                        'features': [
                                                        <?php
                                                            include "proses/koneksi.php";
                                                            $i="SELECT * FROM marker, tipe WHERE tipe.id_tipe = marker.tipe AND id='".$id."' ";
                                                            $j=$con->query($i);
                                                            if ($i==FALSE) {
                                                                echo "Hai";
                                                            }
                                                            while ($data=$j->fetch_array()) {
                                                                echo'{
                                                                    "type": "Feature",
                                                                    "geometry": {
                                                                        "type": "Point",
                                                                        "coordinates": [
                                                                            '.$data['longitude'].',
                                                                            '.$data['latitude'].'
                                                                        ]
                                                                    },
                                                                    "properties": {
                                                                        "title": "'.$data['nama'].'",
                                                                        "description": "<strong>' . $data['nama'] . '</strong><p>Alamat ' . $data['alamat'] . '</p><p>Tipe : ' . $data['nama_tipe'] . ' </p><p>' . $data['longitude'] . ' , ' . $data['latitude'] . '</p>"
                                                                    }
                                                                },';
                                                            };
                                                        ?>

                                                            ]
                                                        }
                                                    });

                                                        // Add a symbol layer
                                                map.addLayer({
                                                    'id': 'points',
                                                    'type': 'symbol',
                                                    'source': 'points',
                                                    'layout': {
                                                        'icon-image': 'custom-marker',
                                                        // get the title name from the source's "title" property
                                                        'text-field': ['get', 'title'],
                                                        'text-font': [
                                                            'Open Sans Semibold',
                                                            'Arial Unicode MS Bold'
                                                        ],
                                                        'text-offset': [0, 1.25],
                                                        'text-anchor': 'top'
                                                    }
                                                });
                                            }
                                        );
                                    });

                                    map.addControl(new mapboxgl.NavigationControl());
                                </script>
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
