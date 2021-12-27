<?php

include '../classes/Page.class.php';
if(isset($_POST['student_code'])){
    
    // Grab the data from form
    $student_code = $_POST['student_code'];

    //instantiate GatepassController
    include '../classes/Database.class.php';
    include '../classes/models/GatePass.class.php';
    include '../classes/controllers/GatePassController.class.php';
    //Running error huandlers and login student gatepass  
    $gatepass = new GatePassController($student_code);
    $gatepass->store();    

}else{
    Page::route('/gatepass.php');
}