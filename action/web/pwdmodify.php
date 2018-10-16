<?php
$usercode = chkstr($_GET["usercode"], 1);
?>
<div id=webmain>
    <div class="f-l w-960">
        <H2><a class=s-1>修改密码</a>
            <div class=bdr-right></div>
        </H2>
        <div class=bdr>
            <table>
                <form name="form1" method="post" action="?action=pwdmodifysave&usercode=<?php echo $usercode; ?>">
                    <tr>
                        <td width="45%" class="td_3">新密码：</td>
                        <td><input name="pwd" type="password" id="pwd"></td>
                    </tr>
                    <tr>
                        <td class="td_3">新密码确认：</td>
                        <td><input name="pwd2" type="password" id="pwd2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="Submit2" value="修改密码">
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