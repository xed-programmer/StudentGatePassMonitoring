<?php

class UserController extends User{

    public function userLogin($username, $password)
    {
        if (empty($username) || empty($password)) {
            // Check if previous URI has been set
            if(isset($_SESSION['prev_uri'])){
                header("Location: ". $_SESSION['prev_uri'] ."?error=emptyfields");
            }else{
                header("Location: ". Page::asset('/login.php') ."?error=emptyfields");
            }            
            exit();
        }
        
        $res = $this->getUserLogin($username, $password);

        var_dump($res);

        // session_start();
        // header("Location:../index.phplogin=success");
        // exit ();
    }
}