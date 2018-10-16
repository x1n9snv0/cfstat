<script src="images/ZeroClipboard.min.js"></script>
<table class="tb_1">
    <tr class="tr_1">
        <td>获取网店统计代码及预览</td>
    </tr>
    <tr>
        <td class="td_1">
            <strong style="color:#9c0a0d">选择或更换图标样式须知：</strong><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;安装好统计代码到店铺后，计数器样式是可以自由在系统中设定的。 <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;喜欢的图片样式然后点提交就完成设置，&nbsp;店铺中会自动更新，无需再更换统计代码。
    </tr>
    <tr>
        <td class="td_1">
            &nbsp;&nbsp;&nbsp;方法一(推荐)：添加店铺分类，这种方式主要用在旺铺的店铺统计，该方法只要轻松的创建一个新栏目，然后在该栏目的图片链接处放入提供的统计代码即可，使用该方法的前提条件是您的店铺已经是旺铺，普通的店铺使用该方法只能统计到店铺的主页和产品的分页，统计不到具体某个产品的访问情况。点击“复制到剪切板”按钮就可以轻松的复制统计代码，然后在您需要放置统计代码处进行粘贴就可以完成操作。<br/>
            <strong style="color:#9c0a0d">店铺分类专用统计代码：</strong><br/>
            &nbsp;&nbsp;&nbsp; <textarea title="code1" name=type1 cols=80 rows="2" id=type1><?php echo $tmp; ?>cf.php?c=<?php echo $username; ?></textarea>
                <pre><?php echo $tmp; ?>cf.php?c=<?php echo $username; ?></pre>
            <input type="button" value="复制" id="copy1" data-clipboard-target="type1" class="t_button">
            <script type="text/javascript">
                var clip = new ZeroClipboard(document.getElementById("copy1"));
            </script>
    </tr>


    <tr>
        <td class="td_1">
            &nbsp;&nbsp;&nbsp;方法二：<strong style="color:#9c0a0d">公告栏|促销栏|商品描述</strong>，这种方式用于统计局部栏目，如果您的网店是普通类型，您想要监控所有访问的数据则要在网店的公告栏目和每个产品的描述都要加入该段代码即可做到统计整个店铺的情况，如果您的网店是旺铺类型则参考下面方法二。点击“复制到剪切板”按钮就可以轻松的复制统计代码，然后在您需要放置统计代码处进行粘贴就可以完成操作。<br/>
            <strong style="color:#9c0a0d">公告栏|促销栏|商品描述选用统计代码：</strong><br/>
            &nbsp;&nbsp;&nbsp; <textarea title="code2" name=type2 cols=80 rows="4" id=type2><a href="<?php echo $tmp; ?>"target="_blank"><img src="<?php echo $tmp; ?>cf.php?c=<?php echo $username; ?>" border="0"></a></textarea>
                <pre>&lt;a href=&quot;<?php echo $tmp; ?>&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;<?php echo $tmp; ?>cf.php?c=<?php echo $username; ?>&quot; &gt;&lt;/a&gt;</pre>
            <input type="button" value="复制" id="copy2" data-clipboard-target="type2" class="t_button">
            <script type="text/javascript">
                var clip = new ZeroClipboard(document.getElementById("copy2"));
            </script>
    </tr>
    <tr>
        <td class="td_1"><a href="?action=imglist" class="t_button" style="color:#9c0a0d"><b>点这里更换网店统计图片</b></font></a>
            注可随意更换网店图片，统计代码是不变的，网店里不需更换统计代码
    </tr>
    <tr>
    <tr>
        <td class="td_1">效果：</td>
    </tr>
    <tr>
        <td><img src="<?php echo $tmp; ?>cf.php?c=<?php echo $username; ?>" border="0">
        </td>
    </tr>
</table>
