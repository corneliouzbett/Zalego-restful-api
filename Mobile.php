<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Mobile {
	private $mobiles = array();
	public function getAllMobile(){
		if(isset($_GET['name'])){
			$name = $_GET['name'];
			$query = 'SELECT * FROM tbl_user WHERE name LIKE "%' .$name. '%"';
		} else {
			$query = 'SELECT * FROM tbl_user';
		}
		$dbcontroller = new DBController();
		$this->mobiles = $dbcontroller->executeSelectQuery($query);
		return $this->mobiles;
	}
		public function addMobile(){
		if(isset($_POST['first_name'])){
			$first_name = $_POST['first_name'];
			
			if(isset($_POST['last_name'])){
				$last_name = $_POST['last_name'];
			}
			if(isset($_POST['username'])){
				$username = $_POST['username'];
			}
			if(isset($_POST['password'])){
				$password = $_POST['password'];
			}
			$query = "insert into tbl_user (first_name,last_name,username,password) values ('" . $first_name ."','". $last_name ."','" . $username ."',,'". $password ."')";
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}

	
	public function deleteMobile(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM tbl_user WHERE id = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
?>
