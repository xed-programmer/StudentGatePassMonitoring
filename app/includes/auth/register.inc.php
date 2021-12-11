<?php
session_start();
use App\Classes\Page;

if(isset($_POST['submit'])){

    // Grabbing the data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];    

    // Instantiate RegisterController class
    include '../../classes/Database.class.php';
    include '../../classes/models/auth/RegisterUser.class.php';
    include '../../classes/controllers/auth/RegisterUserController.class.php';        

    $register = new RegisterUserController($email, $password, $confirm_password);    

    // Running error huandlers and user register
    $register->store();

    // Going back to fornt page
    Page::route('/index.php');
}