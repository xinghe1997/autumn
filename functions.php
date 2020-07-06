<?php
function getUser(){
	#获取用户信息
	 session_start();
	if(empty($_SESSION['user_id'])){
		echo 'dsad';
		header('Location:/autumn/admin/login.php');
	}else{
		return $_SESSION['user_id'];
	}
	
};
#建立连接
function getConnect(){
	$conn = new mysqli(X_DB_HOST,X_DB_USER,X_DB_PASS,X_DB_NAME);
	if(!$conn){
		return;
	}
	if(!$conn->set_charset('utf8')){
		return;
	}
	return $conn;
}
#查询数据
function selectDatas($sql){
	$conn = getConnect();
	$query = $conn->query($sql);
	if(!$query){
		return;
	}
	$rows = [];
	while($row = $query->fetch_assoc()){
		$rows[] = $row;
	}
	
	return $rows;
}
#单条查询
function selectOneData($sql){
	$rows = selectDatas($sql);
	return $rows[0];
}
function executeds($sql){
	$conn = getConnect();
	$query = $conn->query($sql);
	if(!$query){
		return false;
	}
	$row = $conn->affected_rows;
	return $row;
}
?>