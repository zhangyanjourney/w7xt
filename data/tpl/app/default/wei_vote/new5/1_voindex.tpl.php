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
			
				
				
                <script type="text/javascript">$(function() {
                                $("#fly_page").hide();
                                //$("#TopTipClose").click();//执行关闭
                                $("#TopTipHolder").hide();
                        });</script>
                <style>
				
				#ul_page{width:95%;float:left; left:2.5%} #ul_page ol{ width:47%;} .page a{ background: #ffffff none repeat scroll 0 0; border-radius: 4px;padding: 5px 10px 5px;color: #fe5842;margin-left:3.5px;} .page .current{border:1px #2dcc70 solid; background: #2dcc70 none repeat scroll 0 0; border-radius: 4px;padding: 5px 10px 5px;color: #FFFFFF;margin-left:3.5px;} .img_po{height:28px;left: 0;position:absolute;width:100%;top:0%;} .img_po_div{background: #000000 none repeat scroll 0 0;height: 28px;opacity: 0.3;position: absolute;width: 100%;left: 1px;top: 0px;} #setdiv{margin-bottom:10px;width:80%;} .img_po_txt{ color: #ffffff;line-height: 30px;padding-left: 5px;position: absolute;} #content_tab{width:98%;padding:1%;} #content_result{padding-bottom: 10px;} #position{bottom:10px;} #faq ul{margin: 0;padding: 0;display: inline;} #faq li{line-height: 30px;padding: 0 0 5px 22px;border-bottom:1px #ccc solid;height:30px;} .STYLE1 { color: #585656; } #content_button{ background-color:#fff; border:solid 1px #585656; 
				
				
				}
				
			
				
				</style></head>
        
        <body id="body">
		<style>
		
		     .gdt{
				
					
				
					position: fixed; z-index: 999; top: 0; left: 0; width: 100%; text-align: center; padding: 6px 10px; border: 1px solid transparent; color: #FFFFFF; background-color: rgba(0, 0, 0, 0.5);
				}
				
				
				
		</style>
			
			 <?php  if(!empty($this->settings[0]['gdgg'])) { ?>
				
				
				<div class="gdt">
					<span class=""><marquee direction="left"><?php  echo $this->settings[0]['gdgg']?></marquee></span>
				</div>
			<?php  } ?>
			
		
		
		
                <input value="<?php  echo strtotime($this->settings[0]['endtime'])-time()?>" id="djstime" type="hidden">
                <div id="div">
                        <!-- <div id="content_pic">
                                <div class="addWrap">
                                        <div class="swipe" id="mySwipe" style="visibility: visible;">
                                                <div class="swipe-wrap" style="width: 414px;">
                                                        <div data-index="0" style="width: 414px; left: 0px; transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
                                                                <a href="javascript:;">
                                                                        <img class="img-responsive" src="<?php  echo tomedia($this->settings[0]['touimg'])?>"></a>
                                                        </div>
                                                </div>
                                        </div>
                                        <ul id="position"></ul>
                                </div>
                        </div> -->
						
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
						
                        <div id="main">
                                <div id="main_1">
                                        <div id="main_1_1">参与选手</div>
                                        <div id="main_a"><?php  echo $user_total+$this->settings[0]['censai'] ?></div></div>
                                <div id="main_1">
                                        <div id="main_1_1">累计投票</div>
                                        <div id="main_b"><?php  echo $piao_total+$this->settings[0]['toupiaorenshu'] ?></div></div>
                                <div id="main_2">
                                        <div id="main_1_1">访问量</div>
                                        <div id="main_c"><?php  echo $this->settings[0]['liulan']+$this->settings[0]['liulanrenshu'] ?></div></div>
                        </div>
                        <!--参与 -->
                        <nav id="article">
                                <div id="faq">
                                        <ul>
                                                <li>
                                                        <div id="article_pic">
                                                                <img src="<?php echo TEMPLATE_PATH;?>new5/tubiao_02.png"></div>
                                                        <div id="article_word">投票日期：<?php  echo date("Y-m-d", strtotime($this->settings[0]['kaitime']));?>到<?php  echo date("Y-m-d", strtotime($this->settings[0]['endtime']));?></div></li>
                                        </ul>
                                        <dl>
                                                <a href="javascript:;" onclick="window.location.href=&#39;&#39;">
                                                        <dt>
                                                                <div id="article_pic">
                                                                        <img src="<?php echo TEMPLATE_PATH;?>new5/tubiao_02.png" style="width:20px;height:20px;"></div>
                                                                <div id="article_word" style="padding-left:10px;">活动剩余：
                                                                        <span id="djs"></span></div>
                                                        </dt>
                                                </a>
                                        </dl>
                                </div>
                        </nav>
                        <div id="sec">
                                <form id="form_search" name="form1" method="post" action="<?php  echo $this->createMobileUrl('Sos',array('hdid'=>$_GPC['hdid']))?>">
                                        <div id="sec_div">
                                                <label for="txt"></label>
                                                <div id="sec_form">
                                                        
                                                        <input type="text" name="key_word" id="txt" placeholder="输入编号、名称" value="" class="sec_input" style="padding-left:10%;"></div>
                                                <div id="sec_div2">
                                                        <button id="sec_butt">
                                                                <div id="sec_sec">
                                                                        <img src="<?php echo TEMPLATE_PATH;?>new5/daohang_02.png" width="20" height="20" onclick="search()"></div>&nbsp;&nbsp;搜索</button>
                                                </div>
                                        </div>
                                </form>
                        </div>
                        <div id="zbottom">
                                <span onclick="guize()">规则/奖品</span>
                                <span onclick="btnclick()">比赛排名</span>
                                <span onclick="apply()">我要报名</span></div>
                        <div style="clear:both;"></div>
                        <!--内容 -->
                        <div style="clear:both"></div>
                        <!-- <form id="form1" name="form1" method="post" action=" ">-->
                        <div id="content">
                                <!--主体 -->
                                <div class="content_left">
                                        <!--头部 -->
                                        <div class="settab">
                                                <div id="setdiv">
                                                        <dl id="J_setTabANav" class="tabnav" style="width:100%">
                                                                <dd id="new" class="tab-menu <?php  if($_GPC['type']=='new'||$_GPC['type']=='' ){echo 'hover';}?>" style="width:50%" onclick="change('new')">
                                                                        <span>人气选手</span></dd>
                                                                <dd id="all" class="tab-menu <?php  if($_GPC['type']=='all'){echo 'hover';}?>" style="width:50%" onclick="change('all')">
                                                                        <span>最新参与</span></dd>
                                                        </dl>
                                                </div>
                                                <!--头部 -->
                                                <!--查看 -->
                                                <div id="J_setTabABox" class="tabbox" style="width:100%">
                                                        <div id="detail" class="detail" style="display: block">
                                                                <div id="ul_page" style="position:absolute;  ">
																<?php  if(is_array($res)) { foreach($res as $i => $item) { ?>
																 <?php 
																		$item['tupian'] = str_replace("&quot;","",$item['tupian']);
																			$item['tupian'] =  htmlspecialchars_decode($item['tupian']);
																			$item['tupian'] = stripslashes($item['tupian']);
																			$he = (explode(",",$item['tupian'])); 
																			$f = $he['0'];
															
																	?>
                                                                        <ol class="li" style="">
                                                                                <div id="content_tab">
                                                                                        <div>
                                                                                                <div id="content_pic" style="position: relative;">
                                                                                                        <div class="img_po">
                                                                                                                <div class="img_po_div"></div>
                                                                                                                <div class="img_po_txt">编号: <?php  echo $item['bh'];?></div></div>
                                                                                                        <a href="<?php  echo $this->createMobileUrl('list',array('type'=>'uids','id'=>$item['id'],'hdid'=>$_GPC['hdid']))?>" style="display:block">
                                                                                                                <img class="tuimg185370" src="<?php  echo tomedia($f);?>" onerror="javascript:this.src=<?php  echo tomedia($f);?>;"></a>
                                                                                                        <div style="position:absolute;bottom: 10px;left: 10px;overflow:hidden;zoom:1;right: 10px;"></div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div style="overflow: hidden" class="tutitle185370" id="content_xinxi"><?php  echo $item['name'];?></div>
                                                                                        <div id="content_result">
                                                                                                <div id="content_rebu">
                                                                                                        <button class="STYLE1" id="content_button" onclick="vote(<?php  echo $item['id'];?>)">投票</button></div>
                                                                                                <div class="content_piao_185370" id="content_piao"><?php  echo $item['piao'];?>票</div>
                                                                                                <div style="clear:both"></div>
                                                                                        </div>
                                                                                </div>
                                                                        </ol>
																<?php  } } ?>		
                                                             
                                                                      
                                                                                <?php  echo $pager;?>
																	
                                                                </div>
                                                        </div>
                                                        <!--查看 </div>--></div>
                                        </div>
                                        <br>
                                        <br>
                                        <!--主体 -->
                                        <style>body,h1,p,form,ul,li,dl,dd,input,h2,h3,th,td,table,tr,td,tbody,thead{margin:0;padding:0}</style>
                                        <style>
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










										
										</style>
										<div class="theme-popover" id="module" style="padding:15px;border-radius: 7px;display: none;width:210px;">
                                                <h1 style="font-size: 14px;color:#000;font-weight: bold;padding-bottom: 15px;border-bottom:#ddd 1px solid;text-align: center;">长按关注
                                                        <span style="color:#54C058" id="guanzhu">互联</span>公众号</h1>
                                                <dl style="margin-top:15px;text-align: center;">
                                                        <dt>
                                                                <img src="" id="inkeimgs" style="width:100%;height:100%;"></dt>
                                                        <dd style="color:#ccc;line-height: 30px">关注后可收到选手直播动态</dd></dl>
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
                                        <script type="text/javascript">//排行
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
                                       
                                        <script type="text/javascript">function jvli() {
                                                        return '0';
                                                }
                                                function zuobiao() {
                                                        return 'null';
                                                }</script>
                                        <!-- 拉票-->
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
                                        <!--投票提示 -->
                                        <!--div id="vote_notice" class="myDiv" style="display:none">投票成功</div-->
                                        <div id="notice_vote" style="z-index:99;left:50%;top: 30%;width:250px; line-height:40px;color:#fff; font-size:18px;  border-radius: 9px;  background-color: #2dcc70; text-align:center; font-family:&#39;微软雅黑&#39;;margin-left:-125px!important;margin-top:-60px!important;position:fixed!important;display:none">投票成功</div>
                                        <div id="notice_votes" style="z-index:99;left:50%;top: 30%;width:250px; line-height:40px;color:#fff; font-size:18px;border-radius: 9px;  background-color: #2dcc70; text-align:center; font-family:&#39;微软雅黑&#39;;margin-left:-125px!important;margin-top:-60px!important;position:fixed!important;display:none">本地人</div>
                                        <div id="no_follow" style="z-index:99;left:48%;top: 30%;width:315px;height:40px; line-height:40px;margin-left:-150px;margin-right:150px;margin-top:-60px;position:fixed;display:none"></div>
                                        <div id="bg" class="bg" style="display:none;"></div>
                                        <div style="clear: both;height: 60px;"></div>
										
										
										
										
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
										
										
										
										
										
										
										
										
										
										
										
										
										
                                        <script>//计算高宽
                                                window.onload = function() {
                                                        var alii = document.getElementsByTagName('ol');
                                                        var aHeighti = {
                                                                L: [],
                                                                C: [],
                                                                R: []
                                                        };
                                                        var h1 = document.body.scrollWidth;
                                                        var hee = h1 * 0.038;
                                                        for (var i = 0; i < alii.length; i++) {
                                                                var iNowi = i % 2;
                                                                switch (iNowi) {
                                                                case 0:
                                                                        alii[i].style.left = '1%';
                                                                        aHeighti.L.push(alii[i].offsetHeight);
                                                                        var step = Math.floor(i / 2);
                                                                        if (!step) {
                                                                                alii[i].style.top = 0;
                                                                        } else {
                                                                                var sum = 0;
                                                                                for (var j = 0; j < step; j++) {
                                                                                        sum += aHeighti.L[j] + hee;
                                                                                }
                                                                                alii[i].style.top = sum + 'px';
                                                                        }
                                                                        break;
                                                                case 1:
                                                                        alii[i].style.left = '52%';
                                                                        aHeighti.C.push(alii[i].offsetHeight);
                                                                        var step = Math.floor(i / 2);
                                                                        if (!step) {
                                                                                alii[i].style.top = 0;
                                                                        } else {
                                                                                var sum = 0;
                                                                                for (var j = 0; j < step; j++) {
                                                                                        sum += aHeighti.C[j] + hee;
                                                                                }
                                                                                alii[i].style.top = sum + 'px';
                                                                        }
                                                                        break;
                                                                }
                                                                //计算分页的位置
                                                                if (i == alii.length - 1) {
                                                                        var prev_top = alii[i - 1].style.top;
                                                                        var prev_height = alii[i - 1];
                                                                        var h = $(prev_height).height();
                                                                        //取分页上一个ol的高度
                                                                        var top = prev_top.substring(0, prev_top.length - 2);
                                                                        top = parseInt(top);
                                                                        //投票选项超过1个,分页也是ol标签不算一个
                                                                        if (alii.length > 2) {
                                                                                var prev_top_1 = alii[i - 2].style.top;
                                                                                var prev_height_1 = alii[i - 2];
                                                                                var h1 = $(prev_height_1).height();
                                                                                var top1 = prev_top_1.substring(0, prev_top_1.length - 2);
                                                                                top1 = parseInt(top1);
                                                                                //投票选项只有一个
                                                                        } else {
                                                                                var top1 = alii[i].style.top;
                                                                                var top1 = top1.substring(0, top1.length - 2);
                                                                                var ph = alii[i];
                                                                                var h1 = $(ph).height();
                                                                        }
                                                                        if (top == top1) {
                                                                                he = h1 > h ? h1: h;
                                                                                alii[i].style.top = (top + parseInt(he) + 30) + 'px';
                                                                        } else if (top + parseInt(h) > top1 + parseInt(h1)) {
                                                                                alii[i].style.top = (top + parseInt(h) + 30) + 'px';
                                                                        } else if (top + parseInt(h) < top1 + parseInt(h1)) {
                                                                                alii[i].style.top = (top1 + parseInt(h1) + 30) + 'px';
                                                                        }
                                                                        alii[i].style.left = '1%';
                                                                }
                                                        }
                                                }</script>
                                       
                                     
                                        <script type="text/javascript">//活动介绍我的投票展开收缩效果
                                                
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
                                                        if (Number("1") > 0) {
                                                                window.location.href = "<?php  echo $this->createMobileUrl('list',array('hdid'=>$_GPC['hdid']))?>&id=" + id;
                                                                return;
                                                        }
                                                        
                                                       
                                                }
                                                //锚点
                                                function anchor() {
                                                        $("#TopTipHolder").show();
                                                        if ($("#TopTipHolder").css('height') == '0px') {
                                                                $("#TopTipClose").click(); //执行关闭
                                                                $("#TopTipHolder").css('height', '35px'); //弹出
                                                        }

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
                                                //搜索
                                                function search() {
                                                        $("#form_search").submit();
                                                }

                                                function change(type) {
                                                        var t = type ? type: 'new';
                                                        window.location.href = "<?php  echo $this->createMobileUrl('voindex',array('hdid'=>$_GPC['hdid']))?>&type=" + t + "#main";
                                                }
                                                //最新和全部切换
                                                <!-- $(function() { -->
                                                        <!-- var type = 'new' ? 'new': 'new'; -->
                                                        <!-- if (type == 'new') { -->
                                                                <!-- $("#new").addClass('hover'); -->
                                                                <!-- $("#all").removeClass('hover'); -->
                                                        <!-- } else { -->
                                                                <!-- $("#all").addClass('hover'); -->
                                                                <!-- $("#new").removeClass('hover'); -->
                                                        <!-- } -->
                                                <!-- }); -->
                                                //我的投票
                                                function show_record() {
                                                        $("#vote_record").toggle();
                                                }

                                                function show_desc() {
                                                        $("#desc").toggle();
                                                }

                                               </script>
											   
										<?php 	   
										$kaitime = strtotime($this->settings[0]['kaitime']);
										$endtime = strtotime($this->settings[0]['endtime']);
										if ($kaitime > time()) {
											
											
										}	   
																			   
										?>						   
											   
											   
                                        <script>var time = Number($('#djstime').val());
										var nowtime = '<?php  echo time();?>';
										var kaitime = '<?php  echo strtotime($this->settings[0]['kaitime']);?>';
                                                function djs() {
                                                        if (time < 0.1) {
                                                                $('#djs').html('已结束');
                                                                return;
                                                        }
														if(kaitime > nowtime){
														
														    $('#djs').html('活动未开始');
                                                            return;
														
														}
                                                        $str = '';
                                                        $d = parseInt(time / 86400);
                                                        $h = parseInt((time - ($d * 86400)) / 3600);
                                                        $i = parseInt((time - ($d * 86400) - ($h * 3600)) / 60);
                                                        $s = time - ($d * 86400) - ($h * 3600) - ($i * 60);
                                                        if ($d) {
                                                                $str += $d + ' 天 ';
                                                        }
                                                        $str += $h + ' 小时 ';

                                                        $str += $i + ' 分 ';

                                                        $str += $s.toFixed(1) + ' 秒 ';
                                                        $('#djs').html($str);
                                                        time = time - 0.1;
                                                }
                                                $(function() {
                                                        djs();
                                                        setInterval("djs()", 100);
                                                })</script>
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
												
												
                                       
                                </div>
                        </div>
                </div>
				
				
				
				
				
				
				
				
				
        <script>;</script><script type="text/javascript" src="http://wx.diouy.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=wei_vote"></script></body>
		                                
     
</html>