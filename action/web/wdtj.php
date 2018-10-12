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


<DIV class="f-l w-730">
<H2><a class=s-1>网店统计</a> 
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>



<table class="index_tb">

  <tr class="tr_1"> 
 <td colspan="3">网店类图片列表</td>
</tr>
<?php 
$sql="select count(*) from cfstat_upfile where username='' order by addtime desc";
$result=mysql_query($sql);
$rs=mysql_fetch_row($result);
$page=$_GET["page"];
if ($page<=0) $page=1;
$pagesize=6;
$totalrs=$rs[0];
$totalpage=ceil($totalrs/$pagesize);
$offset=$pagesize*($page-1);
$sql="select * from cfstat_upfile where username='' order by addtime desc,id desc limit $offset ,$pagesize";
$result2=mysql_query($sql);


$linenum=3;
$tdwidth=intval(100/$linenum)."%";
$jishu=1;

while ($rs=mysql_fetch_assoc($result2))
{

if($jishu % $linenum==1||$linenum==1) echo "<tr>";
?>
<td width="<?php echo $tdwidth?>" valign="top" style="padding:5px;">
<?php 
echo "<img src='upload/".$rs["filename"]."'><br>";

echo "编号：".$rs["id"]."<br>";

?>
</td>
<?php 

$jishu=$jishu+1;

}//判断最后一行tr是否正好闭合,否则增加td,里面填入空格

$jishu=$jishu-1;
if(jishu % linenum <> 0){
for($i= 1;$linenum-($jishu % $linenum);$i++)
	echo "<td width='".$tdwidth."'>&nbsp;</td>";
	if($i == $linenum-($jishu % $linenum)) echo "</tr>";
}

?>
</table>

<table class="tb_3">
                <tr> 
                  <td> <a href="?action=<?php echo $action;?>&page=1">第一页</a> 
                      <?php if($page>1){?>
                      <a href='?action=<?php echo $action;?>&page=<?php echo $page-1;?>'>上一页</a> 
                      <?php }?>
                      <?php if($page<$totalpage){?>
                      <a href='?action=<?php echo $action;?>&page=<?php echo $page+1;?>'>下一页</a> 
                      <?php }?>
                      <a href="?action=<?php echo $action;?>&page=<?php echo $totalpage;?>">最后一页</a>&nbsp;共<font color="#FF0000"><?php echo $totalrs?></font>条记录&nbsp;<font color="#ff0000"><?php echo $page;?></font>/<?php echo $totalpage;?>页
<?php 
echo "&nbsp;&nbsp;转到第<select id='page' onChange=\"window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value\">";
for ($i=1;$i<=$totalpage;$i++){
 echo "<option value=?action=".$action."&page=".$i;
 if($page==$i) echo " selected";   
 echo ">".$i."</option>";   
}
echo "</select>页";
?>
</td>
                </tr>
</table>



<DIV class=clear></DIV>
</DIV>
<DIV class="bdr-bottom-730">
<DIV class=bdr-right2></DIV>
</DIV>
<DIV class="bk-10"></DIV>
</DIV>
