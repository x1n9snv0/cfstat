<?php
session_start();

@include("conn.php");
@include("include/myfunction.php");
@include("config.php");
@include("include/getcookie.php");

//安装锁定文件不存在时，开始安装程序
if(!file_exists('install/install.lock')) gotourl("install/index.php");

$action = isset($_REQUEST["action"]) ? chkstr($_REQUEST["action"],1) : "";

@include("include/cf_do.php");

@include("templates/default/index.php");
?>
