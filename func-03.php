<?php 

echo '<pre>';

test('1', 'b', 235, array('1' => '22', '3d' => '12'));

function test()
{
	echo func_num_args(), '<br>';
	print_r(func_get_args());
}

#test2(1); 报错

#允许限定 array 对象 callable(回调函数)
function test2(array $a){};

#标准类
$obj = new stdClass();
var_dump($obj);

#传递NULL
test3(NULL);

#默认值为NULL才不会报错
function test3($a = NULL){};

#----------------------
#定义函数作为回调函数
function callBack()
{
	echo "Hello world!<br>";
}

#以字符串方式传递进去
test4('callBack');

#传递回调函数 callable不是callback
function test4(callable $a)
{
	$a();
	$a();
}

#----------------------
#可变函数

function test5()
{
	echo 'success<br>';
}

$func = 'test5';

#判断是否为可用的函数
if(is_callable($func))
{
	$func();
}

if(function_exists($func))
{
	$func();
}

#----------------------
#嵌套定义

function foo()
{
	$a = 1;
	function bar()
	{
		echo 'Hello world<br>';
		#不可以使用外层函数的变量
		#echo $a;
	}
}

#需先执行外层函数才能执行内层函数
#bar();

foo();

bar();

#----------------------
#匿名函数（闭包函数）

$message = 'hello world';

$foo = function($str)
{
	global $message;
	echo $message;
	echo $str;
#此处要加 ';' 分号
};

$foo('要加分号哦<br>');

test6();

function test6()
{

	$message = 'hello world';

	$foo = function($str) use (&$message)
	{
		echo $message;
		echo $str;
	#此处要加 ';' 分号
	};

	$foo('要加分号哦<br>');
	
}




