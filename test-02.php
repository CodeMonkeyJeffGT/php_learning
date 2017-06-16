<?php

echo <<<html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>星星塔</title>
</head>
<body>
	<form method="post" action="test-02.php">
		<input type="text" name="n" placeholder="请输入要打印的行数"><br />
		<button name="shape" value="pyr">金字塔</button>
		<button name="shape" value="rho">空心菱形</button><br />
html;

$end = <<<html
	</form>
</body>
</html>
html;

#如果未输入层数或不存在'shape'
if( ! isset($_POST['n']) || ! isset($_POST['shape']))
{
	#结束 输出剩余html
	exit($end);
}

#获取层数
$n = (int)$_POST['n'];

#如果n为0或负数
if($n <= 0)
{
	#结束 输出提示及剩余html
	exit('层数请为整数' . $end);
}

#判断输出形状
if($_POST['shape'] == 'pyr')
{
	#逐行输出
	for($i = 1; $i <= $n; $i++)
	{
		#输出空格
		for($j = 0; $j < $n - $i; $j++)
		{
			echo "<span style='color:#fff;'>*</span>";
		}
		#输出*
		for($j = 0; $j < $i * 2 - 1; $j++)
		{
			echo '*';
		}
		echo '<br>';
	}
}
else
{
	#输出第一行
	for($j = 0; $j < $n - 1; $j++)
	{
		echo "<span style='color:#fff;'>*</span>";
	}
	echo '*<br>';
	#从第二行输出至最长行
	for($i = 2; $i <= $n; $i++)
	{
		for($j = 0; $j < $n - $i; $j++)
		{
			echo "<span style='color:#fff;'>*</span>";
		}
		echo "*";
		for($j = 0; $j < $i * 2 - 3; $j++)
		{
			echo "<span style='color:#fff;'>*</span>";
		}
		echo '*<br>';
	}
	#从倒数第二长行输出，避免重复输出最长行
	for($i = $n - 1; $i >= 2; $i--)
	{
		for($j = 0; $j < $n - $i; $j++)
		{
			echo "<span style='color:#fff;'>*</span>";
		}
		echo "*";
		for($j = 0; $j < $i * 2 - 3; $j++)
		{
			echo "<span style='color:#fff;'>*</span>";
		}
		echo '*<br>';
	}
	#如果n大于1，再输出一行
	if($n > 1)
	{
		for($j = 0; $j < $n - 1; $j++)
		{
			echo "<span style='color:#fff;'>*</span>";
		}
		echo '*<br>';
	}
}

echo $end;
