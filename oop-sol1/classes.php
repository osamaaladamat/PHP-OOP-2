<?php
/*
* @className: Student Class 
* @class Secription : this class contain student Crud
* @authorName: Salameh Yasin
* @authoEmail: salameh.yasin@orange.com 
* @version : 1.0
*/
include('dbconnection.php');

class student extends dbConnection
{
    /*
	Student Class Properties
	*/
    public $stu_id;
    public $stu_name;
    public $stu_email;
    public $stu_password;
    public $stu_mobile;


    public function createStudent()
    {
        $query    = "insert into students(stu_email,stu_mobile,stu_password,stu_name)
		             values('$this->stu_email','$this->stu_mobile','$this->stu_password','$this->stu_name')";
        $this->performQuery($query);
    }
    /*public function createStudent(){
		$database = new dbConnection();
		$query    = "insert into students(stu_email,stu_mobile,stu_pass,stu_name)
		             values('$this->stu_email','$this->stu_mobile','$this->stu_password','$this->stu_name')";
		$database->performQuery($query);
	}*/
    public function fetchAllStudent()
    {
        $query  = "select * from students";
        $result = $this->performQuery($query);
        $row    = $this->fetchAll($result);
        return $row;
    }
    public function fetchByIdStudent($id)
    {
        $query = "select * from students where stu_id={$id}";
        $result = $this->performQuery($query);
        $row    = $this->fetchAll($result);
        return $row;
    }
    public function updateStudent($id)
    {
        $query = "update students set stu_email     = '$this->stu_email',
								 stu_mobile    = '$this->stu_mobile',
								 stu_password  = '$this->stu_password',
								 stu_name      = '$this->stu_name'  
								 where stu_id=$id ";

        $this->performQuery($query);
    }
    public function deleteStudent($id)
    {
        $query = "delete from students where stu_id={$id}";
        $this->performQuery($query);
    }
}

$studentObj = new student(); 

?>