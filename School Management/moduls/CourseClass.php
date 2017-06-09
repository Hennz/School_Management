<?php 

interface subject
{
	public function AcceptSelectedCourses($info);
	public function RefuseSelectedCourses($info);
	public function sendcoursenews($info);
	
}

class course implements subject{

		private $db;
		private $id;
		private $course_name;
		private $course_code;
		private $description;
		private $hours;
		private $teacher_username;
		private $teacher_id;
		
	
	function __construct() {       
        include_once'DatabaseClass.php';		
		$this->db = new database();
    }
	
	public function addcourse($info) {       
        $this->id = "";
		
		$this->course_name = $info['course_name'];
		$this->course_code = $info['course_code'];
		$this->description = $info['description'];
		$this->hours = $info['hours'];
		$this->teacher_username = $info['teacher_username'];
		
		$sql = "SELECT * FROM users WHERE username = '$this->teacher_username' AND type ='teacher'";
		$r = $this->db->check($sql);
		if($r == 1)
		{
			
			$sql1 = "SELECT * FROM users WHERE username ='$this->teacher_username' AND type ='teacher'";
			$row = $this->db->select($sql1);
			$this->teacher_id = $row['id'];
			
			$sql2 = "INSERT INTO course (id,course_name,course_code,description,hours,teacher_id) VALUES ('','$this->course_name','$this->course_code','$this->description','$this->hours','$this->teacher_id')";
			$this->db->insert($sql2);
			
			return true;
		}
		return false;
		
    }


	public function sendcoursenews($info)
	{
		$id = $info['course_id'];
	//	$teacher_id = $info['taecher_id'];
		$content = $info['content'];
		
		$sql1 = "SELECT * FROM student_course WHERE course_id ='$id'";
		$row = $this->db->display($sql1);
		
		for ($i = 0; $i <count($row); $i++) {
			$st_id = $row[$i]['st_id'];
			$sql = "INSERT INTO notification (id,course_id,content,st_id,is_read) VALUES ('','$id','$content','$st_id',0)";
			$this->db->insert($sql);
		}
		
		return true;

	}
	
	public function sendcourseassignment($info)
	{
		$id = $info['course_id'];
	//	$teacher_id = $info['taecher_id'];
		$assURL = $info['assURL'];
		
		$sql1 = "SELECT * FROM student_course WHERE course_id ='$id'";
		$row = $this->db->display($sql1);
		
		for ($i = 0; $i <count($row); $i++) {
			$st_id = $row[$i]['st_id'];
			$sql = "INSERT INTO assignment (id,course_id,assURL,st_id,is_read) VALUES ('','$id','$assURL','$st_id',0)";
			$this->db->insert($sql);
		}
		
		return true;

	}
	
	function AcceptSelectedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		$sql = "INSERT INTO student_course (st_id,course_id) VALUES ('$student_id','$course_id')";
		$this->db->insert($sql);	
		
		$sql1="DELETE FROM student_course_unreg WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql1);

		return true;
		
	}
	
	function AcceptDropedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		$sql = "DELETE FROM student_course WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql);	
		
		$sql1="DELETE FROM student_course_unregdrop WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql1);

		return true;
		
	}
	
	
	
	function RefuseSelectedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		/*$sql = "INSERT INTO student_course (st_id,course_id) VALUES ('$student_id','$course_id')";
		$this->db->insert($sql);	*/
		
		$sql1="DELETE FROM student_course_unreg WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql1);

		return true;
		
	}
	
	
	
	function RefuseDropedCourses($info){
		
		$student_id = $info['st_id'];
		$course_id = $info['course_id'];
		
		/*$sql = "INSERT INTO student_course (st_id,course_id) VALUES ('$student_id','$course_id')";
		$this->db->insert($sql);	*/
		
		$sql1="DELETE FROM student_course_unregdrop WHERE st_id ='$student_id' AND course_id ='$course_id'";
		$this->db->delete($sql1);

		return true;
		
	}
}

























?>