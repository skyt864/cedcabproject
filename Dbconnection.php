<?php

class DbConnection
{
public $hostname;
public $username;
public $password;
public $dbname;
public $conn;

/**
* Constructor function
*/
function __construct()
{
	$this-> conn = new mysqli('localhost', 'root', '', 'Customer');

	if ($this-> conn-> connect_error) {
	die("Connection failed: " . $this-> conn-> connect_error);
	} else {
	// echo
	}
}
}
// $conn= new DbConnection();
?>