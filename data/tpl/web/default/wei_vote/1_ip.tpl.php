<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>



  
  

  <ul class="nav nav-tabs">
	<li ><a href="<?php  echo $this->createWebUrl('Ip', array('type'=>1))?>">IP列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('Ip', array('type'=>0))?>">微信列表</a></li>
		<li><a href="<?php  echo $this->createWebUrl('Ip', array('op' => 'add'))?>">添加黑名单</a></li>
</ul>
  
  
  
  <form action="#" method="post" id="form1" class="ng-pristine ng-valid">
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;overflow:hidden;">删？</th>
					<th style="width:50px;overflow:hidden;">ID</th>
					
		
					<th style="width:150px;overflow:hidden;">信息</th>
					<th style="width:150px;overflow:hidden;">值</th>
				
			
			
			
					<th style="min-width:70px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
				<tr>
					<td><input class="check-delete tagids-15956" type="checkbox" name="delete[]" value="15956" data-tagids="" data-openid="ohI6AwaTs0Pw1JMT76NN_bOaCMGk" data-fanid="15956"></td>
                    	<td><?php  echo $item['id'];?></td>				 
				
					<td><?php  echo $item['ip'];?></td>
		           <td><?php  echo $item['val'];?></td>
					

					<td class="text-right" style="overflow:visible;">
		
					
					
					
						<a href="<?php  echo $this->createWebUrl('Ip', array('id' => $item['id'], 'op' => 'edi', 'type' => $_GPC['type']))?>" class="btn btn-success btn-sm sms">编辑</a>
						<a href="<?php  echo $this->createWebUrl('Ip', array('id' => $item['id'], 'op' => 'del', 'type' => $_GPC['type']))?>" class="btn btn-default btn-sm">删除</a>
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
					<input type="submit" name="submit" class="btn btn-primary span2" value="删除"> &nbsp; 
					
					</td>
			</tr>
			<tr>
				<td colspan="2">
				

				</td>
			</tr>
		</tbody></table>
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
			</div></form>
  

  
  
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>