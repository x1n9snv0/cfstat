<DIV class="manage_menu">
    <DIV class="manage_menu_head">
        <UL>
            <LI>
                <?php
                if ($_SESSION["cfstatuser"] <> "") {
                    echo "用户：";
                } else {
                    echo "独立查看者：";
                }
                echo $username;
                ?>
            </LI>
        </UL>
    </DIV>
    <UL class="manage_menu_list">
        <li class="l_3"><img src=images/userlist.gif><a href=?action=visitlast>最近来访</a></li>
        <li class="l_3"><img src=images/infolist.gif><a href=?action=lytj>来源明细</a></li>
        <li class="l_3"><img src=images/gbooklist.gif><a href=?action=webtj>页面统计</a></li>
        <li class="l_3"><img src=images/db.gif><a href=?action=daytj>日访问统计</a></li>
        <li class="l_3"><img src=images/licencode.gif><a href=?action=hourtj>小时访问统计</a></li>
        <li class="l_3"><img src=images/templet.gif><a href=?action=clienttj>客户端统计</a></li>
        <li class="l_3"><img src=images/menu_a.gif><a href=?action=searchtj>搜索引擎统计</a></li>
        <li class="l_3"><img src=images/menu_b.gif><a href=?action=searchkeywordtj>搜索关键字统计</a></li>
        <li class="l_3"><img src=images/menu_c.gif><a href=?action=setmodify>网站统计设置</a></li>
        <li class="l_3"><img src=images/menu_d.gif><a href=?action=stylelist>网站统计数字样式</a></li>
        <li class="l_3"><img src=images/menu_e.gif><a href=?action=imglist>网店统计图片设置</a></li>
        <li class="l_3"><img src=images/menu_f.gif><a href=?action=imgset>网店统计设置</a></li>
        <li class="l_3"><img src=images/lock.gif><a href=?action=usermodify>修改个人资料</a></li>
        <li class="l_3"><img src=images/menu_g.gif><a href=?action=pwdmodify>修改密码</a></li>
        <li class="l_3"><img src=images/menu_h.gif><a href=?action=gbooklist>留言查看</a></li>
        <li class="l_3"><img src=images/menu_i.gif><a href=?action=codeget>获得网站统计代码</a></li>
        <li class="l_3"><img src=images/menu_i.gif><a href=?action=codeget2>获得网店统计代码</a></li>
        <li class="l_3"><img src=images/exit.gif><a href=?action=userlogout onClick="{return(confirm('确定要退出管理么?'))}">退出管理</a>
        </li>
    </ul>
    <div class="manage_menu_foot">
        <ul>
            <li></li>
        </ul>
    </div>
</DIV>

