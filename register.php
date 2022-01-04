<?php    
    session_start();
    include './app/classes/Page.class.php';
    
    // Check weather the user is already login
    if(isset($_SESSION['user_token'])){
        Page::route('/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
                    <p class="login-box-msg">Register a new Guardian</p>

                    <form action="./app/includes/auth/register.inc.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="student_code" class="form-control" placeholder="Student RFID">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Guardian Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Confirm Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
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
</body>

</html>