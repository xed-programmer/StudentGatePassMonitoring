<?php

class RegisterUserController extends RegisterUser{

    private $student_code;
    private $name;
    private $email;
    private $password;
    private $confirm_password;

    public function __construct($student_code, $name, $email, $password, $confirm_password)
    {
        $this->student_code = $student_code;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    public function store()
    {
        // Validations
        if(!$this->studentCodeExist()){
            Page::route('/register.php?error=invalidstudentrfid');
        }
        if(!$this->empytInput()){
            Page::route('/register.php?error=emptyinput');
        }
        if(!$this->invalidEmail()){
            Page::route('/register.php?error=emptyinput');
        }
        if(!$this->passwordMatch()){
            Page::route('/register.php?error=passwordnotmatch');
        }
        if(!$this->emailTakenCheck()){
            Page::route('/register.php?error=useremailtaken');
        }

        $this->setUser($this->student_code, $this->name, $this->email, $this->password);
    }

    private function empytInput(){
        $result = null;
        if(empty($this->student_code) || empty($this->name) || empty($this->email) || empty($this->password) ||
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
    
    private function studentCodeExist()
    {
        return $this->checkStudentCode($this->student_code);
    }    
}