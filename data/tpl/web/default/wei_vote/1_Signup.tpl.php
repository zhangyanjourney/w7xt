<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<style>
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
   box-sizing: border-box;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
   
    background-color: #fff;
    border: 1px solid rgba(221, 221, 221, 0);
  
}

</style>
    <script>
	     
		   function fun(){
				obj = document.getElementsByName("delete");
				check_val = [];
				for(k in obj){
					if(obj[k].checked)
						check_val.push(obj[k].value);
				}
				
				//alert(check_val); // John
				$.post("<?php  echo $this->createWebUrl('Delajax', array())?>", { "checkval": check_val },
				function(data){
				  
				  
				 alert(data.msg); // John
				  
				  location.reload(); 

				  console.log(data); //  2pm
				  
				  
				  
				  }, "json");
						
				
				
				
			}
		     
		
	</script>
  
<script type="text/javascript">


var check_vals=new Array()
    function changeStatus() {
       // var dataParams = [];
		var obj = $(".xz");
				
				
				
				$.each(obj, function(){  
				
						var my = $(this).val();console.log(my);
						var zdid = $(this).attr("zdid");
						if(my){
							check_vals[zdid] = my;
							
							   $.ajax({
									url : "<?php  echo $this->createWebUrl('Yijian', array('hdid' => $_GPC['hdid']))?>",
									type : "post",
									data : {'zdid':zdid,'my':my},
									async : false,
									dataType : "json",
									success : function(data){
									 console.log(data); //  2pm
						                   	 if(data.code ==30001){
			        
													var zps = "#zps_"+zdid;
													var piao = $(zps).html();
													piao = parseInt(piao)+parseInt(my);
													$(zps).html(piao);
													$("#info").html(data.msg);
													$('.alert-success').removeClass('hide').addClass('in');$("#myAlert2").show();
										   }else{
										   
											  $("#info").html(data.msg);
											  $("#myAlert2").show(3000);
										   }
										   $(".close").click(function(){
												
												$("#myAlert2").alert();
											});
										  
											var t1 = setInterval(function(){
													console.log('123'); //  2pm
													$("#myAlert2").hide();
											   clearInterval(t1); 

											  }, 3000);
											
									}
								});
							
							
						}

				
				});  
			
	
				  
     
    }

	</script>
  
  
  

    <ul class="we7-page-tab nav nav-tabs">
            <li <?php  if(empty($_GPC['sty'])&&empty($_GPC['ranking'])){echo "class='active'";}?>><a href="<?php  echo $this->createWebUrl('signup', array('hdid' => $_GPC['hdid']))?>">全部选手</a></li>
			<li <?php  if($_GPC['sty']==1){echo "class='active'";}?>><a href="<?php  echo $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'],'sty' => 1))?>">待审核</a></li>
			<li <?php  if($_GPC['sty']==2){echo "class='active'";}?>><a href="<?php  echo $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'],'sty' => 2))?>">已审核</a></li>
			<li <?php  if($_GPC['ranking']==1){echo "class='active'";}?>><a href="<?php  echo $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'],'ranking' => 1))?>">礼物排行</a></li>
			<li <?php  if($_GPC['ranking']==2){echo "class='active'";}?>><a href="<?php  echo $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'],'ranking' => 2))?>">票数排行</a></li>
			<li><a href="<?php  echo $this->createWebUrl('Uploadvote', array('hdid' => $_GPC['hdid']))?>">批量导入投票用户</a></li>
			
			<!-- <li><a href="<?php  echo $this->createWebUrl('signup', array('hdid' => $_GPC['hdid']))?>">全部订单</a></li>-->

			<li><a href="<?php  echo $this->createWebUrl('tianjiaren', array('hdid' => $_GPC['hdid']))?>">添加投票用户</a></li> 
    </ul>
  
  <div class="we7-padding-bottom clearfix">
        <form action="#" method="post" role="form">
            <div class="input-group pull-left col-sm-4">
                <input type="text" name="bh" value="" class="form-control" placeholder="请输入编号">
            </div>
           <div class="input-group pull-left col-sm-4">
              <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
        	</div>
        </form>
    </div>

	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;overflow:hidden;">删？</th>
					<th style="width:50px;overflow:hidden;">ID</th>
					
					<th style="width:60px;overflow:hidden;">缩略图</th>
					<th style="width:200px;overflow:hidden;">用户信息</th>
				
				
					<th style="width:170px;overflow:hidden;">礼物票数</th>
					<th style="width:90px;overflow:hidden;">状态</th>
					<!-- <th style="width:60px;overflow:hidden;">拉黑</th>
					<th style="width:60px;overflow:hidden;">状态</th> -->
			        <th style="width:140px;overflow:hidden;">改票/<span style="color:red" onclick="changeStatus()">一键加票</span></th>
					<th style="min-width:70px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
				<tr>
					<td class="text-left vertical-middle"><input class="check-delete tagids-<?php  echo $item['id'];?>" type="checkbox" name="delete" value="<?php  echo $item['id'];?>" data-tagids="" data-openid="" data-fanid="<?php  echo $item['id'];?>"></td>
                    	<td class="text-left vertical-middle"><?php  echo $item['id'];?></td>				 
					 <?php 
														$item['tupian'] = str_replace("&quot;","",$item['tupian']);
														        $item['tupian'] =  htmlspecialchars_decode($item['tupian']);
														        $item['tupian'] = stripslashes($item['tupian']);
																
														        $he = (explode(",",$item['tupian'])); 
                                                                $f = $he['0'];
                                                                 $f = str_replace("&quot;","",$f);

														?>
					
					
					<td class="text-left vertical-middle"><img src="<?php  echo tomedia($f);?>" width="48"></td>
					<td class="text-left vertical-middle">
					     <p>姓名：<?php  echo $item['name'];?></p>
					     <p>编号：<?php  echo $item['bh'];?></p>
						 <p>手机：<?php  echo $item['shouji'];?></p>
						 <p>照片数：<?php  echo $item['shouji'];?></p>
					</td>
					
					
				
					<td class="text-left vertical-middle">
					<p>总票数：<span id="zps_<?php  echo $item['id'];?>" class="label label-info"><?php  echo $item['piao'];?></span></p>
                    <p>实际票数：<span id="zps_<?php  echo $item['id'];?>" class="label label-info"><?php  echo $item['piao']-$item['liwushuliang']-$item['xunishuliang'];?></span></p>
					<p>礼物票数：<span class="label label-warning"><?php  echo $item['liwushuliang'];?></span></p>
					<p>礼物金额：<span class="label label-primary"><?php  echo $item['yuan'];?></span></p>
                     <p>分享次数：<span class="label label-primary"><?php  echo $item['fxcishu'];?></span></p>
					
					</td>
					<td class="text-left vertical-middle">
						<p  data-toggle="tooltip" data-placement="left" title="刷票状态">
							 <?php  if($item['spdj'] == 1) { ?>
								<span class="label label-success">正常</span>
								<?php  } else if($item['spdj'] == 2) { ?>
								<span class="label label-danger">可疑 </span>
								<?php  } else if($item['spdj'] == 3) { ?>
								<span class="label label-danger">中度 </span>
								<?php  } else if($item['spdj'] == 4) { ?>
								<span class="label label-danger">严重 </span>
								<?php  } else { ?>
								特殊
							 <?php  } ?>
						</p>
						
						<p  data-toggle="tooltip" data-placement="left" title="是否拉黑">
						
						     	 <?php  if($item['lahei'] == 1) { ?>
								<span class="label label-success">正常</span>
								<?php  } else if($item['lahei'] == 2) { ?>
								<span class="label label-danger">拉黑 </span>
								<?php  } else { ?>
								特殊>
								<?php  } ?>
						
						</p>
						
						
						<p data-toggle="tooltip" data-placement="left" title="审核状态">
						       
							<?php  if($item['isshenhe'] == 2) { ?>
							<span class="label label-success">通过</span>
							<?php  } else if($item['isshenhe'] == 1) { ?>
							<span class="label label-warning">未审</span>
							<?php  } else { ?>
							<span class="label label-warning">特殊</span>
							<?php  } ?>
						
						
						</p>
					</td>
					
				<!-- 	<td  class="text-left vertical-middle">
							 <?php  if($item['lahei'] == 1) { ?>
							<span class="label label-success">正常</span>
							<?php  } else if($item['lahei'] == 2) { ?>
							<span class="label label-danger">拉黑 </span>
							<?php  } else { ?>
							特殊>
							<?php  } ?>
					
					</td>
					<td class="text-left vertical-middle">
					
							<?php  if($item['isshenhe'] == 2) { ?>
							<span class="label label-success">通过</span>
							<?php  } else if($item['isshenhe'] == 1) { ?>
							<span class="label label-warning">未审</span>
							<?php  } else { ?>
							<span class="label label-warning">特殊</span>
							<?php  } ?>
					
					</td> -->
                     <td class="text-left vertical-middle">
					    
							  <div class="form-group">
								<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
								<div class="input-group">
								  <!-- <div class="input-group-addon">增</div> -->
								  <input type="number"   zdid ="<?php  echo $item['id'];?>" id="zdy_<?php  echo $item['id'];?>"  value="" class="form-control xz" id="exampleInputAmount" placeholder="输入票数">
								  <div style="background-color: #5cb85c;color:#fff" xsid ="<?php  echo $item['id'];?>" class="input-group-addon zj">增</div>
								</div>
							  </div>
							  <!-- <button type="submit" style="width:120px;height:30px;margin-top: 5px;" class="btn btn-primary">确定</button> -->
						
					
					</td>   
					<td class="text-right" style="overflow:visible;">
					    <p> <a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('Xqchakan', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'tongguo'))?>">数据</a>
			        	<a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('Zhifu', array('id' => $item['id'],'hdid' => $_GPC['hdid']))?>">订单</a></p>
					<p>
						<?php  if($item['isshenhe'] == 2) { ?>
						<a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('Butongguo', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'butongguo'))?>">驳回</a>
						<?php  } else if($item['isshenhe'] == 1) { ?>
						<a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('Shen',array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'tongguo'))?>">通过</a>
				
						<?php  } ?>
					
					
					

				
						 <?php  if($item['lahei'] == 1) { ?>
						<a href="<?php  echo $this->createWebUrl('Signup', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'lahei'))?>" class="btn btn-default btn-sm sms">拉黑</a>
						<?php  } else if($item['lahei'] == 2) { ?>
						<a href="<?php  echo $this->createWebUrl('Signup', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'quxiaolahei'))?>" class="btn btn-default btn-sm">取消</a>
						<?php  } else { ?>
						特殊>
						<?php  } ?>
		               </p>
					   
					    <!-- <p> <a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('Signup', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'songli'))?>">送礼</a>-->
			        	<a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('Signup', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'toupiao'))?>">投票</a></p>
					   
						<p>
						
						<a href="<?php  echo $this->createWebUrl('Signup', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'edit'))?>" class="btn btn-default btn-sm sms">编辑</a>
						<a href="<?php  echo $this->createWebUrl('Signup', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'del'))?>" class="btn btn-default btn-sm">删除</a></p>
					</td>
				</tr> <?php  } } ?>
				
							</tbody>
		</table>
		<table class="table table-hover">
			<tbody><tr>
				<td width="30">
					<input type="checkbox" onclick="var ck = this.checked;$('.check-delete').each(function(){this.checked = ck});">
				</td>
				<td class="text-left">
					<input name="token" type="hidden" value="747068bb">
					<!-- <input type="submit" name="submit" class="btn btn-primary span2" onclick="fun()" value="删除"> &nbsp;  -->
		<input type="submit" name="submit" class="btn btn-primary span2" onclick="fun()" value="删除"> &nbsp; 
		
					<a class="btn btn-primary span2" href="<?php  echo $this->createWebUrl('Signupdaochu', array('op' => 'signup','hdid' => $_GPC['hdid']))?>">导出报名记录</a> &nbsp; 
					</td>
			</tr>
			<tr>
				<td colspan="2">
					<span class="help-block">审核通过: 需要在配置中开启审核，没审核的会不显示在投票列表中</span>
					<span class="help-block">导出报名记录: 导出报名记录会导出报名的所有记录</span>
					<span class="help-block">拉黑: 拉黑的用户会不能投票，但会显示在投票列表中</span>
						<span class="help-block">刷票: 刷票等级仅供参考</span>
				</td>
			</tr>
		</tbody></table>
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
	</div>
	<style>
	.alert
{
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
   width: 50%;
    height: 50px;
    margin-left:auto;
    margin-right:auto;z-index:999;
}

	
	</style>
<!-- <div class="alert alert-success">成功！很好地完成了提交。</div> -->
   <div style="" id="myAlert2"  class="alert alert-success hide" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">          
          <span aria-hidden="true">&times;</span>
       </button>
       <strong id="info">这里是错误信息</strong>
   </div>

<script>

$(".zj").on("click", function(){

        var pm = $(this).prev().val();
		
		var xsid = $(this).attr("xsid");
		
		$.post("<?php  echo $this->createWebUrl('Signup', array('hdid' => $_GPC['hdid'], 'op' => 'zp'))?>", { "pm": pm,"xsid":xsid },
          function(data){
               
			   if(data.code ==30001){
			        
					var zps = "#zps_"+xsid;
					var piao = $(zps).html();
					piao = parseInt(piao)+parseInt(pm);
					$(zps).html(piao);
					$("#info").html(data.msg);
					$('.alert-success').removeClass('hide').addClass('in');$("#myAlert2").show();
			   }else{
			   
			      $("#info").html(data.msg);
				  $("#myAlert2").show(3000);
			   }
			   $(".close").click(function(){
					
					$("#myAlert2").alert();
				});
			  
				var t1 = setInterval(function(){
						console.log('123'); //  2pm
						$("#myAlert2").hide();
				   clearInterval(t1); 

				  }, 3000);
							   
			   
			   
			   
			   
          console.log(data); //  2pm
          }, "json");
		
		
});




</script>

  
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>