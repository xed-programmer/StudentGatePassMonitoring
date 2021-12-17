<?php

include '../../Page.class.php';

class LoginUserController extends LoginUser{

    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function login()
    {
        // Validations    
        if(!$this->empytInput()){
            Page::route('/login.php?error=emptyinput');
        }
        if(!$this->invalidEmail()){
            Page::route('/login.php?error=emptyinput');
        }
        if(!$this->emailTakenCheck()){
            Page::route('/login.php?error=emailnotexist');
        }

        $this->loginUser($this->email, $this->password);
    }

    private function empytInput(){
        $result = null;
        if(empty($this->email) || empty($this->password)){
             $result = false;             
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result = null;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
             $result = false;             
        }else{
            $result = true;
        }
        return $result;
    }


    private function emailTakenCheck()
    {
        $result = null;
        if($this->checkUser($this->email)){
             $result = true;             
        }else{
            $result = false;
        }
        return $result;
    }
}