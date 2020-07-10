<?php
	require_once '../config.php';
	require_once XIU_DIRNAME.'/functions.php';
	#接收删除页面返回的值，非空需报错
  if(!empty($_GET['error'])){
		$GLOBALS['error'] = '删除失败'; 
	}
  #判断post请求为添加
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		insertData();
	}
	#查询数据
	$cateGoriess = selectDatas("select * from `categories`");
	#添加数据
	function insertData(){
		if(empty($_POST['slug']) || empty($_POST['name'])){
			$GLOBALS['error'] = '输入有误';
			return;
		}
		$slug = $_POST['slug'];
		$name = $_POST['name'];
		if($slug == ' ' || $name == ' '){
			$GLOBALS['error'] = '空数据';
			return;
		}
		$sql = "insert into `categories`(slug,name) values ('{$slug}','{$name}')";
		$result = executeds($sql);
		if(!$result > 0){
			$GLOBALS['error'] = '数据已存在';
			return;
		}else{
			$GLOBALS['correct'] = '添加成功';
		}
	}

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static
/
assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static
/
assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static
/
assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static
/
assets/css/admin.css">
  <script src="../static
/
assets/vendors/nprogress/nprogress.js"></script>
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
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
    <?php if(!empty($GLOBALS['error'])):?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $GLOBALS['error'];?>
      </div>
  	<?php elseif(!empty($GLOBALS['correct'])):?>
  	  <div class="alert alert-success">
        <strong></strong><?php echo $GLOBALS['correct'];?>
      </div>
    <?php endif?>
      <div class="row">
        <div class="col-md-4">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">添加</button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a id="delects" class="btn btn-danger btn-sm" href="categories-delect.php" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
          <tbody>
			     <?php foreach($cateGoriess as $val):?>
				<tr>
				<td class="text-center"><input type="checkbox" data-id="<?php echo $val['id']?>" class="xuanze"></td>
				<td><?php echo $val['name']?></td>
				<td><?php echo $val['slug']?></td>
				<td class="text-center">
					<a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
					<a href="categories-delect.php?id=<?php echo $val['id']?>" class="btn btn-danger btn-xs">删除</a>
				</td>
				</tr>
             <?php endforeach?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include 'inc/sidebar.php';?>
  
  <script src="../static
/
assets/vendors/jquery/jquery.js"></script>
  <script src="../static
/
assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
<!-- 批量删除 -->
<script>
  $(function($){
  	/**
	var xuanze = $(".xuanze");
  	var delects = $('#delects');
  	var ids = [];
  	xuanze.on('click',function(){
  		var bool = false;
  		xuanze.each(function(){
  			if($(this).prop('checked')){
  				bool = true;
  			}
  		});
  		bool ? delects.css('display','') : delects.css('display','none');
  	});
  	*/
  	var xuanze = $('.xuanze');
  	var delects = $('#delects');
  	var ids = [];
  	xuanze.on('click',function(){
  		var id = $(this).data('id');
  		if($(this).prop('checked')){
	  		ids.push(id);
  		}else{
  			ids.splice(ids.indexOf(id),1);
  		}
  	

  		
  		ids.length ? delects.css('display','') : delects.css('display','none');
  		delects.prop('search','?id='+ids);
  		console.log(ids);
  	});

  });
</script>
</body>
</html>
