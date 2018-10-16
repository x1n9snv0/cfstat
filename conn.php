<?php 
$dbhost="localhost";//Mysql主机的IP地址,如localhost或localhost:3306
$dbname="cfstat";//Mysql数据库名
$dbuser="cfstat";//连接Mysql的用户名
$dbpwd="admin";//连接Mysql的密码
//$conn = mysql_connect($dbhost,$dbuser,$dbpwd) or die ("无法连接到Mysql主机！");
$conn = new mysqli($dbhost,$dbuser,$dbpwd) or die ("无法连接到Mysql主机！");
//mysql_query("set names 'utf8'");
$conn->query("set names 'utf8'");
//mysql_select_db($dbname,$conn) or die ("无法连接到Mysql数据库！");
$conn->select_db($dbname) or die ("无法连接到Mysql数据库！");
?>