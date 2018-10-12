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

<script>
$(function(){
 $("#login").click(function(){
  var username = $("#username").val();
  var pwd = $("#pwd").val();
  var cookies_time = $("#cookies_time").val();

 if(username==""){
  alert("请输入用户名!");
  $("#username").focus();
  return false;
 }

 if(pwd==""){
  alert("请输入密码!");
  $("#pwd").focus();
  return false;
 }

  $.ajax({url: "index.php",type: "post",data:"action=userloginsave&username="+username+"&pwd="+pwd+"&cookies_time="+cookies_time,success: function(response){

   if(response.indexOf("成功")>=0){
    location.href='user.php';
   }else{
    alert($.trim(response));
   }
  }});
 });
});
</script>

<table id="userlogin" width=100%>

<?php 
if($_SESSION["cfstatuser"]=="")
{
?>

      <tr> 
        <td >用户名：</td>
        <td><INPUT id=username size=15 name=username value="<?php echo $_GET["username"];?>" style="width:130px"></td>
      </tr>
      <tr> 
        <td>密&nbsp;&nbsp;码：</td>
        <td><INPUT id=pwd type=password size=15 name=pwd style="width:130px"></td>
      </tr>

      <tr> 
        <td>Cookie：</td>
        <td><select name="cookies_time" id="cookies_time" style="width:134px;">
            <option value="3600" selected>不保留</option>
            <option value="86400">保留一天</option>
			<option value="604800">保留一周</option>
            <option value="2592000">保留一个月</option>
          </select></td>
      </tr>

      <tr> 
        <td><a href="pwdrecover.php">忘记密码</a></td>
        <td style="padding-top:5px;">
<a href="javascript:;"><img src="images/login.gif" border=0 id="login"></a>
&nbsp;<a href="reg.php"><img src="images/reg.gif" border=0></a>
</td>
      </tr>

<?php 
}
else
{
  echo "<tr><td style='text-align:center;padding:10px;'><a href='user.php'><img src='images/manage.gif' 
            border=0></a></td></tr>";
  echo "<tr><td style='text-align:center;padding:10px;'><a href='user.php?action=userlogout' onClick=\"{if(confirm('确定要退出管理么?')){return true;}return false;}\"><img src='images/logout.gif' 
            border=0></a></td></tr>";
}
?>

</form>
</table>
