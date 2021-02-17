<?php
require('config.php');

class dbConnection{
	public $conn;

	public function __construct(){
		$this->openConnection();
	}
	
	public function openConnection(){
		$this->conn = mysqli_connect(DBSERVER,DBUSER,DBPASS,DBNAME);
		if(!$this->conn){
			die('cannot conect to server');
		}
	}
	public function performQuery($query){
		$result = mysqli_query($this->conn,$query);
		return $result ? $result : false;
	}

	public function fetchAll($result){
		$rowSet = array();
		while($row = mysqli_fetch_assoc($result)){
			$rowSet[] = $row;
		}
		return $rowSet;
	}
}


 ?>