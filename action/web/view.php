<script>
function userlogincheck()
{
  if(window.document.form_view.pwd_view.value==="")
  {
     alert("请输入独立查看密码!");
	 window.document.form_view.pwd_view.focus();
	 return false;
  }
 return true;
}

</script>

<?php 
$username=$_GET["username"];

$sql="select pagename,gbookstate from cfstat_user where username='$username'";
$result=$conn->query($sql);
$rs=mysqli_fetch_assoc($result);
?>
<table class="tb_2">
  <tr class="tr_1"> 
    <td><a href="index.php?username=<?php echo $username;?>">[<?php echo $rs["pagename"];?>] 的站长请点击这里登录</a></td>
  </tr>
  <form name="form_view" id="form_view" method="post" action="?action=userviewlogin&username=<?php echo $username;?>" onsubmit="return userlogincheck();">
    <tr class="tr_2"> 
<td style="padding-top:10px;padding-bottom:20px;">独立查看密码： 
<input title = "passwd_view" name="pwd_view" type="password" id="pwd_view">
<INPUT type=image name=imageField src="images/login.gif" style="width:53px;height:21px;border:0;vertical-align:middle">
</td>
    </tr>
  </form>
<?php 
if($rs["gbookstate"]==-1)
{
?>
<script>
function gbookcheck(){
 if(document.form_gbook.content.value===""||document.form_gbook.content.value==="请输入留言内容"){
  alert("请输入留言内容!");
  document.gbook_form.content.focus();
  return false;
 }
 if(document.form_gbook.contact.value===""||document.form_gbook.contact.value==="请输入联系方式"){
  alert("请输入联系方式!");
  document.form_gbook.contact.focus();
  return false;
 }
 
document.getElementById("form_gbook").submit();
}
</script>
  <form name="form_gbook" id="form_gbook" method="post" action="gbook.php?action=gbookaddsave&username=<?php echo $username;?>" target="_blank">
    <tr class="tr_1"> 
      <td>给[<?php echo $rs["pagename"];?>]站长留言</td>
    </tr>
	<tr class="tr_2"> 
      <td>留言内容：<br /> 
<textarea name='content' id='content' cols='22' rows='8' style="overflow:auto;border: 1px solid #C9DDF0;" onclick="if(document.getElementById('content').value==='请输入留言内容')document.getElementById('content').value='';" onmouseout="if(document.getElementById('content').value==='')document.getElementById('content').value='请输入留言内容';">请输入留言内容</textarea>
        </td>
		</tr>
		<tr class="tr_2"> 
      <td>联系方式：<br /> 
<textarea name='contact' id='contact' cols='22' rows='6' style="overflow:auto;border: 1px solid #C9DDF0;" onclick="if(document.getElementById('contact').value==='请输入联系方式')document.getElementById('contact').value='';" onmouseout="if(document.getElementById('contact').value==='')document.getElementById('contact').value='请输入联系方式';">请输入联系方式</textarea>
        </td>
    </tr>
		<tr class="tr_2"> 
      <td><span style="cursor:hand"><img src='images/gbook_send.gif' onclick="gbookcheck()" ></span>
        </td>
    </tr>
  </form>
<?php 
}
?>  
</table>