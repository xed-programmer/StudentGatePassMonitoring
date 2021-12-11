<?php
session_start();
use App\Classes\Page;
include '../../includes/autoloader.inc.php';
autoloadclass(3);

class RegisterUser extends Database{

    protected function setUser($email, $password){
        $sql = "INSERT INTO ".$this->acronym."users (email, password) VALUES(?,?);";
        $conn = $this->connect();     
        $stmt = $conn->prepare($sql);     

        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bind_param('ss', $email, $hash_password);
        if($stmt->execute()){
            $stmt = null;
            Page::route('/index.php?message=success');
        }        
    }

    // Check weather if email already exists
    protected function checkUser($email)
    {
        $sql = "SELECT id FROM ".$this->acronym."users WHERE email=?;";   
        $conn = $this->connect();     
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $resultCheck = null;        
        if($result->num_rows > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        $stmt = null;        
        while($obj = $result->fetch_assoc()){
            $_SESSION['user_token'] = $obj['id'];	
        }
        return $resultCheck;
    }
}