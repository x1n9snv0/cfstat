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
 $("#adminlogin").click(function(){
  var admin = $("#admin").val();
  var pwd = $("#pwd").val();
  var cookies_time = $("#cookies_time").val();

 if(admin==""){
  alert("请输入管理员名称!");
  $("#admin").focus();
  return false;
 }

 if(pwd==""){
  alert("请输入管理员密码!");
  $("#pwd").focus();
  return false;
 }

  $.ajax({url: "admin.php",type: "post",data:"action=adminloginsave&admin="+admin+"&pwd="+pwd+"&cookies_time="+cookies_time,success: function(response){

   if(response.indexOf("成功")>=0){
    location.href='adminuser.php';
   }else{
    alert($.trim(response));
   }
  }});
 });
});
</script>

<DIV id=webmain>

<DIV class="f-l w-960">
<H2><a class=s-1>管理员入口</a>
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>

<table style="width:200px;margin:0px auto;">

                    <td class="td_3" style="width:90px;">管理员名称：</td>
                    <td><input name="admin" type="text" id="admin" style="ime-mode:inactive;width:100px"></td>
                  </tr>
                  <tr> 
                    <td class="td_3">管理员密码：</td>
                    <td><input name="pwd" type="password" id="pwd" style="ime-mode:inactive;width:100px"></td>
                  </tr>
              <TR> 
                <TD class="td_3">Cookies：</TD>
                <TD><select name="cookies_time" id="cookies_time" style="width:104px;">
                    <option value="3600" selected>不保留</option>
                    <option value="86400">保留一天</option>
					<option value="604800">保留一周</option>
                    <option value="2592000">保留一个月</option>
                  </select></TD>
              </TR>
			  <tr> 
                    <td></td>
					<td> 
<a href="javascript:;"><img src="images/login.gif" border=0 id="adminlogin" style="margin-top:5px;"></a>
</td>
                  </tr>
                </table>


<DIV class=clear></DIV>
</DIV>
<DIV class="bdr-bottom-960">
<DIV class=bdr-right2></DIV>
</DIV>
<DIV class="bk-10"></DIV>
</DIV>

</DIV>