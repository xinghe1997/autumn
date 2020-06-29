<?php
	function getConnect(){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if($conn->connect_error){
		return null;
	}
	return $conn;
}
?>