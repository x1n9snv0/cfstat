<?php
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");
@include("include/getcookie.php");


if ($_SESSION["cfstatadmin"] == "") {
    setcookie("cfstatadmincookie", "", time() - 600);
    alerturl("会话已经过期，请重新登录", "admin.php");
    exit;
}

$action = isset($_GET["action"]) ? chkstr($_GET["action"], 1) : "userlist";


@include("include/adminuser_manage_do.php");?>

<!DOCTYPE>
<html>
    <?php @include("templates/default/header.php"); ?>
    <body>
        <?php @include("templates/default/nav.php"); ?>

            <table class="manage">
                <tr>
                    <td class="manage_left">
                        <?php
                        @include("include/adminuser_manage_menu.php");
                        ?>
                    </td>
                    <td class="manage_right">
                        <?php
                        @include("include/adminuser_manage_select.php");
                        ?>
                    </td>
                </tr>
            </table>

        <?php @include("templates/default/footer.php"); ?>
    </body>
</html>

