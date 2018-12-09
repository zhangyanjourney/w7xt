<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<form action="<?php  echo $this->createWebUrl(Liwu, $query = array('op'=>'edi'));?>" method="post" enctype="multipart/form-data" class="form-horizontal form">








<div class="panel panel-default">
	 <div class="panel-heading">
     	签到参数设置
     </div>
     

	
		<div class="panel-body">
		    
		
			
			
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">礼物名称</label>
				
				<div class="col-sm-9">
				
					<input type="text" name="name" class="form-control" value="<?php  echo $urs['name'];?>"> 
					
				</div>
				
			</div>
			
				
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">礼物数量</label>
				
				<div class="col-sm-9">
				
					<input type="text" name="shuliang" class="form-control" value="<?php  echo $urs['shuliang'];?>"> 
					
				</div>
				
			</div>
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑换多少</label>
				
				<div class="col-sm-9">
					<div class="input-group">
					<input type="text" name="piao" class="form-control" value="<?php  echo $urs['piao'];?>"> 
					<div class="input-group-addon">票数（票）</div>
					</div>
				</div>
				
			</div>
			
			
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">售价</label>
				
				<div class="col-sm-9">
					<div class="input-group">
					<input type="text" name="jiner" class="form-control" value="<?php  echo $urs['jiner'];?>"> 
					<div class="input-group-addon">元（人民币）</div>
					</div>
				</div>
				
			</div>
			
		
			
			
			
	
		
			
			
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
				
				<div class="col-sm-9">
					
					   <?php  echo tpl_form_field_image('tupian',$urs['tupian']);?>
				
				</div>
				
			</div>
		
		
		
			
		
			
			<div class="form-group">
				
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				
				<div class="col-sm-9">
					
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3" style="height:30px">
						<input type="hidden" name="id" value="<?php  echo $urs['id'];?>">
							<input type="hidden" name="hdid" value="<?php  echo $_GPC['hdid'];?>">
					<input type="hidden" name="token" value="f5388d01">
				
				</div>
				
			</div>
			
		</div>
	
</div>

</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>