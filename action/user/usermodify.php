<?php
$sql = "select * from cfstat_user where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_assoc($result);
?>
<form name="form1" method="post" action="?action=usermodifysave">
    <table class="tb_1">
        <tr class="tr_1">
            <td colspan="2">用户修改资料
                <?php if ($rs["userstate"] == -1) {
                    echo "(账号正常)";
                } elseif ($rs["userstate"] == 0) {
                    echo "(<font color=ff0000>账号暂停</font>)";
                }
                ?></td>
        </tr>
        <tr>
            <td width="20%">用户名：</td>
            <td> <?php echo $rs["username"]; ?></td>
        </tr>
        <tr>
            <td>Email：</td>
            <td><input name="email" type="text" id="email" value="<?php echo $rs["email"]; ?>">
                <font color="#FF0000"> *</font></td>
        </tr>
        <tr>
            <td>QQ：</td>
            <td><input name="qq" type="text" id="qq" value="<?php echo $rs["qq"]; ?>"></td>
        </tr>
        <tr>
            <td>网站名称：</td>
            <td><input name="pagename" type="text" id="pagename" value="<?php echo $rs["pagename"]; ?>">
                <font color="#FF0000">*</font></td>
        </tr>
        <tr>
            <td>网址：</td>
            <td><input name="pageurl" type="text" id="pageurl" value="<?php echo $rs["pageurl"]; ?>">
                <font color="#FF0000">*</font></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="修改"></td>
        </tr>

    </table>
</form>