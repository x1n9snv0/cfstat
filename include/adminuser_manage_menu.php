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

<DIV class="manage_menu">

<DIV class="manage_menu_head">
<UL>
<LI>
管理员
</LI>
</UL>
</DIV>


<UL class="manage_menu_list">
<li class="l_3"><img src=images/userlist.gif><a href=?action=userlist>用户列表</a></li>
<li class="l_3"><img src=images/infolist.gif><a href=?action=daytj>每日统计</a></li>
<li class="l_3"><img src=images/gbooklist.gif><a href=?action=daytop>每日排行</a></li>
<li class="l_3"><img src=images/db.gif><a href=?action=searchlist>搜索引擎设置</a></li>
<li class="l_3"><img src=images/licencode.gif><a href=?action=imglist>网店图片管理</a></li>
<li class="l_3"><img src=images/templet.gif><a href=?action=sysmodify>系统设置</a></li>
<li class="l_3"><img src=images/lock.gif><a href=?action=pwdmodify>修改密码</a></li>
<li class="l_3"><img src=images/exit.gif><a href=?action=adminlogout onClick="{if(confirm('确定要退出管理么?')){return true;}return false;}">退出管理</a></li>
</ul>


<DIV class="manage_menu_foot">
<UL>
<LI></LI>
</UL>
</DIV>

</DIV>