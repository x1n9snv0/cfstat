<table class="tb_1">
    <tr class="tr_1">
        <td colspan="3">网店类图片上传</td>
    </tr>
    <tr>
        <td colspan="3">
            <iframe style="top:2px" ID="UploadFiles" src="/upfile.php?usertype=2" frameborder=0 scrolling=no
                    width="600" height="25" allowtransparency="true"></iframe>
        </td>
    </tr>
    <tr class="tr_1">
        <td colspan="3">网店类图片列表</td>
    </tr>
    <?php
    $imgtype = chkstr($_REQUEST["imgtype"], 2);
    if ($imgtype == "") $imgtype = 0;

    $sql = "select count(*) from cfstat_upfile where 1=1";

    if ($imgtype == 1) $sql = $sql . " and username=''";
    if ($imgtype == 2) $sql = $sql . " and username<>''";

    $sql = $sql . " order by addtime desc";

    $result = $conn->query($sql);
    $rs = mysqli_fetch_row($result);
    $page = $_GET["page"];
    if ($page <= 0) $page = 1;
    $pagesize = 6;
    $totalrs = $rs[0];
    $totalpage = ceil($totalrs / $pagesize);
    $offset = $pagesize * ($page - 1);

    $sql = "select * from cfstat_upfile where 1=1";

    if ($imgtype == 1) $sql = $sql . " and username=''";
    if ($imgtype == 2) $sql = $sql . " and username<>''";

    $sql = $sql . " order by addtime desc,id desc limit $offset ,$pagesize";

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

            echo "编号：" . $rs["id"] . "<br>";

            echo "上传人：";
            if ($rs["username"] == "") {
                echo "管理员";
            } else {
                echo $rs["username"];
            }
            echo "<br>";

            echo "文件大小：" . round($rs["filesizenum"] / 1024) . "k<br>";

            echo "使用人数：";

            $sql = "select count(*) from cfstat_user where imgfilename='" . $rs["filename"] . "'";
            $result3 = $conn->query($sql);
            $rs3 = mysqli_fetch_row($result3);
            echo $rs3[0];

            echo "<br>";

            echo "上传时间：" . $rs["addtime"] . "<br>";

            echo "操作：<a href='?action=picdel&filename=" . $rs["filename"] . "' onClick=\"return(confirm('确定要删除么?'));\">删除</a>";
            ?>
        </td>
        <?php
        if ($jishu % $linenum == 0) {
            echo "</tr>";
            echo "<tr><td colspan='6' height='0'></td></tr>";
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

<table class="tb_3">
    <tr>
        <td><a href="?action=<?php echo $action; ?>&imgtype=<?php echo $imgtype; ?>&page=1">第一页</a>
            <?php if ($page > 1) { ?>
                <a href='?action=<?php echo $action; ?>&imgtype=<?php echo $imgtype; ?>&page=<?php echo $page - 1; ?>'>上一页</a>
            <?php } ?>
            <?php if ($page < $totalpage) { ?>
                <a href='?action=<?php echo $action; ?>&imgtype=<?php echo $imgtype; ?>&page=<?php echo $page + 1; ?>'>下一页</a>
            <?php } ?>
            <a href="?action=<?php echo $action; ?>&imgtype=<?php echo $imgtype; ?>&page=<?php echo $totalpage; ?>">最后一页</a>&nbsp;共<?php echo $totalrs ?>条记录&nbsp;<?php echo $page; ?>/<?php echo $totalpage; ?>页
            &nbsp;&nbsp;转到第<select id='page' onChange="window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value">
            <?php
                for ($i = 1; $i <= $totalpage; $i++) {
                echo "<option value=?action=" . $action . "&imgtype=" . $imgtype . "&page=" . $i;
                if ($page == $i) echo " selected";
                echo ">" . $i . "</option>";
            }
            echo "</select>页";
            ?>
        </td>
    </tr>
</table>

<form name="form1" method="post" action="?action=<?php echo $action; ?>">
    <table class="tb_3">
        <tr>
            <td height="25" colspan='6'>
                上传用户类型：
                <select title="图片类型" name="imgtype">
                    <option value='0'<?php if ($imgtype == 0) echo " selected"; ?>>全部</option>
                    <option value='1'<?php if ($imgtype == 1) echo " selected"; ?>>系统管理员上传</option>
                    <option value='2'<?php if ($imgtype == 2) echo " selected"; ?>>用户上传</option>
                </select>
                <input type=submit name="submit" value="搜索">
        </tr>
    </table>
</form>
