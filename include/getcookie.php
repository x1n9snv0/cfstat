<?php
if (!isset($_SESSION["cfstatuser"])) $_SESSION["cfstatuser"] = "";
if (!isset($_SESSION["cfstatuser_view"])) $_SESSION["cfstatuser_view"] = "";
if (!isset($_SESSION["cfstatadmin"])) $_SESSION["cfstatadmin"] = "";

if ($_SESSION["cfstatuser"] == "") {
    $cfstatusercookie = chkstr($_COOKIE["cfstatusercookie"], 1);
    if (!empty($cfstatusercookie)) {
        $sql = "select username from cfstat_user where usercode='$cfstatusercookie'";
        $result = $conn->query($sql);
        $rs = mysqli_fetch_assoc($result);
        if ($rs["username"] != "") {
            $_SESSION["cfstatuser"] = $rs["username"];
        }
    }
}
if ($_SESSION["cfstatadmin"] == "") {
    $cfstatadmincookie = chkstr($_COOKIE["cfstatadmincookie"], 1);
    if (!empty($cfstatadmincookie)) {
        $sql = "select admin from cfstat_admin where admincode='$cfstatadmincookie'";
        $result = $conn->query($sql);
        $rs = mysqli_fetch_assoc($result);
        if ($rs["admin"] != "") {
            $_SESSION["cfstatadmin"] = "ok";
        }
    }
}
?>