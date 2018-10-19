<?php
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");
@include("include/email.php");

$action = isset($_GET["action"]) ? chkstr($_GET["action"],1) : "pwdrecover";


@include("include/cf_do.php");?>

<!DOCTYPE>
<html>
    <?php @include("templates/default/header.php"); ?>
    <body>
        <?php @include("templates/default/nav.php"); ?>

        <?php if($action=="pwdrecover") @include("action/web/pwdrecover.php");?>
        <?php if($action=="pwdmodify") @include("action/web/pwdmodify.php");?>

        <?php @include("templates/default/footer.php"); ?>
    </body>
</html>
