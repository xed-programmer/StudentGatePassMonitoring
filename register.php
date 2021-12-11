<?php

use App\Classes\Page;

session_start();
    include './app/includes/autoloader.inc.php';
    autoloadclass(0);
    include './app/resources/views/layouts/app/header.layout.php'; 
    
    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
?>
<main>
    <h1>Register</h1>
    <form action="./app/includes/auth/register.inc.php" method="POST">
        <input type="email" name="email" placeholder="Email" required autofocus>
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <button type="submit" name="submit">Register</button>

    </form>
</main>

<?php
    include './app/resources/views/layouts/app/footer.layout.php';
?>