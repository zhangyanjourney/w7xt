<?php
/**
 * 投票活动模块订阅器
 *
 * @author zhouchong
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Wei_voteModuleReceiver extends WeModuleReceiver {
	public function receive() {
		 global $_W, $_GPC;
        $type = $this->message['type'];
        
		//载入日志函数
		//load()->func('logging');
		
		//记录数组数据
		//logging_run($this->message);
		
		//记录数组数据
		//logging_run($_GPC);return;
		
        if($this->message['event'] == 'unsubscribe'){

				$sql22 = 'SELECT openid,pid,count(pid) AS mf FROM ' . tablename('wei_vote_jilu') . ' WHERE uniacid = :uniacid and openid = :openid group by pid';
				
				$user11 = pdo_fetchall($sql22, array(':uniacid' => $_W['uniacid'],'openid' =>$this->message['fromusername']));
				
			
			foreach ($user11 as $key => $v) { 
			        
			   $arrq[$v['pid']] = $v['mf'];  
			}  
            // $last = $this->i_array_column($user11,'mf','pid');
            $last = $arrq;
	     
			$kk = implode(',', array_keys($last)); 
				$sql33 = 'SELECT * FROM ' . tablename('wei_vote_up') . ' WHERE uniacid = :uniacid and id IN ('.$kk.')';
				
				$user33 = pdo_fetchall($sql33, array(':uniacid' => $_W['uniacid']));
			
				 
				 foreach ($user33 as $key => $v) { 
			        
				   $arrw[$v['id']] = $v['piao'];  
				}
				 
				$last1 = $arrw;
				 
				//$last1 = $this->i_array_column($user33,'piao','id');	
			 
				$arr=$this->array_add($last1,$last); 
		  
			

                $display_order = $arr; 

				$ids = implode(',', array_keys($display_order)); 
				$sql = "UPDATE ".tablename('wei_vote_up')." SET piao = CASE id "; 
				foreach ($display_order as $id => $ordinal) { 
					$sql .= sprintf("WHEN %d THEN %d ", $id, $ordinal); 
				} 
				$sql .= "END WHERE id IN ($ids)"; 

                $result = pdo_query($sql);
				
				$result2 = pdo_delete('wei_vote_jilu', array('openid' => $this->message['fromusername'],uniacid => $_W['uniacid'])); 
				
				
			
				
				
				/* foreach ($user11 as $key => $value) { 
					$user = pdo_fetch("SELECT piao, wuxiao, id FROM ".tablename('wei_vote_up')." WHERE id = :id LIMIT 1", array(':id' =>$value['pid']));
					$ft = $user['wuxiao']+$value['mf'];
					$ft1 = $user['piao']-$value['mf'];
					
						$user_data = array(
							
							'wuxiao' => $ft,
							'piao' => $ft1,
						);
						
						$result = pdo_update('wei_vote_up', $user_data, array('id' => $user['id']));
					 
						
										
				}
			   $result2 = pdo_delete('wei_vote_jilu', array('openid' => $this->message['fromusername'],uniacid => $_W['uniacid'])); */
		}
		
	
    }
	
	/* public function i_array_column($input, $columnKey, $indexKey=null){
    if(!function_exists('array_column')){ 
        $columnKeyIsNumber  = (is_numeric($columnKey))?true:false; 
        $indexKeyIsNull            = (is_null($indexKey))?true :false; 
        $indexKeyIsNumber     = (is_numeric($indexKey))?true:false; 
        $result                         = array(); 
        foreach((array)$input as $key=>$row){ 
            if($columnKeyIsNumber){ 
                $tmp= array_slice($row, $columnKey, 1); 
                $tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null; 
            }else{ 
                $tmp= isset($row[$columnKey])?$row[$columnKey]:null; 
            } 
            if(!$indexKeyIsNull){ 
                if($indexKeyIsNumber){ 
                  $key = array_slice($row, $indexKey, 1); 
                  $key = (is_array($key) && !empty($key))?current($key):null; 
                  $key = is_null($key)?0:$key; 
                }else{ 
                  $key = isset($row[$indexKey])?$row[$indexKey]:0; 
                } 
            } 
            $result[$key] = $tmp; 
        } 
        return $result; 
    }else{
        return array_column($input, $columnKey, $indexKey);
    }
    } */
	

		public function array_add($a,$b){ 
		//根据键名获取两个数组的交集 
		$arr=array_intersect_key($a, $b); 
		//遍历第二个数组，如果键名不存在与第一个数组，将数组元素增加到第一个数组 
		foreach($b as $key=>$value){ 
		if(!array_key_exists($key, $a)){ 
		$a[$key]=$value; 
		} 
		} 
		//计算键名相同的数组元素的和，并且替换原数组中相同键名所对应的元素值 
		foreach($arr as $key=>$value){ 
		$a[$key]=$a[$key]-$b[$key]; 
		} 
		//返回相加后的数组 
		return $a; 
		} 
		


	
}