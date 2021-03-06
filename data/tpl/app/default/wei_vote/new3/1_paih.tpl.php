<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_head_topnew', TEMPLATE_INCLUDEPATH)) : (include template('common_head_topnew', TEMPLATE_INCLUDEPATH));?>
    <link href="<?php echo TEMPLATE_PATH;?>css/animate.min.css" rel="stylesheet" />
  <script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/leftTime.min.js"></script>
 
    <style>
	
	
	
	/*微信风格*/
@active_color_red:#44b549;
@active_color:#44b549;
@normal:#44b549;
@active_btn_br:#89e88d;
@heart_big:#44b549;
@heart_small:#89e88d;



.bb { background: #f6f6f6; margin: 0 auto; }
img { width: 100%; max-width: 640px; }
.center { max-width: 640px; width: 100%; height: 100%; margin: 0 auto; }
.fr { float: right; }
.fl { float: left; }
.fix { clear: both; }
.btn { display: inline-block; background: @normal; color: #fff; border-radius: 3px; padding: .8rem; font-size: .85rem; }
.btn:active { background: #555; color: #f5f5f5; }
.btn:visited { background: @normal; color: #fff; }
.btn2d { display: inline-block; background: @normal; color: #fff; border-radius: 3px; padding: .8rem; font-size: .85rem; border-bottom: 3px solid @active_btn_br; border-right: 1px solid @active_btn_br; }
.btn2d:active { background: #555; border-bottom: 3px solid @active_color; color: #f5f5f5; }
.btn2d:visited { background: @normal; color: #fff; }
/*顶部滚动文字#ffd800*/
.NoticeTop { display:table; width:100%; height:36px;line-height:36px; background:@normal;color:#fff;}
.NoticeTop i { display:table-cell;vertical-align:middle; text-align:center;font-size:1.3rem;padding:0 0.6rem;color:#fff }
.NoticeTop marquee { display:table-cell;vertical-align:middle; width:95%; }
/*首页-轮播图滚动小点*/
.swiper-wrapper, .swiper-slide { height: auto !important; }
.swiper-pagination-bullet-active { background: @active_color !important; }
/*头部标题栏*/
.ctr { max-width: 640px; width: 100%; margin: 0 auto; }
.ctr .top { height: 40px; line-height: 40px; box-shadow: 0px 0px 3px #aaa; background: #fff; }
.ctr .top a { color: #333; }
.ctr .top .h_left { display: inline-block; width: 10%; float: left; height: 40px; line-height: 40px; text-align: center; font-size: 1rem !important; }
.ctr .top .h_left i.iconfont { font-size: 1rem; }
.ctr .top .h_title { display: inline-block; width: 80%; text-align: center; word-break: keep-all; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.ctr .top .h_right { display: inline-block; width: 10%; float: right; height: 40px; line-height: 40px; text-align: center; }
/*首页-头部搜索框*/
.search { opacity: .8; position: fixed; z-index: 99; top: 10px; height: 35px; width: 100%; max-width: 640px; display: table-cell; text-align: center; }
.search input { font-size: 14px; width: 70%; height: 35px; border-radius: 50px; border: 1px solid #ddd; padding: 0 1rem; }
.search i { position: fixed; top: 11px; display: inline-block; width: 40px; z-index: 999; height: 35px; font-size: 1.2rem; margin-left: -45px; }
.music i{ color:@active_color_red }

/*统计*/
.tongji { margin: .6rem 0; }
.tongji li { list-style-type: none; display: inline-block; float: left; width: 33%; height: auto; text-align: center; color: #555; }
.tongji li:nth-child(2n) { border-left: 1px solid #ddd; border-right: 1px solid #ddd; }
.tongji li label { display: block; color: #222; }
/*个人页面统计*/
.detail_tongji i { font-size: 1.3rem; display: inline-block; vertical-align: middle; }
.detail_tongji li:nth-child(2n) { border-left: none; }
.detail_tongji li { width: 24.5%; border-right: 1px solid #ddd; }
.detail_tongji li:last-child { border-right: none; }

/*充值页面*/
.pay .li { padding: .6rem; }
.pay .info { height: 92px; }
.pay .info td { padding: .6rem; background: #fff; border-bottom: 10px solid #f6f6f6; }
.pay .info td:first-child { width:62px;}
.pay .info img { border-radius: 100%; width: 62px; max-height: 62px; padding:0 .6rem; float: left; }
.pay .detail { padding: .3rem; }
.pay .desc { background: #fff; padding: .6rem;padding-top:0; }
.pay .zuan { display: inline-block; width: 33.33%; float: left; }
.pay .zuan .cur { background: @active_color_red; color: #fff; border: 1px solid @active_color_red; }
.pay .zuan div { font-style: oblique; font-size: 1.2rem; color: @active_color_red; margin: .3rem; border: 1px solid #ddd; padding:.3rem .6rem; border-radius: 3px; text-align: center; }
.pay .zuan div label { font-size: .7rem; font-style: normal; margin-left: .3rem; }
.pay #zuaninput { border: 1px solid #ddd; border-radius: 3px; width: 80%; padding: .6rem; }
.follow { border:1px dotted @active_color_red;margin:.3rem;border-radius:3px;padding:3px;background:#f6f6f6}
/*报名*/
.chooseSex i.cur { border: 1px solid @active_color; color: @active_color; }
.agree {color:#999}
.agree i { font-size:1.2rem; display:inline-block;float:left; margin-top:-4px}
.agree .cur {color:@active_color}

/*首页活动介绍*/
.index_desc_title { height: 35px; line-height: 35px; background: #eee; border-top: 1px dashed #ddd; padding-left: .6rem; }
.index_desc_title i { font-size: 1.1rem; vertical-align: middle; line-height: 32px; padding-right: 2px; }
.desc_content { padding: .6rem; }
.desc_content img { width: 100%; max-width: 640px; }
	
	
	
	
	
	
	
	
	
	
        table { width: 100%; }
        .li { padding: .0rem; }
        .info { height: 62px; }
        .info td { padding: 1rem .6rem .6rem; background: #fff; border-bottom: 10px solid #f6f6f6; }
        .info img { border-radius: 100%; width: 62px; max-height: 62px; float: left; position: relative; z-index: 2; }
        .detail .name { font-weight: bold; color: #555; font-size: 1rem; }
        .detail div { line-height: 25px; color: #777; font-size: .75rem; }
        .imperialcrown { display: block; position: absolute; z-index: 1; font-size: 2rem; width: 62px; text-align: center; margin-top: -29px; color: #c9c9c9; }
        .ranknumber { font-size: 1.2rem; color: #555; }

        .qs .imperialcrown { color: #ffd823; }
        .qs .ranknumber { color: red; font-weight: bold; }

        .no { color: #999; font-size: .65rem; font-weight: normal; }
        .desc { max-width: 640px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; }
		
		
		
		
		.tabs { margin: .6rem 0; margin-top: 0; background: #fff; /*box-shadow: -1px -3px 3px #e4e4e4;*/ }
.tabs li { list-style-type: none; display: inline-block; float: left; width: 50%; height: auto; text-align: center; padding: .6rem 0; color: #555; }
.tabs li i.iconfont { font-size: 1.2rem; line-height: .7rem; vertical-align: middle; }
.tabs li.cur { color: @normal; border-bottom: 1px solid @normal; }

		
	.info img {
 
    height: 62px;
   
}	
	.detail .name {
  
    font-size: 1.5rem;
}	
.detail div {
   
    font-size: 1rem;
}
.ranknumber {
    font-size: 1.7rem;
  
}

.tabs li i.iconfont {
   
   
}
.tabs li i.iconfont {
    font-size: 1.8rem;

}
.detail div {
    font-size: 1.4rem;
}
.mui-content {
    background-color: #6f2dff;
    -webkit-overflow-scrolling: touch;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: auto;
}
#dateShow1 strong{border:#CCC 1px solid;background:#FFF;color:#999;line-height:40px;font-size:14px;padding:5px 10px;margin:0 5px;border-radius:3px;box-shadow:1px 1px 1px rgba(0,0,0,0.1);}

#dateShow1 {
    margin: 0 auto;
    width: 100%;
    text-align: center;
	
	
}
.daytime {
    color: #fff;
    line-height: 24px;
	margin-top:10px
	}
    </style>
</head>
<body class="bb">

<div class="mui-content">

    <div class="ctr">
       <!--  <div class="tabs">
            <ul style="padding: 0px;">
                <li style="width:100%" class="cur" data-type="piao"><i class="iconfont icon-piaoshu"></i>票榜</li>
                
            </ul>
            <div class="fix"></div>
        </div> -->
		<div class="data-show-box bg56" id="dateShow1">
<div class="daytime">活动结束倒计时</div>
	    					<strong><span class="date-tiem-span d">00</span>天</strong>
	    					<strong><span class="date-tiem-span h">00</span>时</strong>
	    					<strong><span class="date-tiem-span m">00</span>分</strong>
	    					<strong><span class="date-s-span s">00</span>秒</strong>
	    				</div>
<script type="text/javascript">
	    			$(function(){
	    				//日期倒计时
						$.leftTime("<?php  echo $this->settings['0']['endtime']?>",function(d){
							if(d.status){
								var $dateShow1=$("#dateShow1");
								$dateShow1.find(".d").html(d.d);
								$dateShow1.find(".h").html(d.h);
								$dateShow1.find(".m").html(d.m);
								$dateShow1.find(".s").html(d.s);
							}
						});
	    			});
	    		</script>
	</div>
  <div class="center">
        <div class="li">
        
		
				<style>
		
.pd-10 {
    padding: 1px;
}
.bg-purple3 {
    background-color: #6f2dff !important;
}
.paihang2 {
    margin-bottom: 0px;
}		
.paihang2 .datalist {
    border-radius: 4px;
    background: #fff;
    width: 100%;
    margin-bottom: 10px;
}
.paihang2 .datalist {
    margin: 0 auto;
    margin-top: 10px;
    width: 95%;
    height: 100px;
}
.paihang2 .datalist .tops {
    position: relative;
    height: 92px;
}

.paihang2 .datalist .tops .itemhg {
    position: absolute;
    top: 0;
    left: 0;
    width: 70px;
    height: 70px;
    text-align: center;
}
.paihang2 .datalist .tops .itemhg img {
    margin-top: 6px;
    width: 30px;
}

.paihang2 .datalist .tops .item1 {
    position: absolute;
    top: 0;
    left: 0;
    width: 70px;
    height: 70px;
    text-align: center;
}

.paihang2 .datalist .tops .item1 img {
    margin-top: 22px;
    height: 50px;
    width: 50px;
    border-radius: 1000px;
}


.paihang2 .datalist .tops .item2 {
    position: absolute;
    top: 13px;
    right: 75px;
    left: 75px;
    overflow: hidden;
    height: 70px;
    color: #727272;
    line-height: 22px;
}
.cl-yellow {
    color: #fbc108 !important;
}
.paihang2 .datalist .tops .item3 {
    position: absolute;
    top: 20px;
    right: 8px;
    color: #444;
    text-align: center;
    font-size: 20px;
    line-height: 50px;
}
@media (-webkit-min-device-pixel-ratio: 2)
.paihang2 .datalist .bottoms {
    position: relative;
    border: 0 none;
}
.paihang2 .datalist .bottoms {
    margin: 0 auto;
    margin-top: 5px;
    width: 96%;
    border-bottom: 1px #d7d7d7 solid;
}
		
		</style>
		
		
		
		
	
	
	
	
	
	<?php  if(is_array($liwujilu)) { foreach($liwujilu as $ii => $it) { ?>
	
	  
		<?php 
		     $item['tupian'] =$it['tupian'];
			$item['tupian'] = str_replace("&quot;","",$item['tupian']);
			$item['tupian'] =  htmlspecialchars_decode($item['tupian']);
			$item['tupian'] = stripslashes($item['tupian']);
			$he = (explode(",",$item['tupian'])); 
            $f = $he['0'];
                                                          
		?>
	 <div class="paihang2 pd-10 bg-purple3"> 
			   <div class="datalist" undefined=""> 
				<a href="<?php  echo $this->createMobileUrl('list',array('type'=>'uids','id'=>$it['id'],'hdid'=>$_GPC['hdid']))?>"> 
				 <div class="tops">
				  <div class="itemhg">
				   <img src="<?php echo TEMPLATE_PATH;?>/images/hg1.gif" />
				  </div>
				  <div class="item1">
				   <img src="<?php  echo tomedia($f);?>" />
				  </div>
				  <div class="item2">
				   <div style="font-size:15px;font-weight:bold">
					<?php  echo $it['name']?>&nbsp;&nbsp;<?php  echo $it['bh']?>号
				   </div>
				   <div class="cl-yellow">
					票数 <?php  echo $it['piao']?>&nbsp;&nbsp;<!--  礼物 0.01点 -->
				   </div>
				   <div class="cl-999">
					<?php  echo $it['feifa']?>
				   </div>
				  </div>
				  <div class="item3" style="color:#FC573D;">
				   <?php  echo $ii+1?>
				  </div>
				 </div></a>
				<div class="bottoms"></div>
			   </div>
  
    </div> 
	<?php  } } ?>
	
	
	
		
		
		
		
		
            <div id="table_zuan" class="table" style="display: none;"></div>
            <div style="clear: both; text-align: center; margin: 1rem 0" id="more"></div>
        </div>
        
        <div class="navheight">&nbsp;</div>

    </div>

</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew', TEMPLATE_INCLUDEPATH));?>