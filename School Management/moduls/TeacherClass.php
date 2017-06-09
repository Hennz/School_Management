<?php 

include'UsersClass.php';

class teacher extends users {
		
		private $type = 'teacher';
		private $department;

	function __construct() {       
        include_once'DatabaseClass.php';		
		$this->db = new database();
    }
	
	
	function setID($id){
		parent::setID($id);
	}
	
	function getID(){
		return parent::getID();
	}
	
	function getUsername(){
		return parent::getUsername();	
	}
	
	function getPassword(){
		return parent::getPassword();
	}
	
	function getFname(){
		return parent::getFname();
	}
	
	function getLname(){
		return parent::getLname();
	}
	
	function getAge(){
		return parent::getAge();
	}
	
	function getAddress(){
		return parent::getAddress();
	}
	
	function getPhone(){
		return parent::getPhone();
	}
	
	function getEmail(){
		return parent::getEmail();
	}
	
	function getDepartment(){
		return $this->department;
	}

	
	
	function addteacher($info , $info2) {
		
		parent::usersinfo($info);
		$photoUrl = $info['photoUrl'];
		
		$this->department =  $info2['department'];
		
		$sql = "SELECT * FROM users WHERE username = '{$this->getUsername()}'";
		$r = $this->db->check($sql);
		if($r == 0)
		{
		$sql1 = "INSERT INTO teacher (id,department) VALUES ('','{$this->getDepartment()}')";
			$this->db->insert($sql1);
			
			$pr_u_tablename = 'teacher';
			$this->setID($this->db->getLastRecordData($pr_u_tablename)['id']);
/*			
			$sql2 = "SELECT * FROM teacher ORDER BY id DESC LIMIT 1";
			$row = $this->db->select($sql2);
			$this->id = $row['id'];
*/			//echo $photoUrl;
			if($info['photoUrl']  == '../uploads/stdimg/')
			{
				$sql3 = "INSERT INTO users (id,type,username,password,fname,lname,phone,address,email,age,photoUrl) VALUES ('{$this->getID()}','$this->type','{$this->getUsername()}','{$this->getPassword()}','{$this->getFname()}','{$this->getLname()}','{$this->getPhone()}','{$this->getAddress()}','{$this->getEmail()}','{$this->getAge()}' ,'../uploads/stdimg/download.png')";
				$this->db->insert($sql3);
			}
			else
			{
				$sql3 = "INSERT INTO users (id,type,username,password,fname,lname,phone,address,email,age,photoUrl) VALUES ('{$this->getID()}','$this->type','{$this->getUsername()}','{$this->getPassword()}','{$this->getFname()}','{$this->getLname()}','{$this->getPhone()}','{$this->getAddress()}','{$this->getEmail()}','{$this->getAge()}' ,'{$info['photoUrl']}')";
				$this->db->insert($sql3);
			}
			
			
			$this->db->close();	
			
			return true;
		}
		
		
		$this->db->close();	
		
		return false;
	}

	
	
	
	function deleteteacher($username) {
		
		
		$username1 = $username;
		
		$t_sql = "SELECT * FROM users WHERE username = '$username1' AND type ='$this->type'";
		$r = $this->db->check($t_sql);
		if($r == 1)
		{
		$sql = "SELECT * FROM users WHERE username ='$username1' AND type ='$this->type'";
		$row = $this->db->select($sql);
		
		$this->setID($row['id']);
		//$this->id = $row['id'];
				
		
		$sql1="DELETE FROM users WHERE id ='{$this->getID()}' AND type ='$this->type'";
		$this->db->delete($sql1);
		
		$sql2="DELETE FROM teacher WHERE id ='{$this->getID()}'";
		$this->db->delete($sql2);
	
		return true;
		}
		return false;
	}


	function displayteacherdata($username) {
		
			$t_sql = "SELECT * FROM users WHERE username = '$username' AND type ='teacher'";
			$r = $this->db->check($t_sql);
			if($r == 1)
			{
				$sql = "SELECT * FROM users
						INNER JOIN teacher
						ON users.id = teacher.id
						WHERE username ='$username' AND type ='teacher'";
						
						
				$row = $this->db->select($sql);
				return $row;
				
			
				
				
				
			}
			return false;
		}
		
		
	function updateteacher($t_info){
		
		parent::usersinfo($t_info);
		
		$this->department =  $t_info['department'];
		
		$this->setID($t_info['id']);
		
		$photoUrl = $t_info['photoUrl'];
		$photoUrl1 = $t_info['photoUrl1'];
		session_start();
		
		
		
				
		if($t_info['photoUrl1']  == '../uploads/stdimg/')
			{				
				$sql = "UPDATE users
						SET id='{$this->getID()}' ,type='teacher', username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}' , photoUrl='{$t_info['photoUrl']}'
						WHERE users.id = '{$this->getID()}' AND type ='teacher'";
						
						$this->db->update($sql);
						$_SESSION['photoUrl']= $photoUrl;
						
			}
		else
			{
				$sql = "UPDATE users
						SET id='{$this->getID()}' ,type='teacher', username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}' , photoUrl='{$t_info['photoUrl1']}'
						WHERE users.id = '{$this->getID()}' AND type ='teacher'";
						
						$this->db->update($sql);
						$_SESSION['photoUrl']= $photoUrl1;
						


			}
		$sql1 = "UPDATE teacher
				 SET id='{$this->getID()}' , department='{$this->getDepartment()}'
				 WHERE id = '{$this->getID()}'";

				$this->db->update($sql1);
			
				
		$_SESSION['id'] = $t_info['id'];
        $_SESSION['username']=$t_info['username'];
        $_SESSION['fname'] = $t_info['fname'];
        $_SESSION['lname'] = $t_info['lname'];
        $_SESSION['phone'] = $t_info['phone'];
        $_SESSION['address'] = $t_info['address'];
		$_SESSION['email'] = $t_info['email'];
		$_SESSION['age'] = $t_info['age'];
		
						
			return true;
		
	}
	


	function updateteacher1($t_info){
		
		parent::usersinfo($t_info);
		
		$this->department =  $t_info['department'];
		
		$this->setID($t_info['id']);
		
		$photoUrl = $t_info['photoUrl'];
		$photoUrl1 = $t_info['photoUrl1'];
		//session_start();
		
		
		
				
		if($t_info['photoUrl1']  == '../uploads/stdimg/')
			{				
				$sql = "UPDATE users
						SET id='{$this->getID()}' ,type='teacher', username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}' , photoUrl='{$t_info['photoUrl']}'
						WHERE users.id = '{$this->getID()}' AND type ='teacher'";
						
						$this->db->update($sql);
						
			}
		else
			{
				$sql = "UPDATE users
						SET id='{$this->getID()}' ,type='teacher', username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}' , photoUrl='{$t_info['photoUrl1']}'
						WHERE users.id = '{$this->getID()}' AND type ='teacher'";
						
						$this->db->update($sql);
						


			}
		$sql1 = "UPDATE teacher
				 SET id='{$this->getID()}' , department='{$this->getDepartment()}'
				 WHERE id = '{$this->getID()}'";

				$this->db->update($sql1);
			
		
		
						
			return true;
		
	}
	

	
	function getAllData($t_id) {

        $sql = "SELECT * FROM course 				
				WHERE teacher_id ='$t_id' ORDER BY course.id  ";
		
		$row = $this->db->display($sql);
		
		return $row;
        
	}
	
	
	

}





















?>