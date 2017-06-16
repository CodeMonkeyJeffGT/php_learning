<?php 

//单行注释 C++风格

#单行注释 shell风格

/*
    多行注释
*/

header('content-type:text/html; charset=utf-8');

$user_name = 'gt';

echo '#', '$user_name';	#效率更高

/*
	单引号只解析\'和\\
	不解析变量
*/

echo '#', '<br>';

echo '#', "$user_name";

echo '#', '<br>';

/*
	双引号解析变量和所有转义符
*/

$str = 'abcde';

echo '#', $str{1};

echo '#', '<br>';

$str[1] = '';

echo '#', $str;

echo '#', '<br>';

echo '#', $str{0};

echo '#', '<br>';

echo '#', $str{1};

echo '#', '<br>';

echo '#', $str{2};

echo '#', '<br>';

echo '#', $str[1];

echo '#', '<br>';

echo '#', $str[2];

echo '#', '<br>';

$name = '谷田';

$str = <<<heredoc
	{$name}
	无引号的heredoc
heredoc;

echo '#', $str;

echo '#', '<br>';

$str = <<<"heredoc"
	{$name}
	有双引号的heredoc
heredoc;

echo '#', $str;

echo '#', '<br>';

$str = <<<'nowdoc'
	{$name}
	有单引号的nowdoc
nowdoc;

echo '#', $str;

echo '#', '<br>';

unset($str, $user_name, $name);

echo '#', 1+'3dd', '#', '<br>'; //4

echo '#', 1+'3e2dd', '#', '<br>'; //301

echo '#', 1+true, '#', '<br>'; //2

echo '#', 1+'true', '#', '<br>'; //1

echo '#', '1' + '2', '#', '<br>'; //3

echo '#', 1+false, '#', '<br>'; //4

echo '#', false, '#', '<br>'; //4

echo '#', 1+null, '#', '<br>'; //4

echo '#', null, '#', '<br>'; //4

$arr = array(123,34,21351,1235);

echo '#', (int)$arr, '', '#', '<br>';	#空数组为0，否则为1

echo '<br><hr><br>';

echo ('0' ? 'T' : 'FALSE'), '<br>';		#FALSE

echo (0.0 ? 'T' : 'FALSE'), '<br>';		#FALSE

echo ('false' ? 'T' : 'FALSE'), '<br>';		#T

echo ('0.0' ? 'T' : 'FALSE'), '<br>';		#T

echo ('NULL' ? 'T' : 'FALSE'), '<br>';		#T

#强制转换

/*
强制转换				系统函数
(int)   		OR    	intval($variable);
(float/double/real)		floatval($variable); doubleval($variable); #没有realval();
(string)    	OR    	strval($variable);
(bool/boolean)	OR 		boolval($variable);
(unset)	#null
(array)
(object)
*/

$a = 1;

var_dump((array)$a);

echo '<br>';

var_dump((object)$a);

echo '<br>';

$arr = array('a' => 123);

var_dump($arr);

echo '<br>';

$obj = (object)$arr;

var_dump($obj);

echo '<br>';

var_dump((array)$obj);

echo '<br><hr><br>';

#检测/设置类型

echo gettype($obj), '<br>';		#不要使用gettype得到变量的类型，后续返回值可能会改变


settype($obj, 'array');

var_dump($obj);

echo '<br>';  

#检测变量类型

echo is_int($obj), is_float($obj), is_bool($obj), is_string($obj), is_scalar($obj),is_array($obj), is_object($obj), is_null($obj), '<br>';

// is_numeric() 数
// is_scalar() 标量：数、布尔、字符串

//常量----------------------

define('TEST', 'This is a test');

echo TEST, '<br>';

#define('TEST', 'This is another test')    //常量不能被再次定义

define('TEST_ARR', array('a' => 123, 'b' => 234));

var_dump(TEST_ARR);

echo '<br>';

$var = 123;

define('TEST_VAR', $var);

echo TEST_VAR, '<br>';

const TEST_CON = 123;

echo TEST_CON, '<br>';

echo constant('TEST_VAR'), '<br>';

echo constant('TEST_CON'), '<br>';

echo PHP_VERSION, '<br>';

#$arr = get_defined_constants();		//获取所有已定义的常量

#可定义预格式化的文本
echo '<pre>';

print_r($arr);

echo '</pre>';
#

#魔术常量
echo __LINE__, '-<br>';

echo __FILE__, '-<br>';

echo __DIR__, '-<br>';

echo __FUNCTION__, '-<br>';

echo __CLASS__, '-<br>';

echo __TRAIT__, '-<br>';

echo __METHOD__, '-<br>';

echo __NAMESPACE__, '-<br>';
#

echo '<hr>';

#预定义变量
echo '<pre>';

print_r($GLOBALS);

print_r($_GET);

print_r($_POST);

print_r($_COOKIE);

print_r($_FILES);

#print_r($_SESSION);

#print_r($_SERVERS);

print_r($_ENV);

print_r($_REQUEST);

echo '</pre>';

$var = false;

var_dump(++$var);

$var = null;

var_dump(++$var);

$var = null;

var_dump($var);

var_dump(--$var);

echo '<br>';

$var = 'a';

echo ++$var, '<br>';

echo --$var, '<br>';

$var = 'z';

echo ++$var, '<br>';

$var = 'AA';

echo ++$var, '<br>';

echo (1 == '1' ? 't' : 'f'), '<br>';	#t

echo (1 == '0' ? 't' : 'f'), '<br>';	#f

echo (1 == '1e' ? 't' : 'f'), '<br>';	#t

echo (1 == 'e' ? 't' : 'f'), '<br>';	#f

echo (1 == '' ? 't' : 'f'), '<br>';		#f

echo null??'无值', '<br>';

@var_dump($抑制警告的错误信息输出);

echo @(3/0);

echo '<br>';

$i = 0;
$j = 1;

if($p = $i || $j) 			#先||再= 相当于$p = ($i || $j)
{
	var_dump($i, $j, $p);
}

var_dump(is_numeric('abc'));		#判断是否为数值型


