<?php
$px = chkstr($_GET["px"], 1);

if ($px == "") $px = "adddate";

pxfilter($px, "adddate,mycounter,ipcounter");
?>
<table class="tb_1">
    <tr class="tr_1">
        <td colspan="3">每日统计(点标题可排序)</td>
    </tr>
    <tr class="tr_2">
        <td><a href="?action=<?php echo $action; ?>&px=adddate">日期</a></td>
        <td><a href="?action=<?php echo $action; ?>&px=mycounter">浏览数量</a></td>
        <td><a href="?action=<?php echo $action; ?>&px=ipcounter">IP数量</a></td>
    </tr>
    <?php
    $sql = "select count(*) from cfstat_count_day where username='$username'";
    $result = $conn->query($sql);
    $rs = mysqli_fetch_row($result);
    $page = $_GET["page"];
    if ($page <= 0) $page = 1;
    $pagesize = 20;
    $totalrs = $rs[0];
    $totalpage = ceil($totalrs / $pagesize);
    $offset = $pagesize * ($page - 1);
    $sql = "select * from cfstat_count_day where username='$username' order by $px desc limit $offset ,$pagesize";
    $result2 = $conn->query($sql);
    while ($rs = mysqli_fetch_assoc($result2)) {
        ?>
        <tr class="tr_2">
            <td><?php echo $rs["adddate"]; ?></td>
            <td><?php echo $rs["mycounter"]; ?></td>
            <td><?php echo $rs["ipcounter"]; ?></td>
        </tr>
    <?php } ?>
</table>
<table class="tb_3">
    <tr>
        <td><a href="?action=<?php echo $action; ?>&px=<?php echo $px; ?>&page=1">第一页</a>
            <?php if ($page > 1) { ?>
                <a href='?action=<?php echo $action; ?>&px=<?php echo $px; ?>&page=<?php echo $page - 1; ?>'>上一页</a>
            <?php } ?>
            <?php if ($page < $totalpage) { ?>
                <a href='?action=<?php echo $action; ?>&px=<?php echo $px; ?>&page=<?php echo $page + 1; ?>'>下一页</a>
            <?php } ?>
            <a href="?action=<?php echo $action; ?>&px=<?php echo $px; ?>&page=<?php echo $totalpage; ?>">最后一页</a>&nbsp;共<font
                    color="#FF0000"><?php echo $totalrs ?></font>条记录&nbsp;<font
                    color="#ff0000"><?php echo $page; ?></font>/<?php echo $totalpage; ?>页
            &nbsp;&nbsp;转到第<select id='page' onChange="window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value">
            <?php
                for ($i = 1; $i <= $totalpage; $i++) {
                    echo "<option value=?action=" . $action . "&px=" . $px . "&page=" . $i;
                    if ($page == $i) echo " selected";
                    echo ">" . $i . "</option>";
                }
                echo "</select>页";
            ?>
        </td>
    </tr>
</table> 