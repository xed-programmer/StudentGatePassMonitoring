<?php
session_start();
// include '../../includes/autoloader.inc.php';
// autoloadclass(3);
include '../../../classes/Page.class.php';

class RegisterUser extends Database{

    protected function setUser($email, $password){
        $sql = "INSERT INTO ".$this->acronym."users (email, password) VALUES(?,?);";
        $conn = $this->connect();     
        $stmt = $conn->prepare($sql);     

        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bind_param('ss', $email, $hash_password);
        if($stmt->execute()){
            
            $stmt->free_result();

            $user = $this::getUserByEmail($email);

            $role = $this::getRoleByName('guardian');

            $sql = "INSERT INTO ".$this->acronym."role_user (role_id, user_id) VALUES(?,?);";
            $conn = $this->connect();     
            $stmt = $conn->prepare($sql); 

            $stmt->bind_param('ii', $role['id'], $user['id']);

            if($stmt->execute()){            
                $stmt->free_result();
                Page::route('/index.php?message=success');
            }            
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
        $stmt->free_result();        
        while($obj = $result->fetch_assoc()){
            $_SESSION['user_token'] = $obj['id'];	
        }
        return $resultCheck;
    }

    private function getUserByEmail($email)
    {
        $sql = "SELECT * FROM ".$this->acronym."users WHERE email = ?;";
        $conn = $this->connect();     
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $email);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();                                                
            $stmt->free_result();                   

            return $row;
        }        
    }

    private function getRoleByName($name)
    {
        $sql = "SELECT * FROM ".$this->acronym."roles WHERE name = ?;";
        $conn = $this->connect();     
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $name);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();                                                
            $stmt->free_result();            
            
            return $row;
        }        
    }
}