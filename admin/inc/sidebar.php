<?php
	 
      require_once '../config.php';
      require_once XIU_DIRNAME.'/functions.php';
      $str = $_SERVER['PHP_SELF'];
      $arrStr = explode('/',$str);
      $cssName = rtrim($arrStr[3],'.php');
      #定义文章子节点名字
      $wenzhangSon = ['posts','post-add','categories'];
      $shezhiSon = ['nav-menus','slides','settings'];
    	if(empty($current_page)){
    		$current_page='';
    	};
      #获取用户信息
      $user = getUser();
      
?>
<div class="aside">
  
    <div class="profile">
      <img class="avatar" id='avatar' src="<?php echo $user['avatar']?>">
      <h3 class="name"><?php echo $user['nickname']?></h3>
    </div>
    <ul class="nav">
     <li<?php echo $current_page == 'dashboard' ? ' class="active"' : ''; ?>>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>

    <li <?php echo in_array($cssName,$wenzhangSon)? 'class="active"' : ''; ?>>
		<a href="#menu-posts" data-toggle="collapse">
            <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
          </a>
          <ul id="menu-posts" class="collapse <?php echo in_array($cssName, $wenzhangSon)? ' in' : ''; ?>">
            <li class="<?php echo $cssName=='posts'? 'active':'';?>"><a href="posts.php">所有文章</a></li>
            <li class="<?php echo $cssName=='post-add'? 'active':'';?>"><a href="post-add.php">写文章</a></li>
            <li class="<?php echo $cssName=='categories'? 'active':'';?>"><a href="categories.php">分类目录</a></li>
          </ul>
        </li>
 
		  <li class="<?php echo $cssName=='comments'? 'active':''?>" >
			<a href="comments.php"><i class="fa fa-comments"></i>评论</a>
		  </li>
		  <li class="<?php echo $cssName=='users'? 'active':''?>">
			<a href="users.php"><i class="fa fa-users"></i>用户</a>
		  </li>
	 
		  <li <?php echo in_array($cssName,$shezhiSon)? 'class="active"' : ''; ?>>
			<a href="#menu-settings" class="collapsed" data-toggle="collapse">
			  <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
			</a>
			<ul id="menu-settings" class="collapse<?php echo in_array($cssName, $shezhiSon)? ' in' : ''; ?>">
			  <li <?php echo $cssName == 'nav-menus' ? ' class="active"' : ''; ?>><a href="nav-menus.php" >导航菜单</a></li>
			  <li <?php echo $cssName == 'slides' ? ' class="active"' : ''; ?>><a href="slides.php" >图片轮播</a></li>
			  <li <?php echo $cssName == 'settings' ? ' class="active"' : ''; ?>><a href="settings.php" >网站设置</a></li>
			</ul>
		  </li>

 
  </div>