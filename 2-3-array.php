 <?php

#数组是复合类型，是有序的映射
echo '<pre>';

$arr = [1, 2];
var_dump($arr);

$arr = array(
	1 => 1,
	2 => 2
);
var_dump($arr);

#分两类：
	#索引数组	-	数组下标是数字
	#关联数组	-	数组下标为字符
#并不区分，完全相同

/**定义数组方式
 * array()
 * []
 * range() 和 compact()
 * define()定义常量数组
 */

#1
$arr = array();
$arr = array(1, 2.5, '似', TRUE);
$arr = array(
	'a' => '1',
	#1不是1.5
	1.5 => '2',
	'2.5' => '3'
);
print_r($arr);
$arr = array(
	'a', 'b', 'c',
	'abc' => 'Hello world!'
);
print_r($arr);

#2
$arr = [];
$arr = [
	'a' => '223',
	'b' => '233'
];

#3
#range()快速创建索引数组
#compact()快速创建关联数组

print_r(range(16, 18));
print_r(range(16, 14));
print_r(range(16, 18, 1.5));
print_r(range('a', 'z', 10));

$username = '谷田';
$pwd = '123';
$arr = compact('username', 'pwd');
print_r($arr);
#不存在的添加不进来
print_r(compact('arr', 'a'));

list($a[0], $a[1], $a[2]) = array('a', '1234', '1235bb');
print_r($a);

#5.6以后
define('ARR', array('a', 'b'));
print_r(ARR);
const ARR1 = [2, 5];
print_r(ARR1);

#--------------------

$arr = ['a', 'b', 'c'];
$arr[] = 'd';
print_r($arr);
#不会销毁
$arr[2] = NULL;
print_r($arr);
#销毁
unset($arr[2]);
print_r($arr);

function arr()
{
	return [1, 3, 5];
}

#5.4后
echo arr()[2];

$arr1 = ['a', 'b'];
$arr2 = ['c', 'd', 'e'];
#使用左边数组的值['a', 'b', 'e'];
print_r($arr1 + $arr2);

