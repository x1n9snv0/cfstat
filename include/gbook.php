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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<body style='margin:0px; padding:0px;'>
<ul style='background-color:#ffffff;list-style-type:none;margin: 0; padding: 0; border: 0;font-size:12px;'><form name='gbook_form' method='post' target='_blank' action='gbook.php?action=gbookaddsave&username=<?php echo $_GET["username"];?>&ly=<?php echo $_GET["ly"];?>&currweb=<?php echo $_GET["currweb"];?>' onsubmit='return gbookcheck()'>
<li style='padding:2px 12px;list-style-type:none; padding: 0; border: 0;font-size:12px;text-align:center;'><textarea name='content' id='content' cols='22' rows='8' style='color:#B6B3B3;overflow:auto;border: 1px solid #C9DDF0;width:180px;height:120px' onclick="if(document.getElementById('content').value=='请输入留言内容')document.getElementById('content').value='';" onmouseout="if(document.getElementById('content').value=='')document.getElementById('content').value='请输入留言内容';">请输入留言内容</textarea></li>
<li style='padding:2px 12px;list-style-type:none; padding: 0; border: 0;font-size:12px;text-align:center;'><textarea name='contact' id='contact' cols='22' rows='6' style='color:#B6B3B3;overflow:auto;border: 1px solid #C9DDF0;width:180px;height:100px' onclick="if(document.getElementById('contact').value=='请输入联系方式')document.getElementById('contact').value='';" onmouseout="if(document.getElementById('contact').value=='')document.getElementById('contact').value='请输入联系方式';">请输入联系方式</textarea></li>
<li style='padding:2px;list-style-type:none; padding: 0; border: 0;font-size:12px;'><a href='cf.php?action=countgo&username=<?php echo $_GET["username"];?>' target='_blank' style='display:block;padding:6px 2px 0px 12px;float:left;'>查看统计</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type='image' src='images/gbook_send.gif'></li>
</form></ul>
<script>
function gbookcheck(){
 if(document.gbook_form.content.value==""||document.gbook_form.content.value=="请输入留言内容"){
  alert("请输入留言内容!");
  return false;
 }
 if(document.gbook_form.contact.value==""||document.gbook_form.contact.value=="请输入联系方式"){
  alert("请输入联系方式!");
  return false;
 }
return true;
}
</script>