<?php 
@session_start();
if(isset($_GET['submit']))
{
	include_once'../moduls/StudentClass.php';

	$student = new student();
	
	$courses = $student->studentcourses($_SESSION['id']);
	
	$count = $student->getnotifycount($_SESSION['id']);
	//echo $count;
	$count1 = $student->getassignmentcount($_SESSION['id']);

	$notify = $student->seenotifications($_SESSION['id']);
	$notify1 = $student->seeassignments($_SESSION['id']);

	
	include'../views/NotificationsPageView.php';
	
	
}






















?>