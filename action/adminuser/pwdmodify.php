<form name="form2" method="post" action="?action=pwdmodifysave">
    <table class="tb_1">
        <tr class="tr_1">
            <td colspan="2">输入原管理员密码
                <?php
                $sql = "select * from cfstat_admin";
                $result = $conn->query($sql);
                $rs = mysqli_fetch_assoc($result);
                ?>
            </td>
        </tr>
        <tr>
            <td>管理员名称：</td>
            <td><?php echo $rs["admin"]; ?></td>
        </tr>
        <tr>
            <td>请输入原管理密码：</td>
            <td><input name="pwd_old" type="password" id="pwd_old" size="15"></td>
        </tr>
        <tr class="tr_1">
            <td colspan="2">新管理员名称和密码</td>
        </tr>
        <tr>
            <td>新管理员名称：</td>
            <td><input name="admin" type="text" id="admin" value="<?php echo $rs["admin"]; ?>" size="15"></td>
        </tr>
        <tr>
            <td>新密码：</td>
            <td><input name="pwd" type="password" id="pwd" value="" size="15">
                如密码留空，密码将不会被修改)
            </td>
        </tr>
        <tr>
            <td>新密码确认：</td>
            <td><input name="pwd2" type="password" id="pwd2" value="" size="15"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="Submit3" value="修改">
                <input type="submit" name="Submit523" value="取消" onClick="history.go(-1)">
            </td>
        </tr>
    </table>
</form>