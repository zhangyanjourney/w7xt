<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_head_topnew', TEMPLATE_INCLUDEPATH)) : (include template('common_head_topnew', TEMPLATE_INCLUDEPATH));?>
<style>
.mui-icon img {
   
    width: 100%;
}


</style>
	
	<?php  if($this->settings[0]['jian_p'] != '') { ?>
                <div style="padding:10px">
							
								
					<?php  echo html_entity_decode($this->settings[0]['jian_p'], ENT_QUOTES)?>
					
				
			    </div>
			<?php  } ?>
 


<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew', TEMPLATE_INCLUDEPATH));?>