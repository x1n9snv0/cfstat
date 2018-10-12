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
if(!isset($_SESSION["cfstatuser"])) $_SESSION["cfstatuser"]="";
if(!isset($_SESSION["cfstatuser_view"])) $_SESSION["cfstatuser_view"]="";
if(!isset($_SESSION["cfstatadmin"])) $_SESSION["cfstatadmin"]="";

if ($_SESSION["cfstatuser"]=="")
{
 $cfstatusercookie=chkstr($_COOKIE["cfstatusercookie"],1);
 if(!empty($cfstatusercookie))
 {
  $sql="select username from cfstat_user where usercode='$cfstatusercookie'";
  $result=mysql_query($sql);
  $rs=mysql_fetch_assoc($result);
  if($rs["username"]!="")
  {
   $_SESSION["cfstatuser"]=$rs["username"];
  }
 }
}

if ($_SESSION["cfstatadmin"]=="")
{
 $cfstatadmincookie=chkstr($_COOKIE["cfstatadmincookie"],1);
 if(!empty($cfstatadmincookie))
 {
  $sql="select admin from cfstat_admin where admincode='$cfstatadmincookie'";
  $result=mysql_query($sql);
  $rs=mysql_fetch_assoc($result);
  if($rs["admin"]!="")
  {
   $_SESSION["cfstatadmin"]="ok";
  }
 }
}
?>