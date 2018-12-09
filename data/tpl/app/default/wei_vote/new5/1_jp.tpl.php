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
        </head>
        
        <body id="body" style="background-color:#fff;">
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
                <div id="jiandiv1">
                        <div id="jiandiv2">
                                <div id="jiandiv">活动介绍</div>
                                <div style="padding:0px 0px 10px 10px">
								
								
								 <?php  echo html_entity_decode($this->settings[0]['huodong_sm'], ENT_QUOTES)?>
								
                                </div>
                        </div>
                        <div id="maodian" mame="maodian" class="maodian">
                                <br>
                                <div id="jiandiv2">
                                        <div id="jiandiv">奖品设置</div>
                                        <div style="padding:0px 0px 10px 10px">
                                              
											 <?php  echo html_entity_decode($this->settings[0]['jian_p'], ENT_QUOTES)?> 
										</div>
                                </div>
                        </div>
                </div>
                <style>body,h1,p,form,ul,li,dl,dd,input,h2,h3,th,td,table,tr,td,tbody,thead{margin:0;padding:0}</style>
				
				
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
				
				
				
				
				
				
				<script>
				
				document.getElementById('maodian').scrollIntoView();
				
				</script>
               <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew5', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew5', TEMPLATE_INCLUDEPATH));?>