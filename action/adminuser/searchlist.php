<table class="tb_1">
    <tr class="tr_1">
        <td>序号</td>
        <td>搜索引擎中文名</td>
        <td>搜索引擎英文标识</td>
        <td>搜索关键字的参数</td>
        <td>操作</td>
    </tr>
    <?php
    $sql = "select * from cfstat_search_set order by id desc";
    $result = $conn->query($sql);
    while ($rs = mysqli_fetch_assoc($result)) {
        ?>
        <tr class="tr_2">
            <td><?php echo $rs["id"] ?></td>
            <td><?php echo $rs["sitedesc"]; ?></td>
            <td><?php echo $rs["siteflag"]; ?></td>
            <td><?php echo $rs["keywordflag"]; ?></td>
            <td>
                <a href="?action=searchmodify&id=<?php echo $rs["id"]; ?>">修改</a>
                <a href="?action=searchdel&siteflag=<?php echo $rs["siteflag"]; ?>"
                   onClick="return(confirm('确定要删除么?'))">删除</a>
            </td>
        </tr>
        <?php
        $allsearch = $allsearch . $rs["siteflag"] . "," . $rs["keywordflag"] . "|";
    }
    $allsearch = substr($allsearch, 0, strlen($allsearch) - 1);
    $sql = "update cfstat_admin set allsearch='$allsearch'";
    $conn->query($sql);
    ?>

</table>

<br>
<form name="form5" method="post" action="?action=searchaddsave">
    <table class="tb_1">
        <tr class="tr_1">
            <td colspan="4">增加自定义引擎</td>
        </tr>

        <tr class="tr_2">
            <td>搜索引擎中文名</td>
            <td>搜索引擎英文标识</td>
            <td>搜索关键字的参数</td>
            <td></td>
        </tr>
        <tr class="tr_2">
            <td>
                <input name="sitedesc" type="text" id="sitedesc">
            </td>
            <td>
                <input name="siteflag" type="text" id="siteflag">
            </td>
            <td>
                <input name="keywordflag" type="text" id="keywordflag">
            </td>
            <td><input type="submit" name="Submit" value="增加"></td>
        </tr>
        <tr>
            <td colspan="4">比如：<br>
                百度网页搜索&quot;abcd&quot;IE地址栏为:http://www.baidu.com/s?wd=abcd&amp;cl=3<br>
                百度贴吧搜索&quot;abcd&quot;IE地址栏为:http://post.baidu.com/f?kw=abcd<br>
                百度知道搜索&quot;abcd&quot;IE地址栏为:http://zhidao.baidu.com/q?ct=17&amp;pn=0&amp;tn=ikaslist&amp;rn=10&amp;word=abcd&amp;t=51<br>
                这要我们就可以这样填写：搜索引擎中文名填写&quot;百度&quot;,搜索引擎英文标识填写&quot;baidu.com&quot;，标识可以填写多个，各个标识间用/分隔，搜索关键字的参数填写&quot;wd/kw/word&quot;,关键字参数用英文分号/分隔，以此类推
        </tr>

    </table>
</form>