<?php

class GatePassController extends GatePass{
    
    private $student_code;

    public function __construct($student_code)
    {
        $this->student_code = $student_code;    
    }

    public function store()
    {
        if($this->empytInput()){
            Page::route('/gatepass.php');
        }

        if($this->scanStudentCode($this->student_code)){
            Page::route('/gatepass.php?message=success');
        }else{
            Page::route('/gatepass.php?message=failed');
        }
        // echo var_dump($this->scanStudentCode($this->student_code));
    }

    private function empytInput()
    {     
        return empty($this->student_code);
    }
}