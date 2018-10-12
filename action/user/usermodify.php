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
 $sql="select * from cfstat_user where username='$username'";
 $result=mysql_query($sql);
 $rs=mysql_fetch_assoc($result);
 
?>
<form name="form1" method="post" action="?action=usermodifysave">
<table class="tb_1">
  
    <tr class="tr_1"> 
      <td colspan="2">用户修改资料
	  <?php if($rs["userstate"]==-1)
	  {
	   echo "(账号正常)";
	  }
	  elseif($rs["userstate"]==0)
	  {
	   echo "(<font color=ff0000>账号暂停</font>)";
	  }
	  ?></td>
    </tr>
    <tr> 
      <td width="20%">用户名：</td>
      <td> <?php echo $rs["username"];?></td>
    </tr>
    <tr> 
      <td>Email：</td>
      <td><input name="email" type="text" id="email" value="<?php echo $rs["email"];?>"> 
        <font color="#FF0000"> *</font></td>
    </tr>
    <tr> 
      <td>QQ：</td>
      <td><input name="qq" type="text" id="qq" value="<?php echo $rs["qq"];?>"></td>
    </tr>
    <tr> 
      <td>网站名称：</td>
      <td><input name="pagename" type="text" id="pagename" value="<?php echo $rs["pagename"];?>"> 
        <font color="#FF0000">*</font></td>
    </tr>
    <tr> 
      <td>网址：</td>
      <td><input name="pageurl" type="text" id="pageurl" value="<?php echo $rs["pageurl"];?>"> 
        <font color="#FF0000">*</font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改"></td>
    </tr>

</table>  </form>