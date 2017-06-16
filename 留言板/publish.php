<?php

require('file.php');

//若内容不全，返回首页
if( ! isset($_POST['user']) || ! isset($_POST['title']) || ! isset($_POST['content']) || $_POST['title'] == '' || $_POST['content'] == '')
{
	echo '<script>alert("发布失败,请填写全部信息");window.location.assign(".");</script>';
	exit();
}

//设置默认时区
date_default_timezone_set('PRC');

// 接收内容
$message = array(
	'user'    => ($_POST['user'] == '' ? '匿名' : $_POST['user']),
	'title'   => $_POST['title'],
	'content' => $_POST['content'],
	'time'    => time()
);

//读取留言
$msgs = read_file('msg.txt');
if($msgs === false || strlen($msgs) == 0)
{
	$msgs = array();

	$message['id'] = 0;
}
else
{
	//将字符串反序列化为数组
	$msgs = unserialize($msgs);

	if(count($msgs) > 0)
	{
		//设置留言id为当前最大id+1
		$message['id'] = $msgs[count($msgs) - 1]['id'] + 1;
	}
	else
	{
		$message['id'] = 0;
	}
}

//新增内容
$msgs[] = $message;

//序列化数组为字符串
$msgs = serialize($msgs);

//字符串写入文件
if(write_file('msg.txt', $msgs))
{
	echo '<script>alert("发布成功");window.location.assign(".");</script>';
}
else
{
	echo '<script>alert("发布失败");window.location.assign(".");</script>';
}
