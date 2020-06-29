<?php
	$email = $_GET['email'];
	require_once '../inc/getConnect.php';
	require_once '../../config.php';
	$conn = getConnect();
	$sql = "select avatar from `users` where email = '{$email}' limit 1 ";
	$query = $conn->query($sql);
	if(!$query){
		exit();
	}
	$result = $query->fetch_assoc();
	mysqli_free_result($query);
	mysqli_close($conn);
	if(empty($result['avatar'])){
		exit();
	}else{
		echo $result['avatar'];
	}
?>