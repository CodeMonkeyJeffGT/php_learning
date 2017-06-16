<?php

$arr = range('a', 'z', 5); 
#不会修改指针（7.0之后）
foreach ($arr as $key => $val)
{
	echo "{$key} => {$val}<br>";
}

$arr = [0, 1, 2];
#操作的是数组的副本，不是数组本身。（7.0之后）
foreach ($arr as $key => $value):
	echo $value . '<br>';
endforeach;

#----------
#指针相关函数

#key(array)得到当前指针所在位置的键名
#current(array)得到当前指针所在位置的键值
#next(array)、prev(array)
#移动一位并返回当前指针所在位置的键值，若没有则返回false
#reset(array)、end
#移动到首、尾并返回当前指针所在位置的键值

$arr = array(
	'a', 'b', 'c',
	35         => 'test',
	'username' => 'king',
	'age1'     => false,
	'age'      => 12,
	false 	   => 1235213,
	'' 		   => '22',
	null 		=> '33'
);

while( ! is_null(key($arr)))
{
	echo key($arr) . ' => ' . current($arr) . '<br>';
	next($arr);
}

echo '<pre>';
#each(array) 返回键值对同时指针后移

$str = "d.d.e.s.c.txt";
echo end(explode('.', $str)) . '<br>';
reset($arr);
var_dump(each($arr));
var_dump(each($arr));

#list只适用于索引数组
var_dump(list($str, $arr) = [1, 2]);
var_dump(list(, $str, $arr) = [1, 2, 3]);

$arr = [];
#7前为[3, 2, 1] 后为[1, 2, 3];
list($arr[], $arr[], $arr[]) = [1, 2, 3];
print_r($arr);













