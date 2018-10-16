<?php
//统计设置修改
if ($action == "setmodifysave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);
    $showtotal = chkstr($_POST["showtotal"], 2);
    $countershow = chkstr($_POST["countershow"], 2);
    $gbookstate = chkstr($_POST["gbookstate"], 2);
    if ($showtotal == "") alertback("请输入必填写项", 1);
    $sql = "update cfstat_user set showtotal='$showtotal',countershow='$countershow',gbookstate='$gbookstate' where username='$username'";
    $conn->query($sql);
    alertback("修改成功", 1);
}
//统计样式修改
if ($action == "stylemodifysave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);
    $style = chkstr($_POST["style"], 2);
    if ($style == "") alertback("请选择一种你喜欢的样式", 1);
    $sql = "update cfstat_user set style='$style',countershow=1 where username='$username'";
    $conn->query($sql);
    alerturl("修改成功", "?action=stylelist");
}
//网店图片修改
if ($action == "imgmodifysave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);
    $filename_2 = chkstr($_POST["filename_2"], 1);
    if ($filename_2 == "") alertback("请选择一种你喜欢的样式", 1);
    $sql = "update cfstat_user set imgfilename='$filename_2' where username='$username'";
    $conn->query($sql);
    alerturl("修改成功", "?action=imglist");
}
//网店统计修改
if ($action == "imgsetsave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);
    $imgselftext = chkstr($_POST["imgselftext"], 1);
    $sql = "update cfstat_user set imgselftext='$imgselftext' where username='$username'";
    $conn->query($sql);
    alerturl("修改成功", "?action=imgset");
}
//用户资料修改
if ($action == "usermodifysave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);

    $email = chkstr($_POST["email"], 1);
    $qq = chkstr($_POST["qq"], 1);
    $pagename = chkstr($_POST["pagename"], 1);
    $pageurl = chkstr($_POST["pageurl"], 1);

    if ($email == "") alertback("请输入Email地址", 1);
    if ($pagename == "") alertback("请输入网站名称", 1);
    if ($pageurl == "") alertback("请输入网站网址", 1);


    $sql = "update cfstat_user set email='$email',qq='$qq',pagename='$pagename',pageurl='$pageurl' where username='$username'";
    $conn->query($sql);
    alertback("修改成功", 1);
}

//密码修改
if ($action == "pwdmodifysave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);

    $pwd_old = chkstr($_POST["pwd_old"], 1);
    $pwd = chkstr($_POST["pwd"], 1);
    $pwd2 = chkstr($_POST["pwd2"], 1);
    $pwd_view = chkstr($_POST["pwd_view"], 1);
    $pwd_view2 = chkstr($_POST["pwd_view2"], 1);

    if ($pwd_old == "") alertback("请输入旧管理密码", 1);
    if ($pwd == "") alertback("请输入新管理密码", 1);
    if ($pwd2 == "") alertback("请输入重复新管理密码", 1);
    if ($pwd_view == "") alertback("请输入新查看密码", 1);
    if ($pwd_view2 == "") alertback("请输入重复新查看密码", 1);

    if ($pwd <> $pwd2) alertback("新管理密码输入不一致", 1);
    if ($pwd_view <> $pwd_view2) alertback("新查看密码输入不一致", 1);

    $sql = "select pwd from cfstat_user where username='$username'";
    $result = $conn->query($sql);
    $rs = mysqli_fetch_assoc($result);
    if ($rs["pwd"] <> md5($pwd_old)) alertback("旧管理密码错误", 1);

    $pwd = md5($pwd);
    $pwd_view = md5($pwd_view);
    $sql = "update cfstat_user set pwd='$pwd',pwd_view='$pwd_view' where username='$username'";
    $conn->query($sql);
    alertback("修改成功", 1);
}

if ($action == "urlgo") {
    $url = urldecode($_GET["url"]);
    gotourl($url);
}

//留言修改
if ($action == "gbookmodifysave") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);

    $id = chkstr($_GET["id"], 2);
    $content = chkstr($_POST["content"], 1);
    $contact = chkstr($_POST["contact"], 1);

    if ($content == "") alertback("请输入留言内容", 1);
    if ($contact == "") alertback("请输入联系方式", 1);

    $sql = "update cfstat_gbook set content='$content',contact='$contact' where username='$username' and id='$id'";
    $conn->query($sql);
    alertback("修改成功", 2);
}

//留言删除
if ($action == "gbookdel") {
    if ($_SESSION["cfstatuser"] == "") alertback("只有管理者可以修改！", 1);

    $id = chkstr($_GET["id"], 2);
    $sql = "delete from cfstat_gbook where username='$username' and id='$id'";
    $conn->query($sql);
    alertback("删除成功", 1);
}

if ($action == "userlogout") {
    $_SESSION["cfstatuser"] = "";
    $_SESSION["cfstatuser_view"] = "";
    setcookie("cfstatusercookie", "", time() - 3600);
    gotourl("index.php");
}
?>