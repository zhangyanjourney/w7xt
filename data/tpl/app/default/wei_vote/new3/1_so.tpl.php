<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_head_topnew', TEMPLATE_INCLUDEPATH)) : (include template('common_head_topnew', TEMPLATE_INCLUDEPATH));?>
  <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/conn.css">
  <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/rank.css">

  <style type="text/css">
       #xiana
       {
       margin-bottom: 40px;
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
	  #canyu{
	    padding:10px;
		
	  }
	  #canyu span{
	    width:100%;
		height:30px;
		text-align:center;
		line-height: 30px;
	  }
	  #wsp{
	  margin-bottom:50px;
	  }
	  
	  #no, #lian-no, #shouno, #feifano, #zui {
    display: none;
    color: #F00;
    position: fixed;
    left: 50%;
    top: 40%;
    z-index: 2;
    width: 218px;
    height: 100px;
    border-radius: 8px;
    margin: -64px 0 0 -114px;
    line-height: 100px;
    text-align: center;
    font-size: 12px;
    color: #fff;
    opacity: 0.9;
    background: #3A3232;
}
	  
	.top-p3 a {
    color: #333333;
  
}
.mui-input-row .mui-btn+input, .mui-input-row label+input, .mui-input-row:last-child {

    height: 34px;
}  
.vote-number-p1, .vote-number-p2, .vote-number-p3 {
    color: #555;
}
.top-p3 a {
    color: #333333;
}	  
  </style>
</head>
<body>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_headnew', TEMPLATE_INCLUDEPATH)) : (include template('common_headnew', TEMPLATE_INCLUDEPATH));?>


    <div id="search" class="w">
       
                <div class="">
              <form id="fo1" action="<?php  echo $this->createMobileUrl('so',array('hdid'=>$_GPC['hdid']))?>" method="post">
         
<div class="mui-input-row mui-search">
    <input type="search" class="mui-input-clear" name="name" placeholder="按姓名或者编号搜索">
</div>
              </form>   
        </div>  
     
    </div>
   
 <div id ="canyu">
      <span>搜索结果</span>
    </div>
                                  
    <div id="wsp">
             <div id="rank-2" class="one" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
                   
                            <ul class="lie">
                                  
										<?php  if(is_array($res)) { foreach($res as $i => $item) { ?>
										<li class="rank-1-li">
                                            <a href="<?php  echo $this->createMobileUrl('list',array('hdid'=>$_GPC['hdid'],'id'=>$item['id']))?>">
                                                  <div class="rank-lt">
                                                      <span class="rank-lt-s hs"><?php  echo $i+1; ?><i class="bg<?php  echo $i+1; ?>"></i></span>
                                                        <?php 
															$item['tupian'] = str_replace("&quot;","",$item['tupian']);
														        $item['tupian'] =  htmlspecialchars_decode($item['tupian']);
														        $item['tupian'] = stripslashes($item['tupian']);
														        $he = (explode(",",$item['tupian'])); 
                                                                $f = $he['0'];
                                                                  //$f = substr($he['0'],1);
																  $f = $f;
														?>
                                                       <div class="rank-lt-d"><img src="<?php  echo tomedia($f);?>"></div>
                                                        <div class="rank-lt-w">
                                                          <p class="rank-lt-p1"><?php  echo $item['name'];?></p>
                                                          <p class="rank-lt-p2">投票编号：<strong class="s1"><?php  echo $item['bh'];?></strong></p>
                                                        </div>
                                                  </div>
                                                  <div class="rank-rt">
                                                     <!-- <span class="rank-rt-b"></span><span class="rank-rt-s"><?php  echo $item['piao'];?></span> -->
                                                      <?php 
								 if($item['piao']>999){
								   
									 $mx = $item['piao']%999;
									 $zx = floor($item['piao']/999);
									 
									 echo " <img src='".$_W['siteroot']."addons/wei_vote/template/style/images/1.png'>".$item['piao']."";
								 }else{
								     $mx = $item['piao'];
									 $zx = 0;
								  echo " <img src='".$_W['siteroot']."addons/wei_vote/template/style/images/1.png'>".$item['piao']."";
								 }
							 
							 
							 ?>
                                                  </div>
                                            </a>
                                        </li>
										<?php  } } ?>
										
                            </ul>
                
            
    </div>
    
</div>
<span id="no" class="ok1"></span>
<span id="zui" class="ok1"></span>
<div id="loading" style="position:fixed;display:none;z-index:2000;top:0px;left:0px;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.2);"></div>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/zepto.20140212.js"></script>
<script type="text/javascript">
  $(function(){
  
       $('#search-but').click(function(){
          var t =  $('#search-inp').val();
          var reg1 = /^\s*[\u4e00-\u9fa5]{1,5}\s*$/;
          var result1 = reg1.test(t);
          
           var reg =/^\d{1,6}$/;
           var result = reg.test(t);
          if(t == ''){ 
          
                   $('#loading').css('display','block');
                           
                               $("#zui").css("margin","-"+$("#no").height()/2+"px 0 0 -"+$("#no").width()/2+"px");
                               $("#zui").show().html('请填写内容');

                               
                             
                               setTimeout(function() {
                               $("#zui").css('display','none');
                               $('#loading').css('display','none');
                              
                               },2000);
          
               }
          else if (result1){
            
               
               document.getElementById("subt").click();    
             
                
           //document.getElementById("subt").click();
             //$('#fome1').submit();
             
          }else if(result){
             
              
             
               document.getElementById("subt").click();    
           
           
          
        }else{
                 
             
                      $('#loading').css('display','block');
                           
                      $("#zui").css("margin","-"+$("#no").height()/2+"px 0 0 -"+$("#no").width()/2+"px");
                      $("#zui").show().html('请填写姓名或编号');

                               
                             
                      setTimeout(function() {
                      $("#zui").css('display','none');
                      $('#loading').css('display','none');
                              
                      },2000);
        
        } 
        
      
      });
  
  });




</script>




<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew', TEMPLATE_INCLUDEPATH));?>