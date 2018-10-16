<?php
$page = $_GET["page"];
if ($page <= 0) $page = 1;

$mypagesize = 10;
$mypagesize2 = 10;

if ($rsset["styletotal"] % $mypagesize == 0) {
    $totalpage = $rsset["styletotal"] / $mypagesize;
} else {
    $totalpage = floor($rsset["styletotal"] / $mypagesize) + 1;
    if ($page == $totalpage) {
        $mypagesize2 = $rsset["styletotal"] % $mypagesize;
    }
}
$i = 1;
?>
<?php
$sql = "select * from  cfstat_user where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_assoc($result);
?>


<div class="f-l w-730">
    <H2><a class=s-1>网站统计</a>
        <div class=bdr-right></div>
    </H2>
    <div class=bdr>
        <table class="index_tb">
            <tr class="tr_1">
                <td colspan="6">网站统计数字样式</td>
            </tr>
            <?php
            while ($i <= $mypagesize2) {
                $k = ($page - 1) * $mypagesize + $i;
                ?>
                <tr>

                    <td style="padding:5px;"><?php for ($j = 0; $j <= 9; $j++) { ?><img
                            src="counterpic/<?php echo $k; ?>/<?php echo $j; ?>.gif"><?php } ?>
                    </td>
                </tr>
                <?php
                $i = $i + 1;
            }
            ?>
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
                    &nbsp;&nbsp;转到第<select id='page' onChange="window.location=document.getElementById('page').options[document.getElementById('page').selectedIndex].value">
                    <?php
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
        <div class=clear></div>
    </div>
    <div class="bdr-bottom-730">
        <div class=bdr-right2></div>
    </div>
    <div class="bk-10"></div>
</div>
