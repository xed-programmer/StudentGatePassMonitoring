<?php

class Student extends Database{

    public function all()
    {
        $conn = $this->connect();
        $sql = "SELECT s.*, u.name FROM " . $this->acronym . "students s ".
        "INNER JOIN ".$this->acronym . "users u ON u.id = s.user_id";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute();
        $result = $stmt->get_result();        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}