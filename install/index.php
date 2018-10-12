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

header('Content-Type:text/html;charset=utf-8');

if(file_exists('install.lock')) die("程序已运行安装，如果你确定要重新安装，请先删除安装锁定文件install.lock文件后再执行install/index.php安装！");


function connopen(){
$dbhost=$_SESSION['cfstatinstall']['dbhost'];
$dbuser=$_SESSION['cfstatinstall']['dbuser'];
$dbpwd=$_SESSION['cfstatinstall']['dbpwd'];
$dbname=$_SESSION['cfstatinstall']['dbname'];

$conn = mysql_connect($dbhost,$dbuser,$dbpwd) or die("对不起，发生错误！ 请检查conn.php中数据库的配置是否正确！");

mysql_query("set names 'utf8'");
mysql_select_db($dbname,$conn);
}


$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";


if($action=="setuplock")
{
$fp=@fopen("install.lock","w") or die("写方式打开文件失败，请检查程序目录是否为可写");//生成一个安装文件
@fputs($fp,"此文件是用于判断程序是否已经安装，除非重新安装程序，否则请不要删除此文件！") or die("文件写入失败,请检查程序目录是否为可写"); 
@fclose($fp);
exit("<script>alert('安装锁定文件生成成功，转到系统首页');location.href='index.php';</script>");
}

if($action=="dbconnsave")
{
header('Content-Type:text/html;charset=utf-8');



if(isset($_POST["dbhost"])&&!empty($_POST["dbhost"]))
 $dbhost=$_POST["dbhost"];
else
 exit("请填写Mysql主机地址");

if(isset($_POST["dbname"])&&!empty($_POST["dbname"]))
 $dbname=$_POST["dbname"];
else
 exit("请填写Mysql数据库名");

if(isset($_POST["dbuser"])&&!empty($_POST["dbuser"]))
 $dbuser=$_POST["dbuser"];
else
 exit("请填写数据库连接用户名");

if(isset($_POST["dbpwd"]))
 $dbpwd=$_POST["dbpwd"];


$conn = @mysql_connect($dbhost,$dbuser,$dbpwd);

if(!$conn)
{
 die("连接数据库失败,请正确配置数据库信息!");
}
else
{
 $db=mysql_select_db("$dbname",$conn);
 if(!$db){

 //如果Mysql的版本为低版本时,不能使用DEFAULT CHARSET=utf8
 if(substr(mysql_get_server_info(),0,1)=="4")
 {
  $sql="CREATE DATABASE `$dbname`";
 }
 else
 {
  $sql="CREATE DATABASE `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
 }

  mysql_query($sql) or die("数据库$dbname不存在,系统创建的时候也失败");
   
 }
}

mysql_select_db($dbname,$conn) or die("选择数据库失败,请正确填写数据库名称信息!");
	
 $content = "<?php ".chr(13).chr(10);
 $content .= "\$dbhost=\"$dbhost\";//Mysql主机的IP地址,如localhost或localhost:3306".chr(13).chr(10);;
 $content .= "\$dbname=\"$dbname\";//Mysql数据库名".chr(13).chr(10);;
 $content .= "\$dbuser=\"$dbuser\";//连接Mysql的用户名".chr(13).chr(10);;
 $content .= "\$dbpwd=\"$dbpwd\";//连接Mysql的密码".chr(13).chr(10);;


 $content .= "\$conn = mysql_connect(\$dbhost,\$dbuser,\$dbpwd) or die (\"无法连接到Mysql主机！\");".chr(13).chr(10);
 $content .= "mysql_query(\"set names 'utf8'\");".chr(13).chr(10);
 $content .= "mysql_select_db(\$dbname,\$conn) or die (\"无法连接到Mysql数据库！\");".chr(13).chr(10).chr(13).chr(10);
 
 $content .= "?>";

 $fp=@fopen("../conn.php","w") or die("写方式打开文件失败，请检查程序目录是否为可写");//配置conn.php文件
 @fputs($fp,$content) or die("文件写入失败,请检查程序目录是否为可写"); 
 @fclose($fp); 
  
 $_SESSION["cfstatinstall"]=array("dbhost"=>$dbhost,"dbname"=>$dbname,"dbuser"=>$dbuser,"dbpwd"=>$dbpwd);

 exit("配置成功，下一步将进行数据库表的创建");
}
?>
<!DOCTYPE> 
<html>
<head>
<title>
程序安装
</title>
<meta http-equiv=content-type content="text/html; charset=utf-8">
<style type="text/css">
body {text-align: left; font-family:Arial; margin:0; padding:0; background: #FFF; font-size:14px; color:#333333;}
table{font-size:14px;font-family:arial;}

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
	height:0px;
}
.wrap{
	width:950px;;
	margin:0 auto;
}
.bord{
	border:#b0bec7 1px solid;
}
</style>
<script type="text/javascript" src="../images/jquery.min.js"></script>
</HEAD>
<BODY>
 


<?php 
if($action=="")
{
?>

<table class="tb_2">
                    <tr class="tr_1"> 
                      
    <td >新安装乘风多用户统计系统</td>
                    </tr>
                    <tr> 
                      <td> 检查参数设置<br />
                          请务必设置您拥有的Mysql帐号信息，准确填写有助您安装的顺利进行。<p>
                       检查目录属性<br />
        需要进行文件的读写操作，必须相应拥有目录的777属性。<p>
                       安装数据库<br />
        进行数据初始化安装。<p>
                       安装完成<br />
        删除安装文件，确保系统安全性。 </td>
                    </tr>
                    <tr>
                      <td class="td_2">
        <input name="Submit" type="button" class="button" onClick="window.location='?action=step_2'" value="开始新安装" style="margin:10px 0px 80px">
      </td>
                    </tr>
                    <tr class="tr_1"> 
                      
    <td >如果已安装过，可以直接生成安装锁定文件</td>
</tr>
<tr>
<td class="td_2"><input name="Submit" type="button" class="button" onClick="{if(confirm('确定你已经安装过，需要生成安装锁定文件么?')){window.location='?action=setuplock';return true;}return false;}" value="已安装，生成安装锁定文件install.lock" style="margin:10px 0px 20px">
<br>
如自己手工导入系统数据文件到mysql数据库中，自己配置好数据库连接conn.php，然后直接生成安装锁定文件后即可进入系统首页
</td>
</tr>
                  </table>
<?php 
}
?>


<?php 
if($action=="step_2")
{
?>
<script>
$(function(){
 $("#submit").click(function(){
  var dbhost = $("#dbhost").val();
  var dbname = $("#dbname").val();
  var dbuser = $("#dbuser").val();
  var dbpwd = $("#dbpwd").val();
  

  $.ajax({url: "?",type: "post",data:"action=dbconnsave&dbhost="+dbhost+"&dbname="+dbname+"&dbuser="+dbuser+"&dbpwd="+dbpwd,success: function(response){

   if(response.indexOf("成功")>=0){
    alert(response.replace(/\\n/g,"\n"));location.href='?action=step_3';
   }else{
    alert($.trim(response));
   }
  }});
 });
});
</script>
<table class="tb_2">

    <tr class="tr_1"> 
      <td colspan="2">数据库配置</td>
    </tr>
    <tr> 
      <td width="45%" class="td_3">数据库服务器 ：</td>
      <td>
        <input name="dbhost" type="text" id="dbhost" value="localhost">
        
        例如：localhost或localhost:3306</td>
    </tr>
    <tr> 
      <td class="td_3">数据库名：</td>
      <td><input name="dbname" type="text" id="dbname" value="cfstat">
        例如：cfstat</td>
    </tr>
    <tr> 
      <td class="td_3">数据库用户名：</td>
      <td><input name="dbuser" type="text" id="dbuser" value="root">
        例如：root</td>
    </tr>
    <tr> 
      <td class="td_3">数据库密码：</td>
      <td><input name="dbpwd" type="password" id="dbpwd" value="">
        例如：1234</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" id="submit" type="submit" class="button" value="提交配置" /> 

      </td>
    </tr>

</table>

<?php 
}
?>


<?php 
if($action=="step_3")
{
if($_SESSION["cfstatinstall"]=="") exit("没有权限操作");
connopen();


$sql="";

$handle=fopen("../data/mysql.sql","rb");

while(!feof($handle))   
{   
 $sql .= fgets($handle);   
}

//如果Mysql的版本为低版本时,不能使用DEFAULT CHARSET=utf8
if(substr(mysql_get_server_info(),0,1)=="4") $sql=str_replace(" DEFAULT CHARSET=utf8","",$sql);

$arr=explode("----",$sql);

for ($i=0;$i<count($arr);$i++){
 if(strpos($arr[$i],";")){
  $arr2=explode(";",$arr[$i]);
  for ($j=0;$j<count($arr2);$j++){
   if(strpos(strtolower($arr2[$j]),"drop table")||strpos(strtolower($arr2[$j]),"create table")||strpos(strtolower($arr2[$j]),"insert into")){
	  mysql_query($arr2[$j]);
   }
  }
 }
}


if(mysql_error())
 echo mysql_error();
else
 echo "<table class='tb_2'>";
 echo "<tr class='tr_1'><td align='center'>数据库表创建</td></tr>";
 echo "<tr><td class='td_2'>数据库表创建已经完成,下一步将设置统计系统管理员用户名和密码</td></tr>";
 echo "<tr><td class='td_2'><input name=\"Submit\" type=\"button\" onclick=\"window.location='?action=step_4'\" value=\"下一步\"></td></tr>";
 echo "</table>";
}
?>


<?php 
if($action=="step_4")
{

if($_SESSION["cfstatinstall"]=="") exit("没有权限操作");
connopen();
?>
<script>
function check()
{
  if(document.form1.admin.value=="")
  {
   alert("请输入管理员名称!");
   window.document.form1.admin.focus();
   return false;
  }
  
  if(document.form1.pwd.value=="")
  {
   alert("请输入管理员密码!");
   document.form1.pwd.focus();
   return false;
  }
  
 if ((document.form1.pwd2.value)=="")
 {
   alert ('重复密码必须填写!');
   document.form1.pwd2.focus();
   return false;
  }
  
 if ((document.form1.pwd.value)!==(document.form1.pwd2.value))
 {
  alert ('两次填写的密码不一样，请重写填写!');
  document.form1.pwd2.focus();
  return false;
 }
 
 if(document.form1.pwd.value=="admin")
 {
   if(confirm('确定要使用默认的密码admin吗，确定则进行下一步，取消则重新输入密码?'))
   {
    return true;
	}
	else
	{
	return false;
	}
  }

 return true;
}
</script>

<table class="tb_2">
  <form name="form1" method="post" action="?action=step_5" onSubmit="return check()">
    <tr class="tr_1"> 
      <td colspan="2">管理员设置</td>
    </tr>
    <tr> 
      <td width="45%" class="td_3">管理员用户名 ：</td>
      <td>
        <input name="admin" type="text" id="admin" value="admin">
        
        (用户名默认为：admin)</td>
    </tr>
    <tr> 
      <td class="td_3">管理员密码：</td>
      <td><input name="pwd" type="password" id="pwd" value="admin">
        (密码默认为：admin)</td>
    </tr>
    <tr> 
      <td class="td_3">确认密码：</td>
      <td><input name="pwd2" type="password" id="pwd2" value="admin">
        </td>
    </tr>
	<tr> 
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" value="设置" /> 
      </td>
    </tr>
  </form>
</table>

<?php 
}
?>


<?php 
if($action=="step_5")
{
if($_SESSION["cfstatinstall"]=="") exit("没有权限操作");
connopen();

 $admin=$_POST["admin"];
 $pwd=$_POST["pwd"];
 $pwd2=$_POST["pwd2"];

 if($admin==""){
  exit("<script>alert('请输入管理员名称');history.go(-1)</script>");
 }
 
 if($pwd=="")
 {
  exit("<script>alert('请输入新密码');history.go(-1)</script>");
 }

 if($pwd2=="")
 {
  exit("<script>alert('请输入重复新密码');history.go(-1)</script>");
 }

 
 if($pwd<>$pwd2)
 {
  exit("<script>alert('两次输入的密码不一致');history.go(-1)</script>");
 }

 
  
 $pwd=md5($pwd);
 $sql="update cfstat_admin set admin='$admin',pwd='$pwd'";

 mysql_query($sql);

 echo "<script>location.href='?action=step_6'</script>";
}
?>


<?php 
if($action=="step_6")
{

if($_SESSION["cfstatinstall"]=="") exit("没有权限操作");
connopen();
?>
<table class="tb_2">
    <tr class="tr_1"> 
      <td>导入IP数据库</td>
    </tr>
    <tr> 
      <td>导入后可以显示IP对应的地区，IP库可以更新</td>
    </tr>

    <tr> 
      <td class="td_2">
        <input name="Submit2" type="button" value="开始导入IP数据库" onClick="location.href='?action=step_7';">
      </td>
    </tr>

</table>
<?php 
}
?>



<?php 
if($action=="step_7")
{
if($_SESSION["cfstatinstall"]=="") exit("没有权限操作");
connopen();

$ipnum=isset($_GET["ipnum"]) ? $_GET["ipnum"] : 1;

if($ipnum>3)
 exit("<script>location.href='?action=step_8';</script>");
else
 echo "正在导入，请稍等。。。";


$sql="";

$handle=fopen("../data/ip_".$ipnum.".sql","a+");       

while(!feof($handle))   
{   
 $sql .= fgets($handle);   
}

$myarray=explode(";",$sql);
for ($i=0;$i<=count($myarray)-1;$i++)
{
 mysql_query($myarray[$i]);
}

$ipnum_2 = $ipnum + 1;

echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=?action=step_7&ipnum=".$ipnum_2."\">";
}
?>



<?php 
if($action=="step_8")
{

if($_SESSION["cfstatinstall"]=="") exit("没有权限操作");
connopen();
?>
<table class="tb_2">
    <tr class="tr_1"> 
      <td>安装步骤全部完成</td>
    </tr>
    <tr> 
      <td class="td_2">恭喜您，您已经成功安装乘风多用户统计系统</td>
    </tr>

    <tr> 
      <td class="td_2"><input name="Submit2" type="button" value="　 转到统计首页　 " onClick="location.href='../index.php';"></td>
    </tr>

    <tr> 
      <td class="td_2"><input name="Submit2" type="button" value="转到统计管理员入口" onClick="location.href='../admin/index.php';">
      </td>
    </tr>
</table>

<?php 
unset($_SESSION["cfstatinstall"]);

$fp=@fopen("install.lock","w") or die("写方式打开文件失败，请检查程序目录是否为可写");//生成一个安装文件
@fputs($fp,"此文件是用于判断程序是否已经安装，除非重新安装程序，否则请不要删除此文件！") or die("文件写入失败,请检查程序目录是否为可写"); 
@fclose($fp);
}
?>

</body>
</html>

