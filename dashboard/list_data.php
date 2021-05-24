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

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet'/>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    
    <style>
    #map { width: 280px; height: 420px;}
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
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Data
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="38%">Nama</th>
                                                <th width="20%">Tipe</th>
                                                <th width="37%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="38%">Nama</th>
                                                <th width="20%">Tipe</th>
                                                <th width="37%">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            include "proses/koneksi.php";
                                            $i="SELECT * FROM marker,tipe WHERE tipe.id_tipe = marker.tipe";
                                            $j=$con->query($i);
                                            $no = 1;
                                            if ($i==FALSE) {
                                                echo "Hai";
                                                }
                                            while ($data=$j->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>      
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['nama_tipe']; ?></td>
                                                <td>
                                                    <a href="proses/proses_delete_data.php?id_del=<?php echo $data['id']; ?>" class="btn btn-danger waves-effect"><i class="material-icons">delete</i></a>

                                                    <button onclick="show(<?php echo $data['longitude']; ?>,<?php echo $data['latitude']; ?>)" class="btn btn-info waves-effect"><i class="material-icons">visibility</i></button>

                                                    <a href="edit_data.php?id=<?php echo $data['id']; ?>" class="btn bg-yellow waves-effect"><i class="material-icons">mode_edit</i></a>
                                                    
                                                    <a href="detail_data.php?id=<?php echo $data['id']; ?>" class="btn btn-success waves-effect"><i class="material-icons">info_outline</i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <script>

        // $(document).on("click", "#tombolUbah", function() {
        //     let id = $(this).data('id');
        //     let nama = $(this).data('nama');
        //     let alamat = $(this).data('alamat');
        //     let lng = $(this).data('lng');
        //     let lat = $(this).data('lat');
        //     let tipe = $(this).data('tipe');

        //     console.log(lat)

        //     $(".modal-body #id_lokasi").val(id);
        //     $(".modal-body #nama_lokasi").val(nama);
        //     $(".modal-body #alamat").val(alamat);
        //     $(".modal-body #lng_lokasi").val(lng);
        //     $(".modal-body #lat_lokasi").val(lat);
        //     $(".modal-body #tipe").val(tipe);
        // });

        $(function(){
            $('#example').DataTable({
                dom: 'Bfrtip',
                responsive:true,
                lengthMenu:[5,10,15,20,100]
            });
        })

        function show(longitude,latitude){
            map.flyTo({
                center: [longitude,latitude],
                zoom: 17
            });
        }
        
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFqYXIxNzA0IiwiYSI6ImNrbjc0ZDQzbTBrZTkyeHFkcGFrYTV2eXYifQ.1hNQRufizu5s5NjPThoEZg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [112.632632, -7.966620],
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
                                $i="SELECT * FROM marker, tipe WHERE tipe.id_tipe = marker.tipe";
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

        map.addControl(new mapboxgl.FullscreenControl());

        map.addControl(new mapboxgl.NavigationControl());

        map.on('click', 'points', function (e) {
        map.flyTo({
            center: e.features[0].geometry.coordinates
        });

        var coordinates = e.features[0].geometry.coordinates.slice();
        var description = e.features[0].properties.description;

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }

        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(description)
            .addTo(map);
        });
         
        // Change the cursor to a pointer when the it enters a feature in the 'symbols' layer.
        map.on('mouseenter', 'points', function () {
            map.getCanvas().style.cursor = 'pointer';
        });
         
        // Change it back to a pointer when it leaves.
        map.on('mouseleave', 'points', function () {
            map.getCanvas().style.cursor = '';
        });

    </script>

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

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <!-- <script src="js/pages/tables/jquery-datatable.js"></script> -->

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
