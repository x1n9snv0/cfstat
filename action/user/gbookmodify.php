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
$id=chkstr($_GET["id"],2);

$sql="select * from cfstat_gbook where username='$username' and id=$id";
$result=mysql_query($sql);
$rs=mysql_fetch_assoc($result);
?>
  <form name="form1" method="post" action="?action=gbookmodifysave&id=<?php echo $id;?>">   
<table class="tb_1">

    <tr class="tr_1"> 
      <td colspan="2">留言修改</td>
    </tr>
    <tr> 
      <td>留言内容：</td>
      <td><textarea name='content' id='content' cols='40' rows='8'><?php echo $rs["content"];?></textarea></td>
    </tr>
    <tr> 
      <td>联系方式：</td>
      <td> <textarea name='contact' id='contact' cols='40' rows='8'><?php echo $rs["contact"];?></textarea> </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改">      </td>
    </tr>

</table>  </form>