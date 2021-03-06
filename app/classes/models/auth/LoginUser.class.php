<?php
session_start();
include '../../../classes/Page.class.php';
// include '../../includes/autoloader.inc.php';
// autoloadclass(3);

class LoginUser extends Database {
  
    // Check weather if user already exists
    protected function checkUser($email)
    {
        $conn = $this->connect();   
        $sql = "SELECT id FROM ".$this->acronym."users WHERE email=?;";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();

        $stmt = null;
        return ($result->num_rows > 0);
    }

    protected function loginUser($email, $password)
    {
        $conn = $this->connect();   
        $sql = "SELECT * FROM ".$this->acronym."users WHERE email=?;";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        
        if  ($row = $result->fetch_assoc()){            
            $pwdCheck = password_verify($password, $row['password']);      
            if(!$pwdCheck){
                Page::route('/login.php?error=incorrectpassword&email='.$email);
            }else{    
                $_SESSION['user_token'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_pass'] = $row['password'];
                Page::route('/index.php');
            }
        }                          
        else {
            Page::route('/login.php?error=wrongcredentials');
        }
        $stmt = null;        
    }
}