<?php
$adddate = chkstr($_GET["adddate"], 3);
if ($adddate == "") {
    $adddate = date("Y-m-d");
}
?>
<table class="tb_1">
    <tr>
        <td colspan="3">
            <select id='adddate' onChange="window.location=document.getElementById('adddate').options[document.getElementById('adddate').selectedIndex].value">
                <option value="?action=<?php echo $action; ?>">请选择查询日期</option>
                <?php
                $sql = "select adddate from cfstat_count_hour where username='$username' group by adddate desc";
                $result = mysql_query($sql);
                while ($rs = mysql_fetch_assoc($result)) {
                    echo "<option value=?action=" . $action . "&adddate=" . $rs["adddate"];
                    if ($adddate == $rs["adddate"]) echo " selected";
                    echo ">" . $rs["adddate"] . "</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr class="tr_1">
        <td colspan="3">小时统计</td>
    </tr>
    <tr class="tr_2">
        <td>时间</td>
        <td>访问页面</td>
        <td>访问数量</td>
    </tr>
    <?php
    for ($i = 0; $i <= 23; $i++) {
        $sql = "select * from cfstat_count_hour where username='$username' and adddate='$adddate' and addhour='$i'";
        $result2 = $conn->query($sql);
        $timestr = $i . ":00-" . ($i + 1) . ":00";
        $mycounter = 0;
        $ipcounter = 0;
        if ($rs = mysqli_fetch_assoc($result2)) {
            $mycounter = $rs["mycounter"];
            $ipcounter = $rs["ipcounter"];
        }
        ?>
        <tr class="tr_2">
            <td><?php echo $timestr; ?></td>
            <td><?php echo $mycounter; ?></td>
            <td><?php echo $ipcounter; ?></td>
        </tr>
    <?php } ?>
</table>