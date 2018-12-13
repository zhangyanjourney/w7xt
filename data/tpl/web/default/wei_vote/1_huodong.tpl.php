<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
 <script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/leftTime.min.js"></script>

    <script>
	     
		   function fun(){
				obj = document.getElementsByName("delete");
				check_val = [];
				for(k in obj){
					if(obj[k].checked)
						check_val.push(obj[k].value);
				}
				
				
				$.post("<?php  echo $this->createWebUrl('Delajax', array())?>", { "checkval": check_val },
				function(data){
				  
				  
				 //alert(data.msg); // John
				  
				  location.reload(); 

				  console.log(data); //  2pm
				  
				  
				  
				  }, "json");
						
				
				
				
			}
		     
		
	</script>
	<style>
	table{padding:50px;}
	
	
	</style>
	
	
  <ul class="we7-page-tab">
         <li class="active"><a href="<?php  echo $this->createWebUrl('huodong', array())?>">活动管理</a></li>
    </ul>
  <div class="we7-padding-bottom clearfix">
        <form action="#" method="post" role="form">
            <div class="input-group pull-left col-sm-4">
             
                <input type="text" name="keyword" value="" class="form-control" placeholder="请输入活动名称">
               	<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
            </div>
           <div class="input-group pull-left col-sm-2">
          <select name="owner" class="form-control"  style="with:100px;">
                           <option value="-1">负责人</option>
                           <?php  if(is_array($owner_list)) { foreach($owner_list as $item) { ?>
                           <option value="<?php  echo $item['owner'];?>" <?php  if($_GPC['owner'] == $item['owner']) { ?>selected<?php  } ?>><?php  echo $item['owner'];?></option>
                           <?php  } } ?>
                        </select>
              <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
        </div>
        </form>
        <div class="pull-right">
            <a href="<?php  echo $this->createWebUrl('huodong', array('op' => 'add'))?>" class="btn btn-primary  we7-margin-left">+添加活动</a>
        </div>
    </div>

  
  
  
  

	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead style="height:70px" class="navbar-inner">
				<tr>
					<th style="width:30px;overflow:hidden;">删？</th>
					<th style="width:50px;overflow:hidden;">ID</th>
					
					<th style="width:90px;overflow:hidden;">缩略图</th>
					<th style="width:200px;overflow:hidden;">标题</th>
                    <th style="width:90px;overflow:hidden;">负责人</th>
					<th style="width: 180px;overflow:hidden;padding-left: 10px;">时间</th>
					
				
					
					<th style="width:180px;overflow:hidden;">入口链接</th>
			
					<th style="min-width:180px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
			   
			 
				<tr  style="">
					<td class="text-left vertical-middle"><input class="check-delete tagids-<?php  echo $item['id'];?>" type="checkbox" name="delete" value="<?php  echo $item['id'];?>" data-tagids="" data-openid="" data-fanid="<?php  echo $item['id'];?>"></td>
                    <td class="text-left vertical-middle"><?php  echo $item['id'];?></td>				 
				
					
					<td class="text-left vertical-middle"><img src="<?php  echo tomedia($item['touimg']);?>" width="48"></td>
					<td class="text-left vertical-middle" style="font-size:14px"><?php  echo $item['name'];?></td>
                  	<td class="text-left vertical-middle" style="font-size:14px"><?php  echo $item['owner'];?></td>
					<td class="text-left vertical-middle">
					<p style="padding-left: 10px;font-size:12px;">开始:<?php  echo $item['kaitime'];?></p>
					
					<p style="padding-left: 10px;font-size:12px;">结束:<?php  echo $item['endtime'];?></p>
					<p style="background-color: rgb(92, 184, 92)">
					    <?php 
						$tims = strtotime($item['endtime']);
						$dt = date('Y/m/d H:i:s',$tims)
						?>
						<div style="padding-left: 10px;font-size:12px;background-color:#428bca;color:#fff" class="data-box" id="dateShow<?php  echo ++$i?>" data-date="<?php  echo $dt;?>">
							<span class="date-tiem d">00</span>天
							<span class="date-tiem h">00</span>时
							<span class="date-tiem m">00</span>分
							<span class="date-s s">00</span>秒
						</div>
						
					</p>
					</td>
					
				
					<td class="text-left vertical-middle">
					   
						
					
						
						<div class="we7-margin-bottom" style="position: relative;">
						
						
						<p><span class="label label-warning">浏览量：<?php  echo $item['liulan'];?></span></p>
							<p class="color-gray "><span class="label label-warning">金额：<?php  echo $item['je'];?><?php  if($item['je'] == '') { ?>0<?php  } ?>元</span></p>
                       		<p class="color-gray "><span class="label label-warning">实际票数：<?php  echo $item['shijipiaoshu'];?></span></p>
							<p><a href="javascript:;" class="js-clip color-default" data-url="<?php  echo $_W['siteroot'].'app/' ?><?php  echo $this->createMobileUrl('voindex',array('hdid'=>$item['id']))?>"  >复制活动链接</a></p>
							<p><a style="color:#428bca" href="<?php  echo $this->createWebUrl('clip',array('hdid'=>$item['id']))?>"  >复制活动</a></p>
						</div>
					
					</td>

					<td class="text-right" style="overflow:visible;">
					  <p>
						<a class="btn btn-default btn-sm sms" href="<?php  echo $this->createWebUrl('signup', array('hdid' => $item['id']))?>">选手管理</a>
						<a href="<?php  echo $this->createWebUrl('toupiao', array('hdid' => $item['id']))?>" class="btn btn-default btn-sm">投票记录</a>
				
					  </p>
					  <p>
								<a href="<?php  echo $this->createWebUrl('zhifu', array('hdid' => $item['id']))?>" class="btn btn-default btn-sm sms">礼物订单</a>
						<a href="<?php  echo $this->createWebUrl('liwu', array('hdid' => $item['id']))?>" class="btn btn-default btn-sm">礼物设置</a>
					  </p> 
					  <p> <a href="<?php  echo $this->createWebUrl('Jiangp', array('hdid' => $item['id']))?>" class="btn btn-default btn-sm">奖品</a>
						
					     <a href="<?php  echo $this->createWebUrl('huodong', array('id' => $item['id'],'op' => 'edi'))?>" class="btn btn-default btn-sm">编辑</a>
						
						<a href="<?php  echo $this->createWebUrl('huodong', array('id' => $item['id'], 'op' => 'del'))?>" class="btn btn-default btn-sm">删除</a>
					  </p>
					</td>
				</tr> <?php  } } ?>
				
							</tbody>
		</table>
		<!-- <table class="table table-hover">
			<tbody>
		
			<tr>
				<td colspan="2">
				<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" 
										   href="#collapseOne">
											获取最新文档
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="form-group">
											<label for="exampleInputEmail1">请填写EMAIL</label>
											<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
										</div>
										  
										  <button type="submit" id="tj" class="btn btn-default">Submit</button> 
									</div>
								</div>
							</div>
						
						
						</div>
				</td>
			</tr>
		</tbody>
		
		
		
		
		
		
		
		
		</table> -->
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
	</div>
<script type="text/javascript">
		$(function(){
			//日期倒计时,现在距离下面的日期
			var data_show = $('.data-box');
			for(var i=1;i<=data_show.length;i++){
				function_name($("#dateShow"+i).data("date"),"#dateShow"+i);
			}
			// function_name('2018/02/22 23:45:24','.data-show-box');
			// function_name('2018/02/20 21:43:55','.data-show-box');
			function function_name(time,obj) {
				$.leftTime(time,function(d){
					if(d.status){
						var $dateShow1=$(obj);
						$dateShow1.find(".d").html(d.d);
						$dateShow1.find(".h").html(d.h);
						$dateShow1.find(".m").html(d.m);
						$dateShow1.find(".s").html(d.s);
					}
				});
			}
		});
	</script>
  
    <script>
	
	$("#tj").click( function () {
        var mail =  $("#exampleInputEmail1").val(); 
		
		$.post("<?php  echo $this->createWebUrl('Mail',array())?>", { "mail": mail },
			  function(data){
			  alert(data); // John
			  console.log(data); //  2pm
			  }, "json");
	});

	
	
	
	</script>

  
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>