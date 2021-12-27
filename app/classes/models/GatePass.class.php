<?php
date_default_timezone_set("Asia/Manila");
class GatePass extends Database{
    
    protected function scanStudentCode($student_code)
    {
        $student_user = $this->getStudentUser($student_code);
        $attendances = $this->getStudentAttendances($student_user['id']);

        if($student_user){
            if($attendances != null){
                if(count($attendances) > 0){
                
                    //check if the student tap rfid within 60 seconds
                    $now = DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:s"));
                    // $t stands for target
                    $t = DateTime::createFromFormat("Y-m-d H:i:s", $attendances['created_at']);
                    // $t = (count($attendances) > 1)? $attendances[0]['created_at'] : $attendances['created_at'];
                
                    $d1 = mktime((int)$now->format("H"),(int)$now->format("i"),(int)$now->format("s"),(int)$now->format("m"),(int)$now->format("d"),(int)$now->format("Y"),);
                
                    $d2 = mktime((int)$t->format("H"),(int)$t->format("i"),(int)$t->format("s"),(int)$t->format("m"),(int)$t->format("d"),(int)$t->format("Y"),);
                    $diff = $d1 - $d2;    
                    // Check if the difference is < than 60 seconds
                    if($diff < 60){
                        Page::route('/gatepass.php');
                    }
                }
            }

            $status = (count($attendances)%2 == 0)? 'time-in' : 'time-out';
            return $status . ' ' . count($attendances);
            // $conn = $this->connect();
            // $sql = "INSERT INTO " . $this->acronym . "attendances (user_id, status, created_at) VALUES(?,?,NOW())";
            // $stmt = $conn->prepare($sql);
            
            // $stmt->bind_param('is', $student_user['id'], $status);
            // return $stmt->execute();
        }

        return $attendances;
    }

    private function getStudentUser($student_code)
    {
        $conn = $this->connect();
        $sql = "SELECT u.* FROM " . $this->acronym . "users u INNER JOIN " . $this->acronym . "students s ON s.user_id = u.id
        WHERE s.student_code = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param('i', $student_code);
        if($stmt->execute()){
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result->fetch_assoc();
    }    
    
    private function getStudentAttendances($id)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM " . $this->acronym . "attendances WHERE user_id = ? AND created_at > ?";
        $stmt = $conn->prepare($sql);
        
        $today = DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d 00:00:00.0"));
        $stmt->bind_param('ii', $id, $today);
        if($stmt->execute()){
            $result = $stmt->get_result();
        }
        $stmt->free_result();

        return $result->fetch_assoc();   
    }
}