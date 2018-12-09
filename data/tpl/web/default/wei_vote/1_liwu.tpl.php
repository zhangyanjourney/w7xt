<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>


<ul class="nav nav-tabs">
	
	<li class="active"><a href="">礼物管理</a></li>
	
		<li><a href="<?php  echo $this->createWebUrl('Liwu', array('op' => 'add','hdid' => $_GPC['hdid']))?>">添加礼物管理</a></li>
</ul>



  
  
  
  
  <form action="#" method="post" id="form1" class="ng-pristine ng-valid">
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
			
					<th style="width:80px;overflow:hidden;">id</th>
					
					<th style="width:90px;overflow:hidden;">缩略图</th>
					<th style="width:150px;overflow:hidden;">name</th>
					<!-- <th style="width:200px;overflow:hidden;">时间</th> -->
					<!-- <th style="width:100px;overflow:hidden;">数量</th> -->
					<th style="width:100px;overflow:hidden;">票数</th>
				<th style="width:80px;overflow:hidden;">金额</th>
		
				
					<th style="min-width:70px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
				<tr>
					<td><?php  echo $item['id'];?></td>
		  
		  <td><img src="<?php  echo tomedia($item['tupian']);?>" width="50px" height="50px"></td>
		  <td><?php  echo $item['name'];?></td>
		  <!-- <td><?php  echo date('Y-m-d H:i:s', $item['createtime']);?></td> -->
		  <!-- <td><?php  echo $item['shuliang'];?></td> -->
		  <td><?php  echo $item['piao'];?></td>
		  <td><span class="label label-warning"><?php  echo $item['jiner'];?></span></td>
		
					<td class="text-right" style="overflow:visible;">
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('Liwu', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'edi'))?>">编辑</a>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('Liwu', array('id' => $item['id'],'hdid' => $_GPC['hdid'], 'op' => 'del'))?>">删除</a>
		 
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
					
				
					</td>
			</tr>
			<tr>
				<td colspan="2">
					<span class="help-block">礼物: 礼物必须为6个</span>
					
				</td>
			</tr>
		</tbody></table>
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
			</div></form>
  

  
  
  
  
  
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>