<?php
@include("conn.php");
@include("include/myfunction.php");
@include("include/getcookie.php");

$action = isset($_GET["action"]) ? chkstr($_GET["action"],1) : "";

@include("include/cf_do.php");
?>