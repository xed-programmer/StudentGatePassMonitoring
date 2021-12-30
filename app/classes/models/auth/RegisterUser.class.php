<?php

class RegisterUser extends Database{

    protected function setUser($student_code, $name, $email, $password){
        $sql = "INSERT INTO ".$this->acronym."users (name, email, password) VALUES(?, ?,?);";
        $conn = $this->connect();     
        $stmt = $conn->prepare($sql);     

        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bind_param('sss', $name, $email, $hash_password);
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

                // Set the credentials to guardians table
                if($guardian = $this->setGuardian($user['id'])){

                    if(is_null($guardian) || $guardian != false){
                        // Set the relation of student and guardian in guardian_student table
                        if($this->setGuardianStudentRelation($guardian['id'], $student_code)){
                            Page::route('/index.php?message=success');
                        }
                    }                 
                }                
            }            
        }
        Page::route('/register.php?message=somethingwentwrong');
    }

    private function setGuardian($user_id)
    {
        $conn = $this->connect();
        $sql = "INSERT INTO " . $this->acronym . "guardians (user_id, created_at, updated_at) VALUES(?, NOW(), NOW())";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $user_id);
        if($stmt->execute()){
            $conn = $this->connect();
            $sql = "SELECT * FROM " . $this->acronym . "guardians WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
    
            $stmt->bind_param('i', $user_id);
            if($stmt->execute()){
                $result = $stmt->get_result();

                $row = $result->fetch_assoc();
                $stmt->free_result();
            }            
        }    
        return $row;
    }

    private function setGuardianStudentRelation($guardian_id, $student_code)
    {
        // Get first the student data
        $conn = $this->connect();
        $sql = "SELECT id FROM " . $this->acronym . "students WHERE student_code = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param('s', $student_code);
        if(!$stmt->execute()){
            return false;           
        }

        $result = $stmt->get_result();
        $student = $result->fetch_assoc();           
        
        $stmt->free_result(); 

        // Insert guardian and student id in guardian_student table

        $sql = "INSERT INTO " . $this->acronym ."guardian_student (guardian_id, student_id) VALUES(?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ii', $guardian_id, $student['id']);
        if($stmt->execute()){
            $stmt->free_result();
            return true;            
        }
        return false;
    }

    // Check weather if email already exists
    protected function checkUser($email)
    {
        $sql = "SELECT id FROM ".$this->acronym."users WHERE email=?";   
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
        // while($obj = $result->fetch_assoc()){
        //     $_SESSION['user_token'] = $obj['id'];	
        // }
        return $resultCheck;
    }

    protected function checkStudentCode($student_code)
    {
        $conn = $this->connect();
        $sql = "SELECT count(id) FROM " . $this->acronym . "students WHERE student_code = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $student_code);
        
        if($stmt->execute()){
            $result = $stmt->get_result();
            return $result->num_rows > 0;
        }
        
        return false;
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