<script>
    function pwdrecovercheck() {
        if (window.document.form1.username.value === "") {
            alert("请输入你的用户名!");
            window.document.form1.username.focus();
            return false;
        }
        return true;
    }
</script>
<div id=webmain>
    <div class="f-l w-960">
        <h2><a class=s-1>找回密码</a>
            <div class=bdr-right></div>
        </h2>
        <div class=bdr>
            <table>
                <form name="form1" id="form1" method="post" action="?action=pwdsend"
                      onsubmit="return pwdrecovercheck()">
                    <tr>
                        <td colspan="2" class="td_2">请输入你的用户名，系统会自动发送一封修改密码邮件到你的管理资料中的E-Mail地址内,如果还没有收到请和超级管理员联系!
                        </td>
                    </tr>
                    <tr>
                        <td class="td_3">你的用户名：</td>
                        <td><input name="username" type="text" id="username" size="15"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="Submit" value="取回密码"> <a href="index.php">返回首页</a>
                        </td>
                    </tr>
                </form>
            </table>
            <div class=clear></div>
        </div>
        <div class="bdr-bottom-960">
            <div class=bdr-right2></div>
        </div>
        <div class="bk-10"></div>
    </div>
</div>