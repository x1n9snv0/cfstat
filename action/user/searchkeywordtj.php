<?php
$siteflag = chkstr($_REQUEST["siteflag"], 1);
$adddate = chkstr($_REQUEST["adddate"], 3);
$px = chkstr($_GET["px"], 1);


if ($adddate == "") {
    $adddate = date("Y-m-d");
}

if ($px == "") $px = "mycounter";

pxfilter($px, "keyword,mycounter,ipcounter,addtime,lasttime,lastly");
?>


<table class="tb_1">
    <form name="form2" method="post" action="?action=<?php echo $action; ?>">
        <tr>
            <td colspan="6">
                <select name="siteflag" size="1" id="siteflag">
                    <option value="">请选择搜索引擎</option>
                    <?php
                    $sql = "select siteflag from cfstat_search_set order by siteflag";
                    $result = $conn->query($sql);
                    while ($rs = mysqli_fetch_assoc($result)) {
                        if ($siteflag == "") {
                            if (strpos($rs["siteflag"], "baidu.com") !== false) {
                                $siteflag = $rs["siteflag"];
                            }
                        }

                        echo "<option value='" . $rs["siteflag"] . "'";
                        if ($siteflag == $rs["siteflag"]) echo " selected";
                        echo ">" . $rs["siteflag"] . "</option>";;
                    }
                    ?>
                </select>
                <select name="adddate" size="1" id="adddate">
                    <option value="">请选择查询日期</option>
                    <?php
                    $sql = "select adddate from cfstat_searchkeyword_day where username='$username' group by adddate desc";
                    $result = $conn->query($sql);
                    while ($rs = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $rs["adddate"] . "'";
                        if ($adddate == $rs["adddate"]) echo " selected";
                        echo ">" . $rs["adddate"] . "</option>";;
                    }
                    ?>
                </select> <input type="submit" name="Submit5" value="确定"></td>
        </tr>
    </form>
    <tr class="tr_1">
        <td colspan="6">搜索关键字统计(点标题可排序)</td>
    </tr>
    <tr class="tr_2">
        <td class="td_nowrap">
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=keyword">关键字</a>
        </td>
        <td class="td_nowrap">
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=mycounter">PV数量</a>
        </td>
        <td class="td_nowrap">
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=ipcounter">IP数量</a>
        </td>
        <td class="td_nowrap">
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=addtime">第一次访问</a>
        </td>
        <td class="td_nowrap">
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=lasttime">最后访问时间</a>
        </td>
        <td>
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=lastly">最后来源</a>
        </td>
    </tr>
    <?php
    $sql = "select count(*) from cfstat_searchkeyword_day where username='$username' and siteflag='$siteflag' and TO_DAYS('$adddate') -TO_DAYS(adddate)=0";
    $result = $conn->query($sql);
    $rs = mysqli_fetch_row($result);
    $page = $_GET["page"];
    if ($page <= 0) $page = 1;
    $pagesize = 20;
    $totalrs = $rs[0];
    $totalpage = ceil($totalrs / $pagesize);
    $offset = $pagesize * ($page - 1);
    $sql = "select * from cfstat_searchkeyword_day where username='$username' and siteflag='$siteflag' and TO_DAYS('$adddate') -TO_DAYS(adddate)=0 order by $px desc limit $offset ,$pagesize";
    $result2 = $conn->query($sql);
    while ($rs = mysqli_fetch_assoc($result2)) {
        ?>
        <tr class="tr_2">
            <td class="td_nowrap"><?php echo htmlspecialchars($rs["keyword"]); ?> </td>
            <td class="td_nowrap"><?php echo $rs["mycounter"]; ?></td>
            <td class="td_nowrap"><?php echo $rs["ipcounter"]; ?></td>
            <td class="td_nowrap"><?php echo substr($rs["addtime"], strpos($rs["addtime"], " ") + 1); ?></td>
            <td class="td_nowrap"><?php echo substr($rs["lasttime"], strpos($rs["lasttime"], " ") + 1); ?></td>
            <td class="td_1">
                <?php echo "<a href='?action=urlgo&url=" . urlencode($rs["lastly"]) . "' target='_blank'>" . htmlspecialchars($rs["lastly"]) . "</a>"; ?>
            </td>
        </tr>
    <?php } ?>
</table>
<table class="tb_3">
    <tr>
        <td>
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=<?php echo $px; ?>&page=1">第一页</a>
            <?php if ($page > 1) { ?>
                <a href='?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=<?php echo $px; ?>&page=<?php echo $page - 1; ?>'>上一页</a>
            <?php } ?>
            <?php if ($page < $totalpage) { ?>
                <a href='?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=<?php echo $px; ?>&page=<?php echo $page + 1; ?>'>下一页</a>
            <?php } ?>
            <a href="?action=<?php echo $action; ?>&siteflag=<?php echo $siteflag; ?>&adddate=<?php echo $adddate; ?>&px=<?php echo $px; ?>&page=<?php echo $totalpage; ?>">最后一页</a>&nbsp;共<font
                    color="#FF0000"><?php echo $totalrs ?></font>条记录&nbsp;<font
                    color="#ff0000"><?php echo $page; ?></font>/<?php echo $totalpage; ?>页
            <?php
            echo "&nbsp;&nbsp;转到第<select id='page' onChange=\"window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value\">";
            for ($i = 1; $i <= $totalpage; $i++) {
                echo "<option value=?action=" . $action . "&siteflag=" . $siteflag . "&adddate=" . $adddate . "&px=" . $px . "&page=" . $i;
                if ($page == $i) echo " selected";
                echo ">" . $i . "</option>";
            }
            echo "</select>页";
            ?>
        </td>
    </tr>
</table> 