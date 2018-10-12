<script type="text/javascript" src="images/tween.js"></script>
<div id="picplayer" style="position:relative;overflow:hidden;width:730px;height:200px;clear:none;border:solid 1px #ccc;"> 
there is a pic-player 
</div> 
        <script> 
            var p = $('#picplayer'); 
            var pics1 = [{url:'templet/101203/images/flash1.jpg',link:'reg.php',time:5000},{url:'templet/101203/images/flash2.jpg',link:'reg.php',time:4000},{url:'templet/101203/images/flash3.jpg',link:'reg.php',time:6000}]; 
            initPicPlayer(pics1,p.css('width').split('px')[0],p.css('height').split('px')[0]); 
            // 
            // 
            function initPicPlayer(pics,w,h) 
            { 
                //选中的图片 
                var selectedItem; 
                //选中的按钮 
                var selectedBtn; 
                //自动播放的id 
                var playID; 
                //选中图片的索引 
                var selectedIndex; 
                //容器 
                var p = $('#picplayer'); 
                p.text(''); 
                p.append('<div id="piccontent"></div>'); 
                var c = $('#piccontent'); 
                for(var i=0;i<pics.length;i++) 
                { 
                    //添加图片到容器中 
                    c.append('<a href="'+pics[i].link+'"><img id="picitem'+i+'" style="display: none;z-index:'+i+'" src="'+pics[i].url+'" /></a>'); 
                } 
                //按钮容器，绝对定位在右下角 
                p.append('<div id="picbtnHolder" style="position:absolute;top:'+(h-25)+'px;width:'+w+'px;height:20px;z-index:10000;"></div>'); 
                // 
                var btnHolder = $('#picbtnHolder'); 
                btnHolder.append('<div id="picbtns" style="float:right; padding-right:1px;"></div>'); 
                var btns = $('#picbtns'); 
                // 
                for(var i=0;i<pics.length;i++) 
                { 
                    //增加图片对应的按钮 
                    btns.append('<span id="picbtn'+i+'" style="cursor:pointer; border:solid 1px #ccc;background-color:#eee; display:inline-block;">&nbsp;'+(i+1)+'&nbsp;</span>&nbsp;'); 
                    $('#picbtn'+i).data('index',i); 
                    $('#picbtn'+i).click( 
                        function(event) 
                        { 
                            if(selectedItem.attr('src') == $('#picitem'+$(this).data('index')).attr('src')) 
                            { 
                                return; 
                            } 
                            setSelectedItem($(this).data('index')); 
                        } 
                    ); 
                } 
                btns.append(' '); 
                /// 
                setSelectedItem(0); 
                //显示指定的图片index 
                function setSelectedItem(index) 
                { 
                    selectedIndex = index; 
                    clearInterval(playID); 
                    //alert(index); 
                    if(selectedItem)selectedItem.fadeOut('fast'); 
                    selectedItem = $('#picitem'+index); 
                    selectedItem.fadeIn('slow'); 
                    // 
                    if(selectedBtn) 
                    { 
                        selectedBtn.css('backgroundColor','#eee'); 
                        selectedBtn.css('color','#000'); 
                    } 
                    selectedBtn = $('#picbtn'+index); 
                    selectedBtn.css('backgroundColor','#000'); 
                    selectedBtn.css('color','#fff'); 
                    //自动播放 
                    playID = setInterval(function() 
                    { 
                        var index = selectedIndex+1; 
                        if(index > pics.length-1)index=0; 
                        setSelectedItem(index); 
                    },pics[index].time); 
                } 
            } 
 </script> 



<div class="bk-10"></div>

<DIV class="f-l w-730">
<H2><a href="http://www.qqcf.com/" target="_blank" class="s-1">关于本系统</a> 
<DIV class=bdr-right></DIV>
</H2>
<DIV class=bdr>

1.统计系统支持多用户申请，同时支持网站和网店统计<br>
2.两种统计模式：1.页面浏览统计 2.独立IP统计<br>
3.两种统计图样：1.统计小图标显示 2.数字样式,共几十种数字样式,还可以自己增加<br>
4.可以统计每个来源的点击数量,有报表可以查询<br>
5.完全自定义搜索引擎种类，可以统计每个搜索引擎每天流量，以及统计搜索引擎关键字<br>
6.用户可以设置统计账号独立的查看密码进入查看统计<br>
7.可以更换几种皮肤<br>
8.完全防注入攻击，密码32位Md5加密

<DIV class=clear></DIV>
</DIV>
<DIV class="bdr-bottom-730">
<DIV class=bdr-right2></DIV>
</DIV>
<DIV class="bk-10"></DIV>
</DIV>
