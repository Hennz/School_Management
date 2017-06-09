<?php

class upload {
	
	private $db;
    private $allowedExts;
    private $maxSize;
    private $destination;
    private $file;
    private $fileUrl;

    function __construct($file, $allowedExts, $maxSize, $destination) {
       // session_start();
        if (is_array($allowedExts) AND is_int($maxSize)) {
            $this->file = $file;
            $this->allowedExts = $allowedExts;
            $this->maxSize = $maxSize;

            $this->destination = $destination;
        } else {
            throw new Exception("the allowed extension must be array and max size interger");
        }
		include_once'DatabaseClass.php';		
		$this->db = new database();
    }

    function uploadFile() {

        $allowedExts = $this->allowedExts;
        $maxSize = $this->maxSize;
        $dest = $this->destination;
        $file = $this->file;
        for ($i = 0; $i < count($_FILES["files"]["name"]); $i++) {
            $filename = $_FILES['files']['name'][$i];
            $fileext = strtolower(end(explode(".", $filename)));
            $filesize = $_FILES['files']['size'][$i];
            $tempname = $_FILES['files']['tmp_name'][$i];
            $this->fileUrl = $destination = $dest . $filename;
            if (in_array($fileext, $allowedExts)) {

                move_uploaded_file($tempname, $destination);
            }
       /*     
            $assURL=$this->fileUrl;
            $sql="INSERT INTO `assignments`(`assId`, `assURL`, `courseCode`, `date`) VALUES ('','$assURL','$courseCode','')";
            */
        }
    }

    function updateimg($f) {
        $allowedExts = $this->allowedExts;
        $maxSize = $this->maxSize;
        $dest = $this->destination;
        $file = $this->file;
        @$filename = $_FILES[$f]['name'];
		//echo $filename;
		//echo 'yes';		
        @$fileext = strtolower(end(explode(".", $filename)));
        @$filesize = $_FILES[$f]['size'];
        @$tempname = $_FILES[$f]['tmp_name'];
        $this->fileUrl = $destination = $dest ./* date("d-m-Y") . "_" . rand(0, 10) .*/ $filename;
        if (in_array($fileext, $allowedExts)) {

            move_uploaded_file($tempname, $destination);
            //unlink the old photo
        }
   /*     $id = 1;
        $sql = "UPDATE `student` SET `photoUrl`='$this->fileUrl' WHERE `stId`= $id "; */
        //to connect with db
  /*      $host = "localhost";
        $user = "root";
        $password = "";
        $database = "shool";

        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) {
            die("connection failed" . $conn->connect_error);
        }
        if ($result = $conn->query($sql)) {
            return true;
        } else {
            echo 'error:' . $conn->error . $sql;
        }
		*/
		
		return $this->fileUrl;
    }

    function getFileUrl() {
        return $this->fileUrl;
    }

}
?>

