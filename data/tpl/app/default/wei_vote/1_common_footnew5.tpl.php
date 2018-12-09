<?php defined('IN_IA') or exit('Access Denied');?>    <style>
										.mui-bar-tab {
											bottom: 0;
											display: table;
											width: 100%;
											height: 50px;
											padding: 0;
											table-layout: fixed;
											border-top: 0;
											border-bottom: 0;
											-webkit-touch-callout: none;
										}

										.mui-bar {
											position: fixed;
											z-index: 10;
											right: 0;
											left: 0;
											height: 56px;
											
											border-bottom: 0;
											background-color: #f7f7f7;
											-webkit-box-shadow: 0 0 1px rgba(0,0,0,.85);
											box-shadow: 0 0 1px rgba(0,0,0,.85);
											-webkit-backface-visibility: hidden;
											backface-visibility: hidden;
										}
										
										.mui-bar-tab .mui-tab-item {
    height: 56px;
}

.mui-bar-tab .mui-tab-item {
}
.mui-bar-tab .mui-tab-item {
    display: table-cell;
    overflow: hidden;
    width: 1%;
    height: 50px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: #929292;
}


.mui-bar-tab .mui-tab-item .mui-icon {
    top: 3px;
    width: 24px;
    height: 24px;
    padding-top: 0;
    padding-bottom: 0;
}
.mui-bar .mui-icon {
    font-size: 24px;
    position: relative;
    z-index: 20;
    padding-top: 10px;
    padding-bottom: 10px;
}
.mui-icon {
    font-family: Muiicons;
    font-size: 24px;
    font-weight: 400;
    font-style: normal;
    line-height: 1;
    display: inline-block;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
}


.mui-bar-tab .mui-tab-item .mui-icon~.mui-tab-label {
    line-height: 30px;
    font-family: "Microsoft YaHei";
}
.mui-bar-tab .mui-tab-item .mui-icon~.mui-tab-label {
    font-size: 11px;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
}





.mui-bar-tab .mui-tab-item.mui-active {
    color: #929292;
}




										
</style>
 <style>
.mui-bar-tab .mui-tab-item {
   
   font-size；14px;
}
.mui-bar-tab .mui-tab-item .mui-icon~.mui-tab-label {
    line-height:30px;font-family: "Microsoft YaHei";
}
.mui-bar-tab .mui-tab-item {
   
    height: 56px;
    
}
</style>
 
 <div class="theme-popover" id="module" style="padding:15px;border-radius: 7px;display: none;width:210px;">
                        <h1 style="font-size: 14px;color:#000;font-weight: bold;padding-bottom: 15px;border-bottom:#ddd 1px solid;text-align: center;">长按关注
                                <span style="color:#54C058" id="guanzhu">互联同城</span>公众号</h1>
                        <dl style="margin-top:15px;text-align: center;">
                                <dt>
                                        <img src="#" id="inkeimgs" style="width:100%;height:100%;"></dt>
                                <dd style="color:#ccc;line-height: 30px">关注后可收到动态</dd></dl>
                </div>
               <nav class="mui-bar mui-bar-tab">


			<a class="mui-tab-item <?php  if($_GPC['do'] == 'voindex') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('voindex',array('hdid'=>$_GPC['hdid']))?>">
				<!-- <span class="mui-icon mui-icon-home"></span> -->
				<span class="mui-icon"><img style="margin-bottom:5px;" src="<?php echo TEMPLATE_PATH;?>new5/sy.png" width="25" height="25"></span>
				<span class="mui-tab-label">首页</span>
				
			</a>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'Jp') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('Jp',array('hdid'=>$_GPC['hdid']))?>">
				<!-- <span style="font-size: 20px;" class="mui-icon icon-liwu iconfont"></span> -->
				<span class="mui-icon"> <img style="margin-bottom:5px;" src="<?php echo TEMPLATE_PATH;?>new5/jp.png" width="25" height="25"></span>
				<span class="mui-tab-label">奖品</span>
			</a>
			<?php  if($this->settings[0]['ischouqian'] == 1) { ?>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'Chouqiang' || $_GPC['do'] == 'myjp') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('Chouqiang',array('hdid'=>$_GPC['hdid']))?>">
				<!-- <span class="mui-icon icon-midu-choujiang iconfont"></span> -->
				<span class="mui-icon"> <img style="margin-bottom:5px;" src="<?php echo TEMPLATE_PATH;?>new5/cj.png" width="25" height="25"></span>
				<span class="mui-tab-label">抽奖</span>
			</a>
			<?php  } ?>
			<?php  if($this->settings[0]['display'] == 1) { ?>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'weiindex') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('weiindex',array('hdid'=>$_GPC['hdid']))?>">
				<!-- <span class="mui-icon icon-baoming5 iconfont "></span> -->
				<span class="mui-icon"> <img style="margin-bottom:5px;" src="<?php echo TEMPLATE_PATH;?>new5/bm.png" width="25" height="25"></span>
				<span class="mui-tab-label">报名</span>
			</a>
			<?php  } ?>
			
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'Paih') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('Paih',array('hdid'=>$_GPC['hdid']))?>">
				<!-- <span class="mui-icon icon-pkbangdan67 iconfont"></span> -->
				<span class="mui-icon">  <img style="margin-bottom:5px;" src="<?php echo TEMPLATE_PATH;?>new5/ph.png" width="25" height="25"></span>
				
				
				<span class="mui-tab-label">榜单</span>
			</a>
			
			
			<?php  if(!empty($this->settings[0]['fenxian'])  && !empty($this->settings[0]['fenxianurl'])) { ?>
											<a class="mui-tab-item <?php  if($_GPC['do'] == 'weiindex') { ?> mui-active<?php  } ?>" href="<?php  echo $this->settings[0]['fenxianurl']?>">
												<!-- <span class="mui-icon icon-baoming5 iconfont "></span> -->
												<span class="mui-icon"> <img style="margin-bottom:5px;" src="<?php echo TEMPLATE_PATH;?>new5/sz.png" width="25" height="25"></span>
												<span class="mui-tab-label"><?php  echo $this->settings[0]['fenxian']?></span>
											</a>
											<?php  } ?>
			
		</nav>
                <div style="display:none;" id="dituContent"></div>
                <script type="text/javascript">
				
				
                          function btnclick() {
                                                        window.location.href = "<?php  echo $this->createMobileUrl('paih',array('hdid'=>$_GPC['hdid']))?>";
                                                }

                                                function show_desc() {
                                                        $("#desc").toggle();
                                                }

                                                //排行
                                                function guize() {
                                                        window.location.href = "<?php  echo $this->createMobileUrl('jp',array('hdid'=>$_GPC['hdid']))?>#maodian";
                                                }

                                                //排行
                                                function homepage() {
                                                        window.location.href = "<?php  echo $this->createMobileUrl('paih',array('hdid'=>$_GPC['hdid']))?>";
                                                }

                         function index() {
                                                        window.location.href = "<?php  echo $this->createMobileUrl('voindex',array('hdid'=>$_GPC['hdid']))?>";
                                                }
                        //报名判断
                                                function apply() {
                                                        
                                                    window.location.href = "<?php  echo $this->createMobileUrl('weiindex',array('hdid'=>$_GPC['hdid']))?>";
                                                               
                                                }

                        //底部导航宽度自适应
                        $(function() {
                                var foot_bu = $('#c_foot').children('#foot_bu');
                                var len = foot_bu.length;
                                if (len == 1) {
                                        foot_bu.each(function() {
                                                $(this).css("width", "100%");
                                        });
                                } else if (len == 2) {
                                        foot_bu.each(function() {
                                                $(this).css("width", "50%");
                                        });
                                } else if (len == 3) {
                                        foot_bu.each(function() {
                                                $(this).css("width", "33%");
                                        });
                                } else if (len == 4) {
                                        foot_bu.each(function() {
                                                $(this).css("width", "25%");
                                        });
                                } else {
                                        foot_bu.each(function() {
                                                $(this).css("width", "20%");
                                        });
                                }
                        });</script>
              <script>


	wx.ready(function () {
		sharedata = {
			title: '<?php 
			if($account['bh']){
			
			   echo $this->settings[0]['fenxiangbiaotitp'];
			
			}else{
			
			    echo $this->settings[0]['fenxiangbiaoti'];
			}
			
			?>',
			desc: '<?php  echo $this->settings[0]['fenxiangshuoming'];?>',
			link: '',
			imgUrl: '<?php  echo $this->settings['0']['touimg']?>',
			success: function(){
			
				
				$.post('<?php  echo $this->createMobileUrl('Fenxinajax',array('hdid'=>$_GPC['hdid']))?>', function(data){
							alert(data.a);
						
						 
					},'json')
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			},
			cancel: function(){
				//alert('cancel');
			}
		};
		wx.onMenuShareAppMessage(sharedata);
		
		
		
		wx.onMenuShareTimeline({
					title: '<?php 
			if($account['bh']){
			
			   echo $this->settings[0]['fenxiangbiaotitp'];
			
			}else{
			
			    echo $this->settings[0]['fenxiangbiaoti'];
			}
			
			?>', // 分享标题
					link: '', // 分享链接
					imgUrl: '<?php  echo $this->settings['0']['touimg']?>', // 分享图标
					success: function () { 
						// 用户确认分享后执行的回调函数
						$.post("<?php  echo $this->createMobileUrl('Fenxinajax',array('hdid'=>$_GPC['hdid']))?>", function(data){
							alert(data.a);
						
						 
					},'json')
						
					},
					cancel: function () { 
						// 用户取消分享后执行的回调函数
					}
					
				});
	
	
	
});
	
	
	
	
	
	
	</script>
                <div style="clear: both;height: 60px;"></div>
        <script>;</script><script type="text/javascript" src="http://wx.diouy.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=wei_vote"></script></body>

</html>