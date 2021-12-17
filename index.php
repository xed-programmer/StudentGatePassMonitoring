<?php
use App\Classes\Page;    
    include './app/includes/autoloader.inc.php';
    autoloadclass(0);
    include './app/resources/views/layouts/app/header.layout.php';    

    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
?>

<div class="row">
    <?php
        if(isset($_SESSION['user_token'])){
            echo '<p>Login successfully</p><p>'.$_SESSION['user_email'].'</p>';
        }
    ?>
</div>

<?php
    include './app/resources/views/layouts/app/footer.layout.php';
?>