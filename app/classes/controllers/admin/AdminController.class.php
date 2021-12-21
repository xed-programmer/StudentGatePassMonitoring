<?php

class AdminController extends Admin{

    public function getCount($table)
    {
        return $this->count($table);
    }

    public function getStudentAttendance()
    {
        return $this->studentAttendance();
    }
}