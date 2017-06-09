<?php
include_Once '../moduls/UsersClass.php';
class Parents extends users{
	static $occupation;	
	private $db;
	
	
	function __construct(){	
	
	
	//creating databse object and connecting to database
	include_once'DatabaseClass.php';		
	$this->db = new database();
	
	//
	//$this->occupation = $pr_info['occupation'];
	//parent::__construct($pr_info);
	//parent::usersinfo($pr_info);
	}
	
	public static function parentsinfo($pr_info)
	{
		
		self::$occupation = $pr_info;
		return $s = new self();
		
		//$s->setParent($parent);
		///return $s->addstudent($st_info);
		//return true;
	}
	
	public function p_info($pr_info)
	{
		parent::usersinfo($pr_info);
	}
	
	

	

	function setID($id){
		parent::setID($id);
	}
	
	function getOccupation(){
		return self::$occupation;
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
	
}


?>