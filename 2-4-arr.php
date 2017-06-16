<?php 
/**
 * 一个字符串2,3,5,19,39，得到和、乘积
 */

$str = "2, 3, 5, 19, 39";
$arr = explode(',', $str);
echo array_sum($arr) . '<br>';
echo array_product($arr) . '<br>';

/**
 * 1.txt.php.jpg
 * 截取文件拓展名，并检测拓展名是否在['jpg', 'jpeg', 'gif', 'png']中
 */

$allowExts = ['jpg', 'jpeg', 'gif', 'png'];
$filename = '1.txt.php.jpg';

#获取拓展名
$ext = explode('.', $filename);
$ext = end($ext);
#检测在不在
var_dump(in_array($ext, $allowExts));

#弹出数组中最后一个元素
#array_push()
#array_pop()
#array_unshift()
#array_shift()

echo '<pre>';

$arr = ['a', 'b', 'c', '3e5g' => 'd', 6 => 'e'];
echo array_pop($arr);
print_r($arr);
echo array_push($arr, 'dd', 'eee');
print_r($arr);
#刷新键值
$arr = ['a', 'b', 'c', '3e5g' => 'd', 6 => 'e'];
echo array_shift($arr);
print_r($arr);
echo array_unshift($arr, 'd', 'e');
print_r($arr);

/**
 * 快速生成字符串
 */

echo join('', range(0, 9)) . '<br>';
echo join('', range('a', 'z')) . '<br>';
#合成0-9a-zA-Z
$arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
print_r(join('', $arr));
echo '<br>';
#交换键名、值
$arr = array_flip($arr);
print_r(join('', $arr));
echo '<br>';
#取随机键值
print_r(join('', array_rand($arr, 4)));
echo '<br>';
$arr = array_flip($arr);
#打乱数组
shuffle($arr);
print_r(join('', $arr));
echo '<br>';

$arr = array(
	'username' => 'gut',
	'password' => 'gttte',
	'qq' => '53204132',
	'age' => '23'
);

print_r(join(', ', array_keys($arr)));
echo '<br>';
print_r("'". join('\', \'', array_values($arr)) . "'");
echo '<br>';




