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
            <td>获得网站统计代码(合适有网站的站长投放)</td>
          </tr>
          <tr> 
            <td>以下方框内是你设置的计数器代码，请复制后加入网页代码里:<br> 
              <textarea id="countercode1"  cols="50" rows="3"><script src="<?php echo $tmp;?>cf.php?username=<?php echo $username;?>"></script></textarea>
			  
<input type="button" value="复制" id="copy1" data-clipboard-target="countercode1" class="t_button">
<script type="text/javascript">
var clip = new ZeroClipboard( document.getElementById("copy1") );
</script>
</td>
          </tr>
          <tr>
            <td>你设置的脚本统计预览： 
              <script src="<?php echo $tmp;?>cf.php?username=<?php echo $username;?>"></script>
            </td>
          </tr>

        </table>
		

