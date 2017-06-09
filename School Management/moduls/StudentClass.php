<?php
include_Once '../moduls/UsersClass.php';

interface observer
{
    //public function Update($string);
    public function AcceptnewSelectedCourses($info , $course);
	public function RefusenewSelectedCourses($info , $course);
	public function seeallnotifications($course_id);
	public function seenotifications($st_id);
	
}

class student extends users implements observer{
	static $level;	
	private $parents;
	private $db;
	private $type = 'student';
	private $check=0;
	/*function __construct($st_info){	
	//creating databse object and connecting to database
	//include '../moduls/ParentClass.php';
	include_once'DatabaseClass.php';		
	$this->db = new database("../include/connect.php");
	
	//
	$this->level = $st_info['level'];
	//include '../moduls/UsersClass.php';

	parent::usersinfo($st_info);
	}
	*/
	
	function __construct(){
	include_once'DatabaseClass.php';		
	$this->db = new database();
	
	}
	public static function delete($username)
	{
		$s = new self();
		//return $s;
		return $s->deletestudent($username);
		//return true;
	}
	
	public static function update($st_info ,$parent)
	{
		$s = new self();
		self::$level = $st_info['level'];
		$s->setParent($parent);
		return $s->updatestudent($st_info);
	}
	
	public static function registers($st_info ,$parent)
	{
		$s = new self();
		self::$level = $st_info['level'];
		$s->setParent($parent);
		return $s->register($st_info);
		//return true;
	}
	
	public static function add($st_info ,$parent)
	{
		$s = new self();
		self::$level = $st_info['level'];
		$s->setParent($parent);
		return $s->addstudent($st_info);
		//return true;
	}
	
	
	
function register($st_info){
	
	parent::usersinfo($st_info);
	//error_checking variable
	$check = 0;
	
	$photoUrl = $st_info['photoUrl'];
	$photoUrl1 = $st_info['photoUrl1'];


	
$sql = "SELECT * FROM parent_unregistered WHERE username = '{$this->parents->getUsername()}'";
$sql1 = "SELECT * FROM student_unregistered WHERE username = '{$this->getUsername()}'";

$sql2 = "SELECT * FROM users WHERE username = '{$this->parents->getUsername()}'";
$sql3 = "SELECT * FROM users WHERE username = '{$this->getUsername()}'";


		$r = $this->db->check($sql);
		$r1 = $this->db->check($sql1);
		$r2 = $this->db->check($sql2);
		$r3 = $this->db->check($sql3);

		if($r == 0  &&  $r1 == 0 &&  $r2 == 0 &&  $r3 == 0)
		{
	
	
	
				if($st_info['photoUrl1']  == '../uploads/stdimg/')
				{
					$p_sql = "INSERT INTO parent_unregistered (username,password,fname,lname,phone,address,occupation,email,age,photoUrl) VALUES ('{$this->parents->getUsername()}','{$this->parents->getPassword()}','{$this->parents->getFname()}','{$this->parents->getLname()}','{$this->parents->getPhone()}','{$this->parents->getAddress()}','{$this->parents->getOccupation()}','{$this->parents->getEmail()}','{$this->parents->getAge()}','../uploads/stdimg/download.png')";			
					if($this->db->insert($p_sql)){
						$check = 1;
					}
				}
				else
				{
					$p_sql = "INSERT INTO parent_unregistered (username,password,fname,lname,phone,address,occupation,email,age,photoUrl) VALUES ('{$this->parents->getUsername()}','{$this->parents->getPassword()}','{$this->parents->getFname()}','{$this->parents->getLname()}','{$this->parents->getPhone()}','{$this->parents->getAddress()}','{$this->parents->getOccupation()}','{$this->parents->getEmail()}','{$this->parents->getAge()}','{$st_info['photoUrl1']}')";			
					if($this->db->insert($p_sql)){
						$check = 1;
					}
				}
				
				
				//get parent generated id
				$pr_u_tablename = 'parent_unregistered';
				$this->parents->setID($this->db->getLastRecordData($pr_u_tablename)['id']);
				
				
				
				if($st_info['photoUrl']  == '../uploads/stdimg/')
				{
					$s_sql = "INSERT INTO student_unregistered (username, password, fname, lname, phone, address, level, email, age, parent_id,photoUrl) VALUES ('{$this->getUsername()}', '{$this->getPassword()}', '{$this->getFname()}','{$this->getLname()}','{$this->getPhone()}','{$this->getAddress()}','{$this->getlevel()}','{$this->getEmail()}','{$this->getAge()}','{$this->parents->getID()}','../uploads/stdimg/download.png')";
					if($this->db->insert($s_sql)){
						$check = 1;
					}
				}
				else
				{
					$s_sql = "INSERT INTO student_unregistered (username, password, fname, lname, phone, address, level, email, age, parent_id,photoUrl) VALUES ('{$this->getUsername()}', '{$this->getPassword()}', '{$this->getFname()}','{$this->getLname()}','{$this->getPhone()}','{$this->getAddress()}','{$this->getlevel()}','{$this->getEmail()}','{$this->getAge()}','{$this->parents->getID()}','{$st_info['photoUrl']}')";
					if($this->db->insert($s_sql)){
						$check = 1;
					}
				}

				//check if no errors and return true
				if($check == 1){
					return true;
				}
				return false;
		}
	return false;

}

//include '../moduls/ParentClass.php';

function setParent($parent){
	$this->parents = $parent;
}


	function setID($id){
		parent::setID($id);
	}
	
	function setUsername($username){
		parent::setUsername($username);
	}
	
	function setPassword($password){
		parent::setPassword($password);
	}
	
	function setFname($fname){
		parent::setFname($fname);
	}
	
	function setLname($lname){
		parent::setLname($lname);
	}
	
	function setPhone($phone){
		parent::setPhone($phone);
	}
	
	function setAddress($address){
		parent::setAddress($address);
	}
	
	function setEmail($email){
		parent::setEmail($email);
	}
	
	function setAge($age){
		parent::setAge($age);
	}
	
	function setLevel($level){
		self::$level = $level;
	}
	
	
	
	function getID(){
		return parent::getID();
	}
	
	function getLevel(){
		return self::$level;
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


	

	/*function Register1(){
		
		return $this->parents->getPassword();
	

	}*/
	
	
	function addstudent($st_info) {
		
		parent::usersinfo($st_info);
					
		$check = 0;

		
		$photoUrl = $st_info['photoUrl'];
		$photoUrl1 = $st_info['photoUrl1'];
	
		$sql = "SELECT * FROM users WHERE username = '{$this->parents->getUsername()}'";
		$sql1 = "SELECT * FROM users WHERE username = '{$this->getUsername()}'";

		$r = $this->db->check($sql);
		$r1 = $this->db->check($sql1);

		if($r == 0  &&  $r1 == 0)
		{
			
			
			$p_sql = "INSERT INTO parent (id,occupation) VALUES ('','{$this->parents->getOccupation()}')";				
			if($this->db->insert($p_sql)){
					$check = 1;
				}
			
			//get parent generated id
			$pr_u_tablename = 'parent';
			$this->parents->setID($this->db->getLastRecordData($pr_u_tablename)['id']);
			
			
			if($st_info['photoUrl1']  == '../uploads/stdimg/')
			{
				$p_sql1 = "INSERT INTO users (id,type,username,password,fname,lname,phone,address,email,age,photoUrl) VALUES ('{$this->parents->getID()}','parent','{$this->parents->getUsername()}','{$this->parents->getPassword()}','{$this->parents->getFname()}','{$this->parents->getLname()}','{$this->parents->getPhone()}','{$this->parents->getAddress()}','{$this->parents->getEmail()}','{$this->parents->getAge()}','../uploads/stdimg/download.png')";
				if($this->db->insert($p_sql1)){
						$check = 1;
					}
			
			}
			else
			{
				$p_sql1 = "INSERT INTO users (id,type,username,password,fname,lname,phone,address,email,age,photoUrl) VALUES ('{$this->parents->getID()}','parent','{$this->parents->getUsername()}','{$this->parents->getPassword()}','{$this->parents->getFname()}','{$this->parents->getLname()}','{$this->parents->getPhone()}','{$this->parents->getAddress()}','{$this->parents->getEmail()}','{$this->parents->getAge()}','{$st_info['photoUrl1']}')";
				if($this->db->insert($p_sql1)){
						$check = 1;
					}
			}
/*			
			$sql2 = "SELECT * FROM teacher ORDER BY id DESC LIMIT 1";
			$row = $this->db->select($sql2);
			$this->id = $row['id'];
*/			
			$s_sql = "INSERT INTO student (id,level,parent_id) VALUES ('','{$this->getLevel()}','{$this->parents->getID()}')";
			if($this->db->insert($s_sql)){
					$check = 1;
				}
				
				
			
			$pr_u_tablename = 'student';
			$this->setID($this->db->getLastRecordData($pr_u_tablename)['id']);
			
			if($st_info['photoUrl']  == '../uploads/stdimg/')
			{
				$s_sql1 = "INSERT INTO users (id,type, username, password, fname, lname, phone, address, email, age,photoUrl) VALUES ('{$this->getID()}','student','{$this->getUsername()}', '{$this->getPassword()}', '{$this->getFname()}','{$this->getLname()}','{$this->getPhone()}','{$this->getAddress()}','{$this->getEmail()}','{$this->getAge()}','../uploads/stdimg/download.png')";
				if($this->db->insert($s_sql1)){
					$check = 1;
				}
			}
			else
			{
				$s_sql1 = "INSERT INTO users (id,type, username, password, fname, lname, phone, address, email, age,photoUrl) VALUES ('{$this->getID()}','student','{$this->getUsername()}', '{$this->getPassword()}', '{$this->getFname()}','{$this->getLname()}','{$this->getPhone()}','{$this->getAddress()}','{$this->getEmail()}','{$this->getAge()}','{$st_info['photoUrl']}')";
				if($this->db->insert($s_sql1)){
					$check = 1;
				}
			}
			
			$this->db->close();	
			
			return true;
		}
		
		
		$this->db->close();	
		
		return false;
	}

	
	
	
	function deletestudent($username) {
		
		
		$s_sql = "SELECT * FROM users WHERE username = '$username' AND type ='$this->type'";
		$r = $this->db->check($s_sql);
		if($r == 1)
		{
		$sql = "SELECT * FROM users WHERE username ='$username' AND type ='$this->type'";
		$row = $this->db->select($sql);
		$this->setID($row['id']);
		//$this->id = $row['id'];
				
		
		$sql1="DELETE FROM users WHERE id ='{$this->getID()}' AND type ='$this->type'";
		$this->db->delete($sql1);
		
		
		
		$sql_id = "SELECT * FROM student WHERE id ='{$this->getID()}'";
		$row = $this->db->select($sql_id);
		$parent_id = $row['parent_id'];
		
		
		$sql2="DELETE FROM student WHERE id ='{$this->getID()}'";
		$this->db->delete($sql2);
		
		
		$sql3="DELETE FROM users WHERE id ='$parent_id' AND type ='parent'";
		$this->db->delete($sql3);
		
		$sql4="DELETE FROM parent WHERE id ='$parent_id'";
		$this->db->delete($sql4);
	
		return true;
		}
		return false;
		
	}
	
	function displaystudentdata($username) {
		if($this->check == 0)
		{
			
			
			$s_sql = "SELECT * FROM users WHERE username = '$username' AND type ='$this->type'";
			$r = $this->db->check($s_sql);
			if($r == 1)
			{
				$sql = "SELECT * FROM users
						INNER JOIN student
						ON users.id = student.id
						WHERE username ='$username' AND type ='$this->type'";
						
						
				$row = $this->db->select($sql);
				
				$this->check = 1;
				return $row;
				
			/*	$row = $this->db->select($sql);
				$this->setID($row['id']);
				$this->setUsername($row['username']);
				$this->setPassword($row['password']);
				$this->setFname($row['fname']);
				$this->setLname($row['lname']);
				$this->setPhone($row['phone']);
				$this->setAddress($row['address']);
				$this->setEmail($row['email']);
				$this->setAge($row['age']);
				$this->setLevel($row['level']);
				
				include'../views/UpdateStudentPageView.php';
				*/
				
				
				
			}
			return false;
		}
		
		if($this->check == 1)
		{
			$s_sql = "SELECT * FROM users WHERE username = '$username' AND type ='$this->type'";
			$r = $this->db->check($s_sql);
			if($r == 1)
			{
				$sql = "SELECT * FROM users
						INNER JOIN student
						ON users.id = student.id
						WHERE username ='$username' AND type ='$this->type'";
						
						
				$row = $this->db->select($sql);
				$p_id = $row['parent_id'];
				$sql1 = "SELECT * FROM users
						INNER JOIN parent
						ON users.id = parent.id
						WHERE users.id ='$p_id' AND type ='parent'";
				
				$row1 = $this->db->select($sql1);
				
				$this->check = 2;
				return $row1;
				
			}
			
			return false;
		}
		
	
	}
	
	function updatestudent($st_info)
	{
		parent::usersinfo($st_info);
		
		$photoUrl = $st_info['photoUrl'];
		$photoUrl1 = $st_info['photoUrl1'];
		$s_photoUrl = $st_info['s_photoUrl'];
		$p_photoUrl1 = $st_info['p_photoUrl'];
		
		$this->setID($st_info['id']);
		
		
				$sql = "SELECT * FROM users
						INNER JOIN student
						ON users.id = student.id
						WHERE users.id ='{$this->getID()}' AND type ='student'";	
						
				$row = $this->db->select($sql);
				
				$this->parents->setID($row['parent_id']);
		
		
		if($st_info['photoUrl1']  == '../uploads/stdimg/')
			{
				$sql = "UPDATE users
						SET id='{$this->parents->getID()}' ,type='parent', username='{$this->parents->getUsername()}' , password='{$this->parents->getPassword()}' , fname='{$this->parents->getFname()}' , lname='{$this->parents->getLname()}' , phone='{$this->parents->getPhone()}' , address='{$this->parents->getAddress()}' , email='{$this->parents->getEmail()}' , age='{$this->parents->getAge()}', photoUrl='{$st_info['p_photoUrl']}'
						WHERE users.id = '{$this->parents->getID()}' AND type ='parent'";
						
						$this->db->update($sql);
			}
			else
			{
				$sql = "UPDATE users
						SET id='{$this->parents->getID()}' ,type='parent', username='{$this->parents->getUsername()}' , password='{$this->parents->getPassword()}' , fname='{$this->parents->getFname()}' , lname='{$this->parents->getLname()}' , phone='{$this->parents->getPhone()}' , address='{$this->parents->getAddress()}' , email='{$this->parents->getEmail()}' , age='{$this->parents->getAge()}', photoUrl='{$st_info['photoUrl1']}'
						WHERE users.id = '{$this->parents->getID()}' AND type ='parent'";
						
						$this->db->update($sql);
			}
		$sql1 = "UPDATE parent
				 SET id='{$this->parents->getID()}' , occupation='{$this->parents->getOccupation()}'
				 WHERE id = '{$this->parents->getID()}'";

				$this->db->update($sql1);
				
		if($st_info['photoUrl']  == '../uploads/stdimg/')
			{
				$sql2 = "UPDATE users
						SET id='{$this->getID()}' , username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}', photoUrl='{$st_info['s_photoUrl']}'
						WHERE id = '{$this->getID()}' AND type ='student'";	

						$this->db->update($sql2);
			}
			else
			{
				$sql2 = "UPDATE users
						SET id='{$this->getID()}' , username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}', photoUrl='{$st_info['photoUrl']}'
						WHERE id = '{$this->getID()}' AND type ='student'";	

						$this->db->update($sql2);
			}
		$sql3 = "UPDATE student
				 SET id='{$this->getID()}' , level='{$this->getLevel()}' , parent_id='{$this->parents->getID()}'
				 WHERE id = '{$this->getID()}'";

				$this->db->update($sql3);
				
			return true;
		
	}
	
	function updatestudentprofile($st_info)
	{
		parent::usersinfo($st_info);
		
		$this->setID($st_info['id']);
		
		$this->setLevel($st_info['level']);
		
		$photoUrl = $st_info['photoUrl'];
		$photoUrl1 = $st_info['photoUrl1'];
		$p_id = $st_info['p_id'];
		
		session_start();

				
		if($st_info['photoUrl1']  == '../uploads/stdimg/')
			{
				$sql2 = "UPDATE users
				SET id='{$this->getID()}' , username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}' , photoUrl='{$st_info['photoUrl']}'
				WHERE id = '{$this->getID()}' AND type ='student'";	

				$this->db->update($sql2);
				$_SESSION['photoUrl']= $photoUrl;
			}
		else
			{
				$sql2 = "UPDATE users
				SET id='{$this->getID()}' , username='{$this->getUsername()}' , password='{$this->getPassword()}' , fname='{$this->getFname()}' , lname='{$this->getLname()}' , phone='{$this->getPhone()}' , address='{$this->getAddress()}' , email='{$this->getEmail()}' , age='{$this->getAge()}' , photoUrl='{$st_info['photoUrl1']}'
				WHERE id = '{$this->getID()}' AND type ='student'";	

				$this->db->update($sql2);
				$_SESSION['photoUrl']= $photoUrl1;
			}
			
			
		$sql3 = "UPDATE student
				 SET id='{$this->getID()}' , level='{$this->getLevel()}' , parent_id='$p_id'
				 WHERE id = '{$this->getID()}'";

				$this->db->update($sql3);

				
		$_SESSION['id'] = $st_info['id'];
        $_SESSION['username']=$st_info['username'];
        $_SESSION['fname'] = $st_info['fname'];
        $_SESSION['lname'] = $st_info['lname'];
        $_SESSION['phone'] = $st_info['phone'];
        $_SESSION['address'] = $st_info['address'];
		$_SESSION['email'] = $st_info['email'];
		$_SESSION['age'] = $st_info['age'];
		
						
			return true;
		
	}


	
	
	function displayunregisteredcourses($student_id) {
		
		$sql = "SELECT * FROM course
				where course.id not in(select course_id from student_course_unreg
				where st_id = '$student_id')
				AND course.id not in(select course_id from student_course
				where st_id = '$student_id')
				";
				
		$row = $this->db->display($sql);
		
		return $row;
		
	}
	
	function displayregisteredcourses($student_id) {
		
		$sql = "SELECT * FROM student_course
				where st_id = '$student_id'";
				
		$row = $this->db->display($sql);
		
		
		if(count($row) == 0)
		{
			return 0;
		}
		
		 for ($i = 0; $i <count($row); $i++) {
			
			$course_id = $row[$i]['course_id'];
	
		
			$sql1 = "SELECT * FROM course
					 where course.id not in(select course_id from student_course_unregdrop
					 where st_id = '$student_id') 
					 and course.id = '$course_id'
					 ";
			
			$check = $this->db->select($sql1); 
			if($check['id'] == $course_id)
			{
			$data[$i] = $check; 
			
			}
			else
			{
				$data[$i] = null;
			}
			
		 }
		
		return $data;
		
	}
/*	function displayregisteredcourses2($course_id) {
		
		$sql = "SELECT * FROM course
				where course.id not in(select course_id from student_course_unregdrop
				where st_id = '$student_id')
				AND course.id not in(select course_id from student_course
				where st_id = '$student_id')
				where id = '$course_id'";
				
		$row = $this->db->select($sql);
		
		return $row;
		
	}
*/	
	function studentcourses($st_id)
	{
		//echo $st_id;
		$sql = "SELECT * FROM student_course inner join course on student_course.course_id = course.id WHERE student_course.st_id = '$st_id'";
		$row = $this->db->display($sql);
		return $row;
	}

	function seenotifications($st_id)
	{
		//echo $st_id;
		$sql = "SELECT * FROM notification WHERE st_id = '$st_id' AND is_read = 0";
		$row = $this->db->display($sql);
		return $row;
	}
	
	function seeassignments($st_id)
	{
		//echo $st_id;
		$sql = "SELECT * FROM assignment WHERE st_id = '$st_id' AND is_read = 0";
		$row = $this->db->display($sql);
		return $row;
	}
	
	function seeallnotifications($course_id)
	{
		//echo $st_id;
		$sql = "SELECT * FROM notification WHERE course_id = '$course_id'";
		$row = $this->db->display($sql);
		return $row;
	}
	function seeallassignments($course_id)
	{
		//echo $st_id;
		$sql = "SELECT * FROM assignment WHERE course_id = '$course_id'";
		$row = $this->db->display($sql);
		return $row;
	}
	
	function getAllData($course_id)
	{
		//echo $course_id;
		$sql = "SELECT * FROM course WHERE id = '$course_id'";
		$row = $this->db->select($sql);
		//echo $row['course_name'];
		return $row;
	}
	
	function seennotifications($table_id)
	{
		$sql = "SELECT * FROM notification WHERE id = '$table_id'";
		$row = $this->db->select($sql);
		
		$sql1 = "UPDATE notification
				 SET id='$table_id' , course_id='{$row['course_id']}' , content='{$row['content']}' , st_id='{$row['st_id']}' , is_read = 1
				 WHERE id = '$table_id'";
		$this->db->update($sql1);
	}
	
	function seenassignments($table_id)
	{
		$sql = "SELECT * FROM assignment WHERE id = '$table_id'";
		$row = $this->db->select($sql);
		
		$sql1 = "UPDATE assignment
				 SET id='$table_id' , course_id='{$row['course_id']}' , assURL='{$row['assURL']}' , st_id='{$row['st_id']}' , is_read = 1
				 WHERE id = '$table_id'";
		$this->db->update($sql1);
	}
	
	
	function getcount($table,$id) {
		$sql = "SELECT * FROM $table where  st_id = '$id' ";
		
		$num = $this->db->check($sql);
		return $num;
	
	}
	
	function getnotifycount($id) {
		$sql = "SELECT * FROM notification where  st_id = '$id' AND is_read = 0 ";
		
		$num = $this->db->check($sql);
		return $num;
	
	}
	function getassignmentcount($id) {
		$sql = "SELECT * FROM assignment where  st_id = '$id' AND is_read = 0 ";
		
		$num = $this->db->check($sql);
		return $num;
	
	}
	
	
	
	function RegisterSelectedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		$sql = "INSERT INTO student_course_unreg (st_id,course_id) VALUES ('$student_id','$course_id')";
		$this->db->insert($sql);	

		return true;
		
	}
	
	function RegisterDropSelectedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		$sql = "INSERT INTO student_course_unregdrop (st_id,course_id) VALUES ('$student_id','$course_id')";
		$this->db->insert($sql);

		return true;
		
	}
	
	
	
	function AcceptnewSelectedCourses($info , $course)
	{
		return $course->AcceptSelectedCourses($info);
	}
	
	function RefusenewSelectedCourses($info , $course)
	{
		return $course->RefuseSelectedCourses($info);
	}
	
	function AcceptnewDropedCourses($info , $course)
	{
		return $course->AcceptDropedCourses($info);
	}
	
	function RefusenewDropedCourses($info , $course)
	{
		return $course->RefuseDropedCourses($info);
	}
	
}


?>