<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pelayanan Kesehatan Kota Malang</title>
    <!-- Favicon-->
    <link rel="icon" href="dashboard/images/logo_malang.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="dashboard/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="dashboard/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="dashboard/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="dashboard/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="dashboard/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="dashboard/css/themes/all-themes.css" rel="stylesheet" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet'/>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    
    <style>
    #map { width: 770px; height: 560px;}
    .mapboxgl-popup {
    max-width: 200px;
    }
    </style>
</head>

<body style="background-color: white;">
    <div class="col-lg-5">
        <div class="text-center" style="padding-bottom: 10px;">
            <h3>Data Layanan Kesehatan</h3>
            <h4>Kota Malang</h4>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 45%;">Nama</th>
                        <th style="width: 25%;">Tipe</th>
                        <th style="width: 25%;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 45%;">Nama</th>
                        <th style="width: 25%;">Tipe</th>
                        <th style="width: 25%;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    include "dashboard/proses/koneksi.php";
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
                            <button onclick="show(<?php echo $data['longitude']; ?>,<?php echo $data['latitude']; ?>)" class="btn btn-info waves-effect"><i class="material-icons">visibility</i></button>
                            <button id="tombolPesan" class="btn btn-success waves-effect" data-toggle="modal" data-target="#largeModal" data-nama="<?php echo $data['nama']; ?>" data-alamat="<?php echo $data['alamat']; ?>" data-longitude="<?php echo $data['longitude']; ?>" data-latitude="<?php echo $data['latitude']; ?>" data-tipe="<?php echo $data['nama_tipe']; ?>" data-awalhari="<?php echo $data['awal_hari']; ?>" data-akhirhari="<?php echo $data['akhir_hari']; ?>" data-awaljam="<?php echo date('H:i',strtotime($data["awal_jam"])); ?>" data-akhirjam="<?php echo date('H:i',strtotime($data["akhir_jam"])); ?>" data-note="<?php echo $data['note']; ?>" data-gambar="<?php echo $data['gambar']; ?>"><i class="material-icons">info_outline</i></button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-left">
            <a href="index.php" class="btn btn-info waves-effect">Kembali</a>
        </div>
    </div>
    <div class="col-lg-7" style="padding-top: 20px;">
        <div id="map"></div>
    </div>
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Detail Data</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-7" style="margin-bottom: 0px;">
                            <div class="row clearfix">
                                <div class="col-lg-6" style="margin-bottom: 0px;">
                                    <div class="form-group form-float">
                                        <h5>Nama</h5>
                                        <p id="isi_nama"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 0px;">
                                    <div class="form-group form-float">
                                        <h5>Alamat</h5>
                                        <p id="isi_alamat"></p>
                                    </div>   
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <h5>Gambar</h5>
                                <img src="" id="isi_gambar" width="470" height="270">
                            </div>
                        </div>
                        <div class="col-lg-5" style="margin-bottom: 0px;">
                            <div class="row clearfix">
                                <div class="col-lg-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                                    <div class="form-group form-float">
                                        <h5>Longitude</h5>
                                        <p id="isi_longitude"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                                    <div class="form-group form-float">
                                        <h5>Latitude</h5>
                                        <p id="isi_latitude"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <h5>Tipe</h5>
                                <p id="isi_tipe"></p>
                            </div>
                            <div class="form-group form-float">
                                <h5>Hari Buka</h5>
                                <div class="row clearfix">
                                    <div class="col-lg-2"><p id="isi_awal_hari"></p></div>
                                    <div class="col-lg-2">
                                        <p>Sampai</p>
                                    </div>
                                    <div class="col-lg-2"><p id="isi_akhir_hari"></p></div>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <h5>Jam Buka</h5>
                                <div class="row clearfix">
                                    <div class="col-lg-2" style="margin-bottom: 0px;"><p id="isi_awal_jam"></p></div>
                                    <div class="col-lg-2" style="margin-bottom: 0px;">
                                        <p>Sampai</p>
                                    </div>
                                    <div class="col-lg-2" style="margin-bottom: 0px;"><p id="isi_akhir_jam"></p></div>
                                </div>
                            </div>        
                            <div class="form-group form-float">
                                <h5>Catatan</h5>
                                <pre id="isi_note"></pre>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(function(){
            $('#example').DataTable({
                dom: 'Bfrtip',
                responsive:true,
                lengthMenu:[4,10,15,20,100]
            });
        })

        $(document).on("click", "#tombolPesan", function() {
            let isi_nama = $(this).data('nama');
            let isi_alamat = $(this).data('alamat');
            let isi_longitude = $(this).data('longitude');
            let isi_latitude = $(this).data('latitude');
            let isi_tipe = $(this).data('tipe');
            let isi_awal_hari = $(this).data('awalhari');
            let isi_akhir_hari = $(this).data('akhirhari');
            let isi_awal_jam = $(this).data('awaljam');
            let isi_akhir_jam = $(this).data('akhirjam');
            let isi_note = $(this).data('note');
            let isi_gambar = $(this).data('gambar');
            console.log(isi_gambar);
            // console.log(nama);
            $("#isi_nama").text(isi_nama);
            $("#isi_alamat").text(isi_alamat);
            $("#isi_longitude").text(isi_longitude);
            $("#isi_latitude").text(isi_latitude);
            $("#isi_tipe").text(isi_tipe);
            $("#isi_awal_hari").text(isi_awal_hari);
            $("#isi_akhir_hari").text(isi_akhir_hari);
            $("#isi_awal_jam").text(isi_awal_jam);
            $("#isi_akhir_jam").text(isi_akhir_jam);
            $("#isi_note").text(isi_note);
            if (isi_gambar) {
                $("#isi_gambar").attr('src',"dashboard/images/"+isi_gambar);
            } else {
                $("#isi_gambar").attr('src',"dashboard/images/default.jpg");
            }
        });

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
                                include "dashboard/proses/koneksi.php";
                                $i="SELECT * FROM marker, tipe WHERE tipe.id_tipe = marker.tipe";
                                $j=$con->query($i);
                                if ($i==FALSE) {
                                    echo "Hai";
                                }
                                while ($data=$j->fetch_array()) {
                                ?>
                                    {
                                        "type": "Feature",
                                        "geometry": {
                                            "type": "Point",
                                            "coordinates": [
                                                <?php echo $data['longitude']; ?>,
                                                <?php echo $data['latitude']; ?>
                                            ]
                                        },
                                        "properties": {
                                            "title": "<?php echo $data['nama']; ?>",
                                            "description": "<strong>Nama :</strong><p style='color: blue;'><?php echo $data['nama']; ?></p><strong>Alamat :</strong><p><?php echo $data['alamat']; ?></p><strong>Koordinat :</strong><p><?php echo $data['longitude']; ?>,<?php echo $data['latitude']; ?></p>"
                                        }
                                    },
                            <?php
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

        // map.addControl(
        //     new mapboxgl.GeolocateControl({
        //         positionOptions: {
        //             enableHighAccuracy: true
        //         },
        //         trackUserLocation: true
        //     })
        // );
        
        map.addControl(new mapboxgl.NavigationControl());

        map.on('click', 'points', function (e) {
        map.flyTo({
            center: e.features[0].geometry.coordinates,
            zoom: 17,
        });

        // $('#defaultModal').modal('show');
        // var title = e.features[0].properties.title;
        // $("#isi_nama").text(title);
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
    <script src="dashboard/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="dashboard/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="dashboard/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="dashboard/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="dashboard/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="dashboard/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="dashboard/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <!-- Custom Js -->
    <script src="dashboard/js/admin.js"></script>
    <!-- <script src="dashboard/js/pages/tables/jquery-datatable.js"></script> -->

    <!-- Demo Js -->
    <script src="dashboard/js/demo.js"></script>
</body>

</html>
