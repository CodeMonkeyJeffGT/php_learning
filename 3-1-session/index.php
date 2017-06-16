<?php 

session_start();
$_SESSION['username'] = 'gt';

// header('location:1.php');

//获取sessionID
session_id();
//设置并获取旧sessionID(必须在session_start之前)
#session_id(string);

//获取sessionName
session_name();
//设置并获取sessionName(必须在session_start之前)
#session_name(string);

//session销毁
session_destroy();



