<?php
if ($action == "userlist" || $action == "usersearch")
    @include("action/adminuser/userlist.php");
if ($action == "usermodify")
    @include("action/adminuser/usermodify.php");
if ($action == "daytj")
    @include("action/adminuser/daytj.php");
if ($action == "daytop")
    @include("action/adminuser/daytop.php");
if ($action == "searchlist")
    @include("action/adminuser/searchlist.php");
if ($action == "searchmodify")
    @include("action/adminuser/searchmodify.php");
if ($action == "imglist")
    @include("action/adminuser/imglist.php");
if ($action == "sysmodify")
    @include("action/adminuser/sysmodify.php");
if ($action == "pwdmodify")
    @include("action/adminuser/pwdmodify.php");
?>