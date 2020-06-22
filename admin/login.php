<?php
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
    inspectUser();
    
  }
function inspectUser(){
	require_once '../config.php';
    if(empty($_POST['email'])){
      echo 'ds';
      $GLOBALS['error'] = 'email不能为空';
      return;
    }
    if(empty($_POST['password'])){
      $GLOBALS['error'] = 'password不能为空';
      return;
    }
    #非空后判断用户密码是否正确
    $email = $_POST['email'];
    $password = $_POST['password'];
    #连接数据库
    $conn = getConnect();
	if($conn == null){
		 $GLOBALS['error'] = '数据库连接失败';
		 return;
	}
	$sql = "select * from `users` where `email` = '{$email}' limit 1";
	$query = $conn->query($sql);
	if(!isset($query->num_rows)){
		$GLOBALS['error'] = '用户名不存在';
		return;
	}
	$result = $query->fetch_assoc();
    if($email != $result['email']){
        $GLOBALS['error'] = 'email不正确';
        return ;
    }
    if(md5($password) != $result['password']){
      $GLOBALS['error'] = 'password不正确';
      return;
    }
	session_start();
	$_SESSION['user_id'] = $result;
	mysqli_free_result($query);
	mysqli_close($conn);
    header('Location:/autumn/admin/');
}
function getConnect(){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if($conn->connect_error){
		return null;
	}
	return $conn;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../static
/
assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static
/
assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" novalidate>
      <img class="avatar" src="../static
/
assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <?php if(isset($GLOBALS['error'])):?>
      <div class="alert alert-danger">
        <strong><?php echo $GLOBALS['error']?></strong>
      </div>
    <?php endif?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input name="email" id="email" type="email" class="form-control" placeholder="邮箱" value="<?php echo isset($_POST['email'])? $_POST['email']:'';?>">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input name="password" id="password" type="password" class="form-control" placeholder="密码">
      </div>
      <input type="submit" class="btn btn-primary btn-block"></input>
    </form>
  </div>
</body>
</html>
