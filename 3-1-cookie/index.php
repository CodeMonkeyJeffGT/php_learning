<?php 

setcookie('username', 'jeff');

// bool setcookie(string $name[, string  $value = ""[, int $expire = 0[, string $path = ""[, string $domain = ""]]]])
// 名称 内容 生命周期 服务器上可用路径 可用域名（*.jd.com)



   //写入cookie
   setcookie('name', 'IMOOC');
   setcookie('pwd', '123456');
   setcookie('email', '123@mooc.com');
   
   //检测cookie是否设置，设置则输出
   if(isset($_COOKIE['name']))
   {
       echo $_COOKIE['name'];
   }
   if(isset($_COOKIE['pwd']))
   {
       echo $_COOKIE['pwd'];
   }
   if(isset($_COOKIE['email']))
   {
       echo $_COOKIE['email'];
   }
   echo '<pre>';
   var_dump($_COOKIE);
   echo '???';


?>
