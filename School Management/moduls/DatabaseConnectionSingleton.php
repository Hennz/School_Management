<?php 

class Singleton {
	
	private static  $uniqueinstance = null;
	
	//private Singleton();
	private function __construct()
	{}
	
	public static function getinstance()
	{
		if(@$uniqueinstance == null)
		{
			$uniqueinstance =  new mysqli('localhost', 'root', '', 'school_database');
		}
		return $uniqueinstance;
	}
	
}



















?>