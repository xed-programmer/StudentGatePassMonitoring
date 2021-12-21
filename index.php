<?php

    // include './app/includes/autoloader.inc.php';
    // autoloadclass(0);
    include 'app/classes/Page.class.php'; 
    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
    include 'app/resources/views/layouts/app/header.layout.php';    

    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
?>
Home Page
<?php
    include 'app/resources/views/layouts/app/footer.layout.php';
?>