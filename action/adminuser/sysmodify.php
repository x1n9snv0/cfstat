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

<form name="form1" method="post" action="?action=sysmodifysave">

    <table class="tb_1">
        <tr class="tr_1">
            <td colspan="2">系统设置
                <?php
                $sql = "select * from cfstat_admin";
                $result = $conn->query($sql);
                $rs = mysqli_fetch_assoc($result);
                ?>
            </td>
        </tr>
        <tr>
            <td>计数器系统名称：</td>
            <td><input name="systitle" type="text" id="mc2" value="<?php echo $rs["systitle"]; ?>" size="40"></td>
        </tr>
        <tr>
            <td>网友是否能申请计数器：</td>
            <td><input type="radio" name="regstate" value="-1" <?php if ($rs["regstate"] == -1) echo "checked"; ?>>
                是 　　
                <input name="regstate" type="radio" value="0" <?php if ($rs["regstate"] == 0) echo "checked"; ?>>
                否 (默认：是)
            </td>
        </tr>
        <tr>
            <td>注册后是否需要管理员审核：</td>
            <td><input type="radio" name="regadmincheck"
                       value="-1" <?php if ($rs["regadmincheck"] == -1) echo "checked"; ?>>
                是 　　
                <input name="regadmincheck" type="radio"
                       value="0" <?php if ($rs["regadmincheck"] == 0) echo "checked"; ?>>
                否 (默认：否)
            </td>
        </tr>
        <tr>
            <td>系统最大计数样式数目：</td>
            <td><input name="styletotal" type="text" id="styletotal" value="<?php echo $rs["styletotal"]; ?>" size="40">种
            </td>
        </tr>
        <tr>
            <td>smtp邮件发送端口：</td>
            <td><input name="smtpport" type="text" id="smtpport" value="<?php echo $rs["smtpport"]; ?>" size="40"><br>需要的php扩展sockets和openssl支持。25端口普通发送，465端口加密发送
            </td>
        </tr>
        <tr>
            <td>smtp邮件服务器地址：</td>
            <td><input name="smtpaddress" type="text" id="smtpaddress" value="<?php echo $rs["smtpaddress"]; ?>"
                       size="40">如：smtp.qq.com
            </td>
        </tr>
        <tr>
            <td>smtp邮件账号：</td>
            <td><input name="smtpuser" type="text" id="smtpuser" value="<?php echo $rs["smtpuser"]; ?>" size="40">如：a@qq.com
            </td>
        </tr>
        <tr>
            <td>smtp邮件密码：</td>
            <td><input name="smtppassword" type="password" id="smtppassword" value="<?php echo $rs["smtppassword"]; ?>"
                       size="40"></td>
        </tr>
        <tr>
            <td>系统皮肤：</td>
            <td>
                <input type="radio" name="skintype" value="1"<?php if ($rs["skintype"] == 1) echo " checked" ?>
                       onclick="document.getElementById('skincolor').value='#025DA6|#BFDEF8|#333333|#02418a|#FF0000';">
                蓝色样式
                <input type="radio" name="skintype" value="2"<?php if ($rs["skintype"] == 2) echo " checked" ?>
                       onclick="document.getElementById('skincolor').value='#6DC818|#BFF190|#339900|#336600|#FF0000';">
                绿色样式
                <input type="radio" name="skintype" value="3"<?php if ($rs["skintype"] == 3) echo " checked" ?>
                       onclick="document.getElementById('skincolor').value='#E82626|#FAD8D8|#FF3333|#FF0033|#000000';">
                红色样式
                <input type="radio" name="skintype" value="4"<?php if ($rs["skintype"] == 4) echo " checked" ?>
                       onclick="document.getElementById('skincolor').value='#7A7A7A|#CDC7C7|#4D4D4D|#333333|#FF0000';">
                黑白样式
                <input type="radio" name="skintype" value="5"<?php if ($rs["skintype"] == 5) echo " checked" ?>
                       onclick="document.getElementById('skincolor').value='#FF8100|#F9C48E|#CA6B0A|#333333|#FF0000';">
                桔黄样式
                <input type="radio" name="skintype" value="6"<?php if ($rs["skintype"] == 6) echo " checked" ?>
                       onclick="document.getElementById('skincolor').value='#C00068|#C870A0|#8E2D62|#333333|#FF0000';">
                暗粉样式
            </td>
        </tr>


        <tr>
            <td>自定义皮肤颜色：</td>
            <td><input name="skincolor" type="text" id="skincolor" value="<?php echo $rs["skincolor"]; ?>" size="70">
                <br/>0表格边框颜色|1表格行的标题背景颜色|2字体颜色|3链接颜色|4点过的链接颜色
                <br/>
                <br/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="Submit3" value="修改">
                　　
                <input type="reset" name="Submit523" value="取消"></td>
        </tr>
    </table>
</form>

<form name="form2" method="post" action="?action=emailtest">
    <table class="tb_1">
        <tr class="tr_1">
            <td colspan="2">邮件发送设置测试</td>
        </tr>

        <tr class="td_1">
            <td colspan="2">输入收件人Email测试smtp服务器是否正确设置：<input name="email" type="text" id="email" value="" size="20">
                <input type="submit" name="Submit4" value="提交"/></td>
        </tr>

    </table>
</form>