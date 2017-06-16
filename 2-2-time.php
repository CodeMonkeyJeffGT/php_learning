<?php 


echo '<pre>';

$time1 = microtime(true);

echo date_default_timezone_get() . '<br>';

#Asia/Hong_Kong Asia/Shanghai
// date_default_timezone_set('Asia/Shanghai');

/**
Y 4位年		y 2位年
F 完整月	M 三字母月
m 数字月	n 无前导0的数字月
d 天		j 无前导0的天
l 星期几	D 三位星期几
w 数字星期	H i s a
*/

#2017/17 May/May/05 13/13 Saturday/Sat/6 10 46 40 am
echo date('Y/y F/M/m d/j l/D/w H i s a') . '<br>';

/**
修改php.ini
去;
data.timezone = 'Asia/Shanghai'
short_open_tag = ON
*/

#2011-04-09 10:59:34
echo date('Y-m-d H:i:s', strtotime('2014-04-11 10:59:34 -3 years - 2 days')) . '<br>';
echo date('Y-m-d H:i:s', strtotime('-1 day',strtotime("first day of last month"))) . '<br>';

#同时获取微妙数
echo microtime() . '<br>';
#时间戳与微妙合在一起
echo microtime(true) . '<br>';

#用来获取运行时间
echo microtime(true) - $time1 . '<br>';

echo uniqid('qianzhui') . '<br>';

#尽量保证唯一id
echo uniqid(microtime(true) . mt_rand(1000, 10000)) . '<br>';

#-----------------

print_r(getdate());



