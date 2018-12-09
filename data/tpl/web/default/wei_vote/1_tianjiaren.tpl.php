<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="content">
       
        <div class="msgWrap bgfc">
                <form method="post" class="form-horizontal form" action="" target="_top">
				
				
				<div class="panel panel-default">
	 <div class="panel-heading">
     	添加选手
     </div>
     

	
		<div class="panel-body">
				
				
				
				
				
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
				
				<div class="col-sm-9">
					  <?php  echo tpl_form_field_multi_image('tupian',$user_data['tupian']);?>
					   <!-- <?php  echo tpl_form_field_image('tupian',$urs['tupian']);?> -->
				
				</div>
				
			</div>
			<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频</label>
                    <div class="col-sm-9 col-xs-12">
                       <?php  echo tpl_form_field_video('video',$user_data['video']);?>
                    </div>
                </div>
			
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">姓名</label>
				
				  <div class="col-sm-9 col-xs-12">
		
					<input type="text" name="vote_title" class="form-control" value="<?php  echo $user_data['name'];?>"> 
					
				</div>
				
			</div>
				
					<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">票数</label>
				  <div class="col-sm-9 col-xs-12">
				
					
					<input type="text" name="vote_count" class="form-control" value="<?php  echo $user_data['piao'];?>"> 
					
				</div>
				
			</div>
			
			
			
				<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">实际票数：</label>
				
				  <div class="col-sm-9 col-xs-12">
				
					
			<input type="text" name="ddd"  readonly="readonly"  class="form-control" value="<?php  echo $zpstotal;?>">
					
				</div>
				
			</div>
			
			
				<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">礼物票数：</label>
				
				  <div class="col-sm-9 col-xs-12">
				
					
			<input type="text" name="liwushuliang"  readonly="readonly" class="form-control" value="<?php  echo $user_data['liwushuliang'];?>">
					
				</div>
				
			</div>
			
			
			
			
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">联系方式：</label>
				
				  <div class="col-sm-9 col-xs-12">
				
					
		                	<input type="text" name="shouji" class="form-control" value="<?php  echo $user_data['shouji'];?>">
					
				</div>
				
			</div>
			
			
			
			
			
			
				
										 <?php  if($this->settings[0]['zidingyi1'] != '') { ?>
											
											  	<div class="form-group">
			
													<label class="col-xs-12 col-sm-3 col-md-2 control-label"> <?php  echo $this->settings[0]['zidingyi1']?>：</label>
													
													<div class="col-sm-9">
														<div class="input-group">
													
														
																<input type="text" name="zidingyi1"  class="form-control" value="<?php  echo $user_data['zidingyi1'];?>">
														</div>
													</div>
													
												</div>
											  
										<?php  } else { ?>
										
										<?php  } ?>
										
										<?php  if($this->settings[0]['zidingyi2'] != '') { ?>
											 
											  	<div class="form-group">
			
													<label class="col-xs-12 col-sm-3 col-md-2 control-label">  <?php  echo $this->settings[0]['zidingyi2']?>：</label>
													
													<div class="col-sm-9">
														<div class="input-group">
													
														
																<input type="text" name="zidingyi2"   class="form-control" value="<?php  echo $user_data['zidingyi2'];?>">
														</div>
													</div>
													
												</div>
											  
										<?php  } else { ?>
										
										<?php  } ?>
										<?php  if($this->settings[0]['zidingyi3'] != '') { ?>
											
												<div class="form-group">
			
													<label class="col-xs-12 col-sm-3 col-md-2 control-label"> <?php  echo $this->settings[0]['zidingyi3']?>：</label>
													
													<div class="col-sm-9">
														<div class="input-group">
													
														
																<input type="text" name="zidingyi3"    class="form-control" value="<?php  echo $user_data['zidingyi3'];?>">
														</div>
													</div>
													
												</div>
                                            
											
											  
											  
										<?php  } else { ?>
										
										<?php  } ?>
										<?php  if($this->settings[0]['zidingyi4'] != '') { ?>
											
											
												<div class="form-group">
			
													<label class="col-xs-12 col-sm-3 col-md-2 control-label"> <?php  echo $this->settings[0]['zidingyi4']?>：</label>
													
													<div class="col-sm-9">
														<div class="input-group">
													
														
																<input type="text" name="zidingyi4"    class="form-control" value="<?php  echo $user_data['zidingyi4'];?>">
														</div>
													</div>
													
												</div>
                                            
										
										
										<?php  } ?>
			
			
			
			<div class="form-group">
			
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">拉票宣言：</label>
				
				<div class="col-sm-9">
					<div class="input-group">
						<textarea name="manifesto" cols="80" rows="4"><?php  echo $user_data['feifa'];?></textarea>
					<!--  <?php  echo tpl_ueditor('manifesto',$user_data['feifa']);?>
					 -->
					 </div>
			</div>
				
			</div>
			
			<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 说明：</label>
							<div class="col-sm-8 col-xs-12">
								<?php  echo tpl_ueditor('shuoming', $user_data['shuoming']);?>
															
							</div>
					</div>
			</div>
			<div class="form-group">
				
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				
				<div class="col-sm-9">
					
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3" style="height:30px">
						<input type="hidden" name="pcid" value="<?php  echo $user_data['id'];?>">

				<input type="hidden" name="hdid" value="<?php  echo $_GPC['hdid'];?>">
				</div>
				
			</div>
			
			   </div>
			
			
                   
                </form>
        </div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>