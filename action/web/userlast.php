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
<table style="width:90%;margin:0px auto;">
        <td style="width:70px" >用户名</td>
        <td>注册日期</td>
      </tr>
<?php 
$sql="select * from cfstat_user order by adddate desc,id desc limit 0 ,10";
 
$result2=mysql_query($sql);
while ($rs=mysql_fetch_assoc($result2))
{
?>
      <tr> 
        <td><?php echo $rs["username"];?></td>
        <td><?php echo $rs["adddate"];?></td>
      </tr>

          <?php }?>
</table>

