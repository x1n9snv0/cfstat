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
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header('Content-Type:text/html;charset=utf-8');

@include("../conn.php");
@include("../include/myfunction.php");
@include("../config.php");

$action = isset($_GET["action"]) ? chkstr($_GET["action"],1) : "";

if($action!=""){
 if(file_exists('tools.lock'))
 {
  echo("无法修复密码，因为tools.lock文件已经存在，请删除后再操作!");
  exit;
 }
}


if($action=="adminpwdrecoversave"){
 $pwd=md5("admin");
 $sql="update cfstat_admin set admin='admin',pwd='$pwd'"; 
 mysql_query($sql);
 
 $fp=@fopen("tools.lock","w") or die("写方式打开文件失败，请检查程序目录是否为可写");//生成一个安装文件
 @fputs($fp,"工具执行锁定文件") or die("文件写入失败,请检查程序目录是否为可写"); 
 @fclose($fp);
 
 echo "<span style='font-size:12px'>密码修复成功，管理员用户名和密码已经重置成：admin，请进后台重新修改成你自己复杂的密码，关闭本页面或返回<a href='?'>修复页面首页</a></span>";
 exit;
}

if($action=="adminpwdlockfilemodifysave"){
 $fp=@fopen("tools.lock","w") or die("写方式打开文件失败，请检查程序目录是否为可写");//生成一个安装文件
 @fputs($fp,"工具执行锁定文件") or die("文件写入失败,请检查程序目录是否为可写"); 
 @fclose($fp);
 echo "<span style='font-size:12px'>密码锁定文件生成成功，请关闭本页面或返回<a href='?'>修复页面首页</a></span>";
 exit;
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html><head><title>管理员密码修复</title>
<meta http-equiv=content-type content="text/html; charset=utf-8">
<style type="text/css">
body {text-align: left; font-family:Arial; margin:0; padding:0; background: #FFF; font-size:12px; color:#333333;}
table{font-size:12px;}

.tb_1{
 background-color:#ffffff;
 border:1px solid #C9DDF0;
 margin:5px 0px 5px 5px;
 width:768px;
 float:left;
}

 .tb_2{
 width:980px;
 background-color:#ffffff;
 border:1px solid #C9DDF0;
 margin:15px auto;
 clear:both;
}

 .tb_3{
 background-color:#ffffff;
 border:1px solid #C9DDF0;
 margin:15px auto;
 padding:5px;
 clear:both;
}


.tr_1{
 padding-left:5px;
 padding-top:5px;
 font-weight:bold;
 font-size:14px;
 height:24px;
 text-align:center;
 background-color:#F3F9FE;
}

.tr_2{
 text-align:center;
}



.td_1{
 text-align:left;
}
.td_2{
 text-align:center;
}
.td_3{
 text-align:right;
}

.right{
	display:inline;
	float:right
}
.clear{
	clear:both;
	height:0;
}
.wrap{
	width:950px;;
	margin:0 auto;
}
.bord{
	border:#b0bec7 1px solid;
}

.t_button
{
	display: inline-table;
	display: -moz-inline-box;
	display: inline-block;
	margin: 1px;
	border-style: solid;
	border-width: 1px;
	border-color: #999999;
	border-top-color: #cccccc;
	border-left-color: #cccccc;
	background-color: #eeeeee;
	color: #333333;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 100%;
	white-space: nowrap;
	height:21px;
	line-height:21px;
	padding:0 3px;
}
.t_button:LINK
{
	text-decoration: none;
	color: #333333;
	background-color: #eeeeee;
}

.t_button:VISITED
{
	text-decoration: none;
	color: #333333;
	background-color: #eeeeee;
}
</style>
</HEAD>
<body>
<table class="tb_3" width="600">
    <tr class="tr_1">
        <td>管理员密码修复工具</td>
    </tr>

    <tr>
        <td style="margin:5px;font-size:12px;text-align:center">
            <?php
            if (file_exists('tools.lock')) {
                ?>
                tools.lock文件存在，无法进行密码修改<br><br>
                请删除此文件后刷新本页面即可进行密码修复工作<br><br>
                修复后系统将使用系统默认的密码，并重新生成tools.lock文件，每次修复前必须删除此文件<br><br>
                <a href="#" class="t_button" onClick="location.href='?ranstr=' + Math.random()">刷新本页面</a>
                <?php
            } else {
                ?>
                修复锁定文件tools.lock不存在，点击下面修复按钮即可进行修复工作<br><br>
                修复后系统将使用系统默认的密码，并重新生成tools.lock文件<br><br>
                <a href="?action=adminpwdrecoversave" class="t_button"
                   onClick="return confirm('修复后系统将使用默认管理员和密码，确定要修复吗?')">点击修复密码,并生成tools.lock密码修复锁定文件</a>
                <br><br>
                <a href="?action=adminpwdlockfilemodifysave" class="t_button"
                   onClick="return confirm('确定要不修复模板直接生成tools.lock模板修复锁定文件吗?')">不修复密码,直接生成tools.lock密码修复锁定文件</a>

                <?php
            }
            ?>
        </td>
    </tr>

</table>  
