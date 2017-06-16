<?php

include('file.php');

function show_msgs()
{
	$msgs = read_file('msg.txt');
	if($msgs === false || strlen($msgs) == 0)
	{
		return;
	}
	$msgs = unserialize($msgs);
	$msgs = html_escape($msgs);
	$num = 1;
	foreach ($msgs as $value)
	{
		$value['time'] = date('m-d H:i', $value['time']);
		$ele = "
		<tr>
			<td>
				{$num}
			</td>
			<td>
				{$value['user']}
			</td>
			<td>
				{$value['title']}
			</td>
			<td>
				{$value['time']}
			</td>
			<td>
				{$value['content']}
			</td>
			<td>
				<a href='#' onclick='edit({$value['id']});'>编辑</a> | <a href='#' onclick='remove({$value['id']}, {$num});'>删除</a>
			</td>
		</tr>
		";
		echo $ele;
		$num++;
	}
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		.textarea{
			width: 100%;
		}
	</style>
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
			<table class="table">
				<thead>
					<tr>
						<th style="min-width: 45px">
							编号
						</th>
						<th style="min-width: 80px">
							用户名
						</th>
						<th>
							标题
						</th>
						<th style="min-width: 100px">
							时间
						</th>
						<th>
							内容
						</th>
						<th style="min-width: 100px">
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					<?php show_msgs(); ?>
				</tbody>
			</table>
			<form role="form" style="width: 100%" action="publish.php" method="post">
				<div class="form-group">
					 <label for="exampleInputEmail1">用户名</label><input type="text" class="form-control" id="exampleInputEmail1" name="user" placeholder="不填默认匿名" />
				</div>
				<div class="form-group">
					 <label for="exampleInputPassword1">标题：</label><input type="text" class="form-control" id="exampleInputPassword1" name="title" placeholder="标题 必填" />
				</div>
				<div class="form-group" style="width: 100%">
					<label for="exampleInputPassword2" style="width: 100%">内容：<textarea class="form-control textarea" id="exampleInputPassword2" name="content" placeholder="内容 必填"></textarea>
				</div>
				<button type="submit" class="btn btn-default" name="publish">发布</button>
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

<script>
	function edit(id)
	{
		window.location.assign("edit.php?id=" + id);
	}
	function remove(id, num)
	{
		if(confirm('确认删除该信息？\n\n　序号' + num))
		{
			window.location.assign("remove.php?id=" + id);
		}
	}
</script>

</body>
</html>