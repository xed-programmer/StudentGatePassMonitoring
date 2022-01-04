<?php

class AdminStudentController{
    
    public function populateStudents()
    {
        $student = new Student();
        return $student->all();
    }
}