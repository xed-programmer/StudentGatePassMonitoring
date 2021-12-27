<?php    
    session_start();
    include './app/classes/Page.class.php';

    // Check weather the user is already login
    // if(isset($_SESSION['user_token'])){
    //     Page::route('/index.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate Pass</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=<?php echo Page::asset('/public/plugins/fontawesome-free/css/all.min.css');?>>
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo Page::asset('/public/dist/css/adminlte.min.css');?>>
</head>

<body>
    <div class="login-page" style="min-height: 496.781px;">
        <div class="login-box">
            <div class="login-logo">
                <a href="index.php"><b>Gate Pass</b> Monitoring</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">WELCOME</p>

                    <form action="./app/includes/gatepass.inc.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" id="student_code" name="student_code" class="form-control"
                                placeholder="RFID" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src=<?php echo Page::asset('/public/plugins/jquery/jquery.min.js')?>></script>
    <script src=<?php echo Page::asset('/public/plugins/bootstrap/js/bootstrap.bundle.min.js')?>></script>
    <script src=<?php echo Page::asset('/public/dist/js/adminlte.js')?>></script>

    <script>
    $(document).ready(() => {
        setInterval(() => {
            $('#student_code').focus();
        }, 500);
    });
    </script>
</body>

</html>