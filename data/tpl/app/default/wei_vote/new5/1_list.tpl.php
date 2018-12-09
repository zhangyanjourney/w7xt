<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title><?php  echo $this->settings[0]['name'];?></title>
                <meta name="apple-mobile-web-app-capable" content="yes">
                <meta name="apple-mobile-web-app-status-bar-style" content="black">
                <meta name="format-detection" content="telephone=no">
                <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=no" />-->
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport">
                 <?php  echo register_jssdk(false);?>
				 <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/style.css">
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/style_PageDefault.css">
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/style_PageMaster.css">

         <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/swiper.min.css">
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/zqa.css">
				<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/jquery-1.8.3.min.js"></script>
					<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>js/sweetalert.css">
             <script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/sweetalert.min.js"></script>
                <style>.share {display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.7);z-index: 9696969;} #babydiv2{overflow: scroll;height: 500px;} .confirm{background-color: #2dcc70 !important;}</style>
              
        </head>
        
        <body id="body">
                	
					   <div class="swiper-container">
						  <div class="swiper-wrapper">
						  <?php  if($this->settings[0]['touimg'] != '') { ?>
						  <div class="swiper-slide"> <img style="width:100%" src="<?php  echo tomedia($this->settings[0]['touimg'])?>"></div>
							<?php  } ?>
							<?php  if($this->settings[0]['singleimage1'] != '') { ?>
							<div class="swiper-slide"> <img style="width:100%" src="<?php  echo tomedia($this->settings[0]['singleimage1'])?>"></div>
							<?php  } ?>
							
							<?php  if($this->settings[0]['singleimage2'] != '') { ?>
							<div class="swiper-slide"> <img style="width:100%" src="<?php  echo tomedia($this->settings[0]['singleimage2'])?>"></div>
							<?php  } ?>
							<?php  if($this->settings[0]['singleimage3'] != '') { ?>
							<div class="swiper-slide"> <img style="width:100%" src="<?php  echo tomedia($this->settings[0]['singleimage3'])?>"></div>
							<?php  } ?>
							<?php  if($this->settings[0]['singleimage4'] != '') { ?>
							<div class="swiper-slide"> <img style="width:100%" src="<?php  echo tomedia($this->settings[0]['singleimage4'])?>"></div>
								<?php  } ?>


						 </div>
						</div>
                <div style="width:100%;height: 5px;background-color:#FFF"></div>
               
                <div id="div">
                        <!--内容 -->
                        <div id="contentla">
                                <div style="width:80%; margin:0 auto;">
                                        <div style="width:100%; text-align:left;padding-bottom:20px;">
                                                <div id="jiandiv2">
                                                        <div id="jiandiv">选手介绍</div>
                                                        <div style="padding:0px 0px 10px 10px;margin-top:-20px;">
                                                                <div style="width:50%;float:left;">名称：<?php  echo $account['name'];?></div>
                                                                <div style="width:40%;text-align:right;float:left;">编号：<?php  echo $account['bh'];?></div>
                                                                <br>
                                                                自我介绍：<?php  echo html_entity_decode($account['feifa'], ENT_QUOTES)?>
																
																 <?php  if($this->settings[0]['zidingyi1'] != '') { ?>
				
				  
				  
															   <p style="color: #4c4a4a;"><?php  echo $this->settings[0]['zidingyi1']?>：<?php  echo $account['zidingyi1'];?></p>
																
																<?php  } ?>
															 <?php  if($this->settings[0]['zidingyi2'] != '') { ?>
																	
																	  
																	  
																 <p style="color: #4c4a4a;"><?php  echo $this->settings[0]['zidingyi2']?>：<?php  echo $account['zidingyi2'];?></p>
																
																<?php  } ?>
																<?php  if($this->settings[0]['zidingyi3'] != '') { ?>
															
															  
															  
															    <p style="color: #4c4a4a;"><?php  echo $this->settings[0]['zidingyi3']?>：<?php  echo $account['zidingyi3'];?></p>
																
																<?php  } ?>
																  <!-- <p style="color: #4c4a4a;">电话：<?php  echo $account['shouji'];?></p> -->
																
														</div>
																
																
													</div>
                                                <!--主体 -->
                                                <div style="width:100%;margin-left:0px;text-align:center;" id="zlb">
                                                        <style>.zlb{width:25%;}</style>
                                                        <div class="zlb">当前票数</div>
                                                        <div class="zlb" style="margin-left:-1px;width:39%;">距上一名差</div>
                                                        <div class="zlb" style="margin-left:-1px;width:35%;">票数榜</div>
                                                        <div style="clear:both;"></div>
                                                        <div style="margin-top:-10px;" class="zlb" id="pcount"><?php  echo $account['piao'];?>票</div>
                                                        <div class="zlb" style="margin-left:-1px;width:39%;margin-top:-10px;" id="pcha">
														
														<?php  if($vote_up['piao']) { ?>
														   <?php  echo $vote_up['piao']-$account['piao']?>
														<?php  } else { ?>
														     0
														<?php  } ?>
														
														票</div>
                                                        <div class="zlb" style="margin-left:-1px;width:35%;margin-top:-10px;" id="pzcount">第<?php  echo ($z_total+1); ?>名</div>
                                                        <div style="clear:both;"></div>
                                                </div>
                                                <div id="content_pic" style="margin-top:20px;border:solid 1px #fff;">
                                                       
													 <?php 
														$he = (explode(",",$account['tupian'])); 

														for($i=0;$i<count($he)-1;$i++){ 
														$f = $he[$i];
														$f = str_replace("&quot;","",$f);
														$f =  htmlspecialchars_decode($f);
														$f = stripslashes($f);
														//$f = 'images/'.$f;
														
														echo "<li><img src='".tomedia($f)."'></li>";
														} 


														?> 

													<?php  
															function get_extension($file)
															 {
																	$file = explode('.', $file);
																	return end($file);
															 }
															 if($account['video']){
																$houzui = get_extension($account['video']);
															//	echo $houzui;
															 }
															
															
															?>

														
													 <?php  if($account['video']) { ?>
				
					
															<?php  if($houzui == 'mp3') { ?>
																<embed height="100" width="100" src="<?php  echo $account['video'];?>" />
															<?php  } else { ?>
															 <div style="margin-bottom:80px;" width="100%" height="100%" >
																		<video  width="100%" height="100%" x-webkit-airplay="true" x5-playsinline="true" webkit-playsinline="true" playsinline="true" webkit-playsinline="true" x5-video-player-fullscreen = "true" x5-video-player-type="h5" id="playVideo" src="<?php  echo $account['video'];?>" controls="controls">
																		your browser does not support the video tag
																		</video>
																		
																	 </div>
															<?php  } ?>
													
													<?php  } ?> 
												</div>
												
												<?php  echo html_entity_decode($account['shuoming'], ENT_QUOTES)?>
                                        </div>
                                </div>
                                <style>.tp_left{float:left;} .tp_img{float:left; width:80px;margin-top:-25px;text-align:center;} .tp_img b{color:#fff;font-size:14px;display: block;margin-top: -10px;} .tp_right{float:left;} .tp_width{width:-moz-calc((100% - 80px)/2);width:-webkit-calc((100% - 80px)/2);width:calc((100% - 80px)/2);text-align: center;} .tp_bottom{color:#434243;width:100px;background-color:#fff;padding:5px 10px;border-radius: 3px;margin-top: 13px;display:inline-table;} .tp_bottom b{display: block;width: 80px;float: left;font-size:14px;} .tp_bottom img{display: block;width: 20px;float: left;padding:5px 0px;} .huibei{background-color:#000;filter:alpha(opacity=60);-moz-opacity:0.6;opacity:0.6;z-index:1001;} .kezi{position:fixed;width:100%;bottom:55px;height:65px;z-index:1002;}</style>
                                <div class="kezi huibei"></div>
                                <div class="kezi">
                                        <div class="tp_left tp_width">
                                                <div onclick="vote(<?php  echo $account['id'];?>)" class="tp_bottom">
                                                        <img width="20" src="<?php echo TEMPLATE_PATH;?>new5/zuan_01.png">
                                                        <b>给ta投票</b>
                                                </div>
                                        </div>
										
										 <?php  if($this->settings['0']['isliwu'] == 1) { ?>
										 <a href="javascript:zuanshi_tj();">
																			<div class="tp_img">
																					<img width="100%" src="<?php echo TEMPLATE_PATH;?>new5/zuan_03.png">
																					<b>送礼物</b>
																			</div>
																	</a>			
										<?php  } else { ?>
										 <a href="javascript:sy_tj();">
																			<div class="tp_img">
																					<img width="100%" src="<?php echo TEMPLATE_PATH;?>new5/zuan_03.png">
																					<b>首页</b>
																			</div>
																	</a>			
										<?php  } ?>
										
										
										
										   <?php  if($this->settings['0']['display'] == 1) { ?>
												<div class="tp_right tp_width">
                                                <div onclick="share()" class="tp_bottom">
                                                        <img width="20" src="<?php echo TEMPLATE_PATH;?>new5/zuan_05.png">
                                                        <b>我要报名</b>
                                                </div>
                                        </div>
                                             <?php  } else { ?>
														<div class="tp_right tp_width">
                                                <div onclick="paih()" class="tp_bottom">
                                                        <img width="20" src="<?php echo TEMPLATE_PATH;?>new5/zuan_05.png">
                                                        <b>查看排行</b>
                                                </div>
                                        </div>

											 
											<?php  } ?>
										
										
										
                                       
                                        
                                        <div style="clear:both;"></div>
                                </div>
                                <!-- 萌宝-->
                                <div class="divShow3"></div>
                                <div class="dis3">
                                        <div class="ttop3">
                                                <div class="txtspan3">
                                                        <div id="ttop3div">
                                                                <div id="ttpop3div2">
                                                                        <div style="width:85%; margin:0 auto">
                                                                                <div id="cadiv" style=" left:99%; top:10px;">
                                                                                        <button id="cabutt" onclick="hidediv(3)">×</button></div>
                                                                                <div id="babydiv"></div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <!--萌宝 --></div>
                        <!--投票提示 -->
                        <!--div id="vote_notice" class="myDiv" style="display:none">投票成功</div-->
                        <div id="notice_vote" style="z-index:99;left:50%;top: 30%;width:250px; line-height:40px;color:#fff; font-size:18px;  border-radius: 9px;  background-color: #2dcc70; text-align:center; font-family:&#39;微软雅黑&#39;;margin-left:-125px!important;margin-top:-60px!important;position:fixed!important;display:none">投票成功</div>
                        <div id="notice_votes" style="z-index:99;left:50%;top: 30%;width:250px; line-height:40px;color:#fff; font-size:18px;border-radius: 9px;  background-color: #2dcc70; text-align:center; font-family:&#39;微软雅黑&#39;;margin-left:-125px!important;margin-top:-60px!important;position:fixed!important;display:none">本地人</div>
                        <div id="no_follow" style="z-index:99;left:48%;top: 30%;width:315px;height:40px; line-height:40px;margin-left:-150px;margin-right:150px;margin-top:-60px;position:fixed;display:none"></div>
                        <div id="bg" class="bg" style="display:none;"></div>
                        <!-- <div class="share"><img src="/tpl/static/voteimg/img/fx1.png" style="width: 100%;"></div> -->
                      	<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>new5/swiper.min.js"></script>
			
											<script> 
											 $(function(){
											 
											 
											 n=1;
												var mySwiper = new Swiper('.swiper-container',{
												autoplay: {
													disableOnInteraction: false,
												  },
												on:{
												   autoplay:function(){
													console.log(n);
													 n++;
												  },
												}
												})
											 
											 
											 
											 })
												
											</script>
                        <script type="text/javascript">//活动介绍我的投票展开收缩效果
                                $(function() {　　$('.jiajian').click(function() {　　$(this).toggleClass('jianjian');　　$(this).parent('dl').siblings().find('.jiajian').removeClass('jianjian');　　
                                        })
                                });
                                //提示信息
                                function votenotice(text) {
                                        $("#notice_vote").text(text);
                                        $("#notice_vote").show();
                                        $("#bg").show();
                                        $("#notice_vote").fadeOut(5000);
                                        $("#bg").fadeOut(5000);
                                }
                                function votenotices(text) {
                                        $("#notice_votes").html(text);
                                        $("#notice_votes").show();
                                        $("#bg").show();
                                }
                                //投票
                                var tpz = '';
                                function vote(id) {
                                      
                                        if (tpz == 1) {
                                                votenotice('投票中...');
                                                return;
                                        }
                                        tpz = 1;
                                       
										console.log(id);
										
										
										
                                        if (id) {
                                              $.post("<?php  echo $this->createMobileUrl('listajax',array())?>", { 
											 
											  hdid:<?php  echo $_GPC['hdid']?>,
											  p: id,
											  

												},
												function(data){
												  console.log(data);
												  votenotice(data.a);
												  
												  
												  	if(data.c==1){
							
							
								<?php  if($this->settings[0]['keyword'] == '') { ?>
							
							
							
							      swal({    title: "",   text: "<div id ='guanzhu' style='width:250px;height:270px;text-align:center;margin:0px auto;'> <img style='width: 100%;' src='<?php  echo $_W['account']['qrcode'];?>'><p style='text-align:center;'>关注公众号，回复关键词<?php  echo $this->settings[0]['wxkeyword']?>进入活动</p></div>",    html: true  });
							
							
							     <?php  } else { ?>
							
						
							    setTimeout(function(){
				   
				                   window.location.href="<?php  echo $this->settings[0]['keyword'];?>";
							    },2000)

			
							
							
							    <?php  } ?>
							
						
							
							
								}
								
								if(data.c==4){
										 setTimeout(function(){
									   
											  window.location.href="<?php  echo $this->createMobileUrl('Chouqiang',array('type'=>'uids','hdid'=>$_GPC['hdid']))?>";
											 },2000)

								}
												  
												  
												  
												  
												  
												  
												  if(data.b){
												  
												      window.location.href = "<?php  echo $this->createMobileUrl('Cgong',array('id'=>$account['id'],'hdid'=>$_GPC['hdid']))?>";
                                
												  }
												  tpz = 0;
												 
												 
												 
												}, "json");
                                        } else {
                                                votenotice('服务器繁忙');
                                                tpz = 0;
                                        }
                                }
                                function tz() {
                                        window.location.href = "#";
                                }

                                //锚点
                                function anchor() {
                                        $("#TopTipHolder").show();
                                        if ($("#TopTipHolder").css('height') == '0px') {
                                                $("#TopTipClose").click(); //执行关闭
                                                $("#TopTipHolder").css('height', '35px'); //弹出
                                        }
                                }
                                function anchor_follow(id, vid, token) {
                                        $("#fly_page").show();
                                        //alert('/index.php?g=Wap&m=Voteimg&a=cookie&td_channelid=110114000000&itemid='+id+'&vid='+vid+'&token='+token);
                                        $.get('/index.php?g=Wap&m=Voteimg&a=cookie&td_channelid=110114000000&itemid=' + id + '&vid=' + vid + '&token=' + token, '',
                                        function(r) {
                                                //alert(r);
                                        });
                                }
                                //隐藏提醒关注注册弹框
                                $(".close").click(function() {
                                        $("#no_follow").hide();
                                        $("#bg").hide();
                                });
                                //隐藏
                                function hidediv(id) {
                                        if (id == 0) {
                                                $('.dis').hide();
                                                $('.divShow').hide();
                                        }
                                        $('.dis' + id).hide();
                                        $('.divShow' + id).hide();
                                }
                                function shop_tj() {
                                        $.post("/index.php?g=Wap&m=Voteimg&a=shop_tj&td_channelid=110114000000&id=1529&token=rsgdok1521455348&item_id=202822", 'type=2',
                                        function(data) {
                                                window.location.href = "/index.php?g=Wap&m=Voteimg&a=shop&token=rsgdok1521455348&vote_id=1529&item_id=202822&td_channelid=110114000000";
                                        },
                                        'json')
                                }
                                function zuanshi_tj() {
                                        
                                        window.location.href = "<?php  echo $this->createMobileUrl('wulist',array('id'=>$_GPC['id'],'hdid'=>$_GPC['hdid']))?>";
                                      
                                }
                                //排行
								
								
								function sy_tj() {
                                        
                                        window.location.href = "<?php  echo $this->createMobileUrl('voindex',array('hdid'=>$_GPC['hdid']))?>";
                                      
                                }
								
                                </script>
                        <script type="text/javascript">
						  function paih() {
                                                        
                                                  window.location.href = "<?php  echo $this->createMobileUrl('paih',array('hdid'=>$_GPC['hdid']))?>";            
                                                }
						
						function share(va) {
                                        //$(".share").show();
                                        if (va != undefined && va != '' && va.length >= 1) {
                                                window.location.href = va;
                                        } else {
                                                apply();
                                        }
                                }
                                $(function() {
                                        $(".share").click(function() {
                                                $(this).hide();
                                        });
                                });

                                //2015/9/11
                                var token = 'rsgdok1521455348';
                                var allow_apply = '';
                                var id = '1529';
                                var is_register = "0";</script>
                        <style>body,h1,p,form,ul,li,dl,dd,input,h2,h3,th,td,table,tr,td,tbody,thead{margin:0;padding:0}</style>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew5', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew5', TEMPLATE_INCLUDEPATH));?>