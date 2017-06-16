<?php

require('file.php');

//若内容不全，返回首页
if( ! isset($_POST['id']) || ! isset($_POST['user']) || ! isset($_POST['title']) || ! isset($_POST['content']))
{
	echo '<script>alert("修改失败，信息不全");window.location.assign(".");</script>';
	exit();
}

//设置默认时区
date_default_timezone_set('PRC');

// 接收内容
$message = array(
	'id'      => $_POST['id'],
	'user'    => $_POST['user'],
	'title'   => $_POST['title'],
	'content' => $_POST['content'],
	'time'    => time()
);

//读取留言
$msgs = read_file('msg.txt');
if($msgs === false || strlen($msgs) == 0)
{
	return;
}

//将字符串反序列化为数组
$msgs = unserialize($msgs);

//用于判断内容是否存在
$is_exist = false;

//寻找该内容
foreach ($msgs as $key => $value) {
	//找到内容，更改
	if($value['id'] == $message['id'])
	{
		$is_exist = true;
		$msgs[$key] = $message;
		echo '<script>alert("修改成功");</script>';
		break;
	}
}

//若不存在，新增内容
if( ! $is_exist)
{
	$msgs[] = $message;
	echo '<script>alert("找不到旧消息，已新增");</script>';
}

//序列化数组为字符串
$msgs = serialize($msgs);

//字符串写入文件
write_file('msg.txt', $msgs);

//返回主页
echo '<script>window.location.assign(".");</script>';
