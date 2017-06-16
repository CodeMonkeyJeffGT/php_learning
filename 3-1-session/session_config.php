<?php 

session.auto_start(boolean)
默认为0

session.name(string)
默认为PHPSESSID

session.save_handler(string)
定义用来存储和获取与会话关联的数据的处理器的名字，默认为files

session.save_path(string)
定义传递给存储处理器的参数，如果上一个为files，则值是文件的路径

session.gc_maxlifetime(integer)
最长生命周期

session.gc_probability(integer)、session.gc_divisor(integer) 
垃圾回收概率，千分之integer（默认为1）
