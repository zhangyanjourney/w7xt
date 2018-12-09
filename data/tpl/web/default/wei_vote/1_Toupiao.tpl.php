<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>



   <script>
	     
		   function fun(){
				obj = document.getElementsByName("delete");
				check_val = [];
				for(k in obj){
					if(obj[k].checked)
						check_val.push(obj[k].value);
				}
				
				
				$.post("<?php  echo $this->createWebUrl('Delajaxjilu', array())?>", { "checkval": check_val },
				function(data){
				  
				  
				 //alert(data.msg); // John
				  
				  location.reload(); 

				  console.log(data); //  2pm
				  
				  
				  
				  }, "json");
						
				
				
				
			}
		     
		
	</script>





	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;overflow:hidden;">删？</th>
				
					
					<th style="width:140px;overflow:hidden;">头像</th>
					<th style="width:90px;overflow:hidden;">编号</th>
					<th style="width:90px;overflow:hidden;">OPENID</th>
					<th style="width:170px;overflow:hidden;">IP/时间</th>
					<th style="width:270px;overflow:hidden;">地点</th>
					
	
				
					<th style="min-width:70px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
	<?php  if(is_array($urs)) { foreach($urs as $i => $item) { ?>
				<tr>
					<tr>
	 	<td class="text-left vertical-middle"><input class="check-delete tagids-<?php  echo $item['id'];?>" type="checkbox" name="delete" value="<?php  echo $item['id'];?>" data-tagids="" data-openid="" data-fanid="<?php  echo $item['id'];?>"></td>

		 
		  <td class="text-left vertical-middle">
		  <p>
		  <img src="<?php  echo $item['avatar'];?>" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </p>
		  <p>
		<?php  echo $item['nickname'];?>
		  </p>
		  </td>
		  <td class="text-left vertical-middle"><?php  echo $item['pid'];?></td>
		  <td class="text-left vertical-middle">
		    <p><?php  echo $item['openid'];?></p>
		    <p><span class="label label-danger" onclick="addblack('<?php  echo $item['openid'];?>',0,<?php  echo $item['id'];?>);">加入黑名单</span></p> 
		  </td>
		   <td class="text-left vertical-middle">
		  
		    <p><?php  echo $item['ip'];?></p>
		    <p><span class="label label-danger" onclick="addblack('<?php  echo $item['ip'];?>',1,<?php  echo $item['id'];?>);">加入黑名单</span></p>  
		   
		   </td>
		   <td class="text-left vertical-middle">
				<p><?php  echo date('Y-m-d H:i:s', $item['time']);?></p>
				<p><?php  echo $item['didian'];?></p>
				<p>
				<?php  if($item['isxulitp'] ==1) { ?>
						<span class="label label-danger">用户数据</span>
						<?php  } else if($item['isxulitp'] == 2) { ?>
						<span class="label label-success">管理数据</span>
						<?php  } else { ?>
						<span class="label label-danger">特殊数据</span>
						<?php  } ?>
				</p>  
		   
		   </td>
		  
		  <td class="text-right text-left vertical-middle" style="overflow:visible;">

		  <a class="btn btn-default btn-sm" onclick="javascript:return del()" href="<?php  echo $this->createWebUrl('Toupiao', array('id' => $item['id'], 'pid' => $_GPC['id'], 'hdid' => $_GPC['hdid'], 'op' => 'del'))?>">删除</a>
		  </td>
		</tr>
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

	<!-- 				<a class="btn btn-primary span2" href="<?php  echo $this->createWebUrl('Toupiao', array('op' => 'qingkong'))?>">清空投票记录</a> &nbsp;  -->
					<a class="btn btn-primary span2" href="<?php  echo $this->createWebUrl('Staff', array('hdid' => $_GPC['hdid'],'id' => $_GPC['id']))?>">导出</a>
					</td>
			</tr>
			<tr>
				<td colspan="2">
					<!-- <span class="help-block">清空投票记录: 会清空投票的所有记录</span> -->
					<span class="help-block">导出: 会导出投票记录</span>

				</td>
			</tr>
		</tbody></table>
	</div>
	</div>
	<div class="footactions" style="padding-left:10px">
		<div class="pages" style="text-align:right;"><?php  echo $pager;?></div>
	</div>
  
  <script>



function addblack(val,type,uid){
            
			
            $.post("<?php  echo $this->createWebUrl('blacklist',array())?>", { val: val,type:type,uid:uid },
			function(data){
			
				  if (data.type == 'success') { 

			               alert("添加成功");

						}else{

							alert("已添加"); 

						}
				
				  
				  }, "json");
   
   

}	

function drop_confirm(msg, url){

            if (confirm(msg)){

            window.location = url;

            }

 }
 
 function del() {   var msg = "您真的确定要删除吗？\n\n请确认！";   if (confirm(msg)==true){    return true;   }else{    return false;   }  }  

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>