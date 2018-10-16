<?php
//以下为公用函数
function goback($str, $alertstr)//为空时后退
{
    if ($str == "") {
        echo "<script>";
        echo "alert('" . $alertstr . "');";
        echo "history.go(-1)";
        echo "</script>";
        exit;
    } else {
        return $str;
    }
}

function alertback($alertstr, $backnum)
{
    echo "<script>";
    echo "alert('" . $alertstr . "');";
    echo "history.go(-" . $backnum . ")";
    echo "</script>";
    exit;
}

function alerturl($alertstr, $url)
{
    echo "<script>";
    echo "alert('" . $alertstr . "');";
    echo "location.href='" . $url . "';";
    echo "</script>";
    exit;
}

function alertclose($alertstr)
{
    echo "<script>";
    echo "alert('" . $alertstr . "');";
    echo "window.close();";
    echo "</script>";
    exit;
}

function gotourl($url)
{
    echo "<script>";
    echo "location.href='" . $url . "';";
    echo "</script>";
    exit;
}

function chkstr($paravalue, $paratype) //过滤非法字符
{
    if ($paratype == 1) {
        $filterstr = "(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
        if (preg_match("/" . $filterstr . "/is", $paravalue) == 1) {
            echo "传递的参数类型有错误！";
            exit;
        }

        $inputstr = str_replace("'", "''", $paravalue);
    } elseif ($paratype == 2) {
        if ($paravalue != "" && is_numeric($paravalue) == false) {
            echo "传递的参数类型有错误！";
            exit;
        } else {
            $inputstr = $paravalue;
        }
    } elseif ($paratype == 3) {
        if ($paravalue != "" && (strtotime($paravalue) == false || strtotime($paravalue) == -1)) {
            echo("传递的参数类型有错误！");
            exit;
        } else {
            $inputstr = $paravalue;
        }
    }

    return $inputstr;
}


function httppath($assort)
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $httpstr = "https://";
    } else {
        $httpstr = "http://";
    }
    $ser = $_SERVER['SERVER_NAME'];
    $scr = $_SERVER['SCRIPT_NAME'];
    $port = $_SERVER["SERVER_PORT"];
    $scr_2 = substr($scr, 0, strrpos($scr, "/") + 1);

    if (empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        $portmap = 0;
    else {
        if ($_SERVER["REMOTE_ADDR"] == $_SERVER["HTTP_X_FORWARDED_FOR"])
            $portmap = 0;
        else
            $portmap = 1;
    }

    if ($assort == 1)
        $httppath = $ser;
    elseif ($assort == 2) {
        if ($port == "80" || $port == "443" || $portmap != 0)
            $httppath = $httpstr . $ser . $scr_2;
        else
            $httppath = $httpstr . $ser . ":" . $port . $scr_2;
    } elseif ($assort == 3) {
        if ($port == "80" || $port == "443" || $portmap != 0)
            $httppath = $httpstr . $ser . $scr;
        else
            $httppath = $httpstr . $ser . ":" . $port . $scr;
    } elseif ($assort == 4) {
        if (isset($_SERVER["QUERY_STRING"])) $urlstr = "?" . $_SERVER["QUERY_STRING"];

        if ($port == "80" || $port == "443" || $portmap != 0)
            $httppath = $httpstr . $ser . $scr . $urlstr;
        else
            $httppath = $httpstr . $ser . ":" . $port . $scr . $urlstr;
    }

    return $httppath;
}


function breakurl($url)
{
    if ($url <> "") {
        $urlarrary = explode("/", $url);
        $breakurl = $urlarrary[2];
    } else {
        $breakurl = $url;
    }
    return $breakurl;
}

function pxfilter($px, $pxok)
{
    $px = strtolower($px);
    $pxok = strtolower($pxok);

    $myarray = explode(",", $pxok);

    for ($i = 0; $i <= count($myarray) - 1; $i++) {
        if ($myarray[$i] == $px) {
            $j = 1;
        }
    }

    if ($j <> 1) alertback("禁止此类排序", 1);
}

function getsearchkeyword($url, $keywordflag)
{

    if (strpos($url, "?" . $keywordflag . "=") !== false) {
        $keywordflag = "?" . $keywordflag . "=";
    }

    if (strpos($url, "&" . $keywordflag . "=") !== false) {
        $keywordflag = "&" . $keywordflag . "=";
    }

    $urlarrary = explode($keywordflag, $url);

    $urltail = $urlarrary[1];


    if (strpos($urltail, "&") === false) {
        $searchkeyword = substr($urltail, 0, 1000);
    } else {
        $searchkeyword = substr($urltail, 0, strpos($urltail, "&"));
    }

    return $searchkeyword;
}

function getiparea($ip)
{
    $array = explode('.', $ip);
    $ipint = ($array[0] * 256 * 256 * 256) + ($array[1] * 256 * 256) + ($array[2] * 256) + $array[3];
    $sql = "select * from cfstat_ipaddress where $ipint>=ip_1 and $ipint<=ip_2";
    $result = mysql_query($sql);
    $rs = mysql_fetch_assoc($result);
    if ($rs) {
        $iparea = $rs["area"] . "-" . $rs["area_2"] . "-" . $rs["area_3"];
    } else {
        $iparea = "<a href='&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#113;&#113;&#99;&#102;&#46;&#99;&#111;&#109;' target=_blank>&#73;&#80;&#25968;&#25454;&#24211;&#26080;&#25968;&#25454;&#45;&#19979;&#36733;</a>";
    }

    return $iparea;
}

function getskincolor($skincolor, $assort)
{
    $myarray = explode("|", $skincolor);


    if ($assort <= count($myarray)) {
        return $myarray[$assort];
    }
}


function watermark(
    $infilename,
    $string,
    $fontfilename,
    $fontsize,
    $distancefromborder,
    $fontcolorarray,
    $shadecolorarray,
    $stringbottom)
{

    $imagefile = fopen($infilename, "r");
    $imagestring = fread($imagefile, filesize($infilename));
    fclose($imagefile);
    $image = ImageCreateFromString($imagestring);
    $imagewidth = ImageSX($image);
    $imageheight = ImageSY($image);
    $stringbox = ImageTTFBBox($fontsize, 0, $fontfilename, $string);
    $stringwidth = $stringbox[2] - $stringbox[0];
    $stringheight = $stringbox[1] - $stringbox[7];
    $stringright = $imagewidth - $distancefromborder;
    $stringleft = 10;
    //$stringbottom=20;
    $stringtop = 0;
    $fontcolor = ImageColorAllocateAlpha($image,
        $fontcolorarray[0],
        $fontcolorarray[1],
        $fontcolorarray[2],
        $fontcolorarray[3]);
    $shadecolor = ImageColorAllocateAlpha($image,
        $shadecolorarray[0],
        $shadecolorarray[1],
        $shadecolorarray[2],
        $shadecolorarray[3]);
    ImageTTFText($image, $fontsize, 0, $stringleft, $stringbottom - 1, $shadecolor, $fontfilename, $string);
    ImageTTFText($image, $fontsize, 0, $stringleft + 1, $stringbottom, $shadecolor, $fontfilename, $string);
    ImageTTFText($image, $fontsize, 0, $stringleft, $stringbottom + 1, $shadecolor, $fontfilename, $string);
    ImageTTFText($image, $fontsize, 0, $stringleft - 1, $stringbottom, $shadecolor, $fontfilename, $string);

    ImageTTFText($image, $fontsize, 0, $stringleft, $stringbottom, $fontcolor, $fontfilename, $string);
    $outfilename = substr($infilename, 0, -4) . "_$string.png";
    header("Content-type: image/png");
    ImagePng($image);
    ImageDestroy($image);
}


function getostype()
{
    $agentinfo = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (strpos($agentinfo, 'micromessenger') !== false) {
        $ostype = "微信";
    } elseif (strpos($agentinfo, 'android') !== false) {
        $ostype = "安卓";
    } elseif (strpos($agentinfo, 'iphone') !== false) {
        $ostype = "iPhone";
    } elseif (strpos($agentinfo, 'ipad') !== false) {
        $ostype = "iPad";
    } elseif (strpos($agentinfo, 'nt 10') !== false) {
        $ostype = "Windows 10";
    } elseif (strpos($agentinfo, 'nt 6.4') !== false) {
        $ostype = "Windows 10";
    } elseif (strpos($agentinfo, 'nt 6.3') !== false) {
        $ostype = "Windows 8";
    } elseif (strpos($agentinfo, 'nt 6.2') !== false) {
        $ostype = "Windows 8";
    } elseif (strpos($agentinfo, 'nt 6.1') !== false) {
        $ostype = "Windows 7";
    } elseif (strpos($agentinfo, 'nt 6.0') !== false) {
        $ostype = "Windows Vista";
    } elseif (strpos($agentinfo, 'nt 5.2') !== false) {
        $ostype = "Windows 2003";
    } elseif (strpos($agentinfo, 'nt 5.1') !== false) {
        $ostype = "Windows XP";
    } elseif (strpos($agentinfo, 'nt 5') !== false) {
        $ostype = "Windows 2000";
    } elseif (strpos($agentinfo, 'nt 4.9') !== false) {
        $ostype = "Windows ME";
    } elseif (strpos($agentinfo, 'nt 4') !== false) {
        $ostype = "Windows NT4";
    } elseif (strpos($agentinfo, 'nt 98') !== false) {
        $ostype = "Windows 98";
    } elseif (strpos($agentinfo, 'nt 95') !== false) {
        $ostype = "Windows 95";
    } elseif (strpos($agentinfo, 'nt') !== false) {
        $ostype = "Windows";
    } elseif (strpos($agentinfo, 'mac') !== false) {
        $ostype = "Mac";
    } elseif (strpos($agentinfo, 'unix') !== false) {
        $ostype = "Unix";
    } elseif (strpos($agentinfo, 'linux') !== false) {
        $ostype = "Linux";
    } elseif (strpos($agentinfo, 'sunos') !== false) {
        $ostype = "SunOS";
    } else {
        $ostype = "其他";
    }
    return $ostype;
}
function getbrowsertype()
{
    $agentinfo = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (strpos($agentinfo, 'se 2.x') !== false) {
        $browsertype = "搜狗";
    } elseif (strpos($agentinfo, 'maxthon') !== false) {
        $browsertype = "遨游";
    } elseif (strpos($agentinfo, '360se') !== false) {
        $browsertype = "360";
    } elseif (strpos($agentinfo, 'taobrowser') !== false) {
        $browsertype = "淘宝";
    } elseif (strpos($agentinfo, 'lbbrowser') !== false) {
        $browsertype = "猎豹";
    } elseif (strpos($agentinfo, 'ubrowser') !== false) {
        $browsertype = "UC";
    } elseif (strpos($agentinfo, 'tencenttraveler') !== false) {
        $browsertype = "腾讯";
    } elseif (strpos($agentinfo, 'firefox') !== false) {
        $browsertype = "火狐";
    } elseif (strpos($agentinfo, '115browser') !== false) {
        $browsertype = "115浏览器";
    } elseif (strpos($agentinfo, 'theworld') !== false) {
        $browsertype = "世界之窗";
    } elseif (strpos($agentinfo, 'opera') !== false) {
        $browsertype = "Opera";
    } elseif (strpos($agentinfo, 'chrome') !== false) {
        $browsertype = "Chrome";
    } elseif (strpos($agentinfo, 'safari') !== false) {
        $browsertype = "Safari";
    } elseif (strpos($agentinfo, 'greenbrowser') !== false) {
        $browsertype = "GreenBrowser";
    } elseif (strpos($agentinfo, 'msie 6.0') !== false) {
        $browsertype = "IE 6.0";
    } elseif (strpos($agentinfo, 'msie 7.0') !== false) {
        $browsertype = "IE 7.0";
    } elseif (strpos($agentinfo, 'msie 8.0') !== false) {
        $browsertype = "IE 8.0";
    } elseif (strpos($agentinfo, 'msie 9.0') !== false) {
        $browsertype = "IE 9.0";
    } elseif (strpos($agentinfo, 'msie 10.0') !== false) {
        $browsertype = "IE 10.0";
    } elseif (strpos($agentinfo, 'rv:11') !== false) {
        $browsertype = "IE 11.0";
    } elseif (strpos($agentinfo, 'msie') !== false) {
        $browsertype = "IE";
    } else {
        $browsertype = "其他";
    }
    return $browsertype;
}

function getmicrotime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function getip()
{
    if (empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        $ip = $_SERVER["REMOTE_ADDR"];
    else {
        $ip = chkstr(HTMLSpecialChars($_SERVER["HTTP_X_FORWARDED_FOR"]), 1);
        if (strpos($ip, ',') !== false) $ip = str_replace(" ", "", substr($ip, strrpos($ip, ",") + 1));
    }
    return $ip;
}
?>