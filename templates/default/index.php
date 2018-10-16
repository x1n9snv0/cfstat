<?php
/**
 * Created by PhpStorm.
 * User: Autumn
 * Date: 10/16/2018
 * Time: 20:57
 */
?>
<!DOCTYPE>
<html>
    <?php @include("templates/default/header.php"); ?>
    <body>
        <?php @include("templates/default/nav.php"); ?>
        <div id=webmain>
            <table class=maintable cellSpacing=0 cellPadding=0 border=0>
                <tbody>
                <tr>
                    <td valign="top">
                        <div class="f-l w-220">
                            <H2><a class=s-1>用户登录</a>
                                <div class=bdr-right></div>
                            </H2>
                            <div class=bdr>
                                <?php
                                @include("action/web/userlogin.php");
                                ?>
                                <div class=clear></div>
                            </div>
                            <div class="bdr-bottom-220">
                                <div class=bdr-right2></div>
                            </div>
                            <div class="bk-10"></div>
                        </div>

                        <div class="f-l w-220">
                            <H2><a class=s-1>联系我们</a>
                                <div class=bdr-right></div>
                            </H2>
                            <div class=bdr>
                                <?php
                                @include("action/web/index_lxwm.php");
                                ?>
                                <div class=clear></div>
                            </div>
                            <div class="bdr-bottom-220">
                                <div class=bdr-right2></div>
                            </div>
                            <div class="bk-10"></div>
                        </div>
                        <div class="f-l w-220">
                            <H2><a class=s-1>最新注册</a>
                                <div class=bdr-right></div>
                            </H2>
                            <div class=bdr>
                                <?php
                                @include("action/web/userlast.php");
                                ?>
                                <div class=clear></div>
                            </div>
                            <div class="bdr-bottom-220">
                                <div class=bdr-right2></div>
                            </div>
                            <div class="bk-10"></div>
                        </div>
                    </td>
                    <td valign="top" style="padding-left:10px;padding-right:10px;">
                        <?php
                        if ($action == "") {
                            @include("action/web/index.php");
                        }
                        if ($action == "wztj") {
                            @include("action/web/wztj.php");
                        }
                        if ($action == "wdtj") {
                            @include("action/web/wdtj.php");
                        }
                        if ($action == "tjgg") {
                            @include("action/web/tjgg.php");
                        }
                        if ($action == "cjwt") {
                            @include("action/web/cjwt.php");
                        }
                        if ($action == "fwtk") {
                            @include("action/web/fwtk.php");
                        }
                        if ($action == "lxwm") {
                            @include("action/web/lxwm.php");
                        }
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php @include("templates/default/footer.php"); ?>
    </body>
</html>

