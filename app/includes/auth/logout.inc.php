<?php
session_start();

include '../../classes/Page.class.php';
// include '../../includes/autoloader.inc.php';
// autoloadclass(3);
if(isset($_POST['submit'])){
    session_unset();
    Page::route('/index.php');
}