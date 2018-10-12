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
if($action=="urlgo")
{
 $url=urldecode($_GET["url"]);
 gotourl($url);
}

//管理员跳转到用户界面
if($action=="usergo")
{
 $_SESSION["cfstatuser"]=chkstr($_GET["username"],1);
 gotourl("user.php");
 exit;
}

if($action=="usermodifysave")
{
 $username=chkstr($_GET["username"],1);
 $pwd=chkstr($_POST["pwd"],1);
 $userstate=chkstr($_POST["userstate"],2);

 $sql="update cfstat_user set userstate='$userstate'";
 
 if($pwd<>"")
 { 
  $pwd=md5($pwd);
  $sql=$sql.",pwd='$pwd'";
 }
 
 $sql=$sql." where username='$username'";
 
 mysql_query($sql);
 alertback("修改成功",1);
}


//管理员删除用户
if($action=="userdel")
{
 $username=chkstr($_GET["username"],1);
 
 $sql="delete from cfstat_client_day where username='$username'";
 mysql_query($sql);
 
 $sql="delete from cfstat_count_day where username='$username'";
 mysql_query($sql);
 
 $sql="delete from cfstat_count_hour where username='$username'";
 mysql_query($sql);
 
 $sql="delete from cfstat_ly_day where username='$username'";
 mysql_query($sql);
 
 $sql="delete from cfstat_search_day where username='$username'";
 mysql_query($sql);

 $sql="delete from cfstat_searchkeyword_day where username='$username'";
 mysql_query($sql);

 $sql="delete from cfstat_user where username='$username'";
 mysql_query($sql);
 
 $sql="delete from cfstat_visit_last where username='$username'";
 mysql_query($sql);
 
 $sql="delete from cfstat_web_day where username='$username'";
 mysql_query($sql);
 
 alerturl("删除成功","?action=userlist");
}

//增加搜索引擎设置
if($action=="searchaddsave")
{
 $sitedesc=chkstr($_POST["sitedesc"],1);
 $siteflag=chkstr($_POST["siteflag"],1);
 $keywordflag=chkstr($_POST["keywordflag"],1);

 
 if($sitedesc=="") alertback("请输入搜索引擎中文名",1);
 if($siteflag=="") alertback("请输入搜索引擎英文标识",1);
 if($keywordflag=="") alertback("请输入搜索关键字的参数",1);
 
 $sql="select count(*) from cfstat_search_set where siteflag='$siteflag'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_row($result);
 if($rs[0]>0) alertback("已经存在此搜索引擎英文标识,请换名",1);
 
 $sql="insert into cfstat_search_set(sitedesc,siteflag,keywordflag) values('$sitedesc','$siteflag','$keywordflag')";
 mysql_query($sql);
 alerturl("增加成功","?action=searchlist");
}

//修改搜索引擎设置
if($action=="searchmodifysave")
{
 $id=chkstr($_GET["id"],2);
 $sitedesc=chkstr($_POST["sitedesc"],1);
 $siteflag=chkstr($_POST["siteflag"],1);
 $keywordflag=chkstr($_POST["keywordflag"],1);

 
 if($sitedesc=="") alertback("请输入搜索引擎中文名",1);
 if($siteflag=="") alertback("请输入搜索引擎英文标识",1);
 if($keywordflag=="") alertback("请输入搜索关键字的参数",1);
 
 $sql="select count(*) from cfstat_search_set where siteflag='$siteflag' and id<>'$id'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_row($result);
 if($rs[0]>0) alertback("已经存在此搜索引擎英文标识,请换名",1);
 
 $sql="update cfstat_search_set set sitedesc='$sitedesc',siteflag='$siteflag',keywordflag='$keywordflag' where id='$id'";
 mysql_query($sql);
 alerturl("修改成功","?action=searchlist");
}

//修改搜索引擎设置
if($action=="searchdel")
{
 $siteflag=chkstr($_GET["siteflag"],1);
 $sql="delete from cfstat_search_set where siteflag='$siteflag'";
 mysql_query($sql);
 alerturl("删除成功","?action=searchlist");
 }


//网店图片删除
if($action=="picdel")
{
 $filename=chkstr($_GET["filename"],1);
 
 $sql="delete from cfstat_upfile where filename='$filename'";
 mysql_query($sql);
 unlink("upload/".$filename);
 
 //使用此图片的用户删除时更换成默认图片
 $sql="update cfstat_user set imgfilename='default.jpg' where imgfilename='$filename'";
 mysql_query($sql);
 
 alerturl("删除成功","?action=imglist");
 }
 
//管理员修改自己的资料
if($action=="sysmodifysave")
{
 $systitle=goback(chkstr($_POST["systitle"],1),"请输入计数系统名称");

 $regstate=chkstr($_POST["regstate"],2);
 $regadmincheck=chkstr($_POST["regadmincheck"],2);

 $styletotal=goback(chkstr($_POST["styletotal"],2),"请输入计数器样式数量");
 
 $smtpport=chkstr($_POST["smtpport"],1);
 $smtpaddress=chkstr($_POST["smtpaddress"],1);
 $smtpuser=chkstr($_POST["smtpuser"],1);
 $smtppassword=chkstr($_POST["smtppassword"],1);
 
 $skintype=chkstr($_POST["skintype"],2);
 $skincolor=chkstr($_POST["skincolor"],1);
 
 
 if($pwd<>$pwd2) alertback("两次输入的密码不一致",1);
 
 
 $sql="update cfstat_admin set systitle='$systitle',regstate='$regstate',regadmincheck='$regadmincheck',styletotal='$styletotal',smtpport='$smtpport',smtpaddress='$smtpaddress',smtpuser='$smtpuser',smtppassword='$smtppassword',skintype='$skintype',skincolor='$skincolor'";
 mysql_query($sql);
 alerturl("修改成功","?action=sysmodify");
}

if($action=="emailtest")
{
header('Content-Type:text/html;charset=utf-8'); 

@include("email.php");

$email=chkstr($_POST["email"],1);
if($email=="") alerturl("请输入接收的邮件地址","?action=sysmodify");

$smtpserver = $rsset["smtpaddress"];//SMTP服务器  
$smtpserverport = $rsset["smtpport"];//SMTP服务器端口  
$smtpusermail = $rsset["smtpuser"];//SMTP服务器的用户邮箱  
$smtpemailto = $email;//发送给谁  
$smtpuser = $rsset["smtpuser"];//SMTP服务器的用户帐号  
$smtppass = $rsset["smtppassword"];//SMTP服务器的用户密码  
$mailsubject = $rsset["systitle"] . "发送的测试邮件";//邮件主题  
$mailbody = "邮件可以收到，设置正常！";//邮件内容

$mail = new MySendMail();

if($smtpserverport==25)
$mail->setServer($smtpserver, $smtpuser, $smtppass); //设置smtp服务器，普通连接方式
else
$mail->setServer($smtpserver, $smtpuser, $smtppass, $smtpserverport, true); //设置smtp服务器，到服务器的SSL连接

$mail->setFrom($smtpuser); //设置发件人
$mail->setReceiver($smtpemailto); //设置收件人，多个收件人，调用多次

$mail->setMail($mailsubject, $mailbody); //设置邮件主题、内容

if($mail->sendMail())
 alerturl("邮件发送成功，请查收你的邮箱".$email."里收到的邮件","?action=sysmodify");
else
 alerturl("邮件发送失败","?action=sysmodify");

}

if($action=="pwdmodifysave")
{
 $pwd_old=chkstr($_POST["pwd_old"],1);
 
 $admin=chkstr($_POST["admin"],1);
 $pwd=chkstr($_POST["pwd"],1);
 $pwd2=chkstr($_POST["pwd2"],1);

 if($pwd_old=="") alertback("请输入旧密码",1);
 if($admin=="") alertback("请输入管理员名称",1);
 if($pwd=="") alertback("请输入新密码",1);
 if($pwd2=="") alertback("请输入重复新密码",1);
 
 if($pwd<>$pwd2) alertback("两次输入的密码不一致",1);
 
 $sql="select pwd from cfstat_admin";
 $result=mysql_query($sql);
 $rs=mysql_fetch_assoc($result);
 if ($rs["pwd"]<>md5($pwd_old)) alertback("旧密码错误",1);
  
 $pwd=md5($pwd);
 $sql="update cfstat_admin set admin='$admin',pwd='$pwd'";

 mysql_query($sql);
 alerturl("修改成功","?action=pwdmodify");
}

if($action=="adminlogout")
{
 $_SESSION["cfstatadmin"]="";
 setcookie("cfstatadmincookie","",time()-3600);
 gotourl("admin.php");
}
?>