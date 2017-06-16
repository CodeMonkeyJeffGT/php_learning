<?php

include('file.php');

//存储留言信息
$message = array();

//若不存在id，返回首页
if( ! isset($_GET['id']))
{
	header('location:index.php');
}

//接收留言id
$id = $_GET['id'];

//读取留言
$msgs = read_file('msg.txt');
if($msgs === false || strlen($msgs) == 0)
{
	exit('存储文件损坏');
}

//将留言反序列化为数组
$msgs = unserialize($msgs);
//将特殊字符转化为html实体
$msgs = html_escape($msgs);

//用于判断内容是否存在
$is_exist = false;

//寻找该内容
foreach ($msgs as $key => $value) {
	//找到内容 存储
	if($value['id'] == $id)
	{
		$message = $value;
		$is_exist = true;
	}
}

if( ! $is_exist)
{
	echo '<script>alert("修改失败，留言不存在");window.location.assign(".");</script>';
}

function html_escape($var)
{
	if(is_array($var))
	{
		foreach ($var as &$value) {
			$value = html_escape($value);
		}
	}
	else
	{
		$var = htmlspecialchars($var);
	}
	return $var;
}

?><!DOCTYPE html>
<html>
<head>
	<title>留言板</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h3>
					留言板 <small> o O</small>
				</h3>
			</div>
			<form role="form" style="width: 100%" action="change.php" method="post">
			id:<?=$message['id']?>
				<input type="hidden" name="id" value="<?=$message['id']?>">
				<div class="form-group">
					 <label for="exampleInputEmail1">用户名</label><input type="text" class="form-control" id="exampleInputEmail1" name="user" value="<?=$message['user']?>" />
				</div>
				<div class="form-group">
					 <label for="exampleInputPassword1">标题：</label><input type="text" class="form-control" id="exampleInputPassword1" name="title" value="<?=$message['title']?>"/>
				</div>
				<div class="form-group" style="width: 100%">
					<label for="exampleInputPassword2" style="width: 100%">内容：<textarea class="form-control" style='width: 100%' id="exampleInputPassword2" name="content"><?=$message['content']?></textarea>
				</div>
				<button type="submit" class="btn btn-default" name="publish">修改</button>
			</form>
			
			<div id="footer" style="text-align: center;">
				<hr>
				<div class="footerNav">
					 <a rel="nofollow" href="#">关于我们</a> | <a rel="nofollow" href="#">服务条款</a> | <a rel="nofollow" href="#">免责声明</a> | <a rel="nofollow" href="#">网站地图</a> | <a rel="nofollow" href="#">联系我们</a>
				</div>
				<div class="copyRight">
					Copyright ©2017-2017 留言板 版权所有
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>