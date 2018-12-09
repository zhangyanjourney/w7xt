<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>


 <script>
	     
		   function fun(){
				obj = document.getElementsByName("delete");
				check_val = [];
				for(k in obj){
					if(obj[k].checked)
						check_val.push(obj[k].value);
				}
				
				
				$.post("<?php  echo $this->createWebUrl('Delajaxzhong', array())?>", { "checkval": check_val },
				function(data){
				  
				  
				alert(data.msg); // John
				  
				  location.reload(); 

				  console.log(data); //  2pm
				  
				  
				  
				  }, "json");
						
				
				
				
			}
		     
		
</script>






<ul class="nav nav-tabs">
	
	<li class="active"><a href="">管理投票记录</a></li>
</ul>



  
  
  
  
  <form action="#" method="post" id="form1" class="ng-pristine ng-valid">
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;overflow:hidden;">删？</th>
					<th style="width:30px;overflow:hidden;">uniacid</th>
					
					<th style="width:90px;overflow:hidden;">缩略图</th>
			
					<th style="width:280px;overflow:hidden;">时间</th>
					<!-- <th style="width:100px;overflow:hidden;">红包金额</th> -->
					<!-- <th style="width:480px;overflow:hidden;">借权openid</th> -->
				<th style="width:150px;overflow:hidden;">奖品</th>
					<th style="width:80px;overflow:hidden;">审核状态</th>
				
					<th style="min-width:70px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
				<tr>
		  <td  class="text-left vertical-middle"><input class="check-delete tagids-<?php  echo $item['id'];?>" type="checkbox" name="delete" value="<?php  echo $item['id'];?>" data-tagids="" data-openid="" data-fanid="<?php  echo $item['id'];?>"></td>
          <td  class="text-left vertical-middle"><?php  echo $item['id'];?></td>
		  
		  <td class="text-left vertical-middle">
		      <p><img src="<?php  echo $item['avatar'];?>" width="50px" height="50px"></p> 
			  <p><?php  echo $item['nickname'];?></p>
		  </td>
		
		  <td class="text-left vertical-middle">
		  
		  <p><?php  echo date('Y-m-d H:i:s', $item['createtime']);?></p>
		  <p><?php  echo $item['openid'];?></p>
		  </td>
		  <!-- <td class="text-left vertical-middle"><?php  echo $item['hongbao'];?></td> -->
		  <!-- <td><?php  echo $item['jqopenid'];?></td> -->
		  <td class="text-left vertical-middle">
		  
		   <p><span class="label label-warning">奖品：<?php  echo $item['prize'];?></span> </p>
		   <p><span class="label label-warning">红包金额：<?php  echo $item['hongbao'];?> </span></p>
		  </td>
		  <td class="text-left vertical-middle">
		
		   <?php  if($item['isok'] == 1) { ?>
				<span class="label label-success">以兑换</span>
				<?php  } else { ?>
				<span class="label label-danger">未兑换 </span>
			
				<?php  } ?>
		  
		  
		  
		  </td>
					<td class="text-right text-left vertical-middle" style="overflow:visible;">
					
                     <p>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('Jiangp', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'fahoubao', 'jqopenid' => $item['jqopenid']))?>" class="btnGreen">发红包</a>
					 </p>
					<p>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('Jiangp', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'duihuan'))?>">兑换</a>
					 </p>
					
					 <p>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('Jiangp', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'del'))?>">删除</a>
		             </p>
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
					<span class="help-block">兑换: 点兑换会直接修改兑换状态</span>
					<span class="help-block">发红包: 奖品是红包奖品点击发红包，会直接发送给用户</span>
					<span class="help-block">前台兑换: 配置销核密码，可以现场用户输入销核码可直接兑换销核</span>
				</td>
			</tr>
		</tbody></table>
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
			</div></form>
  

  
  
  
  
  
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>