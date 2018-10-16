<script src="images/ZeroClipboard.min.js"></script>

<table class="tb_1">
    <tr class="tr_1">
        <td>获得网站统计代码(合适有网站的站长投放)</td>
    </tr>
    <tr>
        <td>以下方框内是你设置的计数器代码，请复制后加入网页代码里:<br>
            <textarea id="countercode1" cols="50" rows="3"><script src="<?php echo $tmp; ?>cf.php?username=<?php echo $username; ?>"></script></textarea>
            <input type="button" value="复制" id="copy1" data-clipboard-target="countercode1" class="t_button">
            <script type="text/javascript">
                var clip = new ZeroClipboard(document.getElementById("copy1"));
            </script>
        </td>
    </tr>
    <tr>
        <td>你设置的脚本统计预览：
            <script src="<?php echo $tmp; ?>cf.php?username=<?php echo $username; ?>"></script>
        </td>
    </tr>

</table>
		

