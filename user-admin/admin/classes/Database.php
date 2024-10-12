<?php

/**
 * 
 */
class Database
{
	
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "ammine", "123Php@", "ecommerceapp");
		$this->con->query("SET NAMES UTF8");
		return $this->con;
	}
}

?>