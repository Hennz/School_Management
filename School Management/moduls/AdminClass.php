<?php 

include'UsersClass.php';


class admin extends users {
		
		private $db;
	
	function __construct() {       
        include_once'DatabaseClass.php';		
		$this->db = new database();
    }
	
	/*function addnewteacher($info, $info2) {
		
		include'TeacherClass.php';
		$teachers = new teacher();
		
		if($teachers->addteacher($info, $info2))
		{
			return true;

		}
		else
		{
			return false;

		}
		
	}*/
	
	/*function deletenewteacher($username) {
		
		include'TeacherClass.php';
		$teachers = new teacher();
		
		if($teachers->deleteteacher($username) == true)
		{
			return true;
		}
		else
		{
			return false;
			
		}
		
	}*/
	
	function getAllData() {

        $sql = "SELECT * FROM student_course_unreg
				INNER JOIN users
				ON student_course_unreg.st_id = users.id 
				INNER JOIN course
				ON student_course_unreg.course_id = course.id
				WHERE type ='student' ORDER BY st_id  ";
		
		$row = $this->db->display($sql);
		
		return $row;
        
	}
	
	
	function getAllDataForDrop() {

        $sql = "SELECT * FROM student_course_unregdrop
				INNER JOIN users
				ON student_course_unregdrop.st_id = users.id 
				INNER JOIN course
				ON student_course_unregdrop.course_id = course.id
				WHERE type ='student' ORDER BY st_id  ";
		
		$row = $this->db->display($sql);
		
		return $row;
        
	}
	
	
	function getAllStudentData() {

        
			
			
			$s_sql = "SELECT * FROM student_unregistered";
			$r = $this->db->display($s_sql);
			//$p_id = $r['parent_id'];
							
			
			return $r;
				
			
				
				
		
		}
		
		function getAllParentData($username) {
		{
			$s_sql = "SELECT * FROM student_unregistered WHERE id = '$username'";
			$r = $this->db->select($s_sql);
			$p_id = $r['parent_id'];
			
			$p_sql = "SELECT * FROM parent_unregistered WHERE id ='$p_id'";
			$row = $this->db->select($p_sql);
			
						
			
			return $row;
				
			
			
		
		}
		
        
	}
	
	
	/*function AcceptSelectedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		$sql = "INSERT INTO student_course (st_id,course_id) VALUES ('$student_id','$course_id')";
		$this->db->insert($sql);	
		
		$sql1="DELETE FROM student_course_unreg WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql1);

		return true;
		
	}*/
	
	/*function RefuseSelectedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		//$sql = "INSERT INTO student_course (st_id,course_id) VALUES ('$student_id','$course_id')";
		//$this->db->insert($sql);	
		
		$sql1="DELETE FROM student_course_unreg WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql1);

		return true;
		
	}*/
	
	function AcceptStudentParentCourses($st_id)
	{
			$s_sql = "SELECT * FROM student_unregistered WHERE id = '$st_id'";
			$r = $this->db->select($s_sql);
			$p_id = $r['parent_id'];
			
			$p_sql = "SELECT * FROM parent_unregistered WHERE id ='$p_id'";
			$row = $this->db->select($p_sql);
			
			$p_sql1 = "INSERT INTO parent (id,occupation) VALUES ('','{$row['occupation']}')";				
			$this->db->insert($p_sql1);
			
			$pr_u_tablename = 'parent';
			$parent_id = $this->db->getLastRecordData($pr_u_tablename)['id'];
			
			$p_sql2 = "INSERT INTO users (id,type,username,password,fname,lname,phone,address,email,age,photoUrl) VALUES ('$parent_id','parent','{$row['username']}','{$row['password']}','{$row['fname']}','{$row['lname']}','{$row['phone']}','{$row['address']}','{$row['email']}','{$row['age']}','{$row['photoUrl']}')";
			$this->db->insert($p_sql2);
			
			//
			$s_sql1 = "INSERT INTO student (id,level,parent_id) VALUES ('','{$r['level']}' , '$parent_id')";				
			$this->db->insert($s_sql1);
			
			$pr_u_tablename = 'student';
			$student_id = $this->db->getLastRecordData($pr_u_tablename)['id'];
			
			$s_sql2 = "INSERT INTO users (id,type,username,password,fname,lname,phone,address,email,age,photoUrl) VALUES ('$student_id','student','{$r['username']}','{$r['password']}','{$r['fname']}','{$r['lname']}','{$r['phone']}','{$r['address']}','{$r['email']}','{$r['age']}','{$r['photoUrl']}')";
			$this->db->insert($s_sql2);
			
			//
			$p_sql3="DELETE FROM parent_unregistered WHERE id ='$p_id'";
			$this->db->delete($p_sql3);
			
			$s_sql3="DELETE FROM student_unregistered WHERE id ='$st_id'";
			$this->db->delete($s_sql3);
			
			return true;

					
	}
	
	function RefuseStudentParentCourses($st_id)
	{
		$s_sql = "SELECT * FROM student_unregistered WHERE id = '$st_id'";
			$r = $this->db->select($s_sql);
			$p_id = $r['parent_id'];
			
		$p_sql3="DELETE FROM parent_unregistered WHERE id ='$p_id'";
			$this->db->delete($p_sql3);
			
		$s_sql3="DELETE FROM student_unregistered WHERE id ='$st_id'";
			$this->db->delete($s_sql3);
			
		return true;
	}
	
}



















?>