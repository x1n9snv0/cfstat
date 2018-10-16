<?php
session_start();
@include("conn.php");
@include("include/myfunction.php");
$action = isset($_GET["action"]) ? chkstr($_GET["action"], 1) : "";
if ($action == "") {
    ?>
    <html>
    <head>
        <title>上载文件表单</title></head>
    <body style="margin:0;font-size:12px;background-color:transparent">
    <form name="form1" method="post" action="?action=upsave" enctype="multipart/form-data">
        <input name="upload_file" type="file">
        <input type=hidden name="usertype" value="<?php echo chkstr($_GET["usertype"], 2) ?>">
        <input type="submit" value="上传文件">
    </form>
    </body>
    </html>
    <?php
}
?>
<?php
if ($action == "upsave") {
    $usertype = chkstr($_POST["usertype"], 2);
    $upload_file = $_FILES['upload_file']['tmp_name'];
    $file_name = $_FILES['upload_file']['name'];
    $file_size = $_FILES['upload_file']['size'];
    $file_ext = chkstr(strtolower(trim(substr(strrchr($file_name, '.'), 1))), 1);
    if ($usertype == 1) {
        if ($_SESSION["cfstatuser"] == "") {
            echo("没有权限操作!");
            exit;
        }
        $upurl = "user.php?action=imglist&assort=1";
        $file_name = $_SESSION["cfstatuser"] . "." . $file_ext;
    } elseif ($usertype == 2) {
        if ($_SESSION["cfstatadmin"] == "") {
            echo("请登录后操作!");
            exit;
        }
        $upurl = "adminuser.php?action=imglist";
        $file_name = "sys-img-" . time() . "." . $file_ext;
    } else {
        echo "用户类型有误";
        exit;
    }
    $file_size_max = 50 * 1000;// 1M限制文件上传最大容量(bytes)
    $store_dir = "upload/";// 上传文件的储存位置
    $accept_overwrite = 1;//是否允许覆盖相同文件
// 检查文件大小
    if ($file_size > $file_size_max) {
        echo "<script language='javascript'>";
        echo "alert('对不起，你的文件容量大于上传规定!');";
        echo "top.location.href = '" . $upurl . "';";
        echo "</script>";
        exit;
    }
//检查文件扩展名
    if ($file_ext <> "jpg" && $file_ext <> "gif") {
        echo "<script language='javascript'>";
        echo "alert('对不起，此类文件不能上传!');";
        echo "top.location.href = '" . $upurl . "';";
        echo "</script>";
        exit;
    }
//复制文件到指定目录
    if (!move_uploaded_file($upload_file, $store_dir . $file_name)) {
        echo "复制文件失败";
        exit;
    }
    if ($usertype == 1) {
        $sql = "update cfstat_user set imgfilename='" . $file_name . "' where username='" . $_SESSION["cfstatuser"] . "'";
        $conn->query($sql);
        $sql = "update cfstat_upfile set username='" . $_SESSION["cfstatuser"] . "',filename='" . $file_name . "',filesizenum='" . $file_size . "',addtime='" . date("Y-m-d H:i:s") . "' where filename='" . $file_name . "'";
        $conn->query($sql);
        if (mysqli_affected_rows($conn) == 0) {
            $sql = "insert into cfstat_upfile(username,filename,filesizenum,addtime) values('" . $_SESSION["cfstatuser"] . "','$file_name','$file_size','" . date("Y-m-d H:i:s") . "')";
            $conn->query($sql);
        }
    }
    if ($usertype == 2) {
        $sql = "insert into cfstat_upfile(filename,filesizenum,addtime) values('$file_name','$file_size','" . date("Y-m-d H:i:s") . "')";
        $conn->query($sql);
    }
    echo "<script language='javascript'>";
    echo "alert('上传成功!');";
    echo "top.location.href = '" . $upurl . "';";
    echo "</script>";
}
?>