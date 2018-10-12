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
//用户注册
if($action=="userregsave"){

 $username=chkstr($_POST["username"],1);
 $pwd=chkstr($_POST["pwd"],1);
 $pwd2=chkstr($_POST["pwd2"],1);
 $email=chkstr($_POST["email"],1);
 $qq=chkstr($_POST["qq"],1);
 $pagename=chkstr($_POST["pagename"],1);
 $pageurl=chkstr($_POST["pageurl"],1);
 $countershow=chkstr($_POST["countershow"],2);

 if($username=="" || $pwd=="" || $pwd2=="" || $email=="" || $pagename=="" || $pageurl=="" ) alertback("请输入必填参数",1);

 if($pwd<>$pwd2) alertback("密码不一致",1);

 $pwd=md5($pwd);
 
 if($rsset["regstate"]==0) alertback("系统禁止新注册注册",1);
 
 if($rsset["regadmincheck"]==0)//注册不需审核时
 {
  $userstate=-1;
 }
 else
 {
  $userstate=0;
 }
 
 $sql="select count(*) from cfstat_user where username='$username'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_row($result);
 if($rs[0]>0) alertback("已经存在此注册名,请换名注册",1);

 $sql="insert into cfstat_user (username,pwd,pwd_view,email,qq,pagename,pageurl,countershow,adddate,imgselftext,userstate,otherset,usercode) values
 ('$username','$pwd','$pwd','$email','$qq','$pagename','$pageurl','$countershow','".date("Y-m-d")."','总访问:{imgcounter}
今天PV:{todaytotal}
今天IP:{todayiptotal}
昨天PV:{yesterdaytotal}
昨天IP:{yesterdayiptotal}
IP:{ip}','$userstate','','".md5("1".$username.$pwd)."')";

 mysql_query($sql); 


 if($rsset["regadmincheck"]==0)//注册不需审核时
 {
   $_SESSION["cfstatuser"]=$username;
   setcookie("cfstatcracookie",1,time()+311040000);
	
   alerturl("注册成功","user.php?action=codeget");
  }
  else
  {
   alerturl("注册成功，但需要管理员审核成功后才能使用","index.php");
  }
  
}

//检查用户是否已经注册
if($action=="usernamechecksave"){

header('Content-Type:text/html;charset=utf-8'); 

$username=chkstr($_POST["username"],1);

if($username=="") exit("<br>请输入要检测的用户名!");
 
 $sql="select count(*) from cfstat_user where username='$username'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_row($result);
 if($rs[0]==0)
 {
  echo $rs[0]."<br>恭喜，此用户名还没有被注册!";
 }
 else
 {
  echo "<br><font color='#ff0000'>对不起，此用户名已经被别人注册了!</font>";
 }
 
 exit;
}


//用户登陆
if($action=="userloginsave"){
 header('Content-Type:text/html;charset=utf-8');

 $username=chkstr($_POST["username"],1);
 $pwd=chkstr($_POST["pwd"],1);
 $cookies_time=chkstr($_POST["cookies_time"],2);
  
 if($username=="") exit("请输入用户名");
 if($pwd=="") exit("请输入密码");

 $sql="select username,pwd,userstate from cfstat_user where username='$username'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_assoc($result);
 if ($rs["username"]=="") exit("没有此用户");
 if ($rs["pwd"]<>md5($pwd)) exit("密码错误");
 if ($rs["userstate"]==0) exit("账号暂停或还没有审核成功");
 
 $_SESSION["cfstatuser"]=$username;
  
 $cfstatusercookie=md5("1".$rs["username"].$rs["pwd"]);
  
 setcookie("cfstatusercookie",$cfstatusercookie,time()+$cookies_time);
 setcookie("cfstatcracookie",1,time()+311040000);
  
 $sql="update cfstat_user set usercode='$cfstatusercookie' where username='$username'";
 mysql_query($sql);

 exit("登录成功");
}


//发送找回密码的链接
if($action=="pwdsend")
{
 header('Content-Type:text/html;charset=utf-8'); 
	
 $username=goback(chkstr($_POST["username"],1),"请输入用户名称");
 
 $sql="select * from cfstat_user where username='$username'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_assoc($result);
 if($rs["id"])
 {
  $email=$rs["email"];
  $usercode=$rs["usercode"];
 }
 else
 {
  alerturl("此用户不存在","?");
 }
 
$smtpserver = $rsset["smtpaddress"];//SMTP服务器  
$smtpserverport = $rsset["smtpport"];//SMTP服务器端口  
$smtpusermail = $rsset["smtpuser"];//SMTP服务器的用户邮箱  
$smtpemailto = $email;//发送给谁  
$smtpuser = $rsset["smtpuser"];//SMTP服务器的用户帐号  
$smtppass = $rsset["smtppassword"];//SMTP服务器的用户密码  

$mailsubject = $rsset["systitle"] . "找回密码的链接";//邮件主题  

$mailbody = $username：."<br>您好！<br>请打开下面的密码重新修改密码<br>";//邮件内容
$mailbody .= "<a href='".httppath(2)."pwdrecover.php?action=pwdmodify&usercode=".$usercode."' target='_blank'>".httppath(2)."pwdrecover.php?action=pwdmodify&usercode=".$usercode."</a>";

$mail = new MySendMail();

if($smtpserverport==25)
$mail->setServer($smtpserver, $smtpuser, $smtppass); //设置smtp服务器，普通连接方式
else
$mail->setServer($smtpserver, $smtpuser, $smtppass, $smtpserverport, true); //设置smtp服务器，到服务器的SSL连接

$mail->setFrom($smtpuser); //设置发件人
$mail->setReceiver($smtpemailto); //设置收件人，多个收件人，调用多次

$mail->setMail($mailsubject, $mailbody); //设置邮件主题、内容
  
if($mail->sendMail())
 alerturl("邮件发送成功，请查收你的邮箱".$email."里收到的邮件","?");
else
 alerturl("邮件发送失败","?");

}


//找回密修改
if($action=="pwdmodifysave"){

 $usercode=goback(chkstr($_GET["usercode"],1),"请输入验证码");
 $pwd=goback(chkstr($_POST["pwd"],1),"请输入密码");
 $pwd2=goback(chkstr($_POST["pwd2"],1),"请输入重复密码");
 
 if($pwd<>$pwd2) alertback("密码输入不一致",1);
 
 $sql="select * from cfstat_user where usercode='$usercode'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_assoc($result);
 if($rs["id"])
 {
  $username=$rs["username"];
 }
 else
 {
  alertback("此验证码不存在",1);
 }
 
 $pwd=md5($pwd);
 $sql="update cfstat_user set pwd='$pwd' where username='$username'";
 mysql_query($sql);
 
 alerturl("密码修改，请登录","index.php?username=".$username);
}

//管理员登陆
if($action=="adminloginsave"){
  header('Content-Type:text/html;charset=utf-8');

  $admin=chkstr($_POST["admin"],1);
  $pwd=chkstr($_POST["pwd"],1);
  $cookies_time=chkstr($_POST["cookies_time"],2);
  
  if($admin=="") exit("请输入用户名");
  if($pwd=="") exit("请输入密码");

  $sql="select * from cfstat_admin where admin='$admin'";
  $result=mysql_query($sql);
  $rs=mysql_fetch_assoc($result);
  if ($rs["admin"]=="") exit("没有此用户");
  if ($rs["pwd"]<>md5($pwd)) exit("密码错误");
  $_SESSION["cfstatadmin"]="ok";

 $cfstatadmincookie=md5("0".$rs["admin"].$rs["pwd"]);
 setcookie("cfstatadmincookie",$cfstatadmincookie,time()+$cookies_time);
 setcookie("cfstatcracookie",1,time()+311040000);
  
 $sql="update cfstat_admin set admincode='$cfstatadmincookie'";
 mysql_query($sql);
 
 exit("登录成功");
}

//留言
if($action=="gbookaddsave")
{
 $username=chkstr($_GET["username"],1);
 $content=chkstr(HTMLSpecialChars($_POST["content"]),1);
 $contact=chkstr(HTMLSpecialChars($_POST["contact"]),1);
 $ly=substr(chkstr(urldecode($_GET["ly"]),1),0,255);
 $currweb=substr(chkstr(urldecode($_GET["currweb"]),1),0,255);
  
 if($content=="") alertclose("请输入留言内容");
 if($contact=="") alertclose("请输入联系方式");

 $sql="select count(*) from cfstat_gbook where username='$username' and content='$content' and contact='$contact' and TO_DAYS(NOW())-TO_DAYS(addtime)=0";
 $result=mysql_query($sql);
 $rs=mysql_fetch_row($result);
 if($rs[0]>0) alertclose("你以前已经留过相同的留言!");
  
 $sql="insert into cfstat_gbook (username,content,contact,ly,currweb,addtime) values
 ('$username','$content','$contact','$ly','$currweb','".date("Y-m-d H:i:s")."')";
 mysql_query($sql);

 alertclose("留言成功");
}


//独立用户查看登录
if($action=="userviewlogin")
{
 $username=chkstr($_GET["username"],1);
 $pwd_view=chkstr($_POST["pwd_view"],1);

 if($username=="") alertback("请输入用户名",1);
 if($pwd_view=="") alertback("请输入独立查看密码",1);

 $pwd_view=md5($pwd_view);
 
 $sql="select username,pwd_view from cfstat_user where username='$username'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_assoc($result);
 if ($rs["username"]=="") alertback("没有此用户",1);
 if ($rs["pwd_view"]<>$pwd_view) alertback("独立查看密码错误",1);
 $_SESSION["cfstatuser_view"]=$username;
 setcookie("cfstatcracookie",1,time()+311040000);
 
 gotourl("user.php");
}
?>