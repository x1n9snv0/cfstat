<?php
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "userreg";

@include("include/cf_do.php"); ?>

<!DOCTYPE>
<html>
    <?php @include("templates/default/header.php"); ?>
    <body>
        <?php @include("templates/default/nav.php"); ?>

        <DIV id=webmain>
            <?php if($action=="userreg") @include("action/web/userreg.php"); ?>
        </DIV>

        <?php @include("templates/default/footer.php"); ?>
    </body>
</html>