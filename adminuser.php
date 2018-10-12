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
@include("include/getcookie.php");


if($_SESSION["cfstatadmin"]==""){
 setcookie("cfstatadmincookie","",time()-600);
 alerturl("会话已经过期，请重新登录","admin.php");
 exit;
}

$action = isset($_GET["action"]) ? chkstr($_GET["action"],1) : "userlist";



@include("include/adminuser_manage_do.php");

@include("templet/101203/top.htm");
?>


<table class="manage">
<tr> 
<td class="manage_left">
<?php 
@include("include/adminuser_manage_menu.php");
?>
</td>
<td class="manage_right">
<?php 
@include("include/adminuser_manage_select.php");
?>
</td>
</tr>
</table>


<?php 
@include("templet/101203/bottom.htm");
?>
