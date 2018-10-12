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
$adddate=chkstr($_GET["adddate"],3);
if($adddate=="")
{
 $adddate=date("Y-m-d");
}
?>
<table class="tb_1">
  <tr > 

      <td colspan="4">
<select id='adddate' onChange="window.location=document.getElementById('adddate').options[document.getElementById('adddate').selectedIndex].value">
<option value="?action=<?php echo $action;?>">请选择查询日期</option>
<?php 
$sql="select adddate from cfstat_client_day where username='$username' group by adddate desc";
$result=mysql_query($sql);
while($rs=mysql_fetch_assoc($result))
{ 
   echo "<option value=?action=".$action."&adddate=".$rs["adddate"];     
   if($adddate==$rs["adddate"]) echo " selected";   
   echo ">".$rs["adddate"]."</option>";   
}

?></select></td>
  </tr>
  <tr class="tr_1"> 
    <td colspan="2"><?php echo $adddate;?> 客户端统计</td>
  </tr>

  <?php 
$sql="select * from cfstat_client_day where username='$username' and adddate='$adddate'";
$result=mysql_query($sql);
$rs=mysql_fetch_assoc($result);

?>
  <tr> 
    <td class="td_3" width="50%">Alexa安装数量：</td>
	<td><?php echo $rs["alexacounter"];?></td>
  </tr>

  <tr class="tr_1"> 
    <td colspan="2">浏览器</td>
  </tr>
  <tr>
    <td class="td_3">IE8：</td>
    <td><?php echo $rs["browser1"];?></td>
  </tr>
  <tr>
    <td class="td_3">IE9：</td>
    <td><?php echo $rs["browser2"];?></td>
  </tr>
  <tr>
    <td class="td_3">IE10：</td>
    <td><?php echo $rs["browser3"];?></td>
  </tr>
  <tr>
    <td class="td_3">搜狗：</td>
    <td><?php echo $rs["browser4"];?></td>
  </tr>
  <tr>
    <td class="td_3">360：</td>
    <td><?php echo $rs["browser5"];?></td>
  </tr>
  <tr>
    <td class="td_3">Chrome：</td>
    <td><?php echo $rs["browser6"];?></td>
  </tr>
  <tr>
    <td class="td_3">火狐：</td>
    <td><?php echo $rs["browser7"];?></td>
  </tr>
  <tr>
    <td class="td_3">其它：</td>
	<td><?php echo $rs["browserother"];?></td>
  </tr>
  <tr class="tr_1"> 
    <td colspan="2">系统</td>
  </tr>
  <tr>
    <td class="td_3">Windows 7：</td>
    <td><?php echo $rs["os1"];?></td>
  </tr>
  <tr>
    <td class="td_3">Windows 8：</td>
    <td><?php echo $rs["os2"];?></td>
  </tr>
  <tr>
    <td class="td_3">Windows XP：</td>
    <td><?php echo $rs["os3"];?></td>
  </tr>
  <tr>
    <td class="td_3">安卓：</td>
    <td><?php echo $rs["os4"];?></td>
  </tr>
  <tr>
    <td class="td_3">iPhone：</td>
    <td><?php echo $rs["os5"];?></td>
  </tr>
  <tr>
    <td class="td_3">其它：</td>
	<td><?php echo $rs["osother"];?></td>
  </tr>
  <tr class="tr_1"> 
    <td colspan="2">屏幕</td>
  </tr>
  <tr>
    <td class="td_3">屏幕宽1024/1280/1440/1152/1680/800/1600/1920/1360/其它：</td>
	<td><?php echo $rs["screenwidth1"];?>/<?php echo $rs["screenwidth2"];?>/<?php echo $rs["screenwidth3"];?>/<?php echo $rs["screenwidth4"];?>/<?php echo $rs["screenwidth5"];?>/<?php echo $rs["screenwidth6"];?>/<?php echo $rs["screenwidth7"];?>/<?php echo $rs["screenwidth8"];?>/<?php echo $rs["screenwidth9"];?>/<?php echo $rs["screenwidthother"];?></td>
  </tr>
  <tr>
    <td class="td_3">屏幕高768/800/900/1024/864/1050/960/720/600/其它：</td>
	<td><?php echo $rs["screenheight1"];?>/<?php echo $rs["screenheight2"];?>/<?php echo $rs["screenheight3"];?>/<?php echo $rs["screenheight4"];?>/<?php echo $rs["screenheight5"];?>/<?php echo $rs["screenheight6"];?>/<?php echo $rs["screenheight7"];?>/<?php echo $rs["screenheight8"];?>/<?php echo $rs["screenheight9"];?>/<?php echo $rs["screenheightother"];?></td>
  </tr>
  <tr>
    <td class="td_3">屏幕色彩32位/16位/24位/其它：</td>
	<td><?php echo $rs["screencolordepth1"];?>/<?php echo $rs["screencolordepth2"];?>/<?php echo $rs["screencolordepth3"];?>/<?php echo $rs["screencolordepthother"];?></td>
  </tr>
</table>
