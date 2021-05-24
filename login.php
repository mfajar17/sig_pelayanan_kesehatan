<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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

    <!-- Custom Css -->
    <link href="dashboard/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SIG</a>
            <small>Pelayanan Kesehatan Kota Malang</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="aksi_login.php?op=in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="dashboard/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="dashboard/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="dashboard/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="dashboard/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="dashboard/js/admin.js"></script>
    <script src="dashboard/js/pages/examples/sign-in.js"></script>
</body>

</html>