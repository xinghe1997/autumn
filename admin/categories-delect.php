<?php
#如果传过来的不是数字,就返回error=1,报错
#传递过来的数据无误进行删除
require_once '../config.php';
require_once XIU_DIRNAME.'/functions.php';
isInt();
header("Location:categories.php");
function isInt(){
	$a = $_GET['id'];
	$arrId = explode(',',$a);
	
	#检验合法性
	foreach($arrId as $id){
	if(!preg_match("/^-?[1-9]\d*$/", $id)){
		header("Location:categories.php?error=1");
		exit();
	}
	}
	$ids = implode(',',$arrId);
	$sql = "delete from categories where id in({$ids})";
	
	executeds($sql);
}

/**

if(empty((int)$_GET['id'])){
	#非正确数据返回报错
	header("Location:/autumn/admin/categories.php?error=1");
	exit();
}else{
	$id = (int)$_GET['id'];
	$sql = "delete from categories where id in ({$id})";
	executeds($sql);
	header("Location:/autumn/admin/categories.php");
}
*/
