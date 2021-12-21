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
}