<?php    
    session_start();
    // use App\Classes\Page;
    // include __DIR__ . '/classes/Page.class.php'; 
    // // Save the current URI in Session
    // $_SESSION['prev_uri'] = Page::getCurrentURI();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if(isset($_SESSION['title'])){
                echo $_SESSION['title'];
            }else{
                echo 'Student GatePass Monitoring';
            }
        ?>
    </title>

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

<body class="layout-top-nav" style="height: auto;">
    <div class="wrapper">
        <!-- top navigation -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <span class="brand-text font-weight-light">LOGO</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php
                        if(isset($_SESSION['user_token'])){
                            echo '<li class="nav-item">                            
                            <form action="./app/includes/auth/logout.inc.php" method="POST">
                            <input type="submit" name="submit" value="Logout">
                        </form>
                    </li>';
                        }else{
                            echo '<li class="nav-item">
                            <a href= '.Page::asset('/login.php').' class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href='.Page::asset('/register.php').' class="nav-link">Register</a>
                    </li>';
                    }
                    ?>

                </ul>
            </div>
        </nav>
        <div class="content-wrapper" style="min-height: 543px;">
            <div class="content">
                <div class="container">