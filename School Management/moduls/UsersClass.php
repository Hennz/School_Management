<?php 


class users {
	
    private $id;
    private $username;
    private $password;
    private $fname;
	private $lname;
	private $age;
	private $phone;
	private $address;
	private $email;
	private $db;
	
	function __construct() {
		include_once'DatabaseClass.php';		
		$this->db = new database();
	}
	public function usersinfo($info) {       
        include_once'DatabaseClass.php';		
		$this->db = new database();
		$this->username = $info['username'];
		$this->password = $info['password'];
		$this->fname = $info['fname'];
		$this->lname = $info['lname'];
		$this->age = $info['age'];
		$this->phone = $info['phone'];
		$this->address = $info['address'];
		$this->email = $info['email'];
    }
	
	function login($username , $password) {
        $this->username = $username;
		$this->password = $password;
		$sql = "SELECT * FROM users WHERE username='$this->username'";
		$row = $this->db->select($sql);
		if ($row['password'] === $this->password) {
				session_start();
				$_SESSION['id'] = $row['id'];
                $_SESSION['username']=$row['username'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['address'] = $row['address'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['age'] = $row['age'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['photoUrl'] = $row['photoUrl'];

				$this->db->close();	
				return true;
		}
		$this->db->close();	
		return false;
    }
	
	function logout() {
       
		session_start();
		unset($_SESSION['id']);
        unset($_SESSION['username']);
		unset($_SESSION['password']);
        unset($_SESSION['fname']);
        unset($_SESSION['lname']);
        unset($_SESSION['phone']);
        unset($_SESSION['address']);
		unset($_SESSION['email']);
		unset($_SESSION['age']);
		unset($_SESSION['type']);
		unset($_SESSION['photoUrl']);
		session_destroy();
		header("location:http://localhost:3333/School%20Management/IndexPage.html");
		$this->db->close();	
    }
	
	
	
	
	function getID(){
		return $this->id;
	}

	function getUsername(){
		return $this->username;
	}
	
	function getPassword(){
		return $this->password;
	}
	
	function getFname(){
		return $this->fname;
	}
	
	function getLname(){
		return $this->lname;
	}
	
	function getAge(){
		return $this->age;
	}
	
	function getPhone(){
		return $this->phone;
	}
	
	function getAddress(){
		return $this->address;
	}
	
	function getEmail(){
		return $this->email;
	}


	
	function setID($id){
		$this->id = $id;
	}
	
	function setUsername($username){
		$this->username = $username;
	}
	
	function setPassword($password){
		$this->password = $password;
	}
	
	function setFname($fname){
		$this->fname = $fname;
	}
	
	function setLname($lname){
		$this->lname = $lname;
	}
	
	function setPhone($phone){
		$this->phone = $phone;
	}
	
	function setAddress($address){
		$this->address = $address;
	}
	
	function setEmail($email){
		$this->email = $email;
	}
	
	function setAge($age){
		$this->age = $age;
	}


}















?>