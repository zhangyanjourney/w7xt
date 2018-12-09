<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<script>

window.location.href='<?php  echo $this->createWebUrl('huodong', array())?>';





</script>

        <div class="cLineB">
                
                <a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">
                        返回
                </a>
				  <a href="<?php  echo $this->createWebUrl('Qingkong', array())?>" class="right btnGrayS vm" style="margin-top:-27px">
                        一键清空所有数据
                </a>
        </div>
        
                
         <div class="alert alert-info">
			<i class="fa fa-info-circle"></i> 请正确填写配置！<br>
			<strong class="text-danger">
				<i class="fa fa-info-circle"></i> 一键清空所有数据请勿乱点，会清空投票的所有数据<br>
			</strong>
		</div>
     
                <form class="form form-horizontal" method="post" action="<?php  echo $this->createWebUrl(Peizi, $query = array());?>"
                enctype="multipart/form-data"  onsubmit="return save_voteimg();">
				
				      









			<div class="panel panel-info">
				   <div class="panel-heading">
					  兑换红包设置
					  <strong class="text-danger">
						<i class="fa fa-info-circle"></i> 需要发红包，服务号、订阅号都需填写，不用此功能，请保持默认！<br>
					</strong>
				   </div>
				   <div class="panel-body">
				  <div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信支付证书</label>
						<div class="col-sm-9 col-xs-12">
						
						   
						
						
							<div class="col-md-2" style="padding:5px;"><span class="label label-default">  <?php   $dir = IA_ROOT . '/addons/wei_vote'."/cert/".$_W['uniacid']."/apiclient_cert.pem"; if(file_exists($dir)) { echo "已上传"; } else { echo "未上传"; } ?></span><br></div>
							<input type="file" class="custom-file-input" name="nbfwpaycert">
							<div class="help-block">请上传您的微信支付证书，文件格式应为<code>zip</code><br>内部文件应包含apiclient_cert.pem，apiclient_key.pem，rootca.pem，apiclient_cert.p12等几个文件</div>
						</div>
				  </div>

    

				  <div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppID(应用ID)</label>
								<div class="col-xs-12 col-sm-9">
									<input type="text" name="appid" value="<?php  echo $settings[0]['appid'];?>" class="form-control" placeholder="微信公众平台APPID">
									<span class="help-block">微信公众平台APPID</span>
								</div>
				   </div>
				   <div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret(应用密钥)</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" value="<?php  echo $settings[0]['secret'];?>" class="form-control" name="secret">
							 <div class="help-block">认证服务号secret</div>
						</div>
					</div>

				  <div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">MCHID(商户号)</label>
								<div class="col-xs-12 col-sm-9">
									<input type="text" name="mchid" value="<?php  echo $settings[0]['mchid'];?>" class="form-control" placeholder="微信支付商户号(MchId)">
									<span class="help-block">输入微信MCHID参数</span>
								</div>
				   </div>

				   <div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">PARTNERKEY</label>
								<div class="col-xs-12 col-sm-9">
									<input type="text" name="apikey" value="<?php  echo $settings[0]['apikey'];?>" class="form-control" placeholder="商户支付密钥(API密钥)">
									<span class="help-block">商户支付密钥(API密钥)</span>
								</div>
				   </div>

				
				

			   </div>
			</div>







<div class="panel panel-info">
			   <div class="panel-heading">
				  幻灯片
				  <strong class="text-danger">
					<i class="fa fa-info-circle"></i> 页面需要幻灯片请上传图片，不用此功能，请保持默认！<br>
				 </strong>
			   </div>
			   <div class="panel-body">
				 

				

				  <div class="form-group">
				  <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					  <div class="col-sm-9">
								
									 <?php  echo tpl_form_field_image('singleimage1',$settings[0]['singleimage1']);?>
					   </div>
				   
				   </div>
				   <div class="form-group"> <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label><div class="col-sm-9">
					  
						 <?php  echo tpl_form_field_image('singleimage2',$settings[0]['singleimage2']);?>
					</div></div>

				  <div class="form-group"> <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label><div class="col-sm-9">
							
								 <?php  echo tpl_form_field_image('singleimage3',$settings[0]['singleimage3']);?>
				   </div></div>

				   <div class="form-group">

				   <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				   
					   <div class="col-sm-9">
								  
									 <?php  echo tpl_form_field_image('singleimage4',$settings[0]['singleimage4']);?>
					   </div>
					   
				   </div>

				
				

			   </div>
			</div>

		



			<div class="panel panel-info">
			   <div class="panel-heading">
				  背景音乐
				  <strong class="text-danger">
					<i class="fa fa-info-circle"></i> 上传音乐文件表示开启，开启比较耗费资源。<br>
				 </strong>
			   </div>
			   <div class="panel-body">
				 

				

				  <div class="form-group">  <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				   
					   <div class="col-sm-9">
							
								  <?php  echo tpl_form_field_audio('audio',$settings[0]['audio']);?>
				   </div>   </div>
				  

				
				

			   </div>
			</div>



			<div class="panel panel-info">

				   <div class="panel-heading">
					  自定义字段
					   <strong class="text-danger">
						<i class="fa fa-info-circle"></i> 自定义字段，填写后会显示在报名的页面，详细页面也会出现，不用此功能，请保持默认！自定义4为特殊字段（视频字段）<br>
						
					 </strong>
				   </div>
   
                  <div class="panel-body">
     

    

						  <div class="form-group">
										<label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义1</label>
										<div class="col-xs-12 col-sm-9">
											<input type="text" name="zidingyi1" value="<?php  echo $settings[0]['zidingyi1'];?>" class="form-control" placeholder="">
											<span class="help-block">不用请为空例如：年龄(会显示在详细页面)</span>
										</div>
						   </div>
						   <div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义2</label>
								<div class="col-sm-9 col-xs-12">
									<input type="text" value="<?php  echo $settings[0]['zidingyi2'];?>" class="form-control" name="zidingyi2">
									 <div class="help-block">不用请为空例如：性别(会显示在详细页面)</div>
								</div>
							</div>

							  <div class="form-group">
											<label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义3</label>
											<div class="col-xs-12 col-sm-9">
												<input type="text" name="zidingyi3" value="<?php  echo $settings[0]['zidingyi3'];?>" class="form-control" placeholder="">
												<span class="help-block">不用请为空例如：爱好(会显示在详细页面)</span>
											</div>
							   </div>

							   <div class="form-group">
											<label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义4</label>
											<div class="col-xs-12 col-sm-9">
												<input type="text" name="zidingyi4" value="<?php  echo $settings[0]['zidingyi4'];?>" class="form-control" placeholder="">
												<span class="help-block">这个主要用于上传视频链接，不用请为空例如：视频(视频地址为外链通用地址)</span>
											</div>
							   </div>

			
    

                     </div>
            </div>


					<div class="panel panel-info">

							 <div class="panel-heading">
										 活动奖品详细设置
								  <strong class="text-danger">
									 红包项填写为0。则表示是实物奖品，抽奖不用请默认
								</strong>
							   </div>	
				

							<div class="panel-body">
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:help-block">*</span> 奖品设置(概率是单独的，奖品概率加起来不超过100)</label>
									<div class="col-sm-9 col-xs-12">
										<div class="panel panel-default">
										<div class="panel-body table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>奖品类别</th>
															<th>奖品名称(50字以内)</th>
															<th>奖品数量</th>
										  <th>中奖概率(%)</th>
										  <th>红包(元)</th>
														</tr>
													</thead>
													<tbody id="re-items">
									  <tr id="c_4">
										<td>
										<input name="ct_4" type="hidden" value="特等奖"> 
										<input type="text" class="form-control" disabled="disabled" value="特等奖" maxlength="10" style="width:100px;">
										</td>
										<td><input id="cn_4" name="cn_4" type="text" class="form-control" value="<?php  echo $settings[0]['cn_4'];?>" maxlength="50"></td>
										<td><input id="cm_4" name="cm_4" type="text" class="form-control" value="<?php  echo $settings[0]['cm_4'];?>"></td>
										<td><input id="cr_4" name="cr_4" type="text" class="form-control" value="<?php  echo $settings[0]['cr_4'];?>"></td>
										
										<td><input id="ch_4" name="ch_4" type="text" class="form-control" value="<?php  echo $settings[0]['ch_4'];?>"></td>
									  </tr>
									  <tr id="c_3">
										<td>
										<input name="ct_3" type="hidden" value="一等奖"> 
										<input type="text" class="form-control" disabled="disabled" value="一等奖" maxlength="10" style="width:100px;">
										</td>
										<td><input id="cn_3" name="cn_3" type="text" class="form-control" value="<?php  echo $settings[0]['cn_3'];?>" maxlength="50"></td>
										<td><input id="cm_3" name="cm_3" type="text" class="form-control" value="<?php  echo $settings[0]['cm_3'];?>"></td>
										<td><input id="cr_3" name="cr_3" type="text" class="form-control" value="<?php  echo $settings[0]['cr_3'];?>"></td>
										
										<td><input id="ch_3" name="ch_3" type="text" class="form-control" value="<?php  echo $settings[0]['ch_3'];?>"></td>
									  </tr>
									  <tr id="c_0">
										<td>
										<input name="ct_2" type="hidden" value="二等奖"> 
										<input type="text" class="form-control" disabled="disabled" value="二等奖" maxlength="10" style="width:100px;">
										</td>
										<td><input id="cn_2" name="cn_2" type="text" class="form-control" value="<?php  echo $settings[0]['cn_2'];?>" maxlength="50"></td>
										<td><input id="cm_2" name="cm_2" type="text" class="form-control" value="<?php  echo $settings[0]['cm_2'];?>"></td>
										<td><input id="cr_2" name="cr_2" type="text" class="form-control" value="<?php  echo $settings[0]['cr_2'];?>"></td>
										
										<td><input id="ch_2" name="ch_2" type="text" class="form-control" value="<?php  echo $settings[0]['ch_2'];?>"></td>
									  </tr>
													<tr id="c_1">
														<td>
										<input name="ct_1" type="hidden" value="三等奖"> 
										<input type="text" class="form-control" disabled="disabled" value="三等奖" maxlength="10" style="width:100px;">
										</td>
														<td><input id="cn_1" name="cn_1" type="text" class="form-control" value="<?php  echo $settings[0]['cn_1'];?>" maxlength="50"></td>
														<td><input id="cm_1" name="cm_1" type="text" class="form-control" value="<?php  echo $settings[0]['cm_1'];?>"></td>
														<td><input id="cr_1" name="cr_1" type="text" class="form-control" value="<?php  echo $settings[0]['cr_1'];?>"></td>
														<td><input id="ch_1" name="ch_1" type="text" class="form-control" value="<?php  echo $settings[0]['ch_1'];?>"></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

							
							</div>
	
	
	
	
                     </div>
			

	<div class="panel panel-info">
			   <div class="panel-heading">
				  抽奖图片
				  <strong class="text-danger">
					<i class="fa fa-info-circle"></i> 抽奖图片，在开启抽奖功能时可以替换抽奖中的图片，请下载原图，根据原图制作，不用此功能，请保持默认！<br>
				 </strong>
			   </div>
			   <div class="panel-body">

				  <div class="form-group">   <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				   
					   <div class="col-sm-9">
							
								 <?php  echo tpl_form_field_image('jptupian',$settings[0]['jptupian']);?>
				       </div>
				   
				   
				   
				   </div>
				   
				   <div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品销核密码</label>
									<div class="col-sm-9">
										<input type="text" name="mima" class="form-control" value="<?php  echo $settings[0]['mima'];?>">
										<span class="help-block">请填写销核密码（例：12345678）用于奖品客户输入密码自行销核奖品。</span></div>
								</div>
								
								
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽奖总次数</label>
									<div class="col-sm-9">
										<input type="text" name="choujiangcishu" value="<?php  echo $settings[0]['choujiangcishu'];?>" class="form-control">
										<span class="help-block">请填写抽奖总次数为0不限制。</span></div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">中奖次数</label>
									<div class="col-sm-9">
										<input type="text" name="zjcishu" value="<?php  echo $settings[0]['zjcishu'];?>" class="form-control">
									
									</div>
								</div>
				   
				   
				   
				   

			   </div>
			   
			 
			</div>



					<div class="panel panel-info">

							 <div class="panel-heading">
								  分享界面设置
								  <strong class="text-danger">
									
								</strong>
							   </div>	
				
						
							<div class="panel-body">
								
								
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">模板ID</label>
									<div class="col-sm-9">
										<input type="text" name="templateid" value="<?php  echo $settings[0]['templateid'];?>" class="form-control">
										<span class="help-block">OPENTM411066871</span></div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享菜单修改</label>
									<div class="col-sm-9">
										<input type="text" name="fenxian" value="<?php  echo $settings[0]['fenxian'];?>" class="form-control">
										<span class="help-block">修改前端分享菜单的名称（最后一个菜单）</span></div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享菜单URL</label>
									<div class="col-sm-9">
										<input type="text" name="fenxianurl" value="<?php  echo $settings[0]['fenxianurl'];?>" class="form-control">
										<span class="help-block">修改前端分享菜单的URL，填写跳转地址（例：http://www.baidu.com/）</span></div>
								</div>
								
								
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信关注链接：</label>
									<div class="col-sm-9">
										<input type="text" name="keyword" value="<?php  echo $settings[0]['keyword'];?>" class="form-control">
										<span class="help-block">请填写引导关注链接在未关注的用户会跳到这个页面。</div>
								</div>
								<div class="form-group">
                                                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        标题：
                                                   </label>
                                                   <div class="col-sm-9">
                                                        <input type="text" name="name" value="<?php  echo $settings[0]['name'];?>" class="form-control" >
                                                    		
													
													</div>
                                          </div>
								<div class="form-group">
                                                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        分享标题：
                                                   </label>
                                                   <div class="col-sm-9">
                                                        <input type="text" name="fenxiangbiaoti" value="<?php  echo $settings[0]['fenxiangbiaoti'];?>" class="form-control" >
                                                    		
													
													</div>
                                          </div>
										
										
											<div class="form-group">
                                                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        分享说明：
                                                 </label>
                                                 <div class="col-sm-9">
                                                        <input type="text" name="fenxiangshuoming" value="<?php  echo $settings[0]['fenxiangshuoming'];?>" class="form-control" >
                                                          
                                                 </div>
                                         </div>
								<div class="form-group">
								
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">头部图片地址</label>
									
									<div class="col-sm-9">
									
										  <?php  echo tpl_form_field_image('touimg',$settings[0]['touimg']);?>
									</div>
								
								</div>
								
								<div class="form-group">
								
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">投票时间间隔（毫秒）：</label>
									
									<div class="col-sm-9">
										 <input type="text" name="tpvotetime" value="<?php  echo $settings[0]['tpvotetime'];?>" class="form-control">
										 <span class="help-block">
																				设置会计算所有人投一个人时的间隔时间(为0或为空表示不限制如：1000表示间隔为1秒)。
										  </span>
									</div>
								
								</div>
							
								
								
							</div>
							
						</div>			
				
			       <div class="panel panel-info">

					    <div class="panel-heading">
						  功能设置
						  <strong class="text-danger">
							
						  </strong>
					    </div>
				
			           <div class="panel-body">						
										
										
                                      <div class="form-group">
									  
									          <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 
									  
									           每天最多票数：</label>
                                              
                                               <div class="col-sm-9">
                                                        <input type="text" name="zuipiao" value="<?php  echo $settings[0]['zuipiao'];?>" class="form-control">
                                                        
                                                        <span class="help-block">
                                                                每天投票最多票数。
                                                        </span>
                                               	</div>	
                                       	</div>	
										
										
										<div class="form-group">
											<label class="col-xs-12 col-sm-3 col-md-2 control-label">每人每天同一人票数</label>
											<div class="col-sm-9">
												<input type="text" name="xiangtong" value="<?php  echo $settings[0]['xiangtong'];?>" class="form-control">
												<span class="help-block">每人每天同一人最多票数</span></div>
										</div>
										<div class="form-group">
									  
									             <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        上传图片最多张数：
                                                </label>
                                                <div class="col-sm-9">
                                                        <input type="text" name="zuiduotupian" value="<?php  echo $settings[0]['zuiduotupian'];?>" class="form-control" >
                                                        
													
                                                        <span class="help-block">
                                                                报名用户上传图片最多张数。
                                                        </span>
                                                </div>
                                       </div>	
										
										
										
										<div class="form-group">
                                               <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        虚拟参赛人数：
                                                </label>
                                                 <div class="col-sm-9">
                                                        <input type="text" name="censai" value="<?php  echo $settings[0]['censai'];?>" class="form-control" >
                                                    
                                                </div>
                                        </div>
										 	<div class="form-group">
                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        虚拟投票人数：
                                                 </label>
                                                 <div class="col-sm-9">
                                                        <input type="text" name="toupiaorenshu" value="<?php  echo $settings[0]['toupiaorenshu'];?>" class="form-control" >
                                                        
                                                </div>
                                         </div>
										 	<div class="form-group">
                                                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        虚拟浏览人数：
                                                   </label>
											<div class="col-sm-9">
                                                        <input type="text" name="liulanrenshu" value="<?php  echo $settings[0]['liulanrenshu'];?>" class="form-control" >
											
											           
											</div>
                                         </div>
										
	                                   <div class="form-group">
                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                   
                                                        总票数：
                                                 </label>
                                               <div class="col-sm-9">
                                                        <input type="text" name="zongpiaoshu" value="<?php  echo $settings[0]['zongpiaoshu'];?>" class="form-control" >
												
												          
												</div>
                                      </div>
									  
									  
									  
		                                <div class="form-group">
                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        分享总票数：
                                                </label>
												<div class="col-sm-9">
                                                        <input type="text" name="fengxiang" value="<?php  echo $settings[0]['fengxiang'];?>" class="form-control" >
                                                
													
												</div>
                                        </div>
	                                    <div class="form-group">
                                                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        可以投票的地区：
                                                </label>
                                              <div class="col-sm-9">
                                                        <input type="text" name="diqu" value="<?php  echo $settings[0]['diqu'];?>" class="form-control" >

                                                        <span class="help-block">例如：湖北-海南-深圳（为空或为0表示不限制）
                                                        </span>
														
                                                </div>
										</div>
										
										
											
										
											
										

										<div class="form-group">
                                                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                       报名红包（元）：
                                                 </label>
                                                 <div class="col-sm-9">
                                                       <input type="text" name="bmhb" value="<?php  echo $settings[0]['bmhb'];?>" class="form-control" >
	                                                     <span class="help-block">不会填，请为空或填0
                                                        </span>
												</div>
                                          </div>
											
											
											<div class="form-group">
                                                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        跳转地址：
                                                 </label>
                                                 <div class="col-sm-9">
                                                        <input type="text" name="tiaozhuandizhi" value="<?php  echo $settings[0]['tiaozhuandizhi'];?>" class="form-control" >
	                                                     <span class="help-block">不会填，请为空或填0
                                                        </span>
												</div>
                                          </div>
											
											
											<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        是否有oAuth授权：
												</label>	
												<div class="col-sm-9">
													<div class="input-group">
												
															<input type="radio" name="oauth" value="1" <?php  if($settings[0]['oauth']){ echo "checked='checked'";}?>>
															有
															<input type="radio" name="oauth" value="0"  <?php  if(!$settings[0]['oauth']){ echo "checked='checked'";}?>>
															无
													</div>
												
												</div>
                                          </div>
										

													
																					
						</div>
						
					</div>	
										
										
										
										
										
										
						                <div class="panel panel-info">
										<div class="panel-heading">
											活动说明设置
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 活动说明：</label>
												<div class="col-sm-8 col-xs-12">
														<?php  echo tpl_ueditor('huodong_sm', $settings[0]['huodong_sm']);?>
												
												</div>
											</div>
											
											
											
										</div>
										</div>
										
										
										
										
										
										
                                     <div class="panel panel-info">
												<div class="panel-heading">
													温馨提示设置
												</div>
												
												 <div class="panel-body">
													<div class="form-group">
														<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 温馨提示：</label>
														<div class="col-sm-8 col-xs-12">
																<?php  echo tpl_ueditor('weng_x', $settings[0]['weng_x']);?>
															
														</div>
													</div>
												</div>
										</div>	
										
										
										
										<div class="panel panel-info">
												<div class="panel-heading">
													活动奖品设置
												</div>
												 <div class="panel-body">
													<div class="form-group">
														<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 活动奖品：</label>
														<div class="col-sm-8 col-xs-12">
															<?php  echo tpl_ueditor('jian_p', $settings[0]['jian_p']);?>

														</div>
													</div>
												</div>
										
										</div>
										
										<div class<div class="panel panel-info">
												<div class="panel-heading">
													抽奖介绍设置
												</div>
												 <div class="panel-body">
													<div class="form-group">
														<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 抽奖介绍：</label>
														<div class="col-sm-8 col-xs-12">
																		<?php  echo tpl_ueditor('choujianjiesao', $settings[0]['choujianjiesao']);?>
														
														</div>
													</div>
												</div>
                                      
                                       </div>
									   
                             <!--    <div class="panel panel-info">
												<div class="panel-heading">
													活动设置
												</div>
												
											  <div class="panel-body">
									   
												

													
											</div>
                                 </div> -->



			
									   
									   
									
                                    
                               
                                 <div class="panel panel-info">
												<div class="panel-heading">
													基础设置
												</div>       
									   <div class="panel-body">
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   
									   												  	<div class="form-group" >
															<label class="col-xs-12 col-sm-3 col-md-2 control-label">
																	活动时间：
															</label>
															<div class="col-sm-9">
																<?php  echo tpl_form_field_daterange('work2', array('start'=> $settings[0]['kaitime'],'end' =>$settings[0]['endtime']), true);?>   
																
															</div>
														
													</div>
													
													
													<div class="form-group" style="margin-top:5px;">
														   <label class="col-xs-12 col-sm-3 col-md-2 control-label">
																	显示"我的"菜单：
															</label>
															<div class="col-sm-9">
																<div class="input-group">
																		<input type="radio" name="wode" value="1" <?php  if($settings[0]['wode']){ echo "checked='checked'";}?>>
																		开启
																		<input type="radio" name="wode" value="0"  <?php  if(!$settings[0]['wode']){ echo "checked='checked'";}?>>
																		关闭
															    </div> 
															
														 </div>
													</div>
									   
									   
									   
									   
									   
										<div class="form-group">
                                               <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        显示"我的"菜单：
                                                </label>
												<div class="col-sm-9 col-sm-9 col-xs-12"><div class="input-group">
                                                        <input type="radio" name="wode" value="1" <?php  if($settings[0]['wode']){ echo "checked='checked'";}?>>
                                                        开启
                                                        <input type="radio" name="wode" value="0"  <?php  if(!$settings[0]['wode']){ echo "checked='checked'";}?>>
                                                        关闭
                                             </div>
											 
											   
											 </div>
										</div>
										<div class="form-group">
                                               <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        开启缓存：
                                                </label>
												<div class="col-sm-9 col-sm-9 col-xs-12">
													<div class="input-group">
															<input type="radio" name="huancun" value="1" <?php  if($settings[0]['huancun']){ echo "checked='checked'";}?>>
															开启
															<input type="radio" name="huancun" value="0"  <?php  if(!$settings[0]['huancun']){ echo "checked='checked'";}?>>
															关闭
													</div>
													 
												
												</div>
                                        </div>
										
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">
																开启报名：
												</label>

												<div class="col-sm-9 col-sm-9 col-xs-12"><div class="input-group">
																<input type="radio" name="display" value="1" <?php  if($settings[0]['display']){ echo "checked='checked'";}?>>
																开启
																<input type="radio" name="display" value="0"  <?php  if(!$settings[0]['display']){ echo "checked='checked'";}?>>
																关闭
												</div>
												
												
												</div>
                                         </div>
										<div class="form-group">
                                             <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        是否审核：
                                             </label>
											<div class="col-sm-9 col-sm-9 col-xs-12"><div class="input-group">
                                                        <input type="radio" name="shenhe" value="1" <?php  if($settings[0]['shenhe']){ echo "checked='checked'";}?>>
                                                        开启
                                                        <input type="radio" name="shenhe" value="0"  <?php  if(!$settings[0]['shenhe']){ echo "checked='checked'";}?>>
                                                        关闭
										     </div>
											
											 
											 </div>
                                        </div>
										
										
										<div class="form-group">
                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        关注投票：
                                                </label>
                                                <div class="col-sm-9 col-sm-9 col-xs-12"><div class="input-group">
                                                        <input type="radio" name="guanzhu" value="1" <?php  if($settings[0]['guanzhu']){ echo "checked='checked'";}?>>
                                                        开启
                                                        <input type="radio" name="guanzhu" value="0"  <?php  if(!$settings[0]['guanzhu']){ echo "checked='checked'";}?>>
                                                        关闭
                                                </div>
												
											
												
												</div>
                                        </div>
										
											<div class="form-group">
											    <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        支付借权：
                                                </label>

                                                <div class="col-sm-9 col-sm-9 col-xs-12"><div class="input-group">
                                                        <input type="radio" name="zhifujiequn" value="1" <?php  if($settings[0]['zhifujiequn']){ echo "checked='checked'";}?>>
                                                        开启
                                                        <input type="radio" name="zhifujiequn" value="0"  <?php  if(!$settings[0]['zhifujiequn']){ echo "checked='checked'";}?>>
                                                        关闭
												</div>
												
												
												
												</div>
                                        </div>
										<div class="form-group">
                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        获取用户信息：
											    </label>
                                                 <div class="col-sm-9"><div class="input-group">
                                                        <input type="radio" name="toupiaojiequn" value="1" <?php  if($settings[0]['toupiaojiequn']){ echo "checked='checked'";}?>>
                                                        开启
                                                        <input type="radio" name="toupiaojiequn" value="0"  <?php  if(!$settings[0]['toupiaojiequn']){ echo "checked='checked'";}?>>
                                                        关闭
                                                </div> 
												
												
												</div>
                                       </div>
										
										<div class="form-group"> 

										<label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        是否开启抽奖：
										</label>
                                           <div class="col-sm-9"><div class="input-group">
                                                        <input type="radio" name="ischouqian" value="1" <?php  if($settings[0]['ischouqian']){ echo "checked='checked'";}?>>
                                                        开启
                                                        <input type="radio" name="ischouqian" value="0"  <?php  if(!$settings[0]['ischouqian']){ echo "checked='checked'";}?>>
                                                        关闭
											</div>
										
											
											</div>
										</div>										
	                                    <div class="form-group">
                                               <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                                        是否开启内购礼物：
                                               </label>
										
                                                <div class="col-sm-9">
											
											
													<div class="input-group">
																<input type="radio" name="isliwu" value="1" <?php  if($settings[0]['isliwu']){ echo "checked='checked'";}?>>
																开启
																<input type="radio" name="isliwu" value="0"  <?php  if(!$settings[0]['isliwu']){ echo "checked='checked'";}?>>
																关闭
													</div>
													
													 
                                                </div>
										
										
										</div>
										

										  
										<div class="form-group">
											<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
											<div class="col-sm-9">
												<input name="submit" type="submit" value="提交" class="btn btn-primary span3" style="height:30px">
												
										     </div>

                                         </div>
										  </div>
							</div>	 
				 
							</form>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>