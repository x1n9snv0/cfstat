<?php
/**
 * Created by PhpStorm.
 * User: Autumn
 * Date: 10/16/2018
 * Time: 21:02
 */
?>
<div id=head>
    <div id=logo>
        <h1><a href="index.php"><img src="templet/101203/images/logo.gif"></a></h1>
        <P>
        </P>
    </div>
    <div class=clear></div>
    <div id=menu>
        <UL class=menu_u>
            <li><a href="index.php"<?php if($action==""){echo " class='current'";}?>>首 页</a></li>
            <li><a href="index.php?action=wztj"<?php if($action=="wztj") echo " class='current'";?>>网站统计</a></li>
            <li><a href="index.php?action=wdtj"<?php if($action=="wdtj") echo " class='current'";?>>网店统计</a></li>
            <li><a href="index.php?action=tjgg"<?php if($action=="tjgg") echo " class='current'";?>>统计公告</a></li>
            <li><a href="index.php?action=cjwt"<?php if($action=="cjwt") echo " class='current'";?>>常见问题</a></li>
            <li><a href="index.php?action=fwtk"<?php if($action=="fwtk") echo " class='current'";?>>服务条款</a></li>
            <li><a href="index.php?action=lxwm"<?php if($action=="lxwm") echo " class='current'";?>>联系我们</a></li>
        </UL>
    </div>
</div>
