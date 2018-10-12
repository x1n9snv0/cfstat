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
if($action=="visitlast")
@include("action/user/visitlast.php");

if($action=="lytj")
@include("action/user/lytj.php");

if($action=="webtj")
@include("action/user/webtj.php");

if($action=="daytj")
@include("action/user/daytj.php");

if($action=="hourtj")
@include("action/user/hourtj.php");

if($action=="clienttj")
@include("action/user/clienttj.php");


if($action=="searchtj")
@include("action/user/searchtj.php");

if($action=="searchkeywordtj")
@include("action/user/searchkeywordtj.php");

if($action=="setmodify")
@include("action/user/setmodify.php");

if($action=="stylelist")
@include("action/user/stylelist.php");

if($action=="imglist")
@include("action/user/imglist.php");

if($action=="imgset")
@include("action/user/imgset.php");

if($action=="usermodify")
@include("action/user/usermodify.php");

if($action=="pwdmodify")
@include("action/user/pwdmodify.php");

if($action=="gbooklist")
@include("action/user/gbooklist.php");

if($action=="gbookmodify")
@include("action/user/gbookmodify.php");

if($action=="codeget")
@include("action/user/codeget.php");

if($action=="codeget2")
@include("action/user/codeget2.php");
?>

