<?php
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");
@include("include/getcookie.php");

$action = isset($_REQUEST["action"]) ? chkstr($_REQUEST["action"],1) : "adminuserlogin";

@include("include/cf_do.php");

if($_SESSION["cfstatadmin"]=="ok") gotourl("adminuser.php");?>

<!DOCTYPE>
<html>
    <?php @include("templates/default/header.php"); ?>
    <body>
        <?php @include("templates/default/nav.php"); ?>

        <?php if($action=="adminuserlogin") @include("action/web/adminuserlogin.php");?>

        <?php @include("templates/default/footer.php"); ?>
    </body>
</html>
