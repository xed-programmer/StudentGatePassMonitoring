<?php

class User extends Database{

    public function getUserLogin($username, $password){
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($this->connect());
        if(!mysqli_stmt_prepare($stmt,$sql)){
            return ['error' => 'sqlerror'];
        }
        else {
            mysqli_stmt_bind_param($stmt,"ss", $username, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if  ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['pwdUsers']);      
                if(!$pwdCheck){
                    // header ("Location: ../index.php?error=wrongpwd");
                    // exit();
                    return ['error' => 'wrong password'];
                }else{    
                    return [
                        'username' => $row['idUsers'],
                        'userid' => $row['idUsers'],
                    ];
                }
            }                          
            else {
                return ['error' => 'wrong credentials'];
            }
        }
    }
}