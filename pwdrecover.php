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
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");
@include("include/email.php");

$action = isset($_GET["action"]) ? chkstr($_GET["action"],1) : "pwdrecover";


@include("include/cf_do.php");

@include("templet/101203/top.htm");


if($action=="pwdrecover")
@include("action/web/pwdrecover.php");

if($action=="pwdmodify")
@include("action/web/pwdmodify.php");


@include("templet/101203/bottom.htm");
?>

