<?php 
/*
乘风多用户PHP统计系统
作者QQ：178575
作者E-Mail：yliangcf@163.com
作者网站：http://www.qqcf.com
详细介绍：http://www.qqcf.com/cfstat.htm
上面有程序在线演示，安装演示，使用疑难解答，最新版本下载等内容
因为这些内容可能时常更新，就没有放在程序里，请自己上网站上查看
有完整版本的演示
*/
?>
<?php 
if($action=="userlist"||$action=="usersearch")
@include("action/adminuser/userlist.php");

if($action=="usermodify")
@include("action/adminuser/usermodify.php");

if($action=="daytj")
@include("action/adminuser/daytj.php");

if($action=="daytop")
@include("action/adminuser/daytop.php");

if($action=="searchlist")
@include("action/adminuser/searchlist.php");

if($action=="searchmodify")
@include("action/adminuser/searchmodify.php");

if($action=="imglist")
@include("action/adminuser/imglist.php");

if($action=="sysmodify")
@include("action/adminuser/sysmodify.php");

if($action=="pwdmodify")
@include("action/adminuser/pwdmodify.php");
?>