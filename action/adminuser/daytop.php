<?php
$adddate=chkstr($_GET["adddate"],3);
$px=chkstr($_GET["px"],1);

if($adddate=="")
{
$adddate=date("Y-m-d");
}

if($px=="") $px="ipcounter";

pxfilter($px,"username,mycounter,ipcounter");
?>

        
<table class="tb_1">

    <tr> 
      <td colspan="6">
<?php 
echo "&nbsp;&nbsp;<select id='adddate' onChange=\"window.location=document.getElementById('adddate').options[document.getElementById('adddate').selectedIndex].value\">";
echo "<option value='?action=".$action."'>请选择查询日期</option>";
$sql="select adddate from cfstat_count_day group by adddate desc";
$result=$conn->query($sql);
while($rs=mysqli_fetch_assoc($result))
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
    <td colspan="6"><?php echo $adddate;?> 用户排行</td>
  </tr>
  <tr class="tr_2"> 
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=username">用户名</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=mycounter">PV数量</a></td>
    <td><a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=ipcounter">IP数量</a></td>
  </tr>
  <?php 
$sql="select count(*) from (select username from cfstat_count_day where TO_DAYS('$adddate') -TO_DAYS(adddate)=0 group by username) a";
$result=$conn->query($sql);
$rs=mysqli_fetch_row($result);
$page=$_GET["page"];
if ($page<=0) $page=1;
$pagesize=50;
$totalrs=$rs[0];
$totalpage=ceil($totalrs/$pagesize);
$offset=$pagesize*($page-1);

$sql="select * from cfstat_count_day where TO_DAYS('$adddate') -TO_DAYS(adddate)=0";
$sql=$sql." order by $px desc limit $offset ,$pagesize";

$result2=$conn->query($sql);

while ($rs=mysqli_fetch_assoc($result2))
{
?>
  <tr class="tr_2"> 
    <td><?php echo $rs["username"];?></td>
    <td><?php echo $rs["mycounter"];?></td>
    <td><?php echo $rs["ipcounter"];?></td>
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
                      <a href="?action=<?php echo $action;?>&adddate=<?php echo $adddate;?>&px=<?php echo $px;?>&page=<?php echo $totalpage;?>">最后一页</a>&nbsp;共<?php echo $totalrs?>条记录&nbsp;<?php echo $page;?>/<?php echo $totalpage;?>页
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