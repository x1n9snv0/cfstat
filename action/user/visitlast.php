<?php
$adddate = chkstr($_GET["adddate"], 3);
if ($adddate == "") {
    $adddate = date("Y-m-d");
}
?>
<table class="tb_1">
    <tr class="tr_1">
        <td colspan="8">最新<?php echo $user_visit_maxrsnum; ?>条访问</td>
    </tr>
    <tr class="tr_2">
        <td class="td_nowrap">IP</td>
        <td class="td_nowrap">PV数量</td>
        <td class="td_nowrap">屏幕分辨率</td>
        <td class="td_nowrap">屏幕色彩</td>
        <td class="td_nowrap">操作系统</td>
        <td class="td_nowrap">浏览器</td>
        <td class="td_nowrap">开始访问时间</td>
        <td class="td_nowrap">最后访问时间</td>
    </tr>
    <?php
    $sql = "select count(*) from (select id from cfstat_visit_last where username='$username' order by addtime desc limit 0,$user_visit_maxrsnum) a";
    $result = $conn->query($sql);
    $rs = mysqli_fetch_row($result);
    $page = $_GET["page"];
    if ($page <= 0) $page = 1;
    $pagesize = 10;
    $totalrs = $rs[0];
    $totalpage = ceil($totalrs / $pagesize);
    $offset = $pagesize * ($page - 1);
    $sql = "select * from (select * from cfstat_visit_last where username='$username' order by addtime desc limit 0,$user_visit_maxrsnum) a limit $offset ,$pagesize";
    $result2 = $conn->query($sql);
    while ($rs = mysqli_fetch_assoc($result2)) {
        ?>
        <tr class="tr_2">
            <td><?php echo $rs["ip"] . "<br>" . getiparea($rs["ip"]); ?></td>
            <td><?php echo $rs["pvtotal"]; ?></td>
            <td><?php echo $rs["screenwidth"] . "×" . $rs["screenheight"]; ?></td>
            <td><?php echo $rs["screencolordepth"]; ?></td>
            <td><?php echo $rs["ostype"]; ?></td>
            <td><?php echo $rs["browsertype"]; ?></td>
            <td><?php echo $rs["addtime"]; ?></td>
            <td><?php echo $rs["lasttime"]; ?></td>
        </tr>
        <tr>
            <td colspan="8">
                来源：<?php
                if ($rs["ly"] != "")
                    echo "<a href=?action=urlgo&url=" . urlencode($rs["ly"]) . " target=_blank>" . htmlspecialchars($rs["ly"]) . "</a>";
                else
                    echo "直接从浏览器输入";
                ?></td>
        </tr>
        <tr>
            <td colspan="8" style="border-bottom: 1px dotted #FF0000;padding-left:6px;empty-cells:show;">
                受访页：<?php echo "<a href='?action=urlgo&url=" . urlencode($rs["currweb"]) . "' target='_blank'>" . $rs["webtitle"] . " " . $rs["currweb"] . "</a>"; ?></td>
        </tr>
    <?php } ?>
</table>
<table class="tb_3">
    <tr>
        <td><a href="?action=<?php echo $action; ?>&page=1">第一页</a>
            <?php if ($page > 1) { ?>
                <a href='?action=<?php echo $action; ?>&page=<?php echo $page - 1; ?>'>上一页</a>
            <?php } ?>
            <?php if ($page < $totalpage) { ?>
                <a href='?action=<?php echo $action; ?>&page=<?php echo $page + 1; ?>'>下一页</a>
            <?php } ?>
            <a href="?action=<?php echo $action; ?>&page=<?php echo $totalpage; ?>">最后一页</a>&nbsp;共<font
                    color="#FF0000"><?php echo $totalrs ?></font>条记录&nbsp;<font
                    color="#ff0000"><?php echo $page; ?></font>/<?php echo $totalpage; ?>页
            <?php
            echo "&nbsp;&nbsp;转到第<select id='page' onChange=\"window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value\">";
            for ($i = 1; $i <= $totalpage; $i++) {
                echo "<option value=?action=" . $action . "&page=" . $i;
                if ($page == $i) echo " selected";
                echo ">" . $i . "</option>";
            }
            echo "</select>页";
            ?>
        </td>
    </tr>
</table> 