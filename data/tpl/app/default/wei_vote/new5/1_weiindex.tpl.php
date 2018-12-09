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
				<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/jquery-2.1.3.min.js"></script>
					<script src="<?php echo TEMPLATE_PATH;?>js/exif.js"></script>
                <style>
				.upload_box .upload_list .upload_item,.upload_box .upload_list .upload_action{width:94px;float:left;position:relative;display:-webkit-box;-webkit-box-pack:center;-webkit-box-align:center;border:solid 5px #fff;-webkit-box-sizing:border-box;overflow:hidden}.upload_box .upload_list .loading_item{background:url(/tpl/static/voteimg/img/upimg_loading.gif) 0 0 no-repeat;background-size:cover}.upload_box .upload_action #fileImage{opacity:0;position:absolute;left:0;top:0;width:100%;height:100%}.upload_box .upload_item img{max-width:100%;max-height:100%;display:none}.upload_box .upload_action img{display:block;width:100%}.upload_box .upload_list .upload_item .upload_delete{position:absolute;top:0;right:0;width:20px;height:20px;line-height:20px;background:url(<?php echo TEMPLATE_PATH;?>new5/upimg_x.png) no-repeat;background-size:cover}.upload_box .upload_item_hide{opacity:0;-webkit-transition:opacity 1s} #baoming {width: 80%;height: 40px;margin-top: 20px;background-color: #2dcc70;border: 1px #ccc solid;border-radius: 4px;color: #fff;font-family: "Microsoft YaHei";/* font-weight: bold; */font-size: 14px;} #faq ul{margin: 0;padding: 0;display: inline;} #faq li{line-height: 30px;padding: 0 0 5px 22px;border-bottom:1px #ccc solid;height:30px;} #alert_box{width: 45%;margin-left: 30%;margin-top:-20px;} #but01{width:50px;background-color: #2dcc70;border: 1px #ccc solid;border-radius: 4px;color: #fff; margin-left: 30%;margin-bottom: 20px;} #show_mes{font-size:16px}
				
				
				#file {
				visibility:hidden;
				}
				#view li{
				cursor: pointer;
					display: inline-block;
					float: left;
					margin: .3rem;
					height: 50px;
					width: 50px;
					border: 1px solid #ddd;
					text-align: center;
					line-height: 45px;
					background: #fff;
					font-size: 30px;
					color: #999; position: relative;
				}
					#view li {
   
							overflow: hidden;
						}
				</style>
				
				</head>
        
        <body id="body" style="background-color:#fff;">
                <div id="div">
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
                        <div style="clear:both"></div>
                        <div id="baodiv1">
                                <form method="POST" action="#" enctype="multipart/form-data" id="apply">
                                        <div id="up_from">
                                                <label for="textfield"></label>
                                                <input type="text" name="vote_title" id="vote_title" class="sec_input" maxlength="15" placeholder="输入<?php  echo $this->settings[0]['xingming']?>"></div>
                                        <div id="up_from" style="height:auto">
                                                <label for="textarea"></label>
                                                <textarea name="introduction" id="introduction" cols="45" rows="5" class="baotext" placeholder="输入自我介绍，个人详情!最多1000字..."></textarea>
                                        </div>
                                        <div id="up_from">
                                                <label for="textfield2"></label>
                                                <input type="text" name="contact" id="contact" class="sec_input" placeholder="联系电话"></div>
												
												
										 <?php  if($this->settings[0]['zidingyi1'] != '') { ?>
										 
										  <div id="up_from">
                                                <label for="textfield1"></label>
                                                <input type="text" name="zidingyi1" id="zidingyi1" class="sec_input" placeholder="<?php  echo $this->settings[0]['zidingyi1']?>"></div>
										
									
										<?php  } ?>		
												
											 <?php  if($this->settings[0]['zidingyi2'] != '') { ?>
										 
										  <div id="up_from">
                                                <label for="textfield2"></label>
                                                <input type="text" name="zidingyi2" id="zidingyi2" class="sec_input" placeholder="<?php  echo $this->settings[0]['zidingyi2']?>"></div>
										
									
										<?php  } ?>		
												
										 <?php  if($this->settings[0]['zidingyi3'] != '') { ?>
										 
										  <div id="up_from">
                                                <label for="textfield2"></label>
                                                <input type="text" name="zidingyi3" id="zidingyi3" class="sec_input" placeholder="<?php  echo $this->settings[0]['zidingyi3']?>"></div>
										
									
										<?php  } ?>			
												
											 <?php  if($this->settings[0]['zidingyi4'] != '') { ?>
										 
										  <div id="up_from">
                                                <label for="textfield2"></label>
                                                <input type="text" name="zidingyi4" id="zidingyi4" class="sec_input" placeholder="<?php  echo $this->settings[0]['zidingyi4']?>"></div>
										
									
										<?php  } ?>		
												
												
												
												
												
                                        <input type="hidden" value="介绍禁用" name="manifesto">
                                        <div class="upload_box"><input required="" onchange="handleFiles(this);" type="file" id="file" multiple="" accept="image/*">
															
													<ul style="width:80%;overflow:hidden;margin: 0 0 0 8%;" class="upload_list clearfix" id="upload_list">
															
														  <li style="margin: 0 0 0 2%;" onclick="shangctp()" class="upload_action">
																	<img id="_box" src="<?php echo TEMPLATE_PATH;?>new5/upimg.png" width="100px">
																	
															</li>
													</ul>
                                        </div>
                                        <!--图片上传--></form>
                        </div>
                        <input type="hidden" name="vote_id" value="1529">
                        <input type="hidden" name="token" value="rsgdok1521455348">
                        <div style="color:red;clear:both;width:100%;">请上传1-<?php  echo $this->settings[0]['zuiduotupian']?>张图片</div>
                        <button id="tijiao" style="margin-top:0px;" type="button">报名</button>
                        <br>
                        <br>
                       <div style="clear: both;height: 60px;"></div>
                   <canvas id="canvas1" style="display:none"></canvas>   
       
	                <div id="notice_vote" style="z-index:99;left:50%;top: 30%;width:250px; line-height:40px;color:#fff; font-size:18px;  border-radius: 9px;  background-color: #2dcc70; text-align:center; font-family:&#39;微软雅黑&#39;;margin-left:-125px!important;margin-top:-60px!important;position:fixed!important;display:none">投票成功</div>
                    <div id="notice_votes" style="z-index:99;left:50%;top: 30%;width:250px; line-height:40px;color:#fff; font-size:18px;border-radius: 9px;  background-color: #2dcc70; text-align:center; font-family:&#39;微软雅黑&#39;;margin-left:-125px!important;margin-top:-60px!important;position:fixed!important;display:none">本地人</div>
                    <div id="no_follow" style="z-index:99;left:48%;top: 30%;width:315px;height:40px; line-height:40px;margin-left:-150px;margin-right:150px;margin-top:-60px;position:fixed;display:none"></div>
                    <div id="bg" class="bg" style="display:none;"></div> 
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
	   
	   
                        <script>//锚点
                                function anchor() {
                                        $("#TopTipHolder").show();
                                        if ($("#TopTipHolder").css('height') == '0px') {
                                                $("#TopTipClose").click(); //执行关闭
                                                $("#TopTipHolder").css('height', '35px'); //弹出
                                        }
                                        return false;
                                }
                                function anchor_follow() {
                                        $("#fly_page").show();
                                        return false;
                                }
                              
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
                               
                            </script>
							
								<script type="text/javascript"> 
 
             
             function shangctp(){
			 
			 
                   $("#file").click();  
			 
			 
			 }
 </script>
<script type="text/javascript">

 function rotateImg(img, direction,canvas) {    
        //alert(img);  
        //最小与最大旋转方向，图片旋转4次后回到原方向    
        var min_step = 0;    
        var max_step = 3;    
        //var img = document.getElementById(pid);    
        if (img == null)return;    
        //img的高度和宽度不能在img元素隐藏后获取，否则会出错    
        var height = img.height;    
        var width = img.width;    
        //var step = img.getAttribute('step');    
        var step = 2;    
        if (step == null) {    
            step = min_step;    
        }    
        if (direction == 'right') {    
            step++;    
            //旋转到原位置，即超过最大值    
            step > max_step && (step = min_step);    
        } else {    
            step--;    
            step < min_step && (step = max_step);    
        }    
        //img.setAttribute('step', step);    
        /*var canvas = document.getElementById('pic_' + pid);   
        if (canvas == null) {   
            img.style.display = 'none';   
            canvas = document.createElement('canvas');   
            canvas.setAttribute('id', 'pic_' + pid);   
            img.parentNode.appendChild(canvas);   
        }  */  
        //旋转角度以弧度值为参数    
        var degree = step * 90 * Math.PI / 180;    
        var ctx = canvas.getContext('2d');    
        switch (step) {    
            case 0:    
                canvas.width = width;    
                canvas.height = height;    
                ctx.drawImage(img, 0, 0);    
                break;    
            case 1:    
                canvas.width = height;    
                canvas.height = width;    
                ctx.rotate(degree);    
                ctx.drawImage(img, 0, -height);    
                break;    
            case 2:    
                canvas.width = width;    
                canvas.height = height;    
                ctx.rotate(degree);    
                ctx.drawImage(img, -width, -height);    
                break;    
            case 3:    
                canvas.width = height;    
                canvas.height = width;    
                ctx.rotate(degree);    
                ctx.drawImage(img, -width, 0);    
                break;    
        }    
    } 





var t = new Array();
function handleFiles(obj) {

			votenotice('上传中...');
               
            var canvas, context, img, imgX = 0, imgY = 0, imgScale = 1;
            var files = obj.files;
			 var file = obj.files['0'];  
  //图片方向角 added by lzk  
  var Orientation = null;  

			EXIF.getData(file, function() {  
			  // alert(EXIF.pretty(this));  
			  EXIF.getAllTags(this);   
			  //alert(EXIF.getTag(this, 'Orientation'));   
			  Orientation = EXIF.getTag(this, 'Orientation');  
			  //return;  
			 console.log(Orientation); 
			 //alert(Orientation); 
			});
	        
			
		
			
			
			
			
			
			
			
			
			
			
			
			var total=5;
                     var n = $("#upload_list li").length-1;
                     var z = files.length;
             if ((n+z)><?php  echo $this->settings[0]['zuiduotupian']?>) {
                              
                      alert('图片超过数量') ;
                     return false;
                            };
			
			
			
			
			
			
            img = new Image();
            
            canvas = document.getElementById('canvas1');
            context = canvas.getContext('2d');

            window.URL = window.URL || window.webkitURL;
            if (window.URL) {
                img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
				//alert(img.src);
                img.onload = function (e) {
                    if (img.width >800) {
                        imgScale = 800 / img.width;
						//imgScale = 0.5;
                    }
                    canvas.width = img.width * imgScale;
                    canvas.height = img.height * imgScale;
                    context.drawImage(img, 0, 0, img.width, img.height, imgX, imgY, img.width * imgScale, img.height * imgScale);

					
					
					
					
					  if (navigator.userAgent.match(/iphone/i)) {  
                    console.log('iphone');  
                    //alert(expectWidth + ',' + expectHeight);  
                    //如果方向角不为1，都需要进行旋转 added by lzk  
					//Orientation =8;
					if(Orientation != "" && Orientation != 1){  
							//alert(Orientation);  
							switch(Orientation){  
								case 6://需要顺时针（向左）90度旋转  
									//alert('需要顺时针（向左）90度旋转');  
									rotateImg(img,'left',canvas);  
									break;  
								case 8://需要逆时针（向右）90度旋转  
									//alert('需要顺时针（向右）90度旋转');  
									rotateImg(img,'right',canvas);  
									break;  
								case 3://需要180度旋转  
									//alert('需要180度旋转');  
									rotateImg(img,'right',canvas);//转两次  
									rotateImg(img,'right',canvas);  
									break;  
							}         
						}
					
					}
					
					 if (navigator.userAgent.match(/iphone/i)) {  
                   
					    imageUri = canvas.toDataURL("image/jpeg", 0.5);
					}else{
					
						
                        imageUri = canvas.toDataURL("image/jpeg");
					}
                
				   
				   	 
		
				    $.ajax({  
						url : '<?php  echo $this->createMobileUrl('shang',array())?>', 
						data: { filed: [imageUri,]},
						async : false, // 注意此处需要同步，因为返回完数据后，下面才能让结果的第一条selected  
						type : "POST",  
						dataType : "json",  
						success : function(data) {  
							console.log(data); 
							
							var html ='';
							html ="<li class='upload_item' img='"+data.data+"' style='margin: 0 0 0 2%;height: 94px; width: 94px; background: url("+data.images+") center center / cover;'><a href='javascript:void(0);' class='upload_delete' title='删除'></a><img src='' class='upload_image loading_img' url=''><input type='hidden' name='picture[]' value=''><br></li>";
								  
							$("#upload_list").append(html);
							
						},
						error : function(responseStr) { 
						console.log(responseStr);
						} 
						
					}); 
				   
                    if (img.width > 80) {
                        imgScale = 80 / img.width;
                    }

                    canvas.width = img.width * imgScale;
                    canvas.height = img.height * imgScale;
                  
                }
            }
            
        }
	
	
	
	
	
	
	
	
	
	
	
	
	 function Yan(name,shouji,feifa,t){
              var founderr = false; //初始化founderr变量，
              if(!(/^\s*[\u4e00-\u9fa5]{2,12}\s*$/).test(name))
              {
              return "名称必须是2-12个中文.";
              founderr = true;
              }
              
			if(feifa =='')
              {
              return "介绍不能为空";
              founderr = true;
              }

              if(feifa.length<2)
              {
              return "介绍不能少于2个字";
              founderr = true;
              }
              if(!(/^0?(19[0-9]|17[0-9]|16[0-9]|13[0-9]|15[012356789]|18[0123456789]|14[0123456789])[0-9]{8}$/).test(shouji))
              {
              return "手机必须是11位的手机号";
              founderr = true;
              }
              if((/[`~!@#$%^&*()_+<>?:"{},.\/;'[\]]/im).test(feifa))
              {
              return "不能有特殊字符和为空";
              founderr = true;
              }
              if(t.length<1)
              {
              return "必须上传1-<?php  echo $this->settings[0]['zuiduotupian']?>张图片";
              founderr = true;
              }
              if(t.length><?php  echo $this->settings[0]['zuiduotupian']?>)
              {
              return "上传图片超出<?php  echo $this->settings[0]['zuiduotupian']?>张";
              founderr = true;
              }

             

            
              return founderr;

                   }
	
	
	
	
	
	
	
	   $(function(){
             $("#tijiao").on("click",function()
             {       
	var images=new Array();
					
                    var opid = $("#opid").val();                 
                    var name = $("#vote_title").val();
                 
                   var shouji = $("#contact").val();
                   var feifa = $("#introduction").val();
				   
				   var zidingyi1 = $("#zidingyi1").val();                 
                   var zidingyi2 = $("#zidingyi2").val();
                 
                   var zidingyi3 = $("#zidingyi3").val();
                   var zidingyi4 = $("#zidingyi4").val();
				   $(".upload_item").each(function(){
						 
							
							images.push($(this).attr('img'));
						  });
					 
				  
                      
                  var me = Yan(name,shouji,feifa,images);
                           
             if(me == false) {
                                

                  $.post("<?php  echo $this->createMobileUrl('shangadd',array('hdid'=>$_GPC['hdid']))?>",
                  {            
				               opid:opid,
                               name: name,
                              
                               shouji:shouji,
                               feifa:feifa,
							   
							   
							   zidingyi1:zidingyi1,
                               zidingyi2: zidingyi2,
                              
                               zidingyi3:zidingyi3,
                               zidingyi4:zidingyi4,
                         
                               t:images

                  },
             function(data)
             {
                                    
                
				  
				   alert(data.a) ;
				
                  setTimeout(function()
             {
               
				   if(data.b==1){
				       window.location.href="<?php  echo $this->settings[0]['keyword']?>"; 
				  }
				  if(data.b==3){
				       window.location.href="<?php  echo $this -> createMobileUrl('list',array('hdid'=>$_GPC['hdid']))?>&id="+data.bmid; 
				  }
                  if(data.b==2){
				       window.location.href="<?php  echo $this -> createMobileUrl('Voindex',array('type'=>'uids','hdid'=>$_GPC['hdid']))?>"; 
				  }

             },2000);

                                         
             },'json'); 

             }else
             {
                          alert(me);
                 

             }; 
             })
             
             })
			 
			 
			 
			 
			 
			 
			
            $(document).on("click", ".upload_item", function()
		        { 
								
								  
								  $(this).remove(); 
								  
					

						 
				})

			
			 
			 
			 
			 
			 
			 
			 
	</script>
							
							
							
							
                        <style>body,h1,p,form,ul,li,dl,dd,input,h2,h3,th,td,table,tr,td,tbody,thead{margin:0;padding:0}</style>
                       <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew5', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew5', TEMPLATE_INCLUDEPATH));?>