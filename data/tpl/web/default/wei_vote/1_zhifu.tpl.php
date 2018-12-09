<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>



 <script>
	     
		   function fun(){
				obj = document.getElementsByName("delete");
				check_val = [];
				for(k in obj){
					if(obj[k].checked)
						check_val.push(obj[k].value);
				}
				
				
				$.post("<?php  echo $this->createWebUrl('Delajaxuserlog', array())?>", { "checkval": check_val },
				function(data){
				  
				  
				 //alert(data.msg); // John
				  
				  location.reload(); 

				  console.log(data); //  2pm
				  
				  
				  
				  }, "json");
						
				
				
				
			}
		     
		
</script>
  
  

  <div class="alert alert-info">
	<i class="fa fa-info-circle"></i> 总金额：<?php  echo $totaltotal;?>元（四舍五入到元）<br>
	<strong class="text-danger">
		<i class="fa fa-info-circle"></i> 支付数据：<?php  echo $total;?>条<br>
	</strong>
</div>
  
  
  
  <form action="#" method="post" id="form1" class="ng-pristine ng-valid">
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th class="text-left vertical-middle" style="width:30px;overflow:hidden;">删？</th>
					<th class="text-left vertical-middle" style="width:30px;overflow:hidden;">ID</th>
					
					<th class="text-left vertical-middle" style="width:90px;overflow:hidden;">缩略图</th>
				
					<th class="text-left vertical-middle" style="width:90px;overflow:hidden;">选手编号</th>
				
					<th class="text-left vertical-middle" style="width:140px;overflow:hidden;">订单号</th>
					<th class="text-left vertical-middle" style="width:70px;overflow:hidden;">是否支付</th>
					<th class="text-left vertical-middle" style="width:40px;overflow:hidden;">礼物ID</th>
			
			<th class="text-left vertical-middle" style="width:40px;overflow:hidden;">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
				<tr>
					   <td class="text-left vertical-middle"><input class="check-delete tagids-<?php  echo $item['id'];?>" type="checkbox" name="delete" value="<?php  echo $item['id'];?>" data-tagids="" data-openid="" data-fanid="<?php  echo $item['id'];?>"></td>
                    	<td class="text-left vertical-middle"><?php  echo $item['id'];?></td>				 
					
					
					
					<td class="text-left vertical-middle"><p><img src="<?php  echo $item['avatar'];?>" width="48"></p><p><?php  echo $item['nickname'];?></p></td>
				
					<td class="text-left vertical-middle"><p><span class="label label-success">编号:<?php  echo $item['bianhao'];?></span></p><p><span class="label label-success"><?php  if($item['jiner'] == $item['wxfee'] || $item['wxfee']==0 ) { ?>金额<?php  } else { ?>异常支付<?php  } ?>:<?php  echo $item['jiner'];?></span></p></td>
					
					<td class="text-left vertical-middle">
					
					      <p>订单号：<span><?php  echo $item['dingdanghao'];?></span></p> 
                      	  <p>交易时间：<span><?php  echo date("Y-m-d H:i:s",$item['createtime']);?></span></p> 
						  <p>交易订号：<span><?php  echo $item['wxtransaction_id'];?></span></p>
						   <p>商户单号：<span><?php  echo $item['wxuniontid'];?></span></p>
						   
					
					</td>
					<td class="tag-show-15956 text-left vertical-middle">
					 <p> <?php  if($item['isxuli'] ==1) { ?>
						<span class="label label-danger">用户支付</span>
						<?php  } else if($item['isxuli'] == 2) { ?>
						<span class="label label-success">管理支付</span>
						<?php  } else { ?>
						<span class="label label-danger">特殊</span>
						<?php  } ?>
					</p>
					 <p> <?php  if($item['iszhifu'] ==0) { ?>
						<span class="label label-danger">未支付</span>
						<?php  } else if($item['iszhifu'] == 2) { ?>
						<span class="label label-success">支付成功 </span>
						<?php  } else { ?>
						<span class="label label-danger">特殊</span>
						<?php  } ?>
					</p>
					 <p>
					 
					  <?php  if($item['type'] =='wechat') { ?>
						<span class="label label-success">微信支付</span>
						<?php  } else if($item['type'] == 'credit') { ?>
						<span class="label label-primary">余额 </span>
					<?php  } else if($item['type'] == 'JSAPI') { ?>
						<span class="label label-info">微信支付 </span>
						<?php  } else if($item['type'] == 'alipay') { ?>
						<span class="label label-info">支付宝 </span>
						<?php  } else if($item['type'] == 'unionpay') { ?>
						<span class="label label-warning">银联 </span>
						<?php  } else if($item['type'] == 'baifubao') { ?>
						<span class="label  label-default">百度钱包 </span>
						<?php  } else { ?>
						<span class="label label-danger">特殊</span>
						<?php  } ?>
					 
					</p>
					</td>
				
						<td class="text-left vertical-middle">
						     <!-- <p><span class="label label-success">礼物ID:<?php  echo $item['liwuid'];?></span></p> -->
							  <p><span class="label label-success">增加票数:<?php  echo $item['piao'];?></span></p>
							   <p><span class="label label-success">购买数量:<?php  echo $item['shuliang'];?></span></p>
					
						
						</td>
						
					<td class="text-right text-left vertical-middle" style="overflow:visible;">
				
						<a href="<?php  echo $this->createWebUrl('Zhifu', array('id' => $item['id'], 'op' => 'del', 'hdid' => $_GPC['hdid']))?>" class="btn btn-default btn-sm">删除</a>
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
					<input type="submit" name="submit" class="btn btn-primary span2" onclick="fun()" value="删除"> &nbsp; 
			
					</td>
			</tr>
			<tr>
				<td colspan="2">
					<span class="help-block">通过: #</span>
				
				</td>
			</tr>
		</tbody></table>
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
			</div></form>
  

  
  
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>