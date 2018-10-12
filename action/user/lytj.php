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
$px=chkstr($_GET["px"],1);

if($adddate=="")
{
$adddate=date("Y-m-d");
}

if($px=="") $px="mycounter";

pxfilter($px,"lyhead,mycounter,ipcounter,addtime,ip,lasttime");
?>

        
<table class="tb_1">

    <tr> 
      <td colspan="6">
<?php 
echo "&nbsp;&nbsp;<select id='adddate' onChange=\"window.location=document.getElementById('adddate').options[document.getElementById('adddate').selectedIndex].value\">";
echo "<option value='?action=".$action."'>请选择查询日期</option>";
$sql="select adddate from cfstat_ly_day where username='$username' group by adddate desc";
$result=mysql_query($sql);
while($rs=mysql_fetch_assoc($result))
{ 
   echo "<option value=?action=".$action."&adddate=".$rs["adddate"];     
   if($adddate==$rs["adddate"]) echo " selected";
   echo ">".$rs["adddate"]."</option>";   
;}
echo "</select>";
?>
      </td>
    </tr>

  <tr class="tr_1"> 
    <td colspan="6">来源统计(点标题可排序)</td>
  </tr>
  <tr class="tr_2"> 
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=lyhead">来源站点</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=mycounter">PV数量</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=ipcounter">IP数量</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=addtime">开始访问时间</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=ip">最后访问IP</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=lasttime">最后访问时间</a></td>
  </tr>
  <?php 
$sql="select count(*) from cfstat_ly_day where username='$username' and TO_DAYS('$adddate') -TO_DAYS(adddate)=0";
$result=mysql_query($sql);
$rs=mysql_fetch_row($result);
$page=$_GET["page"];
if ($page<=0) $page=1;
$pagesize=10;
$totalrs=$rs[0];
$totalpage=ceil($totalrs/$pagesize);
$offset=$pagesize*($page-1);
$sql="select * from cfstat_ly_day where username='$username' and TO_DAYS('$adddate') -TO_DAYS(adddate)=0 order by $px desc limit $offset ,$pagesize";
$result2=mysql_query($sql);

while ($rs=mysql_fetch_assoc($result2))
{
?>
  <tr class="tr_2"> 
    <td> 
        <?php 
			if($rs["lyhead"]!="")
			{
			 echo "<a href=?action=urlgo&url=".urlencode("http://".$rs["lyhead"])." target=_blank>".htmlspecialchars($rs["lyhead"])."</a>[<a href=?action=urlgo&url=".urlencode($rs["ly"])." target=_blank>详细</a>]";
			 }
			 else
			 {
			  echo "直接从浏览器输入";
			 }
			?>
    </td>
    <td><?php echo $rs["mycounter"];?></td>
    <td><?php echo $rs["ipcounter"];?></td>
    <td><?php echo substr($rs["addtime"],strpos($rs["addtime"]," ")+1);?></td>
    <td><?php echo $rs["ip"]."<br>".getiparea($rs["ip"]);?></td>
    <td><?php echo substr($rs["lasttime"],strpos($rs["lasttime"]," ")+1);?></td>
  </tr>
  <?php }?>
</table>
<table class="tb_3">
                <tr> 
                  <td> <a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=<?php echo $px;?>&page=1">第一页</a> 
                      <?php if($page>1){?>
                      <a href='?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=<?php echo $px;?>&page=<?php echo $page-1;?>'>上一页</a> 
                      <?php }?>
                      <?php if($page<$totalpage){?>
                      <a href='?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=<?php echo $px;?>&page=<?php echo $page+1;?>'>下一页</a> 
                      <?php }?>
                      <a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=<?php echo $px;?>&page=<?php echo $totalpage;?>">最后一页</a>&nbsp;共<font color="#FF0000"><?php echo $totalrs?></font>条记录&nbsp;<font color="#ff0000"><?php echo $page;?></font>/<?php echo $totalpage;?>页
<?php 
echo "&nbsp;&nbsp;转到第<select id='page' onChange=\"window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value\">";
for ($i=1;$i<=$totalpage;$i++){
 echo "<option value=?action=".$action."&adddate=".$adddate."&px=".$px."&page=".$i;
 if($page==$i) echo " selected";   
 echo ">".$i."</option>";   
}
echo "</select>页";
?>
</td>
                </tr>
</table>