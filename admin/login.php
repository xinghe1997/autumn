<?php
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
    inspectUser();
  }
function inspectUser(){
    if(empty($_POST['email'])){
      echo 'ds';
      $GLOBALS['error'] = 'email不能为空';
      return;
    }
    if(empty($_POST['password'])){
      echo 'ds';
      $GLOBALS['error'] = 'password不能为空';
      return;
    }
    if($_POST['email'] != 'admin'){
        $GLOBALS['error'] = 'email不正确';
        return ;
    }
    if($_POST['password'] != 'root'){
      $GLOBALS['error'] = 'password不正确';
      return;
    }
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
    <form class="login-wrap" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
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
        <input name="email" id="email" type="email" class="form-control" placeholder="邮箱" >
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
