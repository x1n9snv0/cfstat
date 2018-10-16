<?php
@include("include/myfunction.php");
$action = isset($_GET["action"]) ? chkstr($_GET["action"], 1) : "countget";
$assort = isset($_GET["assort"]) ? chkstr($_GET["assort"], 2) : 0;
$c = isset($_GET["c"]) ? chkstr($_GET["c"], 1) : "";
$username = isset($_GET["username"]) ? chkstr($_GET["username"], 1) : "";
if ($assort == "") {
    if ($c == "") {
        $assort = 0;
    } else {
        $username = $c;
        $assort = 1;
    }
}
$tmp = httppath(2);
if ($action == "countget" && $assort == 0) {
    echo 'function getCookie(name){     ' . chr(13) . chr(10);
    echo 'var arg = name + "=";     ' . chr(13) . chr(10);
    echo 'var alen = arg.length;    ' . chr(13) . chr(10);
    echo 'var clen = document.cookie.length;    ' . chr(13) . chr(10);
    echo 'var i = 0;    ' . chr(13) . chr(10);
    echo 'while (i < clen){     ' . chr(13) . chr(10);
    echo 'var j = i + alen;     ' . chr(13) . chr(10);
    echo 'if(document.cookie.substring(i, j) == arg)    ' . chr(13) . chr(10);
    echo 'return getCookieVal(j);   ' . chr(13) . chr(10);
    echo 'i = document.cookie.indexOf(" ", i) + 1;  ' . chr(13) . chr(10);
    echo 'if(i == 0) break;     ' . chr(13) . chr(10);
    echo '}     ' . chr(13) . chr(10);
    echo 'return null;  ' . chr(13) . chr(10);
    echo '}     ' . chr(13) . chr(10);
    echo 'function setCookie(name,value){   ' . chr(13) . chr(10);
    echo 'var expDate = new Date();     ' . chr(13) . chr(10);
    echo 'var argv = setCookie.arguments;   ' . chr(13) . chr(10);
    echo 'var argc = setCookie.arguments.length;    ' . chr(13) . chr(10);
    echo 'var expires = (argc > 2) ? argv[2] : null;    ' . chr(13) . chr(10);
    echo 'var path = (argc > 3) ? argv[3] : null;   ' . chr(13) . chr(10);
    echo 'var domain = (argc > 4) ? argv[4] : null;     ' . chr(13) . chr(10);
    echo 'var secure = (argc > 5) ? argv[5] : false;    ' . chr(13) . chr(10);
    echo 'if(expires != null){expDate.setTime (expDate.getTime() + expires);}   ' . chr(13) . chr(10);
    echo 'document.cookie = name + "=" + escape (value) +   ' . chr(13) . chr(10);
    echo '((expires == null) ? "" : ("; expires=" + expDate.toUTCString())) +   ' . chr(13) . chr(10);
    echo '((path == null) ? "" : ("; path=" + path)) +  ' . chr(13) . chr(10);
    echo '((domain == null) ? "" : ("; domain=" + domain)) +    ' . chr(13) . chr(10);
    echo '((secure == true) ? "; secure" : "");     ' . chr(13) . chr(10);
    echo '}     ' . chr(13) . chr(10);
    echo 'function getCookieVal(offset){    ' . chr(13) . chr(10);
    echo 'var endstr = document.cookie.indexOf (";", offset);   ' . chr(13) . chr(10);
    echo 'if (endstr == -1)     ' . chr(13) . chr(10);
    echo 'endstr = document.cookie.length;  ' . chr(13) . chr(10);
    echo 'return unescape(document.cookie.substring(offset, endstr));   ' . chr(13) . chr(10);
    echo '}     ' . chr(13) . chr(10);
    echo " var firstshow=0; " . chr(13) . chr(10);
    echo " var cfstatshowcookie=getCookie('cfstatshowcookie');  " . chr(13) . chr(10);
    echo " if(cfstatshowcookie!='" . $username . "')    " . chr(13) . chr(10);
    echo " {    " . chr(13) . chr(10);
    echo "  a=new Date();   " . chr(13) . chr(10);
    echo "  h=a.getHours(); " . chr(13) . chr(10);
    echo "  m=a.getMinutes();   " . chr(13) . chr(10);
    echo "  s=a.getSeconds();   " . chr(13) . chr(10);
    echo "  sparetime=1000*60*60*24*1-(h*3600+m*60+s)*1000-1;   " . chr(13) . chr(10);
    echo "  setCookie('cfstatshowcookie','" . $username . "',sparetime,'/');    " . chr(13) . chr(10);
    echo "  firstshow=1;    " . chr(13) . chr(10);
    echo " }    " . chr(13) . chr(10);
    echo "if(!navigator.cookieEnabled){firstshow=0;}    " . chr(13) . chr(10);
    echo "var ly=escape(document.referrer); " . chr(13) . chr(10);
    echo "var currweb=escape(location.href);    " . chr(13) . chr(10);
    echo "var screenwidth=screen.width;                         " . chr(13) . chr(10);
    echo "var screenheight=screen.height;                       " . chr(13) . chr(10);
    echo "var screencolordepth=screen.colorDepth;   " . chr(13) . chr(10);
    echo "var webtitle=document.title;  " . chr(13) . chr(10);
    echo "document.write(\"<script src='" . $tmp . "cf.php?action=countget_2&username=" . $username . "&assort=0&ly=\" + ly + \"&currweb=\" + currweb + \"&firstshow=\" + firstshow + \"&screenwidth=\" + screenwidth + \"&screenheight=\" + screenheight + \"&screencolordepth=\" + screencolordepth + \"&webtitle=\" + webtitle + \"&ranstr=\" +  Math.random() + \"' language='JavaScript' charset='gbk'></script>\");   " . chr(13) . chr(10);
}
if ($action == "countget_2" || $assort == 1) {
    @include("conn.php");
    @include("config.php");
    if ($assort == 0) {
        $ly = isset($_GET["ly"]) ? substr(chkstr(htmlspecialchars(urldecode($_GET["ly"])), 1), 0, 255) : "";
        $currweb = isset($_GET["currweb"]) ? substr(chkstr(htmlspecialchars(urldecode($_GET["currweb"])), 1), 0, 255) : "";
    } else {
        $ly = isset($_SERVER["HTTP_REFERER"]) ? substr(chkstr(htmlspecialchars(urldecode($_SERVER["HTTP_REFERER"])), 1), 0, 255) : "";
        $currweb = $ly;
    }
    $firstshow = isset($_GET["firstshow"]) ? chkstr($_GET["firstshow"], 2) : 0;
    $screenwidth = isset($_GET["screenwidth"]) ? chkstr($_GET["screenwidth"], 2) : 0;
    $screenheight = isset($_GET["screenheight"]) ? chkstr($_GET["screenheight"], 2) : 0;
    $screencolordepth = isset($_GET["screencolordepth"]) ? chkstr($_GET["screencolordepth"], 2) : 0;
    $webtitle = isset($_GET["webtitle"]) ? substr(chkstr(htmlspecialchars($_GET["webtitle"]), 1), 0, 255) : "";
    $lyhead = isset($ly) ? breakurl($ly) : "";
    $ip = chkstr(getip(), 1);
    $agentstr = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($agentstr, 'Alexa') !== false)
        $alexa = 1;
    else
        $alexa = 0;
    $ostype = getostype();
    $browsertype = getbrowsertype();
    if (abs(strtotime("now") - strtotime($rsset["lastdeldate"])) > 3600 * 24 * 1) {
        $sql = "delete from cfstat_visit_last where TO_DAYS(NOW())-TO_DAYS(lasttime)>1";
        $conn->query($sql);
        $sql = "delete from cfstat_client_day where TO_DAYS(NOW())-TO_DAYS(adddate)>$clientkeepday";
        $conn->query($sql);
        $sql = "delete from cfstat_count_day where TO_DAYS(NOW())-TO_DAYS(adddate)>$countkeepday";
        $conn->query($sql);
        $sql = "delete from cfstat_count_hour where TO_DAYS(NOW())-TO_DAYS(adddate)>$hourkeepday";
        $conn->query($sql);
        $sql = "delete from cfstat_ly_day where TO_DAYS(NOW())-TO_DAYS(adddate)>$lykeepday";
        $conn->query($sql);
        $sql = "delete from cfstat_search_day where TO_DAYS(NOW())-TO_DAYS(adddate)>$searchkeepday";
        $conn->query($sql);
        $sql = "delete from cfstat_searchkeyword_day where TO_DAYS(NOW())-TO_DAYS(adddate)>$searchkeywordkeepday";
        $conn->query($sql);
        $sql = "delete from cfstat_web_day where TO_DAYS(NOW())-TO_DAYS(adddate)>$webkeepday";
        $conn->query($sql);
        $sql = "update cfstat_admin set lastdeldate='" . date("Y-m-d") . "'";
        $conn->query($sql);
    }
    $sql = "select countershow,style,showtotal,realiptotal,userstate,imgfilename,imgselftext from cfstat_user where username='$username'";
    $result = $conn->query($sql);
    $rs = mysqli_fetch_assoc($result);
    if ($rs['userstate'] == 0) {
        $mycode = "<a href=" . $tmp . "cf.php?action=countgo&username=" . $username . " target=_blank title=&#x7F51;&#x7AD9;&#x6D41;&#x91CF;&#x7EDF;&#x8BA1;>&#x7528;&#x6237;&#x88AB;&#x6682;&#x505C;</a>";
        echo "document.write('" . $mycode . "');";
        exit;
    } else {
        $countershow = $rs['countershow'];
        $style = $rs['style'];
        $showtotal = $rs['showtotal'] + 1;
        $realiptotal = $rs['realiptotal'];
        $imgfilename = $rs['imgfilename'];
        $imgselftext = $rs['imgselftext'];
    }
    if ($assort == 0) {
        if ($firstshow == 0) {
            $sql = "update cfstat_visit_last set pvtotal=pvtotal+1,webtitle='$webtitle',currweb='$currweb',lasttime='" . date("Y-m-d H:i:s") . "' where ip='$ip' and username='$username'";
            $conn->query($sql);
        }
    } elseif ($assort == 1) {
        $sql = "update cfstat_visit_last set pvtotal=pvtotal+1,currweb='$currweb',lasttime='" . date("Y-m-d H:i:s") . "' where ip='$ip' and username='$username'";
        $conn->query($sql);
        if (mysqli_affected_rows($conn) == 0) {
            $firstshow = 1;
        } else {
            $firstshow = 0;
        }
    }
    if ($firstshow == 1) {
        $sql = "select id from cfstat_visit_last where username='$username' and myid<=" . ($realiptotal + 1 - $user_visit_maxrsnum) . " order by myid desc limit 0,1";
        $result = $conn->query($sql);
        $rs = mysqli_fetch_assoc($result);
        if ($rs['id']) {
            $sql = "update cfstat_visit_last set";
            $sql = $sql . " myid='" . ($realiptotal + 1) . "',";
            $sql = $sql . "username='$username',";
            $sql = $sql . "ip='$ip',";
            $sql = $sql . "pvtotal='1',";
            $sql = $sql . "ly='$ly',";
            $sql = $sql . "webtitle='$webtitle',";
            $sql = $sql . "currweb='$currweb',";
            $sql = $sql . "addtime='" . date("Y-m-d H:i:s") . "',";
            $sql = $sql . "lasttime='" . date("Y-m-d H:i:s") . "',";
            $sql = $sql . "screenwidth='$screenwidth',";
            $sql = $sql . "screenheight='$screenheight',";
            $sql = $sql . "screencolordepth='$screencolordepth',";
            $sql = $sql . "ostype='$ostype',";
            $sql = $sql . "browsertype='$browsertype'";
            $sql = $sql . " where id='" . $rs['id'] . "'";
            $conn->query($sql);
        } else {
            $sql = "insert into cfstat_visit_last (myid,username,ip,ly,webtitle,currweb,addtime,lasttime,screenwidth,screenheight,screencolordepth,ostype,browsertype)  values(" . ($realiptotal + 1) . ",'$username','$ip','$ly','$webtitle','$currweb','" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "','$screenwidth','$screenheight','$screencolordepth','$ostype','$browsertype')";
            $conn->query($sql);
        }
        $sql = "update cfstat_user set showtotal=showtotal+1,realshowtotal=realshowtotal+1,realiptotal=realiptotal+1,lasttime='" . date("Y-m-d H:i:s") . "' where username='$username'";
        $conn->query($sql);
    } elseif ($firstshow == 0) {
        $sql = "update cfstat_user set showtotal=showtotal+1,realshowtotal=realshowtotal+1,lasttime='" . date("Y-m-d H:i:s") . "' where username='$username'";
        $conn->query($sql);
    }
    if ($firstshow == 1) {
        $sql = "update cfstat_client_day set " . (($alexa == 1) ? " alexacounter=alexacounter+1," : "");
        if ($ostype == "Windows 7") $sql = $sql . "os1 = os1+1,";
        if ($ostype == "Windows 8") $sql = $sql . "os2 = os2+1,";
        if ($ostype == "Windows XP") $sql = $sql . "os3 = os3+1,";
        if ($ostype == "安卓") $sql = $sql . "os4 = os4+1,";
        if ($ostype == "iPhone") $sql = $sql . "os5 = os5+1,";
        if ($ostype <> "Windows 7" && $ostype <> "Windows 8" && $ostype <> "Windows XP" && $ostype <> "安卓" && $ostype <> "iPhone") $sql = $sql . "osother = osother+1,";
        if ($browsertype == "IE 8.0") $sql = $sql . "browser1 = browser1+1,";
        if ($browsertype == "IE 9.0") $sql = $sql . "browser2 = browser2+1,";
        if ($browsertype == "IE 10.0") $sql = $sql . "browser3 = browser3+1,";
        if ($browsertype == "搜狗") $sql = $sql . "browser4 = browser4+1,";
        if ($browsertype == "360") $sql = $sql . "browser5 = browser5+1,";
        if ($browsertype == "Chrome") $sql = $sql . "browser6 = browser6+1,";
        if ($browsertype == "火狐") $sql = $sql . "browser7 = browser7+1,";
        if ($browsertype <> "IE 8.0" && $browsertype <> "IE 9.0" && $browsertype <> "IE 10.0" && $browsertype <> "搜狗" && $browsertype <> "360" && $browsertype <> "Chrome" && $browsertype <> "火狐") $sql = $sql . "browserother = browserother+1,";
        if ($screenwidth == 1024) $sql = $sql . "screenwidth1 = screenwidth1+1,";
        if ($screenwidth == 1280) $sql = $sql . "screenwidth2 = screenwidth2+1,";
        if ($screenwidth == 1440) $sql = $sql . "screenwidth3 = screenwidth3+1,";
        if ($screenwidth == 1152) $sql = $sql . "screenwidth4 = screenwidth4+1,";
        if ($screenwidth == 1680) $sql = $sql . "screenwidth5 = screenwidth5+1,";
        if ($screenwidth == 800) $sql = $sql . "screenwidth6 = screenwidth6+1,";
        if ($screenwidth == 1600) $sql = $sql . "screenwidth7 = screenwidth7+1,";
        if ($screenwidth == 1920) $sql = $sql . "screenwidth8 = screenwidth8+1,";
        if ($screenwidth == 1360) $sql = $sql . "screenwidth9 = screenwidth9+1,";
        if ($screenwidth <> 1024 && $screenwidth <> 1280 && $screenwidth <> 1440 && $screenwidth <> 1152 && $screenwidth <> 1680 && $screenwidth <> 800 && $screenwidth <> 1600 && $screenwidth <> 1920 && $screenwidth <> 1360) $sql = $sql . "screenwidthother = screenwidthother+1,";
        if ($screenheight == 768) $sql = $sql . "screenheight1 = screenheight1+1,";
        if ($screenheight == 800) $sql = $sql . "screenheight2 = screenheight2+1,";
        if ($screenheight == 900) $sql = $sql . "screenheight3 = screenheight3+1,";
        if ($screenheight == 1024) $sql = $sql . "screenheight4 = screenheight4+1,";
        if ($screenheight == 864) $sql = $sql . "screenheight5 = screenheight5+1,";
        if ($screenheight == 1050) $sql = $sql . "screenheight6 = screenheight6+1,";
        if ($screenheight == 960) $sql = $sql . "screenheight7 = screenheight7+1,";
        if ($screenheight == 720) $sql = $sql . "screenheight8 = screenheight8+1,";
        if ($screenheight == 600) $sql = $sql . "screenheight9 = screenheight9+1,";
        if ($screenheight <> 768 && $screenheight <> 800 && $screenheight <> 900 && $screenheight <> 1024 && $screenheight <> 864 && $screenheight <> 1050 && $screenheight <> 960 && $screenheight <> 720 && $screenheight <> 600) $sql = $sql . "screenheightother = screenheightother+1,";
        if ($screencolordepth == 32) $sql = $sql . "screencolordepth1 = screencolordepth1+1";
        if ($screencolordepth == 16) $sql = $sql . "screencolordepth2 = screencolordepth2+1";
        if ($screencolordepth == 24) $sql = $sql . "screencolordepth3 = screencolordepth3+1";
        if ($screencolordepth <> 32 && $screencolordepth <> 16 && $screencolordepth <> 24) $sql = $sql . "screencolordepthOther = screencolordepthother+1";
        $sql = $sql . " where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
        $conn->query($sql);
        if (mysqli_affected_rows($conn) == 0) {
            $sql = "insert into cfstat_client_day (username,adddate) values ('$username','" . date("Y-m-d") . "')";
            $conn->query($sql);
        }
    }
    if ($firstshow == 1) {
        $sql = "update cfstat_count_day set mycounter=mycounter+1,ipcounter=ipcounter+1 where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
    } else {
        $sql = "update cfstat_count_day set mycounter=mycounter+1 where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
    }
    $conn->query($sql);
    if (mysqli_affected_rows($conn) == 0) {
        $sql = "insert into cfstat_count_day (username,adddate) values ('$username','" . date("Y-m-d") . "')";
        $conn->query($sql);
    }
    if ($firstshow == 1) {
        $sql = "update cfstat_count_hour set mycounter=mycounter+1,ipcounter=ipcounter+1 where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=0 and addhour=" . date("H");
    } else {
        $sql = "update cfstat_count_hour set mycounter=mycounter+1 where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=0 and addhour=" . date("H");
    }
    $conn->query($sql);
    if (mysqli_affected_rows($conn) == 0) {
        $sql = "insert into cfstat_count_hour (username,adddate,addhour) values ('$username','" . date("Y-m-d") . "','" . date("H") . "')";
        $conn->query($sql);
    }
    if ($firstshow == 1) {
        $sql = "update cfstat_ly_day set mycounter=mycounter+1,ipcounter=ipcounter+1,ip='$ip',ly='$ly',lasttime='" . date("Y-m-d H:i:s") . "' where username='$username' and lyhead='$lyhead' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
    } else {
        $sql = "update cfstat_ly_day set mycounter=mycounter+1,ip='$ip',ly='$ly',lasttime='" . date("Y-m-d H:i:s") . "' where username='$username' and lyhead='$lyhead' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
    }
    $conn->query($sql);
    if (mysqli_affected_rows($conn) == 0) {
        $sql = "insert into cfstat_ly_day (username,ip,lyhead,ly,adddate,addtime,lasttime) values ('$username','$ip','$lyhead','$ly','" . date("Y-m-d") . "','" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "')";
        $conn->query($sql);
    }
    $searchexist = 0;
    $keywordexist = 0;
    $keyword = "";
    $allsearch = $rsset["allsearch"];
    $k = 0;
    if ($allsearch != "" && $ly != "") {
        $myarray = explode("|", $allsearch);
        for ($i = 0; $i <= count($myarray) - 1; $i++) {
            $siteflag = substr($myarray[$i], 0, strpos($myarray[$i], ","));
            $keywordflag = substr($myarray[$i], strpos($myarray[$i], ",") + 1, 1000);
            $siteflagarray = explode("/", $siteflag);
            $keywordflagarray = explode("/", $keywordflag);
            for ($j = 0; $j <= count($siteflagarray) - 1; $j++) {
                if (strlen(breakurl($ly)) > strlen($siteflagarray[$j])) {
                    if (substr(breakurl($ly), strlen(breakurl($ly)) - strlen($siteflagarray[$j]), 1000) == $siteflagarray[$j]) {
                        $k = 1;
                        $i = 1000;
                        $j = 1000;
                    }
                } elseif (strlen(breakurl($ly)) == strlen($siteflagarray[$j])) {
                    if (breakurl($ly) == $siteflagarray[$j]) {
                        $k = 1;
                        $i = 1000;
                        $j = 1000;
                    }
                }
            }
        }
    }
    if ($k == 1) {
        $searchexist = -1;
        for ($j = 0; $j <= count($keywordflagarray) - 1; $j++) {
            if ((strpos($ly, "?" . $keywordflagarray[$j] . "=") !== false && strpos($ly, "?" . $keywordflagarray[$j] . "=&") === false) || (strpos($ly, "&" . $keywordflagarray[$j] . "=") !== false && strpos($ly, "&" . $keywordflagarray[$j] . "=&") === false && strrev(substr(strrev($ly), 0, strlen($keywordflagarray[$j]) + 1)) != $keywordflagarray[$j] . "=")) {
                $keywordexist = -1;
                $keyword = getsearchkeyword($ly, $keywordflagarray[$j]);
                $j = 1000;
            }
        }
    }
    if ($searchexist == -1 && $siteflag <> "") {
        if ($firstshow == 1) {
            $sql = "update cfstat_search_day set mycounter=mycounter+1,ipcounter=ipcounter+1 where username='$username' and siteflag='$siteflag' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
        } else {
            $sql = "update cfstat_search_day set mycounter=mycounter+1 where username='$username' and siteflag='$siteflag' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
        }
        $conn->query($sql);
        if (mysqli_affected_rows($conn) == 0) {
            $sql = "insert into cfstat_search_day (username,siteflag,adddate) values ('$username','$siteflag','" . date("Y-m-d") . "')";
            $conn->query($sql);
        }
    }
    if ($keywordexist = -1 && $keyword <> "") {
        $indexcode = md5($username . $siteflag . $keyword . date("Y-m-d"));
        if ($firstshow == 1) {
            $sql = "update cfstat_searchkeyword_day set mycounter=mycounter+1,ipcounter=ipcounter+1,lastly='$ly',lasttime='" . date("Y-m-d H:i:s") . "' where indexcode='$indexcode'";
        } else {
            $sql = "update cfstat_searchkeyword_day set mycounter=mycounter+1,lastly='$ly',lasttime='" . date("Y-m-d H:i:s") . "' where indexcode='$indexcode'";
        }
        $conn->query($sql);
        if (mysqli_affected_rows($conn) == 0) {
            $sql = "insert into cfstat_searchkeyword_day (username,siteflag,keyword,adddate,addtime,lasttime,lastly,indexcode) values ('$username','$siteflag','$keyword','" . date("Y-m-d") . "','" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "','$ly','$indexcode')";
            $conn->query($sql);
        }
    }
    $indexcode = md5($username . $currweb . date("Y-m-d"));
    $sql = "update cfstat_web_day set mycounter=mycounter+1,lasttime='" . date("Y-m-d H:i:s") . "' where indexcode='$indexcode'";
    $conn->query($sql);
    if (mysqli_affected_rows($conn) == 0) {
        $sql = "insert into cfstat_web_day (username,weburl,adddate,addtime,lasttime,indexcode) values ('$username','$currweb','" . date("Y-m-d") . "','" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "','$indexcode')";
        $conn->query($sql);
    }
    if ($assort == 0) {
        $counttitle = "统计服务由[" . $systitle . "]提供";
        if ($countershow == 1) {
            $len = strlen($showtotal);
            $width = 8;
            if ($len > $width) {
                $width = $len;
            }
            for ($i = 0; $i < $width; $i++) {
                $n = $showtotal % 10;
                $showtotal = $showtotal / 10;
                $gifs[$width - $i - 1] = $n;
            }
            $countercode = "<a href=" . $tmp . "cf.php?action=countgo&username=" . $username . " target=_blank title=" . $counttitle . ">";
            for ($i = 0; $i < $width; $i++) {
                $countercode = $countercode . "<img src=" . $tmp . "counterpic/" . $style . "/" . $gifs[$i] . ".gif border=0>";
            }
            $countercode = $countercode . "</a>";
            echo "document.write('" . $countercode . "');";
        } elseif ($countershow == 2) {
            $mycode = "<a href=" . $tmp . "cf.php?action=countgo&username=" . $username . " target=_blank title=" . $counttitle . "><img src=" . $tmp . "images/counter.gif border=0></a>";
            echo "document.write('" . $mycode . "');";
        } elseif ($countershow == 3) {
            $mycode = "<a href=" . $tmp . "cf.php?action=countgo&username=" . $username . " target=_blank title=" . $counttitle . "><span style=font-size:12px>统计</span></a>";
            echo "document.write('" . $mycode . "');";
        } elseif ($countershow == 4) {
            $mystr = "window.onresize = CFResizeDiv;   " . chr(13) . chr(10);
            $mystr .= "window.onerror = function(){}    " . chr(13) . chr(10);
            $mystr .= "var divTop,divLeft,divWidth,divHeight,docHeight,docWidth,objTimer,i = 0; " . chr(13) . chr(10);
            $mystr .= "var px = document.doctype?\"px\":0;  " . chr(13) . chr(10);
            $mystr .= "var scrollwidth = navigator.userAgent.indexOf(\"Firefox\")>0?16:0;   " . chr(13) . chr(10);
            $mystr .= "var iframeheight = navigator.userAgent.indexOf(\"MSIE\")>0?260-2:260-2;  " . chr(13) . chr(10);
            $mystr .= "String.prototype.Trim  = function(){return this.replace(/^\s+|\s+$/g,\"\");} " . chr(13) . chr(10);
            $mystr .= "function CF_collapse(obj){   " . chr(13) . chr(10);
            $mystr .= "     ct = document.getElementById('tab_c_iframe');   " . chr(13) . chr(10);
            $mystr .= "     if(ct.style.display==\"none\"){ " . chr(13) . chr(10);
            $mystr .= "         ct.style.display=\"\";  " . chr(13) . chr(10);
            $mystr .= "         obj.src=obj.src.replace(\"max.gif\",\"min.gif\");   " . chr(13) . chr(10);
            $mystr .= "     } else {    " . chr(13) . chr(10);
            $mystr .= "         ct.style.display=\"none\";  " . chr(13) . chr(10);
            $mystr .= "         obj.src=obj.src.replace(\"min.gif\",\"max.gif\");   " . chr(13) . chr(10);
            $mystr .= "     }   " . chr(13) . chr(10);
            $mystr .= "     CFResizeDiv();  " . chr(13) . chr(10);
            $mystr .= " }   " . chr(13) . chr(10);
            $mystr .= " function CFMsg()    " . chr(13) . chr(10);
            $mystr .= " {   " . chr(13) . chr(10);
            $mystr .= "     try{    " . chr(13) . chr(10);
            $mystr .= "         divTop = parseInt(document.getElementById(\"eMeng\").style.top,10); " . chr(13) . chr(10);
            $mystr .= "         divLeft = parseInt(document.getElementById(\"eMeng\").style.left,10);   " . chr(13) . chr(10);
            $mystr .= "         divHeight = parseInt(document.getElementById(\"eMeng\").offsetHeight+6,10); " . chr(13) . chr(10);
            $mystr .= "         divWidth = parseInt(document.getElementById(\"eMeng\").offsetWidth+18,10);  " . chr(13) . chr(10);
            $mystr .= "         var scrollPosTop,scrollPosLeft,docWidth,docHeight;  " . chr(13) . chr(10);
            $mystr .= "         if (typeof window.pageYOffset != 'undefined') {     " . chr(13) . chr(10);
            $mystr .= "             scrollPosTop = window.pageYOffset;  " . chr(13) . chr(10);
            $mystr .= "             scrollPosLeft = window.pageXOffset;     " . chr(13) . chr(10);
            $mystr .= "             docWidth = window.innerWidth;   " . chr(13) . chr(10);
            $mystr .= "             docHeight = window.innerHeight;     " . chr(13) . chr(10);
            $mystr .= "         } else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {  " . chr(13) . chr(10);
            $mystr .= "             scrollPosTop = document.documentElement.scrollTop;  " . chr(13) . chr(10);
            $mystr .= "             scrollPosLeft = document.documentElement.scrollLeft;    " . chr(13) . chr(10);
            $mystr .= "             docWidth = document.documentElement.clientWidth;    " . chr(13) . chr(10);
            $mystr .= "             docHeight = document.documentElement.clientHeight;  " . chr(13) . chr(10);
            $mystr .= "         } else if (typeof document.body != 'undefined') {   " . chr(13) . chr(10);
            $mystr .= "             scrollPosTop = document.body.scrollTop; " . chr(13) . chr(10);
            $mystr .= "             scrollPosLeft = document.body.scrollLeft;   " . chr(13) . chr(10);
            $mystr .= "             docWidth = document.body.clientWidth;   " . chr(13) . chr(10);
            $mystr .= "             docHeight = document.body.clientHeight; " . chr(13) . chr(10);
            $mystr .= "         }   " . chr(13) . chr(10);
            $mystr .= "         document.getElementById(\"eMeng\").style.top = parseInt(scrollPosTop,10) + docHeight + 10 + px;// divHeight " . chr(13) . chr(10);
            $mystr .= "         document.getElementById(\"eMeng\").style.left = parseInt(scrollPosLeft,10) + docWidth - divWidth - scrollwidth + px;    " . chr(13) . chr(10);
            $mystr .= "         document.getElementById(\"eMeng\").style.visibility=\"visible\";    " . chr(13) . chr(10);
            $mystr .= "         objTimer = window.setInterval(\"CF_move_div()\",10);    " . chr(13) . chr(10);
            $mystr .= "     }catch(e){} " . chr(13) . chr(10);
            $mystr .= " }   " . chr(13) . chr(10);
            $mystr .= " function CFResizeDiv()  " . chr(13) . chr(10);
            $mystr .= " {   " . chr(13) . chr(10);
            $mystr .= "     i+=1;   " . chr(13) . chr(10);
            $mystr .= "     try{    " . chr(13) . chr(10);
            $mystr .= "         divHeight = parseInt(document.getElementById(\"eMeng\").offsetHeight+6,10); " . chr(13) . chr(10);
            $mystr .= "         divWidth = parseInt(document.getElementById(\"eMeng\").offsetWidth+18,10);  " . chr(13) . chr(10);
            $mystr .= "         var scrollPosTop,scrollPosLeft,docWidth,docHeight;  " . chr(13) . chr(10);
            $mystr .= "         if (typeof window.pageYOffset != 'undefined') {     " . chr(13) . chr(10);
            $mystr .= "             scrollPosTop = window.pageYOffset;  " . chr(13) . chr(10);
            $mystr .= "             scrollPosLeft = window.pageXOffset;     " . chr(13) . chr(10);
            $mystr .= "             docWidth = window.innerWidth;   " . chr(13) . chr(10);
            $mystr .= "             docHeight = window.innerHeight;     " . chr(13) . chr(10);
            $mystr .= "         } else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {  " . chr(13) . chr(10);
            $mystr .= "             scrollPosTop = document.documentElement.scrollTop;  " . chr(13) . chr(10);
            $mystr .= "             scrollPosLeft = document.documentElement.scrollLeft;    " . chr(13) . chr(10);
            $mystr .= "             docWidth = document.documentElement.clientWidth;    " . chr(13) . chr(10);
            $mystr .= "             docHeight = document.documentElement.clientHeight;  " . chr(13) . chr(10);
            $mystr .= "         } else if (typeof document.body != 'undefined') {   " . chr(13) . chr(10);
            $mystr .= "             scrollPosTop = document.body.scrollTop; " . chr(13) . chr(10);
            $mystr .= "             scrollPosLeft = document.body.scrollLeft;   " . chr(13) . chr(10);
            $mystr .= "             docWidth = document.body.clientWidth;   " . chr(13) . chr(10);
            $mystr .= "             docHeight = document.body.clientHeight; " . chr(13) . chr(10);
            $mystr .= "         }   " . chr(13) . chr(10);
            $mystr .= "         document.getElementById(\"eMeng\").style.top = docHeight - divHeight + parseInt(scrollPosTop,10) + px;  " . chr(13) . chr(10);
            $mystr .= "         document.getElementById(\"eMeng\").style.left = docWidth - divWidth + parseInt(scrollPosLeft,10) - scrollwidth + px;    " . chr(13) . chr(10);
            $mystr .= "     }catch(e){} " . chr(13) . chr(10);
            $mystr .= " }   " . chr(13) . chr(10);
            $mystr .= " function CF_move_div()  " . chr(13) . chr(10);
            $mystr .= " {   " . chr(13) . chr(10);
            $mystr .= "     var scrollPosTop,scrollPosLeft,docWidth,docHeight;  " . chr(13) . chr(10);
            $mystr .= "     if (typeof window.pageYOffset != 'undefined') {     " . chr(13) . chr(10);
            $mystr .= "         scrollPosTop = window.pageYOffset;  " . chr(13) . chr(10);
            $mystr .= "         scrollPosLeft = window.pageXOffset;     " . chr(13) . chr(10);
            $mystr .= "         docWidth = window.innerWidth;   " . chr(13) . chr(10);
            $mystr .= "         docHeight = window.innerHeight;     " . chr(13) . chr(10);
            $mystr .= "     } else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {  " . chr(13) . chr(10);
            $mystr .= "         scrollPosTop = document.documentElement.scrollTop;  " . chr(13) . chr(10);
            $mystr .= "         scrollPosLeft = document.documentElement.scrollLeft;    " . chr(13) . chr(10);
            $mystr .= "         docWidth = document.documentElement.clientWidth;    " . chr(13) . chr(10);
            $mystr .= "         docHeight = document.documentElement.clientHeight;  " . chr(13) . chr(10);
            $mystr .= "     } else if (typeof document.body != 'undefined') {   " . chr(13) . chr(10);
            $mystr .= "         scrollPosTop = document.body.scrollTop; " . chr(13) . chr(10);
            $mystr .= "         scrollPosLeft = document.body.scrollLeft;   " . chr(13) . chr(10);
            $mystr .= "         docWidth = document.body.clientWidth;   " . chr(13) . chr(10);
            $mystr .= "         docHeight = document.body.clientHeight; " . chr(13) . chr(10);
            $mystr .= "     }   " . chr(13) . chr(10);
            $mystr .= "     try{    " . chr(13) . chr(10);
            $mystr .= "         if(parseInt(document.getElementById(\"eMeng\").style.top,10) <= (docHeight - divHeight + parseInt(scrollPosTop,10)))    " . chr(13) . chr(10);
            $mystr .= "         {   " . chr(13) . chr(10);
            $mystr .= "             window.clearInterval(objTimer);objTimer = window.setInterval(\"CFResizeDiv()\",1);  " . chr(13) . chr(10);
            $mystr .= "         }   " . chr(13) . chr(10);
            $mystr .= "         divTop = parseInt(document.getElementById(\"eMeng\").style.top,10); " . chr(13) . chr(10);
            $mystr .= "         document.getElementById(\"eMeng\").style.top = divTop - 1 + px; " . chr(13) . chr(10);
            $mystr .= "     }catch(e){} " . chr(13) . chr(10);
            $mystr .= " }   " . chr(13) . chr(10);
            $mystr .= " function CFMessbox(shape,color){    " . chr(13) . chr(10);
            $mystr .= "     var styles='position:absolute;top:0px;left:0px;z-index:99999;visibility:hidden;';   " . chr(13) . chr(10);
            $mystr .= "     var copic='<img src=\"" . $tmp . "images/gbook_min.gif\" align=\"absmiddle\" class=\"ioc'+color+'\" onClick=\"CF_collapse(this)\">';    " . chr(13) . chr(10);
            $mystr .= "     if(shape>1) window.onload = CFMsg;  " . chr(13) . chr(10);
            $mystr .= "     else {styles='';copic=''}   " . chr(13) . chr(10);
            $mystr .= "     var s;  " . chr(13) . chr(10);
            $mystr .= "     if(shape==2) {  " . chr(13) . chr(10);
            $mystr .= "         s='<div id=eMeng style=\"width:208px;Z-INDEX:99999;LEFT:0px;POSITION:absolute;TOP:0px;VISIBILITY:hidden;\">'    " . chr(13) . chr(10);
            $mystr .= "             +'<table style=\"width:100%;border:1px solid #AED1F7; border-collapse:collapse;\">' " . chr(13) . chr(10);
            $mystr .= "             +'        <tr>' " . chr(13) . chr(10);
            $mystr .= "             +'          <td align=left style=\"background:url(" . $tmp . "images/gbook_bg.gif) repeat-x;list-style-type:none; padding: 0; border: 0;font-size:12px;\"><img src=\"" . $tmp . "images/gbook_zxly.gif\"><img src=\"" . $tmp . "images/space.gif\" width=116 height=1><img src=\"" . $tmp . "images/gbook_min.gif\" align=\"absmiddle\" class=\"ioc'+color+'\" onClick=\"CF_collapse(this)\">'  " . chr(13) . chr(10);
            $mystr .= "             +'        </td>'    " . chr(13) . chr(10);
            $mystr .= "             +'        </tr>'    " . chr(13) . chr(10);
            $mystr .= "             +'        <tr>' " . chr(13) . chr(10);
            $mystr .= "             +'        <td style=\"background-color:#ffffff\">'  " . chr(13) . chr(10);
            $mystr .= "             +'         <iframe src=\"" . $tmp . "include/gbook.php?action=gbookcodeget&username=" . $username . "&ly=" . urlencode($ly) . "&currweb=" . urlencode($currweb) . "\" width=\"194\" height=\"' + iframeheight + '\" frameborder=\"0\" marginheight=0 marginwidth=0 scrolling=no id=\"tab_c_iframe\"></iframe>'   " . chr(13) . chr(10);
            $mystr .= "             +'        </td>'    " . chr(13) . chr(10);
            $mystr .= "             +'        </tr>'    " . chr(13) . chr(10);
            $mystr .= "             +'      </table>'   " . chr(13) . chr(10);
            $mystr .= "             +'</div>';  " . chr(13) . chr(10);
            $mystr .= "     } else if(shape==3) {   " . chr(13) . chr(10);
            $mystr .= "         s='<div id=eMeng style=\"width:210px;background:#FFFFFF;'+styles+'\">'  " . chr(13) . chr(10);
            $mystr .= "             +'  <table width=\"100%\"  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:1px solid #808080;\" id=\"tab_'+color+'\">'  " . chr(13) . chr(10);
            $mystr .= "             +'    <tr>' " . chr(13) . chr(10);
            $mystr .= "             +'      <td colspan=\"3\" align=right style=\"font-size:12px; line-height:19px;height:19px;padding-right:6px;color:#FFFFFF;\" onDblClick=\"CF_collapse(this.firstChild.nextSibling)\">留言板'+copic " . chr(13) . chr(10);
            $mystr .= "             +'</tr>'    " . chr(13) . chr(10);
            $mystr .= "             +'    </tr>'    " . chr(13) . chr(10);
            $mystr .= "             + '</table>'    " . chr(13) . chr(10);
            $mystr .= "             +'</div>';  " . chr(13) . chr(10);
            $mystr .= "     }   " . chr(13) . chr(10);
            $mystr .= "     document.writeln(s);    " . chr(13) . chr(10);
            $mystr .= " }   " . chr(13) . chr(10);
            $mystr .= " CFMessbox(2,1); " . chr(13) . chr(10);
            echo $mystr;
        }
    } elseif ($assort == 1) {
        $imgfilename = "upload/" . $imgfilename;
        $fontfilename = "images/simkai.ttf";
        $fontsize = 10;
        $distancefromborder = 8;
        $fontcolorarray = array(0, 0, 0, 0);
        $shadecolorarray = array(255, 255, 255, 0);
        $stringbottom = 20;
        if (strpos($imgselftext, "{imgcounter}") !== false) {
            $imgselftext = str_replace("{imgcounter}", $showtotal, $imgselftext);
        }
        if (strpos($imgselftext, "{todaytotal}") !== false && strpos($imgselftext, "{todayiptotal}") !== false) {
            $sql = "select mycounter,ipcounter from cfstat_count_day where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=0";
            $result = $conn->query($sql);
            if ($rs = mysqli_fetch_assoc($result)) {
                $todaytotal = $rs['mycounter'];
                $todayiptotal = $rs['ipcounter'];
            } else {
                $todaytotal = 0;
                $todayiptotal = 0;
            }
            $imgselftext = str_replace("{todaytotal}", $todaytotal, $imgselftext);
            $imgselftext = str_replace("{todayiptotal}", $todayiptotal, $imgselftext);
        }
        if (strpos($imgselftext, "{yesterdaytotal}") !== false && strpos($imgselftext, "{yesterdayiptotal}") !== false) {
            $sql = "select mycounter,ipcounter from cfstat_count_day where username='$username' and TO_DAYS(NOW())-TO_DAYS(adddate)=1";
            $result = $conn->query($sql);
            if ($rs = mysqli_fetch_assoc($result)) {
                $yesterdaytotal = $rs['mycounter'];
                $yesterdayiptotal = $rs['ipcounter'];
            } else {
                $yesterdaytotal = 0;
                $yesterdayiptotal = 0;
            }
            $imgselftext = str_replace("{yesterdaytotal}", $yesterdaytotal, $imgselftext);
            $imgselftext = str_replace("{yesterdayiptotal}", $yesterdayiptotal, $imgselftext);
        }
        if (strpos($imgselftext, "{ip}") !== false) {
            $imgselftext = str_replace("{ip}", $ip, $imgselftext);
        }
        watermark($imgfilename, $imgselftext, $fontfilename, $fontsize, $distancefromborder, $fontcolorarray, $shadecolorarray, $stringbottom);
    }
}
if ($action == "countgo") {
    if (!empty($_COOKIE["cfstatcracookie"])) {
        gotourl(base64_decode("dmlldy5waHA/dXNlcm5hbWU9") . $username);
    }
    echo(base64_decode("PCFET0NUWVBFPiANCjxodG1sPg0KPGhlYWQ+DQo8dGl0bGU+zfjVvs2zvMY8L3RpdGxlPg0KPG1ldGEgaHR0cC1lcXVpdj0nQ29udGVudC1UeXBlJyBjb250ZW50PSd0ZXh0L2h0bWw7IGNoYXJzZXQ9Z2JrJz4NCjxzdHlsZSB0eXBlPSd0ZXh0L2Nzcyc+DQpUQUJMRSB7DQogRk9OVC1TSVpFOiAxNHB4OyBDT0xPUjogIzAwMDAwMDsgTElORS1IRUlHSFQ6IDEyMCU7IEZPTlQtRkFNSUxZOiAnQXJpYWwnICAgICAgICAgICAgDQp9DQo8L3N0eWxlPg0KPHNjcmlwdD4NCmZ1bmN0aW9uIGdldENvb2tpZShuYW1lKXsgCQ0KdmFyIGFyZyA9IG5hbWUgKyAiPSI7IAkNCnZhciBhbGVuID0gYXJnLmxlbmd0aDsgCQ0KdmFyIGNsZW4gPSBkb2N1bWVudC5jb29raWUubGVuZ3RoOyAJDQp2YXIgaSA9IDA7IAkNCndoaWxlIChpIDwgY2xlbil7IAkNCnZhciBqID0gaSArIGFsZW47IAkNCmlmKGRvY3VtZW50LmNvb2tpZS5zdWJzdHJpbmcoaSwgaikgPT0gYXJnKSAJDQpyZXR1cm4gZ2V0Q29va2llVmFsKGopOyAJDQppID0gZG9jdW1lbnQuY29va2llLmluZGV4T2YoIiAiLCBpKSArIDE7IAkNCmlmKGkgPT0gMCkgYnJlYWs7IAkNCn0gCQ0KcmV0dXJuIG51bGw7IAkNCn0gCQ0KZnVuY3Rpb24gc2V0Q29va2llKG5hbWUsdmFsdWUpeyAJDQp2YXIgZXhwRGF0ZSA9IG5ldyBEYXRlKCk7IAkNCnZhciBhcmd2ID0gc2V0Q29va2llLmFyZ3VtZW50czsgCQ0KdmFyIGFyZ2MgPSBzZXRDb29raWUuYXJndW1lbnRzLmxlbmd0aDsgCQ0KdmFyIGV4cGlyZXMgPSAoYXJnYyA+IDIpID8gYXJndlsyXSA6IG51bGw7IAkNCnZhciBwYXRoID0gKGFyZ2MgPiAzKSA/IGFyZ3ZbM10gOiBudWxsOyAJDQp2YXIgZG9tYWluID0gKGFyZ2MgPiA0KSA/IGFyZ3ZbNF0gOiBudWxsOyAJDQp2YXIgc2VjdXJlID0gKGFyZ2MgPiA1KSA/IGFyZ3ZbNV0gOiBmYWxzZTsgCQ0KaWYoZXhwaXJlcyAhPSBudWxsKXtleHBEYXRlLnNldFRpbWUgKGV4cERhdGUuZ2V0VGltZSgpICsgZXhwaXJlcyk7fSAJDQpkb2N1bWVudC5jb29raWUgPSBuYW1lICsgIj0iICsgZXNjYXBlICh2YWx1ZSkgKyAJDQooKGV4cGlyZXMgPT0gbnVsbCkgPyAiIiA6ICgiOyBleHBpcmVzPSIgKyBleHBEYXRlLnRvVVRDU3RyaW5nKCkpKSArIAkNCigocGF0aCA9PSBudWxsKSA/ICIiIDogKCI7IHBhdGg9IiArIHBhdGgpKSArIAkNCigoZG9tYWluID09IG51bGwpID8gIiIgOiAoIjsgZG9tYWluPSIgKyBkb21haW4pKSArIAkNCigoc2VjdXJlID09IHRydWUpID8gIjsgc2VjdXJlIiA6ICIiKTsgCQ0KfSAJDQpmdW5jdGlvbiBnZXRDb29raWVWYWwob2Zmc2V0KXsgCQ0KdmFyIGVuZHN0ciA9IGRvY3VtZW50LmNvb2tpZS5pbmRleE9mICgiOyIsIG9mZnNldCk7IAkNCmlmIChlbmRzdHIgPT0gLTEpICAJDQplbmRzdHIgPSBkb2N1bWVudC5jb29raWUubGVuZ3RoOyAJDQpyZXR1cm4gdW5lc2NhcGUoZG9jdW1lbnQuY29va2llLnN1YnN0cmluZyhvZmZzZXQsIGVuZHN0cikpOyAJDQp9IAkNCiANCiB2YXIgcmV1cmw9J3ZpZXcucGhwP3VzZXJuYW1lPQ=="));
    echo $username;
    echo(base64_decode("JzsgICAgICAgICAgICAgICAgICAgDQogdmFyIGNmc3RhdGNyYmNvb2tpZT1nZXRDb29raWUoJ2Nmc3RhdGNyYmNvb2tpZScpOyAgICAgICAgICAgICAgICAgICANCiBpZihpc05hTihjZnN0YXRjcmJjb29raWUpfHxjZnN0YXRjcmJjb29raWU9PW51bGwpeyAgICAgICAgICAgICAgDQogIHNwYXJldGltZT0xMDAwKjYwKjYwKjI0KjM2NTA7ICAgICAgICAgICAgICAgICAgIA0KICBzZXRDb29raWUoJ2Nmc3RhdGNyYmNvb2tpZScsMSxzcGFyZXRpbWUsJy8nKTsgICAgICAgICAgICAgICAgICAgDQogIGNyc3RhdGU9MDsgICAgICAgICAgICAgICAgICAgDQogfWVsc2V7ICAgICAgICAgICAgICAgICAgIA0KICBjcnN0YXRlPXBhcnNlSW50KGNmc3RhdGNyYmNvb2tpZSwxMCk7ICAgICAgICAgICAgICAgICAgIA0KIH0gICAgICAgICAgICAgICAgICAgDQogaWYoY3JzdGF0ZT09MSl7ICAgICAgICAgICAgICAgICAgDQogIGxvY2F0aW9uLnJlcGxhY2UocmV1cmwpOw0KIH0gICAgICAgICAgICAgICAgIA0KZnVuY3Rpb24gY3JzdGF0ZXNlbChudW0pIHsgICANCiBzcGFyZXRpbWU9MTAwMCo2MCo2MCoyNCozNjUwOyAgICAgICAgICAgICAgICAgICANCiBzZXRDb29raWUoJ2Nmc3RhdGNyYmNvb2tpZScsbnVtLHNwYXJldGltZSwnLycpOyAgICAgICAgICAgICAgICAgICANCiBsb2NhdGlvbi5yZXBsYWNlKHJldXJsKTsNCn0gICANCmZ1bmN0aW9uIG15c2hvdygpew0KbG9jYXRpb24ucmVwbGFjZShyZXVybCk7DQpjbGVhckludGVydmFsKG15c3QpOw0KfQ0KbXlzdD1zZXRJbnRlcnZhbCgnbXlzaG93KCknLDEwMDAqNjApOw0KPC9zY3JpcHQ+DQo8L2hlYWQ+DQo8Ym9keT4NCjx0YWJsZSBib3JkZXI9JzAnIHN0eWxlPSdtYXJnaW46MTBweCBhdXRvO21hcmdpbi10b3A6MTAwcHgnPg0KPHRyPiAgICAgICAgICAgIA0KPHRkIGhlaWdodD0nNjAnIGFsaWduPSdjZW50ZXInPjxhIGhyZWY9J2h0dHA6Ly93d3cucXFjZi5jb20nIHRhcmdldD0nX2JsYW5rJyBzdHlsZT0nZm9udC1zaXplOjE0cHg7Y29sb3I6I2ZmMDAwMDt0ZXh0LWRlY29yYXRpb246dW5kZXJsaW5lO2ZvbnQtd2VpZ2h0OmJvbGQ7Jz5Qb3dlcmVkIEJ5IENGPC9hPjwvdGQ+ICA8L3RyPiAgICAgICAgICAgIA0KPHRyPiAgICAgICAgICAgIA0KPHRkPjYww+vW07rz19S2r734yOvNs7zGu/K147v3z8LD5sG0vdPWsb3TvfjI682zvMbPtc2zPC90ZD4NCjwvdHI+ICAgICAgICAgICAgDQo8dHI+DQo8dGQgYWxpZ249J2NlbnRlcic+ICAgICAgICAgICAgDQo8YSBocmVmPScjJyBvbmNsaWNrPSdjcnN0YXRlc2VsKDApJz6147v31rG90734yOvNs7zGPC9hPjxicj48YnI+ICAgICAgICAgICAgDQo8aW5wdXQgdHlwZT0nY2hlY2tib3gnIG5hbWU9J2NoZWNrYm94JyB2YWx1ZT0nY2hlY2tib3gnIG9uY2xpY2s9J2Nyc3RhdGVzZWwoMSknPs/CtM6yu9TZz9TKvrTL0rMNCjwvdGQ+DQo8L3RyPiAgICAgICAgICAgIA0KPC90YWJsZT4gICAgICAgICAgIA0KPC9ib2R5PiAgICAgICAgICAgIA0KPC9odG1sPg=="));
}