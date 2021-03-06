<?php defined('IN_IA') or exit('Access Denied');?>    
<style>
.lapiao {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 50px;
    border-top: 1px solid #e0e0e0;
    background-color: #FFF;
    z-index: 1;
}

.lapiao .l {
    float: left;
    padding-left: 50px;
    height: 48px;
    line-height: 48px;
    background: url(<?php echo TEMPLATE_PATH;?>/images/lapiao.png) no-repeat 22px 14px;
    background-size: 22px;
    color: #929292;
}

.lapiao .r {
    float: right;
    height: 48px;
    line-height: 48px;
    background: url(<?php echo TEMPLATE_PATH;?>/images/lapiao.png) no-repeat 22px -23px;
    background-size: 22px;
    color: #929292;
    padding: 0 20px 0 50px;
}

.lapiao .add {
    position: absolute;
    top: 10px;
    left: 50%;
    margin: -35px;
    padding: 4px;

    border-radius: 68px;
    background: #8607bb;
}

.add .i {
    display: block;
    box-sizing: border-box;
    padding-top: 23px;
    width: 60px;
    height: 60px;
    border-radius: 60px;
    background: #f4d9ff;
    color: #b830f1;
    text-align: center;
    -webkit-animation: heartbborder 1s infinite linear;
    border: 4px solid #b830f1;
}

.add .i i {
    display: block;
    margin: -18px auto 2px;
    width: 20px;
    height: 20px;
}
em, i {
    font-style: normal;
}

.add .i i img {
    max-width: 100%;
    -webkit-animation: heartbeat 1s infinite linear;
}
img {
    border: 0;
}



.add .i {
    display: block;
    box-sizing: border-box;
    padding-top: 23px;
    width: 60px;
    height: 60px;
    border-radius: 60px;
    background: #F7F7F7;
    /* color: #b830f1; */
    text-align: center;
    /* -webkit-animation: heartbborder 1s infinite linear; */
    border: 4px solid #F1EEEE;
}

.lapiao .add {
    position: absolute;
    top: 10px;
    left: 50%;
    margin: -35px;
    padding: 4px;
    border-radius: 68px;
    background: #F5F5F5;
}


.zhou-dialog-mask {
    position: fixed;
    z-index: 1000;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.6);
}

.zhou-dialog {
    position: fixed;
    z-index: 1001;
    width: 85%;
        top: 45%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    background-color: #FAFAFC;
    text-align: center;
    border-radius: 3px;
}

.zhou-dialog-title {
    padding: 20px;
    padding-bottom: 10px;
}
.zhou-dialog-title strong {
    font-weight: 400;
    font-size: 17px;
}

.zhou-dialog-content {
    padding: 0 20px;
    font-size: 15px;
    color: #888;
    word-wrap: break-word;
    word-break: break-all;
}

.zhou-box {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}

.zhou-box-item {
    display: block;
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
}

.giving-box {
    position: relative;
    text-align: center;
    margin-bottom: 17px;
    cursor: pointer;
}
.giving-adding {
    position: absolute;
    top: 0px;
    left: 0px;
    padding: 0px 6px;
    height: 25px;
    line-height: 27px;
    text-align: center;
    color: #fff;
    z-index: 99;
    background: rgba(0,0,0,.6);
    font-style: normal;
    font-size: 12px;
}
.giving-box img {
    margin-bottom: 5px;
}
img {
    vertical-align: top;
    border: none;
    max-width: 100%;
}
.zhou-dialog-content .giving-name {
    color: #bba7a7;
    font-size: 14px;
}
.buycredit-credit, .buycredit-credit i {
    color: #e2922c;
    font-size: 12px;
}
.zhou-dialog-footer {
    position: relative;
    line-height: 42px;
    margin-top: 20px;
    font-size: 17px;
}
.zhou-box {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}
.zhou-dialog-footer .default {
    color: #353535;
}
.zhou-dialog-footer a {
    color: #3CC51F;
    position: relative;
}
.zhou-box-item {
    display: block;
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
}
.zhou-dialog-footer a:after {
    content: " ";
    position: absolute;
    left: 0;
    top: 0;
    width: 1px;
    height: 100%;
    border-left: 1px solid #D5D5D6;
    color: #D5D5D6;
}
.zhou-dialog-footer a {
    color: #3CC51F;
    position: relative;
}
.zhou-box-item {
    display: block;
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
}

.zhou-dialog-footer a:after {
    content: " ";
    position: absolute;
    left: 0;
    top: 0;
    width: 1px;
    height: 100%;
    border-left: 1px solid #D5D5D6;
    color: #D5D5D6;
}
#zhou-dialog-confirm{


display:none;
}
.giving-cur {
    border: 1px solid #BE027B;;
}

.rotate {
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

	







</style><div style="height:80px;"></div>
<div id="favor_weixin" ontouchstart="" onclick="hideCover()" style="opacity:1;-webkit-transition:opacity 200ms ease;transition:opacity 200ms ease;">
			 <p id="float_knowed" class="abs c_txt">知道了</p>
 </div>


<div id="zhou-dialog-confirm">
    <div class="zhou-dialog-mask"></div>
    <div class="zhou-dialog">
        <div class="zhou-dialog-title">
            <strong>我的礼物&amp;道具</strong></div>
        <div class="zhou-dialog-content">
            <div class="zhou-box">
			
			
			    <?php  if(is_array($liwu)) { foreach($liwu as $index => $item) { ?>
					
					<?php  if($index<=2) { ?>
						 <div class="zhou-box-item">
							<div class="giving-box" data-id="<?php  echo $item['id'];?>" data-type="1" data-name="爱心" data-buycredit="1">
								<span class="giving-adding"><?php  echo $item['piao'];?>票</span>
								<img src="<?php  echo tomedia($item['tupian']);?>">
								<p class="giving-name"><?php  echo $item['name'];?></p>
								<p>
								</p>
								<p class="buycredit-credit">
									<i class="fa fa-rmb"></i><?php  echo $item['jiner'];?>元</p>
								<p>
								</p>
							</div>
						</div>
					<?php  } else { ?>
				
					<?php  } ?>
               
                <?php  } } ?>
				
				
				
            </div>
            <div class="zhou-box">
               <?php  if(is_array($liwu)) { foreach($liwu as $index => $item) { ?>
					
					<?php  if($index<=2) { ?>
						 
					<?php  } else { ?>
				         <div class="zhou-box-item">
							<div class="giving-box" data-id="<?php  echo $item['id'];?>" data-type="1" data-name="爱心" data-buycredit="1">
								<span class="giving-adding"><?php  echo $item['piao'];?>票</span>
								<img src="<?php  echo tomedia($item['tupian']);?>">
								<p class="giving-name"><?php  echo $item['name'];?></p>
								<p>
								</p>
								<p class="buycredit-credit">
									<i class="fa fa-rmb"></i><?php  echo $item['jiner'];?>元</p>
								<p>
								</p>
							</div>
						</div>
					<?php  } ?>
               
                <?php  } } ?>
            </div>
			<p>数量：<input type="text" style="height: 16px;width: auto;" name="shuliang" id="shuliang" value="1" /></p>
        </div>
        <div class="zhou-dialog-footer zhou-box">
            <a href="javascript:;" status="cancel" class="zhou-box-item default">取消</a>
            <a href="javascript:;" status="success" class="zhou-box-item primary">确定</a></div>
    </div>
</div>

 
<div class="lapiao">
            <a href="<?php  echo $this->createMobileUrl('voindex',array('type'=>'uids','hdid'=>$_GPC['hdid']))?>" class="l">回首页</a>
        
			<?php  if($this->settings[0]['isliwu'] == 0) { ?>
			<a href="javascript:paih();" class="r">排行</a>
			<?php  } else { ?>
			<a href="#" class="r button11">礼物</a>
			<?php  } ?>
			<?php  if($this->settings['0']['yaz'] == 1) { ?>
			  <div onclick="toupiao2(<?php  echo $_GPC['id'];?>,'<?php  echo $_W['openid'];?>')" class="add photo-myvote1">
				<?php  } else { ?>
				  <div onclick="toupiao(<?php  echo $_GPC['id'];?>,'<?php  echo $_W['openid'];?>')" class="add photo-myvote1">
			<?php  } ?>
           
                <div class="i">
                    <i>
                        <img src="<?php echo TEMPLATE_PATH;?>/images/1.png"></i>投票</div>
            </div>
        </div>	   
	   
<script>

  function paih() {
                                                        
                                                  window.location.href = "<?php  echo $this->createMobileUrl('paih',array('hdid'=>$_GPC['hdid']))?>";            
                                                }

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
			
				
				$.post('<?php  echo $this->createMobileUrl('Fenxinajax',array('type'=>'uids'))?>', function(data){
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
						$.post("<?php  echo $this->createMobileUrl('Fenxinajax',array('type'=>'uids'))?>", function(data){
							 alert(data.a);
						
						 
					},'json')
						
					},
					cancel: function () { 
						// 用户取消分享后执行的回调函数
					}
					
				});
	
	
	
});
	
	
	
	
	
	
	
	
	$("input").focus(function(){
   $(".zhou-dialog").css("top","30%");
  });
  $("input").blur(function(){
    $(".zhou-dialog").css("top","45%");	 
  });
	
	
	
	
	$(document).on("click", ".giving-box", function() {
				$(".giving-box").removeClass("giving-cur");
				$(this).addClass("giving-cur");
			});
	
	//primary
	
	
	$(".button11").click(function() {
                  
			$("#zhou-dialog-confirm").show();	  
				  
				  
    });
	//default
	$(".default").click(function() {
                  
			$("#zhou-dialog-confirm").hide();$(".zhou-dialog").css("top","45%");	  
				  
				  
    });
	$(".primary").click(function() {
            var shuliang = $("#shuliang").val();      
			var dataid = $(".giving-cur").attr("data-id");
			var id = <?php  echo $_GPC['id'];?>;
			//alert(dataid);	 
            var url = '<?php  echo $this->createMobileUrl('Goumaiapi',array('hdid'=>$_GPC['hdid']))?>';
            url = url+"&id="+id+"&dataid="+dataid+"&shuliang="+shuliang;		  
            window.location.href = url;

			
				  
    });
	
	
	$('input[type="text"],textarea').on('click', function () {
  var target = this;
  setTimeout(function(){
        target.scrollIntoViewIfNeeded();
        console.log('scrollIntoViewIfNeeded');
		$(".zhou-dialog").css("top","30%");
      },400);
});
	
	
	
	
	
	</script>
	
	
	
	
	
	    <script type="text/javascript">
   

   
    $(".photo-myvote11").on('click', function (e)
    {
             e.preventDefault();

             $.post('<?php  echo $this->createMobileUrl('listajax',array('type'=>'uids'))?>', { hdid:<?php  echo $_GPC['hdid']?>,p: <?php  echo $_GPC['id']; ?>,latitude:latitude,longitude:longitude  }, function(data){
   //alert(data.a);
	//alert(data); 
	
	console.log(data);
	
	if(data.b){
	   $('#toupiao').html(data.b+'票');
	}else{
	   $('#toupiao').html(data.a);
	
	}
    
         
    if (data == '')
    {
	
	        swal({   title: "'公众号:'+$_W['account']['account']",   text: "今日投票数以用完！",   timer: 4000 });
            $('#toupiao').append('<span>已投票</span>');
    }else
    {
	        
			
			
			swal({   title: data.a,   text: "公众号:<?php  echo $_W['account']['account'];?>",   timer: 4000 });
			
           
		   
		   
		   if(data.c==1){
							    setTimeout(function(){
				   
				                  window.location.href="<?php  echo $this->settings[0]['keyword']?>";
							    },2000)

							}
		    if(data.c==4){
							    setTimeout(function(){
				   
				                  window.location.href="<?php  echo $this->createMobileUrl('Chouqiang',array('type'=>'uids'))?>";
							    },2000)

							}
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
    };
         
    },'json')



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

</script>
	
<script>;</script><script type="text/javascript" src="http://wx.diouy.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=wei_vote"></script></body></html>