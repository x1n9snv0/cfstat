<?php
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "view";

@include("include/cf_do.php"); ?>
<!DOCTYPE>
<html>
    <?php @include("templates/default/header.php"); ?>
    <body>
    <?php @include("templates/default/nav.php"); ?>

    <?php if($action=="view") @include("action/web/view.php");?>

    <?php @include("templates/default/footer.php"); ?>
    </body>
</html>

