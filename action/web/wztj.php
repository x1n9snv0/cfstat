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
$page=$_GET["page"];
if ($page<=0) $page=1;

$mypagesize=10;
$mypagesize2=10;

if($rsset["styletotal"] % $mypagesize==0)
{
 $totalpage=$rsset["styletotal"] / $mypagesize;
}
else
{
 $totalpage=floor($rsset["styletotal"]/$mypagesize)+1;
 if($page==$totalpage)
 {
  $mypagesize2=$rsset["styletotal"] % $mypagesize;
 }
}
$i=1;
?>
        <?php 
$sql="select * from  cfstat_user where username='$username'";
$result=mysql_query($sql);
$rs=mysql_fetch_assoc($result);
?>


<DIV class="f-l w-730">
<H2><a class=s-1>网站统计</a> 
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>


<table class="index_tb">
          <tr class="tr_1"> 

            <td colspan="6">网站统计数字样式</td>
          </tr>

            <?php 
			while($i<=$mypagesize2)
			{
			$k=($page-1)*$mypagesize+$i;
			?>
            <tr> 

              <td style="padding:5px;"><?php for($j=0;$j<=9;$j++){?><img src="counterpic/<?php echo $k;?>/<?php echo $j;?>.gif"><?php }?>
              </td>
            </tr>
            <?php 
$i=$i+1;
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
?></td>
                </tr>
              </table>


<DIV class=clear></DIV>
</DIV>
<DIV class="bdr-bottom-730">
<DIV class=bdr-right2></DIV>
</DIV>
<DIV class="bk-10"></DIV>
</DIV>
