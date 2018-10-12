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
<script src="images/ZeroClipboard.min.js"></script>
<table class="tb_1">
  <tr class="tr_1">
    <td>获取网店统计代码及预览</td>
  </tr>

  <tr>
    <td class="td_1"><strong><font 
      color="#9c0a0d">&nbsp;选择或更换图标样式须知：</font></strong><br />
      &nbsp;&nbsp;&nbsp;&nbsp;安装好统计代码到店铺后，计数器样式是可以自由在系统中设定的。 <br />
    &nbsp;&nbsp;&nbsp;&nbsp;喜欢的图片样式然后点提交就完成设置，&nbsp;店铺中会自动更新，无需再更换统计代码。  </tr>
  <tr>
    <td class="td_1">
        &nbsp;&nbsp;&nbsp;方法一(推荐)：添加店铺分类，这种方式主要用在旺铺的店铺统计，该方法只要轻松的创建一个新栏目，然后在该栏目的图片链接处放入提供的统计代码即可，使用该方法的前提条件是您的店铺已经是旺铺，普通的店铺使用该方法只能统计到店铺的主页和产品的分页，统计不到具体某个产品的访问情况。点击“复制到剪切板”按钮就可以轻松的复制统计代码，然后在您需要放置统计代码处进行粘贴就可以完成操作。 
<br /><STRONG> <FONT 
      color=#9c0a0d>店铺分类</FONT>专用统计代码：</STRONG><BR>
        &nbsp;&nbsp;&nbsp; <TEXTAREA name=type1 cols=80 rows="2" id=type1><?php echo $tmp;?>cf.php?c=<?php echo $username;?></TEXTAREA>
<input type="button" value="复制" id="copy1" data-clipboard-target="type1" class="t_button">
<script type="text/javascript">
var clip = new ZeroClipboard( document.getElementById("copy1") );
</script>
</tr>
  
  	
<tr>
    <td class="td_1">
        &nbsp;&nbsp;&nbsp;方法二：<STRONG><FONT 
      color=#9c0a0d>公告栏|促销栏|商品描述</FONT></STRONG>，这种方式用于统计局部栏目，如果您的网店是普通类型，您想要监控所有访问的数据则要在网店的公告栏目和每个产品的描述都要加入该段代码即可做到统计整个店铺的情况，如果您的网店是旺铺类型则参考下面方法二。点击“复制到剪切板”按钮就可以轻松的复制统计代码，然后在您需要放置统计代码处进行粘贴就可以完成操作。

      <br /><STRONG> <FONT 
      color=#9c0a0d>公告栏|促销栏|商品描述</FONT>选用统计代码：</STRONG><BR>
        &nbsp;&nbsp;&nbsp; <TEXTAREA name=type2 cols=80 rows="4" id=type2><a href="<?php echo $tmp;?>" target="_blank"><img src="<?php echo $tmp;?>cf.php?c=<?php echo $username;?>" border="0"></a></TEXTAREA>
<input type="button" value="复制" id="copy2" data-clipboard-target="type2" class="t_button">
<script type="text/javascript">
var clip = new ZeroClipboard( document.getElementById("copy2") );
</script>
</tr>
  
  
  <tr>
  <td class="td_1"><a href="?action=imglist" class="t_button"><font color="#FF0000"><b>点这里更换网店统计图片</b></font></a> 注可随意更换网店图片，统计代码是不变的，网店里不需更换统计代码</tr>
  <tr> 
  
  <tr>
  <td class="td_1">效果：</tr>
          <tr>
            <td><img src="<?php echo $tmp;?>cf.php?c=<?php echo $username;?>" border="0">
            </td>
          </tr>
</table>
