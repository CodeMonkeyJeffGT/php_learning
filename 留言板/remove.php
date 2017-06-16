<?php

require('file.php');

//若未指定id，返回首页
if( ! isset($_GET['id']))
{
	echo '<script>alert("删除失败，请选择id");window.location.assign(".");</script>';
	exit();
}

// 接收内容
$message = $_GET['id'];

//读取留言
$msgs = read_file('msg.txt');
if($msgs === false || strlen($msgs) == 0)
{
	echo '<script>alert("删除失败，无留言");window.location.assign(".");</script>';
	exit();
}

//将字符串反序列化为数组
$msgs = unserialize($msgs);

//寻找该内容
foreach ($msgs as $key => $value) {
	//找到内容，删除
	if($value['id'] == $message)
	{
		unset($msgs[$key]);
	}
}

//序列化数组为字符串
$msgs = serialize($msgs);

//字符串写入文件
if(write_file('msg.txt', $msgs))
{
	echo '<script>alert("删除成功");window.location.assign(".");</script>';
}
else
{
	echo '<script>alert("删除失败");window.location.assign(".");</script>';
}
