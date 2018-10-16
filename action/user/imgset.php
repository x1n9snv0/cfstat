<?php
$sql = "select * from cfstat_user where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_assoc($result);

?>
<form name="form1" method="post" action="?action=imgsetsave">
    <table class="tb_1">

        <tr class="tr_1">
            <td colspan="2">网店统计设置</td>
        </tr>
        <tr>
            <td>自定义显示文字：</td>
            <td><textarea name="imgselftext" cols="50" rows="10"><?php echo $rs["imgselftext"]; ?></textarea>
                <br/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="修改"> (如果想关闭网店统计，请把上面的标签清空后直接点修改即可)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>(注：可以全角空格和回车换行调整文字在图片上的位置，支持自己以下定义标签，不超过1000个字符)<br/>

                总访问:{imgcounter}
                <br>
                今天PV:{todaytotal}
                <br>
                今天IP:{todayiptotal}
                <br>
                昨天PV:{yesterdaytotal}
                <br>
                昨天IP:{yesterdayiptotal}
                <br>
                IP:{ip}
            </td>
        </tr>

    </table>
</form>