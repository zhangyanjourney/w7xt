<?php defined('IN_IA') or exit('Access Denied');?> <style>
.hdp_ul{


    position: absolute;
    left: 0px;
    top: 0px;

}
.hdp_ul li{
float:left;

}
#hdp{
width: 100%;
    overflow: hidden;
    position: relative;

}


.vote-number {
    margin-top: 7px;
    width: 33.33%;
    height: 55px;
    float: left;
    line-height: 23px;
}
.vote-number p {
    font-size: 14px;
    text-align: center;
    font-family: "微软雅黑";
}

.vote-number p {
    font-size: 14px;
    text-align: center;
    font-family: "微软雅黑";
	line-height: inherit;
}
rank.css:98
.vote-number-p1, .vote-number-p2 {
    color: #ec5353;
}

</style>
 <style>
.vote-numberbd {
   
    border-right: 1px solid #CCC;
}
.vote-number {
   
    height: 45px;
   
}
.vote-number p {
   font-size: 12px;
  
} 

</style>
<?php  

if(empty($this->settings[0]['keyword'])){
					
					$this->settings[0]['keyword'] = $this->createMobileUrl('Gz', array());;
					
}
?>
<!--  <div id="top" class="w">
       <span class="top-p1">专题活动来自</span>
       <span class="top-p2"><?php  echo $_W['uniaccount']['name'];?></span>
       <span class="top-p3"><a href="<?php  echo $this->settings[0]['keyword']?>">微信关注</a></span>
    </div> -->
	<?php 
	   $touimg = tomedia($this->settings[0]['touimg']);
	   $aa = @getimagesize($touimg);
	   $height = $aa["1"];
	 
	?>
   <div id="hdp" style="height: <?php  echo $height?>px;overflow:hidden" class="w">
	      <ul class="hdp_ul">
		    <?php  if($this->settings[0]['touimg'] != '') { ?>
			<li><img id="imageId" style="display:block" src="<?php  echo tomedia($this->settings[0]['touimg'])?>"></li>
			<?php  } else { ?>

			<?php  } ?>
		   <?php  if($this->settings[0]['singleimage1'] != '') { ?>
			<li><img style="display:block" src="<?php  echo tomedia($this->settings[0]['singleimage1'])?>"></li>
			<?php  } else { ?>

			<?php  } ?>
			 <?php  if($this->settings[0]['singleimage2'] != '') { ?>
			<li><img style="display:block" src="<?php  echo tomedia($this->settings[0]['singleimage2'])?>"></li>
			<?php  } else { ?>

			<?php  } ?>
			 <?php  if($this->settings[0]['singleimage3'] != '') { ?>
			<li><img style="display:block" src="<?php  echo tomedia($this->settings[0]['singleimage3'])?>"></li>
			<?php  } else { ?>

			<?php  } ?>
			 <?php  if($this->settings[0]['singleimage4'] != '') { ?>
			<li><img style="display:block" src="<?php  echo tomedia($this->settings[0]['singleimage4'])?>"></li>
			<?php  } else { ?>

			<?php  } ?>
		    
		  </ul>
         
    </div>
	
	<script>
   
		$("#imageId").load(function(){
 
			

		 var clwidth = document.body.clientWidth;
		//var len = $(".hdp_ul").children("li").length;
		var len = $(".hdp_ul").children().length;
		
		 var zwidth = clwidth*len; 
		$(".hdp_ul li").width(clwidth);
        var ht = $(".hdp_ul li").height();
		if(ht==0){
		   ht=135;
		}
		$(".hdp_ul").width(zwidth);
		$("#hdp").height(ht);
		
	    
		
     	var z =0;
		
		
		setInterval(function(){ 

         	     ++z;
			 var lens = $(".hdp_ul").children().length;
			 //console.log(clwidth);
			 var m = lens-1;
			
			if(z>m){
			 
			  //$(".hdp_ul").css("left","0");
			   $(".hdp_ul").animate({left:0});
			  z =0;
			}
			var cc = clwidth*z*-1
		      $(".hdp_ul").animate({left:cc});



		}, 4000);
	
	});

</script>
	
	
     <div id="vote" class="w">
          <div class="vote-number vote-numberbd">
            <p>参与人数</p>
            <p class="vote-number-p1"><?php  echo $user_total+$this->settings[0]['censai'] ?></p>
          </div>
          <div class="vote-number vote-numberbd">
            <p>投票总数</p>
            <p class="vote-number-p2"><?php  echo $piao_total+$this->settings[0]['toupiaorenshu'] ?></p>
          </div>
          <div class="vote-number">
            <p>浏览人数</p>
            <p class="vote-number-p3"><?php  echo $this->settings[0]['liulan']+$this->settings[0]['liulanrenshu'] ?></p>
          </div>

    </div>