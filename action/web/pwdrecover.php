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
function pwdrecovercheck()
{
  if(window.document.form1.username.value=="")
  {
     alert("请输入你的用户名!");
	 window.document.form1.username.focus();
	 return false;
  }
return true;
}
</script>


<DIV id=webmain>

<DIV class="f-l w-960">
<H2><a class=s-1>找回密码</a>
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>

<table>
  <form name="form1" id="form1" method="post" action="?action=pwdsend"  onsubmit="return pwdrecovercheck()">

    <tr> 
      <td colspan="2" class="td_2">请输入你的用户名，系统会自动发送一封修改密码邮件到你的管理资料中的E-Mail地址内,如果还没有收到请和超级管理员联系! 
       </td>
    </tr>
    <tr> 
      <td class="td_3">你的用户名：</td>
      <td><input name="username" type="text" id="username" size="15"></td>
    </tr>
    <tr> 
      <td></td>
	  <td>
          <input type="submit" name="Submit" value="取回密码" > <a href="index.php">返回首页</a>
        </td>
    </tr>
  </form>
</table>


<DIV class=clear></DIV>
</DIV>
<DIV class="bdr-bottom-960">
<DIV class=bdr-right2></DIV>
</DIV>
<DIV class="bk-10"></DIV>
</DIV>

</DIV>