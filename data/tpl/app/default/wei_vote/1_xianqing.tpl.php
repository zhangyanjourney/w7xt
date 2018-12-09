<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_head_top', TEMPLATE_INCLUDEPATH)) : (include template('common_head_top', TEMPLATE_INCLUDEPATH));?>
  <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/conn.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/rank.css"> -->
   <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/list.css">
    
  <style type="text/css">
       #xiana
       {
           margin-bottom: 60px;
		   text-align: center;
		   background: #DDDDD4;
		   /*margin-top: 10px;*/
		   height: 40px;
		   line-height: 40px;
       }
       #xiana a{
       color: #666;
       }
     
      #subt{
      display:none;
      }
      #zui{

        display:none;
        color:#F00;


        position: fixed;
        left: 50%;
        top: 40%;
        z-index: 2;
        width: 218px;
        height: 100px;
        border-radius: 8px;
        margin: -64px 0 0 -114px;
        background: #888888;
        line-height: 100px;
        text-align: center;
        font-size: 12px;
        color: #fff;

        
		
      }
	  
	  
	  #vote {
    margin-top: 0px; 
}
	  
.ui-panel {
    <!-- background-color: #fff; -->
}
.ui-panel {
    overflow: hidden;
     margin-bottom: 10px;
}


.list-title {
       padding: 18px 0 0px 0;
}


.list-title .tit {
    width: 181px;
    height: 32px;
    background: url(<?php echo TEMPLATE_PATH;?>/images/title.png) no-repeat;
    background-size: 181px auto;
    margin: 0 auto;
    font-size: 18px;
    color: #fff;
    line-height: 28px;
    text-align: center;
    margin-bottom: 5px;
}



#prize {
    margin-bottom: 60px;
    overflow: hidden;
    padding: 5px 10px;
}
	  
	  
	  
	#prize {
    margin-top: 0px; 
}  
	  
	  
	#prize {
  margin-bottom: 0px; 
    overflow: hidden;
    padding: 5px 10px;
}  
.top-p3 a{
    color: #e95b56;
    font-size: 15px;
    float: right;
    margin-right: 15x;
    font-family: Microsoft YaHei;
}	  
	  
  </style>
</head>
<body>



<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_head', TEMPLATE_INCLUDEPATH)) : (include template('common_head', TEMPLATE_INCLUDEPATH));?>


  
   <?php  if($peiz[0]['huodong_sm'] != '') { ?>
    <div id="Voting">
        <!-- <div class="Voting-title">立刻报名</div> -->
		
		 <section id="free-read" class="ui-panel">         
			<div class="list-title">             
			    <div class="tit">活动说明</div>            
			    
			</div>        
	
		</section>
        <div class="Voting-Content">
           <?php  echo html_entity_decode($peiz[0]['huodong_sm'], ENT_QUOTES)?>
        </div>
       <!--  <div class="Voting-participate">
          <div class="Voting-participate-d"><a href="<?php  echo $this->createMobileUrl('weiindex',array('type'=>'uids'))?>">我也要参加</a></div>
        </div> -->
    </div>
    <?php  } else { ?>

    <?php  } ?>
	
	
	
	<?php  if($peiz[0]['weng_x'] != '') { ?>
    <div id="prize">
        
        <!-- <div class="Voting-title">温馨提示</div> -->
         <section id="free-read" class="ui-panel">         
			<div class="list-title">             
			    <div class="tit">温馨提示</div>            
			    
			</div>        
	
		</section>
        <div class="Voting-Content">
            <?php  echo html_entity_decode($peiz[0]['weng_x'], ENT_QUOTES)?>
        </div>
      
    </div>
    <?php  } else { ?>

    <?php  } ?>

   <?php  if($peiz[0]['jian_p'] != '') { ?>
     <div id="reminder">
        <!-- <div class="Voting-title">活动奖品</div> -->
		 <section id="free-read" class="ui-panel">         
			<div class="list-title">             
			    <div class="tit">活动奖品</div>            
			    
			</div>        
	
		</section>

        <div class="Voting-Content">
            <?php  echo html_entity_decode($peiz[0]['jian_p'], ENT_QUOTES)?>
        </div>
    </div>
       <?php  } else { ?>

    <?php  } ?>                        
   


<script type="text/javascript">
    function showCover()
    {
        $("#favor_weixin").show();
        $("#wx-cover").show();
    }
    function hideCover()
    {
        $("#favor_weixin").hide();
        $("#wx-cover").hide();
    }

	
	
	
</script>





<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_foot', TEMPLATE_INCLUDEPATH)) : (include template('common_foot', TEMPLATE_INCLUDEPATH));?>