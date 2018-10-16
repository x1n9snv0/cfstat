<?php
$sql = "select * from cfstat_user where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_assoc($result);
?>
<form name="form1" method="post" action="?action=setmodifysave">
    <table class="tb_1">
        <tr class="tr_1">
            <td colspan="2">用户修改资料</td>
        </tr>
        <tr>
            <td>计数器上显示数字：</td>
            <td><input name="showtotal" type="text" id="showtotal" value="<?php echo $rs["showtotal"]; ?>"></td>
        </tr>
        <tr>
            <td>实际浏览数字：</td>
            <td><?php echo $rs["realshowtotal"]; ?></td>
        </tr>
        <tr>
            <td>实际IP数字：</td>
            <td><?php echo $rs["realiptotal"]; ?></td>
        </tr>
        <tr>
            <td rowspan="4">计数器样式：</td>
            <td style="height:30px"><input name="countershow" type="radio" value="1"<?php if ($rs["countershow"] == 1) echo " checked"; ?>>数字样式(可以计数器样式栏目里选择你喜欢的样式)</td>
        </tr>
        <tr>
            <td style="height:30px"><input type="radio" name="countershow" value="2"<?php if ($rs["countershow"] == 2) echo " checked"; ?>>图标样式</td>
        </tr>
        <tr>
            <td style="height:30px"><input type="radio" name="countershow" value="3"<?php if ($rs["countershow"] == 3) echo " checked"; ?>>文字样式</td>
        </tr>
        <tr>
            <td style="height:30px"><input type="radio" name="countershow" value="4"<?php if ($rs["countershow"] == 4) echo " checked"; ?>>留言样式</td>
        </tr>
        <tr>
            <td>独立查看页上显示留言板：</td>
            <td><input name="gbookstate" type="radio" value="-1"<?php if ($rs["gbookstate"] == -1) echo " checked"; ?>>是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="gbookstate" type="radio" value="0"<?php if ($rs["gbookstate"] == 0) echo " checked"; ?>>否
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="修改"></td>
        </tr>
    </table>
</form>
