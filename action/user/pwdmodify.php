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
<form name="form1" method="post" action="?action=pwdmodifysave">
<table class="tb_1">
  
   <tr class="tr_1"> 
      <td colspan="2">用户修改密码</td>
    </tr>
    <tr> 
      <td>用户名：</td>
      <td> <?php echo $username;?></td>
    </tr>
    <tr> 
      <td width="20%">输入旧管理密码确认：</td>
      <td><input name="pwd_old" type="password" id="pwd">
      </td>
    </tr>
	<tr> 
      <td>新管理密码：</td>
      <td><input name="pwd" type="password" id="pwd">
      </td>
    </tr>
    <tr> 
      <td>重复新管理密码：</td>
      <td><input name="pwd2" type="password" id="pwd2"></td>
    </tr>
	<tr> 
      <td>新查看密码：</td>
      <td><input name="pwd_view" type="password" id="pwd">
      </td>
    </tr>
    <tr> 
      <td>重复新查看密码：</td>
      <td><input name="pwd_view2" type="password" id="pwd2"></td>
    </tr>
	<tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改"></td>
    </tr>

</table>
  </form>