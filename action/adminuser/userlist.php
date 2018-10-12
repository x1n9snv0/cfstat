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
$username=chkstr($_REQUEST["username"],1);
$px=chkstr($_GET["px"],1);
if($px=="") $px="id";

pxfilter($px,"id,username,pagename,realiptotal,userstate,adddate,lasttime");
?>


        <table class="tb_1">
          <tr class="tr_1"> 
            <td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=id">ID</a></td>
            <td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=username">用户名称</a></td>
            <td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=pagename">主页名称</a></td>
            <td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=realiptotal">实际IP数量</a></td>
			<td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=userstate">用户状态</a></td>
            <td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=adddate">注册日期</a></td>
			<td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=lasttime">最后更新时间</a></td>
            <td>操作</td>
          </tr>
<?php 

$sql="select count(*) from cfstat_user where 1=1";
if($action=="usersearch")
{
 $sql=$sql." and username like '%$username%'";
}

$result=mysql_query($sql);
$rs=mysql_fetch_row($result);
$page=$_GET["page"];
if ($page<=0) $page=1;
$pagesize=20;
$totalrs=$rs[0];
$totalpage=ceil($totalrs/$pagesize);
$offset=$pagesize*($page-1);
$sql="select * from cfstat_user where 1=1";
if($action=="usersearch")
{
 $sql=$sql." and username like '%$username%'";
}
 $sql=$sql." order by $px desc limit $offset ,$pagesize";
$result2=mysql_query($sql);
while ($rs=mysql_fetch_assoc($result2))
{
?>
          <tr class="td_2"> 
            <td><?php echo $rs["id"];?></td>
            <td><?php echo $rs["username"];?></td>
            <td><?php echo "<a href=?action=urlgo&url=".urlencode(HTMLSpecialChars($rs["pageurl"]))." target=_blank>".HTMLSpecialChars($rs["pagename"])."</a>";?></td>
            <td><?php echo $rs["realiptotal"];?></td>
            <td>
<?php 
if($rs["userstate"]==-1)
{
 echo "有效";
}
else
{
 echo "<font color='ff0000'>暂停</font>";
};
?></td>
 <td><?php echo $rs["adddate"];?></td>
 <td><?php echo $rs["lasttime"];?></td>
<td>
<a href="?action=usermodify&username=<?php echo $rs["username"];?>">修改</a>
<a href="?action=usergo&username=<?php echo $rs["username"];?>" target="_blank">查看</a>
<?php 
if($rs["username"]!="mytest")
{
 echo "<a href='?action=userdel&username=".$rs["username"]."' onClick=\"{if(confirm('确定要删除么?')){return true;}return false;}\">删除</a>";
}
else
{
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
};
?>

</td>
          </tr>
          <?php }?>
        </table>
		
<table class="tb_3">
                <tr> 
                  <td><a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=<?php echo $px;?>&page=1">第一页</a> 
                      <?php if($page>1){?>
                      <a href='?action=<?php echo $action;?>&username=<?php echo $username;?>&px=<?php echo $px;?>&page=<?php echo $page-1;?>'>上一页</a> 
                      <?php }?>
                      <?php if($page<$totalpage){?>
                      <a href='?action=<?php echo $action;?>&username=<?php echo $username;?>&px=<?php echo $px;?>&page=<?php echo $page+1;?>'>下一页</a> 
                      <?php }?>
                      <a href="?action=<?php echo $action;?>&username=<?php echo $username;?>&px=<?php echo $px;?>&page=<?php echo $totalpage;?>">最后一页</a>&nbsp;共<font color="#FF0000"><?php echo $totalrs?></font>条记录&nbsp;<font color="#ff0000"><?php echo $page;?></font>/<?php echo $totalpage;?>页
<?php 
echo "&nbsp;&nbsp;转到第<select id='page' onChange=\"window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value\">";
for ($i=1;$i<=$totalpage;$i++){
 echo "<option value=?action=".$action."&username=".$username."&px=".$px."&page=".$i;
 if($page==$i) echo " selected";   
 echo ">".$i."</option>";   
}
echo "</select>页";
?>
     </td>
                </tr>
</table> 

  <form name="form3" method="post" action="?action=usersearch">	  
<table class="tb_3">

    <tr> 
      <td>用户名 
        <input name="username" type="text" size="10"> </td>
      <td><input type="submit" name="Submit2" value="搜索"></td>
    </tr>

</table>
  </form>