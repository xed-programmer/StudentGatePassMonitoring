<?php    
    use App\Classes\Page;    
    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
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

<body>