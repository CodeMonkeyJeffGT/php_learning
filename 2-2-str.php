<?php 

echo '<pre>';

$str = 'strSTR 大小写转换<br>';

echo strtolower($str);
echo strtoupper($str);

#----------------------------------

$str = 'hello world guys 首字母大小写转换<br>';

#首个单词
echo ucfirst($str);
#全部单词
echo ucwords($str);

#----------------------------------

$str = 'hello worLd guys 字符串替换<br>';

#区分大小写
echo str_replace('l', 'S', $str);
#不区分大小写
echo str_ireplace('l', 'S', $str);

#----------------------------------

$str = 'ZenD_CONTRollER_FronT<br>'; //Zend_Controller_Front

$str = str_replace('_', ' ', $str);
$str = strtolower($str);
$str = ucwords($str);
$str = str_replace(' ', '_', $str);

echo $str;

#----------------------------------

$str = 'A>B, B<C, Tom&John';

echo htmlspecialchars($str);

echo '<br>';

#htmlspecialchars(string $string, int $flags = ENT_COMPAT);
#$flags参数规定如何处理引号，其值可以为：
#ENT_COMPAT - 默认， 仅编码双引号;
#ENT_QUOTES - 编码双引号和单引号;
#ENT_NOQUOTES - 不编码任何引号;

$str = 'A>B, B<C, Tom&John, He said "I\'m OK"';

echo htmlspecialchars($str);

echo '<br>';

echo htmlspecialchars($str, ENT_QUOTES);

echo '<br>';

echo htmlspecialchars($str, ENT_NOQUOTES);

echo '<br>';

#通过str_replace进行转换,等价于htmlspecialchars

$str = str_replace('&', '&amp;', $str); //必须是第一阶梯
$str = str_replace('>', '&gt;', $str);
$str = str_replace('<', '&lt;', $str);
$str = str_replace('"', '&quot;', $str);
$str = str_replace('\'', '&#39;', $str);

echo $str.'<br>';

#----------------------------------

#删除字符串开始位置的空格或其他字符
#ltrim(string $str[, string $charlist])
#省略，则删除 '\0' NULL, '\t' 制表符, '\r' 回车, ' ' 空格, '\n' 换行, '\x0B' 垂直制表符

$str = "\n\n\t\tABC\t\t";

echo ltrim($str);
echo '<br>';

#不能使用''包围字符列表，\不编译
echo ltrim($str, "\t");
echo '<br>';

echo ltrim($str, "\n");
echo '<br>';

echo rtrim($str);
echo '<br>';

echo trim($str);
echo '<br>';

#----------------------------------

$str = 'javaJAVAscript';

var_dump(strpos('AV', $str));
echo '<br>';

var_dump(stripos('AV', $str));
echo '<br>';

#区分大小写
var_dump(strpos($str, 'AV'));
echo '<br>';

#不区分大小写
var_dump(stripos($str, 'AV'));
echo '<br>';

#从右查
var_dump(strrpos($str, 'AV'));
echo '<br>';

#从右查
var_dump(strripos($str, 'AV'));
echo '<br>';

#----------------------------------

$str = '0123456789';

#2开始，长5
echo substr($str, 2, 5);
echo '<br>';

#4开始，至末尾
echo substr($str, 4);
echo '<br>';

#倒数4开始，至末尾
echo substr($str, -4);
echo '<br>';

#4开始，至倒数2
echo substr($str, 4, -2);
echo '<br>';

#----------------------------------

#获取扩展名
$str = 'abc.axc.tdt.txt';

echo substr($str, strrpos($str, '.') + 1);
echo '<br>';

#----------------------------------

$str = 'abcdefABCDEFG';

echo strstr($str, 'C');
echo '<br>';

echo stristr($str, 'C');
echo '<br>';

echo strrchr($str, 'c');
echo '<br>';

$str = 'abc.axc.tdt.txt';

echo substr(strrchr($str, '.'), 1);
echo '<br>';

#----------------------------------

$str = 'abc.axc.tdt.jpeg';

$str = strrev($str);

echo $str, '<br>';

echo strrev(substr($str, 0, strpos($str, '.')));
echo '<br>';

#----------------------------------

$str = 'abc.axc.tdt.jpeg';

echo strrev(substr(strrev($str), 0, strlen($str) - strlen(strstr(strrev($str), '.'))));
echo '<br>';

#----------------------------------

#str_shuffle打乱字符串

$str = '1234567890';

echo str_shuffle($str), '<br>';

#----------------------------------

#explode
$str = 'a b c d e';

$arr = explode(' ', $str);

print_r($arr);

#implode
echo implode($arr), '<br>';
echo implode(' ', $arr), '<br>';

#----------------------------------

#sprintf格式化字符

$number = '128.5';
$str = 'shanghai';

echo sprintf('there are %u million cars in %s', $number, $str), '<br>';

/*
%% %
%b 二进制数
%d 数字
%e 科学计数法
%s 字符串
%f 浮点
*/

$number = 123;

#位置\$ 占位符
echo sprintf("带有两位小数的结果是：%1\$.2f<br>不带小数的是：%1\$d<br>", $number);
#相当于
echo sprintf("带有两位小数的结果是：%.2f<br>不带小数的是：%d<br>", $number, $number);



