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


<DIV class="f-l w-960">
<H2><a class=s-1>用户注册</a>
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>



<?php 
if($rsset["regstate"]==-1)
{
?>
<script>
$(function(){
 $("#username").mouseleave(function(){
  var username = $("#username").val();
  $.ajax({url: "?",type: "post",data:"action=usernamechecksave&username="+username,success: function(response){
   $("#username_text").html($.trim(response));
  }});
 });


$("#userreg").click(function(){

if($('#username').val()==""){
 alert ('用户名必须填写');
 $('#username').focus();
 return false;
}

if(!chkname($('#username').val())){
 alert ('用户名不规则');
 $('#username').focus();
 return false;
}

if($('#pwd').val()==""){
 alert ('密码必须填写');
 $('#pwd').focus();
 return false;
}

if($('#pwd2').val()==""){
 alert ('重复密码必须填写');
 $('#pwd2').focus();
 return false;
}

if($('#pwd2').val()!=$('#pwd').val()){
 alert ('两次填写的密码不一样，请重写填写');
 $('#pwd2').focus();
 return false;
}

if($('#email').val()==""){
 alert ('email必须填写');
 $('#email').focus();
 return false;
}

if(!isValidEmail($('#email').val())){
 alert ('email的格式不正确');
 $('#email').focus();
 return false;
}

if($('#pagename').val()==""){
 alert ('主页名称必须填写');
 $('#pagename').focus();
 return false;
}

if($('#pageurl').val()==""){
 alert ('主页网址必须填写');
 $('#pageurl').focus();
 return false;
}

});



});




function chkname(String){ 
var Letters = "abcdefghijklmnopqrstuvwxyz1234567890_"; //可以自己增加可输入值
var i;
var c;
if(String.charAt( 0 )=='-')
return false;
if( String.charAt( String.length - 1 ) == '-' )
return false;
for( i = 0; i < String.length; i ++ )
{
c = String.charAt( i );
if (Letters.indexOf( c ) < 0)
return false;
}
return true;
}

function isValidEmail(s){
 var reg1 = new RegExp('^[a-zA-Z0-9][a-zA-Z0-9@._-]{3,}[a-zA-Z]$');
 var reg2 = new RegExp('[@.]{2}');
 if (s.search(reg1) == -1
  || s.indexOf('@') == -1
  || s.lastIndexOf('.') < s.lastIndexOf('@')
  || s.lastIndexOf('@') != s.indexOf('@')
  || s.search(reg2) != -1)
  return false;		
 return true;
}
</script>

<table>
<form name="form2" id="form2" method="post" action="?action=userregsave">
            <tr> 
              <td width="35%" class="td_3">用户名：</td>
              <td><input type="text" name="username" id="username" autoComplete="off" STYLE="ime-mode:inactive;width:220px">
        <font color="#FF0000">*</font>(只能填写小写英文字母,数字或下划线)<span id='username_text'></span>
		</td>
            </tr>
            <tr> 
              <td class="td_3">密　码：</td>
              <td><input name="pwd" id="pwd" type="password" style="ime-mode:inactive;width:220px">
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td class="td_3">重复密码：</td>
              <td><input name="pwd2" id="pwd2" type="password" style="ime-mode:inactive;width:220px">
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td class="td_3">Email：</td>
              <td><input name="email" id="email" type="text" style="ime-mode:inactive;width:220px">
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td class="td_3">Q　Q：</td>
              <td><input name="qq" id="qq" type="text" style="ime-mode:inactive;width:220px"></td>
            </tr>
            <tr> 
              <td class="td_3">主页名称：</td>
              <td><input name="pagename" id="pagename" type="text" style="ime-mode:inactive;width:220px">
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td class="td_3">主页网址：</td>
              <td><input name="pageurl" id="pageurl" type="text" style="ime-mode:inactive;width:220px">
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td class="td_3">计数样式：</td>
              <td> <input name="countershow" type="radio" value="1" checked>
                数字 
                <input type="radio" name="countershow" value="2">
                图标
				<input type="radio" name="countershow" value="3">
                文字
				<input type="radio" name="countershow" value="4">
                留言</td>
            </tr>
<tr> 
<td>&nbsp;</td>
<td>
<INPUT type="image" name="userreg" id="userreg" src="images/reg.gif" style="width:53px;height:21px;border:0px;margin:8px 0px">
<?php 
if($rsset["regadmincheck"]==-1)
{
 echo "<br><font color='ff0000'>注意：注册后需管理员审核才能开通</font>";
}
?>
</td>
</tr>
</form>
</table>
<?php 
}else{
echo "<div style='text-align:center;font-weight:bold;font-size:14px;color:#ff0000;'>对不起,本统计系统已经暂停新用户注册!</div>";
}?>


<DIV class=clear></DIV>
</DIV>
<DIV class="bdr-bottom-960">
<DIV class=bdr-right2></DIV>
</DIV>
<DIV class="bk-10"></DIV>
</DIV>


