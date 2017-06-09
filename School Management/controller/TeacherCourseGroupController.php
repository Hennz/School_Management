<?php

	include_once'../moduls/StudentClass.php';

if(isset($_GET['go']))
{
	$info['course_id'] = $_GET['id'];
	$info['course_name'] = $_GET['course_name'];
	$info['course_code'] = $_GET['course_code'];
	$info['description'] = $_GET['description'];
	$info['hours'] = $_GET['hours'];
	
	$student = new student();
	$row = $student->seeallnotifications($info['course_id']);
	$row1 = $student->seeallassignments($info['course_id']);

	
	include'../views/CoursePageView.php';
	
}

if(isset($_GET['submit']))
{
	$table_id = $_GET['id'];
	$course_id = $_GET['course_id'];
	$st_id = $_GET['st_id'];
	echo $course_id;
	echo $table_id;
	echo $st_id;
	$student = new student();
	$info = $student->getAllData($course_id);
	
	/*
	$info['course_id'] = $_GET['id'];
	$info['course_name'] = $_GET['course_name'];
	$info['course_code'] = $_GET['course_code'];
	$info['description'] = $_GET['description'];
	$info['hours'] = $_GET['hours'];
	*/
	
	$student->seennotifications($table_id);
	$student->seenassignments($table_id);
	
	//$student = new student();
	$row = $student->seeallnotifications($course_id);
	$row1 = $student->seeallassignments($course_id);
	
	include'../views/CoursePageView.php';
	
}


?>