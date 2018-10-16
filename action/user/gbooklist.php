<?php
$sql = "select count(*) from cfstat_gbook where username='$username'";
$result = $conn->query($sql);
$rs = mysqli_fetch_row($result);
$page = $_GET["page"];
if ($page <= 0) $page = 1;
$pagesize = 10;
$totalrs = $rs[0];
$totalpage = ceil($totalrs / $pagesize);
$offset = $pagesize * ($page - 1);
$sql = "select * from cfstat_gbook where  username='$username' order by addtime desc limit $offset ,$pagesize";
$result2 = $conn->query($sql);
while ($rs = mysqli_fetch_assoc($result2)) {
    ?>
    <table class="tb_1">
        <tr>
            <td class="td_3" width="12%">留言内容：</td>
            <td><?php echo $rs["content"]; ?></td>
        </tr>
        <tr>
            <td class="td_3">联系方式：</td>
            <td><span class="td_nowrap"><?php echo $rs["contact"]; ?></span></td>
        </tr>
        <tr>
            <td class="td_3">留言时间：</td>
            <td><?php echo $rs["addtime"]; ?></td>
        </tr>
        <tr>
            <td class="td_3">留言来源：</td>
            <td><a href="<?php echo $rs["ly"]; ?>" target="_blank"><?php echo $rs["ly"]; ?></a></td>
        </tr>
        <tr>
            <td class="td_3">留言当前页：</td>
            <td><a href="<?php echo $rs["currweb"]; ?>" target="_blank"><?php echo $rs["currweb"]; ?></a></td>
        </tr>
        <tr>
            <td class="td_3">操作：</td>
            <td>
                <a href="?action=gbookmodify&id=<?php echo $rs["id"]; ?>">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="?action=gbookdel&id=<?php echo $rs["id"]; ?>" onClick="{return(confirm('确定要删除么?'))}">删除</a>
            </td>
        </tr>
    </table>
<?php } ?>
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