<?php
session_start();

use App\Classes\Page;
include '../../includes/autoloader.inc.php';
autoloadclass(3);
if(isset($_POST['submit'])){
    session_unset();
    Page::route('/index.php');
}