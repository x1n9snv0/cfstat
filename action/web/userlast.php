<table style="width:90%;margin:0px auto;">
    <td style="width:70px">用户名</td>
    <td>注册日期</td>
    <?php
    $sql = "select * from cfstat_user order by adddate desc,id desc limit 0 ,10";
    $result2 = $conn->query($sql);
    while ($rs = mysqli_fetch_assoc($result2)) {
        ?>
        <tr>
            <td><?php echo $rs["username"]; ?></td>
            <td><?php echo $rs["adddate"]; ?></td>
        </tr>

    <?php } ?>
</table>

