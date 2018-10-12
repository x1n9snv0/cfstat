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
$usercode=chkstr($_GET["usercode"],1);
?>

<DIV id=webmain>

<DIV class="f-l w-960">
<H2><a class=s-1>修改密码</a>
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>


<table>
          <form name="form1" method="post" action="?action=pwdmodifysave&usercode=<?php echo $usercode;?>">

            <tr> 
              <td width="45%" class="td_3">新密码：</td>
              <td> <input name="pwd" type="password" id="pwd"> 
              </td>
            </tr>
            <tr> 
              <td class="td_3">新密码确认：</td>
              <td><input name="pwd2" type="password" id="pwd2"></td>
            </tr>
            <tr> 
              <td></td>
              <td><input type="submit" name="Submit2" value="修改密码"> 
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