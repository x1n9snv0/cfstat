<?php
/*
乘风多用户PHP统计系统
作者QQ：178575
作者E-Mail：yliangcf@163.com
作者网站：http://www.qqcf.com
详细介绍：http://www.qqcf.com/cfstat.htm
上面有程序在线演示，安装演示，使用疑难解答，最新版本下载等内容
因为这些内容可能时常更新，就没有放在程序里，请自己上网站上查看
有完整版本的演示
*/
?>
<table class="tb_1">
    <tr class="tr_1">
        <td colspan="4">每日统计</td>
    </tr>
    <tr class="tr_2">
        <td>日期</td>
        <td>浏览数量</td>
        <td>IP数量</td>
    </tr>
    <?php

    $sql = "select count(*) from (select adddate from cfstat_count_day group by adddate) a";

    $result = $conn->query($sql);
    $rs = mysqli_fetch_row($result);
    $page = $_GET["page"];
    //if ($page<=0) $page=1;
    $pagesize = 20;
    $totalrs = $rs[0];
    $totalpage = ceil($totalrs / $pagesize);
    $offset = $pagesize * ($page - 1);


    $offset = $pagesize * ($page - 1);
    $sql = "select adddate,sum(mycounter) as mycounter,sum(ipcounter) as ipcounter from cfstat_count_day group by adddate";
    $sql = $sql . " order by adddate desc limit $offset, $pagesize";


    $result2 = $conn->query($sql);
    while ($rs = mysqli_fetch_assoc($result2)) {
        ?>


        <tr class="tr_2">
            <td><?php echo $rs["adddate"]; ?></td>
            <td><?php echo $rs["mycounter"]; ?></td>
            <td><?php echo $rs["ipcounter"]; ?></td>
        </tr>

        <?php
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