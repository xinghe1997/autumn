<?php
  require_once '../config.php';
  require_once XIU_DIRNAME.'/functions.php';
  #查询站点统计所有数据
  $SumWenZhang= selectOneData("select count(1) as WenZhang from posts limit 1");
  $SumZaoGao= selectOneData("select count(1) as ZaoGao from posts where status = 'drafted'");
  $SumFenLei= selectOneData("select count(1) as FenLei from categories limit 1");
  $SumPingLun= selectOneData("select count(1) as PingLun from comments limit 1");
  $SumDBpinglun= selectOneData("select count(1) as DBpinglun from comments where status = 'held'");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
	
  <div class="main">

    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
        <p><a class="btn btn-primary btn-lg" href="post-add.php" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo $SumWenZhang['WenZhang']?></strong>篇文章（<strong><?php echo $SumZaoGao['ZaoGao']?></strong>篇草稿）</li>
              <li class="list-group-item"><strong><?php echo $SumFenLei['FenLei']?></strong>个分类</li>
              <li class="list-group-item"><strong><?php echo $SumPingLun['PingLun']?></strong>条评论（<strong><?php echo $SumDBpinglun['DBpinglun']?></strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
<?php $current_page = 'dashboard'; ?>
<?php include 'inc/sidebar.php'; ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
