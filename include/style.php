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
<style type="text/css">
.tb_1{border:1px solid <?php echo $tablebordercolor;?>; margin:5px 0px 5px 5px; width:758px;float:right; border-collapse:collapse;}
.tb_1 td{border-bottom: 1px dotted <?php echo $tablebordercolor;?>;padding-left:6px;padding-top:2px;padding-bottom:2px;empty-cells:show;}

.tb_2{width:960px;border:1px solid <?php echo $tablebordercolor;?>;margin:0px auto;margin-top:10px; clear:both;float:center;border-collapse:collapse;}
.tb_2 td{padding-left:6px;}

.tb_3{border:1px solid <?php echo $tablebordercolor;?>;margin:0px auto;margin-top:10px;padding:5px; clear:both;border-collapse:collapse;}
.tb_3 td{text-align: right;padding:2px 6px;}

.tb_4{margin:5px 0px 5px 5px; width:758px;float:right; border-collapse:collapse;}

.tb_u td{border-bottom: 1px dotted <?php echo $tablebordercolor;?>;padding-left:6px;padding-top:2px;padding-bottom:2px;empty-cells:show;}

.tr_1{padding-left:5px;padding-top:5px;font-weight:bold;font-size:14px;height:24px; text-align:center;background-color:<?php echo $tableheadbgcolor;?>;}
.tr_1 td{text-align:center;vertical-align: middle;}

.tr_2{text-align:center;}
.tr_2 td{text-align:center;vertical-align: middle;}

.td_1{text-align:left;}
.td_2{text-align:center;}
.td_3{text-align:right;}

.t_button{display: inline-table;display: -moz-inline-box;display: inline-block;margin: 1px;border-style: solid;border-width: 1px;border-color: #999999;border-top-color: #cccccc;	border-left-color: #cccccc;background-color: #eeeeee;color: #333333;font-family: Verdana,Arial, Helvetica, sans-serif;font-size: 100%;white-space:nowrap;height:21px;line-height:21px;padding:0 3px;}
.t_button:LINK{text-decoration: none;color: #333333;background-color: #eeeeee;}
.t_button:VISITED{text-decoration: none;color: #333333;	background-color: #eeeeee;}

.td_wauto{width:34px;word-break:keep-all;}

.td_nowrap{white-space:nowrap;}

.manage{margin:0px auto;width:960px;border-collapse:collapse;}

.manage_left{width:192px;vertical-align:top;}

.manage_right{width:768px;vertical-align:top;}

.manage_menu{width:192px; margin-top:5px; border:1px solid <?php echo $tablebordercolor;?>;}
.manage_menu ul,ol,li{list-style-type:none}
.manage_menu_head{padding-left:5px; padding-top:5px; font-weight:bold; font-size:14px;height:24px;background-color:<?php echo $tableheadbgcolor;?>;}
.manage_menu_head li{font-size:16px;}
.manage_menu_list{padding-top:5px;padding-left:28px;text-align:left;font-weight:bold;font-size:14px;}
.manage_menu_list li{margin-bottom:5px;}
.manage_menu_list img{width:14px;height:14px;margin-right:6px;}
.manage_menu_foot{}

.index_tb{width:100%;}

.l_3{ padding-top:5px;text-align:left; font-weight:bold; font-size:14px;}

.l_3 img{width:14px;height:14px;margin-right:3px;}

.l_4{ padding-top:5px; padding-left:5px; text-align:left; font-weight:normal; font-size:14px;}

.l_4 img{width:10px;height:8px;margin-right:3px;}

.l_4_off{ padding-top:5px; padding-left:5px; text-align:left; font-weight:normal; display:none;}
</style>