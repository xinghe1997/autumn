<?php
	#获取数据库链接
	function getConnect(){
	$conn = new mysqli(X_DB_HOST,X_DB_USER,X_DB_PASS,X_DB_NAME);
	if($conn->connect_error){
		return null;
	}
	if(!$conn->set_charset('utf8')){
		return;
	}
	return $conn;
}
?>