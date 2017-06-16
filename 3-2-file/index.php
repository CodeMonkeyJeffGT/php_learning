<?php 

date_default_timezone_set('PRC');

/**
 * 文件信息相关API
 */

echo '<pre>';

$filename = './test1.txt';
//filetype($filename) 获取文件类型 出错为false
echo '文件类型为：' . filetype($filename) . '<br>';

$filename = './test';
echo '文件类型为：' . filetype($filename) . '<br>';

$filename = './test1.txt';
//filesize($filename) 获得文件大小
//对2GB以上文件会返回无法与企的结果
echo '文件大小为：' . filesize($filename) . '<br>';

//filectime($filename) 获得文件创建时间（时间戳）
echo '文件创建时间为：' . date('Y-m-d H:i:s', filectime($filename)) . '<br>';

//filemtime($filename) 获得文件修改时间
echo '文件修改时间为：' . date('Y-m-d H:i:s', filemtime($filename)) . '<br>';

//fileatime($filename) 获得文件最后访问时间
echo '文件最后访问时间为：' . date('Y-m-d H:i:s', fileatime($filename)) . '<br>';

//文件是否可读、可写、可执行 is_readable(), is_writable(), is_executable(),
var_dump(is_readable($filename), is_writable($filename), is_executable($filename));

//is_file()检测是否为文件且文件是否存在 is_dir()是否为目录
var_dump(is_file($filename));

/**
 * 文件路径相关信息
 */

//pathinfo() 文件信息
$filename = 'test1.txt';

print_r(pathinfo($filename));

// Array
// (
//     [dirname] => .
//     [basename] => test1.txt
//     [extension] => txt
//     [filename] => test1
// )
echo pathinfo($filename, PATHINFO_EXTENSION) . '<br>';

$filename = __file__;
echo $filename . '<br>';
print_r(pathinfo($filename));

//basename 返回路径中的文件名部分
echo basename($filename) . '<br>';
echo basename($filename, 'x.php') . '<br>';
//dirname 返回路径中的路径
echo dirname($filename) . '<br>';

//file_exists(); 文件/目录是否存在
echo file_exists($filename) . '<br>';
