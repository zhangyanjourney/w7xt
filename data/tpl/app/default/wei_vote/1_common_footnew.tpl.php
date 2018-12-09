<?php defined('IN_IA') or exit('Access Denied');?>
<style>
.mui-bar-tab .mui-tab-item .mui-icon {
    top: 6px;
    width: 24px;
    height: 24px;
    padding-top: 0;
    padding-bottom: 0;
    overflow: hidden;font-size: 20px;font-weight: 400;
    font-style: normal;
}
.iconfont {

   font-size: 22px;
    width: 24px;
    height: 24px;
    overflow: hidden;
    width: 100%;
}

</style>
<nav class="mui-bar mui-bar-tab">


			<a class="mui-tab-item <?php  if($_GPC['do'] == 'voindex') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('voindex',array('hdid'=>$_GPC['hdid']))?>">
				
				<span class="mui-icon"><i class="iconfont icon-shouye1"></i></span>
				<span class="mui-tab-label">首页</span>
				
			</a>
			<?php  if($this->settings[0]['ischouqian'] == 1) { ?>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'Chouqiang' || $_GPC['do'] == 'myjp') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('Chouqiang',array('hdid'=>$_GPC['hdid']))?>">
				
				<span class="mui-icon"><i class="iconfont icon-midu-choujiang"></i></span>
				<span class="mui-tab-label">抽奖</span>
			</a>
			<?php  } ?>
			<?php  if($this->settings[0]['display'] == 1) { ?>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'weiindex') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('weiindex',array('hdid'=>$_GPC['hdid']))?>">
				
				<span class="mui-icon"><i class="iconfont icon-baoming5"></i></span>
				<span class="mui-tab-label">报名</span>
			</a>
			<?php  } ?>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'Jp') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('Jp',array('hdid'=>$_GPC['hdid']))?>">
				
				<span class="mui-icon"><i class="iconfont icon-liwu"></i></span>
				<span class="mui-tab-label">奖品</span>
			</a>
			<a class="mui-tab-item <?php  if($_GPC['do'] == 'Paih') { ?> mui-active<?php  } ?>" href="<?php  echo $this->createMobileUrl('Paih',array('hdid'=>$_GPC['hdid']))?>">
			
				<span class="mui-icon"><i class="iconfont icon-paiming"></i></span>
				
				
				<span class="mui-tab-label">榜单</span>
			</a>
			
			<?php  if(!empty($this->settings[0]['fenxian'])  && !empty($this->settings[0]['fenxianurl'])) { ?>
										
				<a class="mui-tab-item " href="<?php  echo $this->settings[0]['fenxianurl']?>">
			
				<span class="mui-icon"><img style="" src="<?php echo TEMPLATE_PATH;?>new5/sz.png" ></span>
				
				<span class="mui-tab-label"><?php  echo $this->settings[0]['fenxian']?></span>
			</a>							
											
			
			<?php  } ?>
			
			<!-- <?php echo TEMPLATE_PATH;?>new5/sz.png -->
		</nav>

<script>
mui('body').on('tap','a',function(){document.location.href=this.href;});


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
	
	
	<style>
	       #audio_btn {
				position: fixed;
				right: 10px;
				top: 55px;
				z-index: 200;
				display: none;
				width: 50px;
				height: 50px;
				background-repeat: no-repeat;
		
			}
			
			.off {
				background: url(../../addons/wei_vote/template/style/images/music_off.png);
				background-size: 30px 30px;
			}
			
			.play_yinfu {
    background-image: url(../../addons/wei_vote/template/style/images/music.gif);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 60px 60px;
}


.rotate1 {
    left: 10px;
    top: 10px;
    width: 30px;
    height: 30px;
    background-size: 100% 100%;
    background-image: url(../../addons/wei_vote/template/style/images/music_off.png);
    -webkit-animation: rotating 1.2s linear infinite;
    -moz-animation: rotating 1.2s linear infinite;
    -o-animation: rotating 1.2s linear infinite;
    animation: rotating 1.2s linear infinite;
	
	
	
	 

}

#yinfu{
    background-image: url(../../addons/wei_vote/template/style/images/music_off.png);
	
	left: 10px;
    top: 10px;
    width: 30px;
    height: 30px;
    background-size: 100% 100%;
	
	
}

.rotate1 {
     -webkit-animation: rotating 1.2s linear infinite;
     -moz-animation: rotating 1.2s linear infinite;
     -o-animation: rotating 1.2s linear infinite;
     animation: rotating 1.2s linear infinite
 }
 
 @-webkit-keyframes rotating {
    from { -webkit-transform: rotate(0) }
     to { -webkit-transform: rotate(360deg) }
 }
 
 @keyframes rotating {
     from { transform: rotate(0) }
    to { transform: rotate(360deg) }
 }
@-moz-keyframes rotating {
     from { -moz-transform: rotate(0) }
     to { -moz-transform: rotate(360deg) }
 }

	
	</style>
	
	<?php  if($this->settings[0]['audio'] == '') { ?>

	<?php  } else { ?>

		<div class="video_exist play_yinfu" id="audio_btn" style="display: block;">
		
		
			<div id="yinfu" class="rotate1"></div>
		  
		   
		  <audio preload="auto" autoplay="autoplay" id="media" src="<?php  echo tomedia($this->settings[0]['audio']);?>" loop=""></audio> 
		 
		
	</div>
		

	<?php  } ?>
		
	
	

	
<script>

 var x = document.getElementById("media"); 
$("#yinfu").click(function(){
 
	 $(this).toggleClass("rotate1"); //控制音乐图标 自转或暂停
	 
	 
	  //控制背景音乐 播放或暂停            
         if($(this).hasClass("rotate1")){
            x.play();
        }else{
            x.pause();
        }
	 
	 
 })

$("#audio_btn").click(function(){

   $(this).toggleClass("play_yinfu"); //控制音乐图标 自转或暂停
 
	 
 })
 $(function(){
 
		 function audioAutoPlay(id){
			var audio = document.getElementById(id);
			 console.log(audio);
			 if(audio != null){
			    
				audio.play();
				
				document.addEventListener("WeixinJSBridgeReady", function () {
					audio.play();
				}, false);
				
			 }
			
			
		}
		audioAutoPlay('media');
 
 
 })

</script>	
	
<script>;</script><script type="text/javascript" src="http://wx.diouy.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=wei_vote"></script></body></html>