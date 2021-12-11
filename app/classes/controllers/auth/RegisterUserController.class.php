<?php

use App\Classes\Page;

class RegisterUserController extends RegisterUser{

    private $email;
    private $password;
    private $confirm_password;

    public function __construct($email, $password, $confirm_password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    public function store()
    {
        // Validations
        
        if(!$this->empytInput()){
            Page::route('/index.php?error=emptyinput');
        }
        if(!$this->invalidEmail()){
            Page::route('/index.php?error=emptyinput');
        }
        if(!$this->passwordMatch()){
            Page::route('/index.php?error=passwordnotmatch');
        }
        if(!$this->emailTakenCheck()){
            Page::route('/index.php?error=useremailtaken');
        }

        $this->setUser($this->email, $this->password);
    }

    private function empytInput(){
        $result = null;
        if(empty($this->email) || empty($this->password) ||
         empty($this->confirm_password)){
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

    private function passwordMatch()
    {
        $result = null;
        if($this->password !== $this->confirm_password){
             $result = false;             
        }else{
            $result = true;
        }
        return $result;
    }

    private function emailTakenCheck()
    {
        $result = null;
        if(!$this->checkUser($this->email)){
             $result = false;             
        }else{
            $result = true;
        }
        return $result;
    }
}