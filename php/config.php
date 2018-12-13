<?php
@header("content-type:text/html;charset=utf-8");
@header("Access-Control-Allow-Origin:*");

$sql_connect = mysql_connect("localhost:3306","root","root");
mysql_select_db("y"); //根据链接地址  用户名  密码  选择数据库
mysql_query("set character set 'utf8'"); //设置执行语句的编码格式  防止中文乱码
?>