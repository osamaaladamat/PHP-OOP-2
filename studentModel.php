<?php
/*
* @className: Student Class 
* @class Secription : this class contain student Crud
* @authorName: Salameh Yasin
* @authoEmail: salameh.yasin@orange.com 
* @version : 1.0
*/
include('databaseClass.php');
class student extends dbConnection{
	/*
	Student Class Properties
	*/
	public $std_id;
	public $std_name;
	public $std_email;
	public $std_password;
	public $std_mobile;


	public function createStudent(){
		$query    = "insert into students(std_email,std_mobile,std_pass,std_name)
		             values('$this->std_email','$this->std_mobile','$this->std_password','$this->std_name')";
		$this->performQuery($query);
	}
	/*public function createStudent(){
		$database = new dbConnection();
		$query    = "insert into students(std_email,std_mobile,std_pass,std_name)
		             values('$this->std_email','$this->std_mobile','$this->std_password','$this->std_name')";
		$database->performQuery($query);
	}*/
	public function fetchAllStudent(){
		$query  = "select * from students";
		$result = $this->performQuery($query);
		$row    = $this->fetchAll($result); 
		return $row;
	}
	public function fetchByIdStudent($id){
	  $query="select * from students where std_id={$id}";
	  $result = $this->performQuery($query);
	  $row    = $this->fetchAll($result); 
	  return $row;
      
	}
	public function updateStudent($id){
	 $query="update students set std_email  = '$this->std_email',
								 std_mobile = '$this->std_mobile',
								 std_pass   = '$this->std_password',
								 std_name   = '$this->std_name'  
								 where std_id=$id ";
								 
	$this->performQuery($query);					
	}
	public function deleteStudent($id){
    $query="delete from students where std_id={$id}";
	$this->performQuery($query);

	}

}

$studentObj = new student();
/*$studentObj->std_name = "Hamzeh Yasin";
$studentObj->std_password = "123456";
$studentObj->std_email = "hamzeh.yasin@orange.com";
$studentObj->std_mobile = "911789789797";

$studentObj->createStudent();
*/
$x = $studentObj->fetchAllStudent();

echo '<pre>';
print_r($x);




 ?>
