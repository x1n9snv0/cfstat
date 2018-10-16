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
<table class="tb_1">
    <tr class="tr_1">
        <td width="6%">样式</td>
        <td>选择你喜欢的计数器样式</td>
    </tr>
    <form name="form4" method="post" action="?action=stylemodifysave">
        <?php
        while ($i <= $mypagesize2) {
            ?>
            <tr>
                <td>
                    <?php
                    $k = ($page - 1) * $mypagesize + $i;
                    ?>
                    <input name="style" type="radio"
                           value="<?php echo $k; ?>"<?php if ($rs["style"] == $k) echo " checked"; ?>>
                </td>
                <td><?php for ($j = 0; $j <= 9; $j++) { ?><img
                        src="counterpic/<?php echo $k; ?>/<?php echo $j; ?>.gif"><?php } ?>
                </td>
            </tr>
            <?php
            $i = $i + 1;
        }
        ?>
        <tr>
            <td>&nbsp;</td>
            <td>
                <div align="left">
                    <input type="submit" name="Submit3" value="确定">
            </td>
        </tr>
    </form>
    <tr>
        <td colspan="2">
            <table>
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
                        ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">你的计数器效果
        </td>
    </tr>
    <tr>
        <td colspan="2">Script调用：
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <script src="<?php echo $tmp; ?>cf.php?username=<?php echo $username; ?>"></script>
        </td>
    </tr>
</table>