<?php
$assort = $_GET["assort"];
if ($assort == "") $assort = 2;

$sql = "select * from cfstat_user where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_assoc($result);

$imgfilename = $rs["imgfilename"];
$usercode = $rs["usercode"];
?>
<form name="form5" method="post" action="?action=imgmodifysave">
    <table class="tb_1">


        <tr class="tr_1">
            <td colspan="2">你的设置效果如下：</td>
        </tr>
        <tr>
            <td colspan="2"><img src="<?php echo $tmp; ?>cf.php?c=<?php echo $username; ?>" border="0">
            </td>
        </tr>
        <tr class="tr_1">
            <td colspan="2">网店类</td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="?action=<?php echo $action ?>&assort=1"><b>使用自定义图片</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="?action=<?php echo $action ?>&assort=2"><b>使用系统自带图片</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="?action=<?php echo $action ?>&assort=3"><b>使用系统默认图片</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>

        <?php
        if ($assort == 1) {
            ?>
            <tr id="a_1">
                <td colspan="2">
                    <iframe style="top:2px" ID="UploadFiles" src="upfile.php?usertype=1" frameborder=0 scrolling=no
                            width="600" height="25" allowtransparency="true"></iframe>
                </td>
            </tr>
            <?php
        } elseif ($assort == 2) {
            ?>
            <tr id="a_2">
                <td colspan="2">
                    <table border="0" cellpadding="0" cellspacing="0" width=100%>
                        <tr>
                            <td height="25" colspan='6' bgcolor='#FFFFFF'>请选择以下图片：</td>
                        </tr>
                        <?php
                        $sql = "select count(*) from cfstat_upfile where username='' order by addtime desc";
                        $result = $conn->query($sql);
                        $rs = mysqli_fetch_row($result);
                        $page = $_GET["page"];
                        if ($page <= 0) $page = 1;
                        $pagesize = 6;
                        $totalrs = $rs[0];
                        $totalpage = ceil($totalrs / $pagesize);
                        $offset = $pagesize * ($page - 1);
                        $sql = "select * from cfstat_upfile where username='' order by addtime desc,id desc limit $offset ,$pagesize";
                        $result2 = $conn->query($sql);


                        $linenum = 3;
                        $tdwidth = intval(100 / $linenum) . "%";
                        $jishu = 1;

                        while ($rs = mysqli_fetch_assoc($result2)) {

                            if ($jishu % $linenum == 1 || $linenum == 1) echo "<tr>";
                            ?>
                            <td width="<?php echo $tdwidth ?>" valign="top">
                                <?php
                                echo "<img src='upload/" . $rs["filename"] . "'><br>";

                                echo "<input type='radio' name='filename_2' value='" . $rs["filename"] . "'";
                                if ($imgfilename == $rs["filename"]) echo " checked";
                                echo ">编号：" . $rs["id"] . "<br>";

                                echo "文件大小：" . round($rs["filesizenum"] / 1024) . "k<br>";

                                echo "使用人数：";

                                $sql = "select count(*) from cfstat_user where imgfilename='" . $rs["filename"] . "'";
                                $result3 = $conn->query($sql);
                                $rs3 = mysqli_fetch_row($result3);
                                echo $rs3[0];

                                echo "<br>";

                                echo "上传时间：" . $rs["addtime"] . "<br>";
                                ?>
                            </td>

                            <?php
                            if ($jishu % $linenum == 0) {
                                echo "</tr>";
                                echo "<tr><td colspan='6' height='1'></td></tr>";
                            }
                            $jishu = $jishu + 1;

                        }//判断最后一行tr是否正好闭合,否则增加td,里面填入空格

                        $jishu = $jishu - 1;
                        if ($jishu % $linenum <> 0) {
                            for ($i = 1; $linenum - ($jishu % $linenum); $i++)
                                echo "<td width='" . $tdwidth . "'>&nbsp;</td>";
                            if ($i == $linenum - ($jishu % $linenum)) echo "</tr>";
                        }

                        ?>
                    </table>
                </td>
            </tr>
            <?php
        } elseif ($assort == 3) {
            ?>
            <tr>
                <td colspan="2">
                    使用这个默认图片<br/>
                    <?php
                    echo "<img src='upload/default.jpg' border='0'><br />";
                    echo "<input type='radio' name='filename_2' value='default.jpg'";
                    if ($imgfilename == "default.jpg") echo " checked";
                    echo ">选用此图<br>";
                    ?>
                </td>

            </tr>

            <?php
        }
        ?>
        <?php
        if ($assort == 2 || $assort == 3) {
            ?>
            <tr id="a_3">
                <td colspan="2"><input type="submit" name="Submit" value="确定">
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</form>

<?php
if ($assort == 2) {
    ?>
    <table class="tb_3">
        <tr>
            <td><a href="?action=<?php echo $action; ?>&assort=<?php echo $assort; ?>&page=1">第一页</a>
                <?php if ($page > 1) { ?>
                    <a href='?action=<?php echo $action; ?>&assort=<?php echo $assort; ?>&page=<?php echo $page - 1; ?>'>上一页</a>
                <?php } ?>
                <?php if ($page < $totalpage) { ?>
                    <a href='?action=<?php echo $action; ?>&assort=<?php echo $assort; ?>&page=<?php echo $page + 1; ?>'>下一页</a>
                <?php } ?>
                <a href="?action=<?php echo $action; ?>&assort=<?php echo $assort; ?>&page=<?php echo $totalpage; ?>">最后一页</a>&nbsp;共<font
                        color="#FF0000"><?php echo $totalrs ?></font>条记录&nbsp;<font
                        color="#ff0000"><?php echo $page; ?></font>/<?php echo $totalpage; ?>页
                <?php
                echo "&nbsp;&nbsp;转到第<select id='page' onChange=\"window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value\">";
                for ($i = 1; $i <= $totalpage; $i++) {
                    echo "<option value=?action=" . $action . "&assort=" . $assort . "&page=" . $i;
                    if ($page == $i) echo " selected";
                    echo ">" . $i . "</option>";
                }
                echo "</select>页";
                ?>
            </td>
        </tr>
    </table>
    <?php
}
?>
