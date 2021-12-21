<?php

class Admin extends Database{

    protected function count($table)
    {
        $conn = $this->connect();
        $sql = "SELECT count(id) AS count FROM ". $this->acronym. $table;
        if($stmt = $conn->prepare($sql)){
            // $stmt->bind_param('s', $table);
            $stmt->execute();
            if($result = $stmt->get_result()){
                if($row = $result->fetch_assoc()){
                    return $row['count'];
                }
            }else{
                return "SQL ERROR";
            }
        }        
        return 0;
    }

    protected function studentAttendance()
    {
        $conn = $this->connect();
        $sql = "SELECT a.*, u.name, u.email FROM ". $this->acronym. "attendances a " .
        "INNER JOIN ". $this->acronym. "users u ON u.id = a.user_id ORDER BY a.created_at DESC";
                
        if($stmt = $conn->prepare($sql)){
            // $stmt->bind_param('s', $table);
            $stmt->execute();
            if($result = $stmt->get_result()){
                if($row = $result->fetch_assoc()){
                    return $row;
                }
            }else{
                return "SQL ERROR";
            }
        }else{
            return "SQL PREPARE ERROR";
        }
        return [];
    }
}