<script>
    $(function () {
        $("#adminlogin").click(function () {
            var admin = $("#admin").val();
            var pwd = $("#pwd").val();
            var cookies_time = $("#cookies_time").val();

            if (admin === "") {
                alert("请输入管理员名称!");
                $("#admin").focus();
                return false;
            }
            if (pwd === "") {
                alert("请输入管理员密码!");
                $("#pwd").focus();
                return false;
            }
            $.ajax({
                url: "admin.php",
                type: "post",
                data: "action=adminloginsave&admin=" + admin + "&pwd=" + pwd + "&cookies_time=" + cookies_time,
                success: function (response) {
                    if (response.indexOf("成功") >= 0) {
                        location.href = 'adminuser.php';
                    } else {
                        alert($.trim(response));
                    }
                }
            });
        });
    });
</script>
<div id=webmain>

    <div class="f-l w-960">
        <h2><a class=s-1>管理员入口</a>
            <div class=bdr-right></div>
        </h2>
        <div class=bdr>
            <table style="width:200px;margin:0 auto;">
                <td class="td_3" style="width:90px;">管理员名称：</td>
                <td><input name="admin" type="text" id="admin" style="ime-mode:inactive;width:100px"></td>
                </tr>
                <tr>
                    <td class="td_3">管理员密码：</td>
                    <td><input name="pwd" type="password" id="pwd" style="ime-mode:inactive;width:100px"></td>
                </tr>
                <tr>
                    <td class="td_3">Cookies：</td>
                    <td>
                        <select name="cookies_time" id="cookies_time" style="width:104px;">
                            <option value="3600" selected>不保留</option>
                            <option value="86400">保留一天</option>
                            <option value="604800">保留一周</option>
                            <option value="2592000">保留一个月</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="javascript:"><img src="images/login.gif" border=0 id="adminlogin" style="margin-top:5px;"></a>
                    </td>
                </tr>
            </table>
            <div class=clear></div>
        </div>
        <div class="bdr-bottom-960">
            <div class=bdr-right2></div>
        </div>
        <div class="bk-10"></div>
    </div>
</div>