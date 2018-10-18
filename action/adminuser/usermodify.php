<?php
$username = chkstr($_GET["username"], 1);
$sql = "select * from cfstat_user where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_assoc($result);
?>
<form name="form1" method="post" action="?action=usermodifysave&username=<?php echo $username; ?>">
    <table class="tb_1">

        <tr class="tr_1">
            <td colspan="2">用户修改资料</td>
        </tr>
        <tr>
            <td>用户名：</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input name="pwd" type="password" id="pwd">
                (如密码留空，密码将不会被修改)
            </td>
        </tr>
        <tr>
            <td>用户状态：</td>
            <td><input type="radio" name="userstate" value="-1"<?php if ($rs["userstate"] == -1) echo " checked" ?>>有效
                <input type="radio" name="userstate" value="0"<?php if ($rs["userstate"] == 0) echo " checked" ?>>无效
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="修改">
            </td>
        </tr>
    </table>
</form>