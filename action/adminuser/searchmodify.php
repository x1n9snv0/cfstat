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
$id=$_GET["id"];

$sql="select * from cfstat_search_set where id='$id'";
$result=mysql_query($sql);
$rs=mysql_fetch_assoc($result);
?>


<form name="form5" method="post" action="?action=searchmodifysave&id=<?php echo $id;?>">
<table class="tb_1">
<tr class="tr_1">
              <td colspan="4" >修改搜索引擎</td>
  </tr>
            
              <tr class="tr_2"> 
                <td>搜索引擎中文名</td>
                <td>搜索引擎英文标识</td>
                <td>搜索关键字的参数</td>
                <td></td>
              </tr>
              <tr class="tr_2"> 
                <td> <input name="sitedesc" type="text" id="sitedesc" value="<?php echo $rs["sitedesc"];?>"> 
                    
                </td>
                <td><input name="siteflag" type="text" id="siteflag" value="<?php echo $rs["siteflag"];?>"> 
                    
                </td>
                <td> 
                    <input name="keywordflag" type="text" id="keywordflag" value="<?php echo $rs["keywordflag"];?>">
                </td>
                <td><input type="submit" name="Submit" value="修改"></td>
              </tr>
              <tr> 
                <td colspan="4">比如：<br>
        百度网页搜索&quot;abcd&quot;IE地址栏为:http://www.baidu.com/s?wd=abcd&amp;cl=3<br>
        百度贴吧搜索&quot;abcd&quot;IE地址栏为:http://post.baidu.com/f?kw=abcd<br>
        百度知道搜索&quot;abcd&quot;IE地址栏为:http://zhidao.baidu.com/q?ct=17&amp;pn=0&amp;tn=ikaslist&amp;rn=10&amp;word=abcd&amp;t=51<br>
        这要我们就可以这样填写：搜索引擎中文名填写&quot;百度&quot;,搜索引擎英文标识填写&quot;baidu.com&quot;，标识可以填写多个，各个标识间用/分隔，搜索关键字的参数填写&quot;wd/kw/word&quot;,关键字参数用/分隔，以此类推
        </td>
              </tr>
           
</table>

 </form>