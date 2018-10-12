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
<?php 
$sql="select * from cfstat_admin";
$result=mysql_query($sql);

if(!$rsset=mysql_fetch_assoc($result)){
 echo "无法取得数据库里的系统配置!";
 exit;
}

//系统名称
$systitle=$rsset["systitle"];

//背景图片地址
$bgimgpath="templet/default/images/bg".$rsset["skintype"].".gif";
//菜单背景图片地址
$menubgimgpath="templet/default/images/topmenubg".$rsset["skintype"].".gif";
//表格边框颜色
$tablebordercolor=getskincolor($rsset["skincolor"],0);
//表格行的标题背景颜色
$tableheadbgcolor=getskincolor($rsset["skincolor"],1);
//字体颜色
$fontcolor=getskincolor($rsset["skincolor"],2);
//链接颜色：
$linkcolor=getskincolor($rsset["skincolor"],3);
//点过的链接颜色
$linkovercolor=getskincolor($rsset["skincolor"],4);


//每个用户保留最近访问的个数默认100个
$user_visit_maxrsnum=100;
//客户端信息最大保留天数,默认6天
$clientkeepday=6;
//天数统计最大保留天数,默认365天
$countkeepday=365;
//小时统计最大保留天数,默认6天
$hourkeepday=6;
//来源统计最大保留天数,默认6天
$lykeepday=6;
//搜索引擎统计最大保留天数,默认6天
$searchkeepday=6;
//搜索关键字统计最大保留天数,默认3天
$searchkeywordkeepday=3;
//页面统计最大保留天数,默认3天
$webkeepday=3;
?>
