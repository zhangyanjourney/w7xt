<?php
/**
 * 投票活动模块处理程序
 *
 * @author zhouchong
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Wei_voteModuleProcessor extends WeModuleProcessor {
	public $tablename = 'wei_vote_reply';
	public function respond() {
		/* global $_W, $_GPC;
	    */
		 $content = $this->message['content'];
       
		$c = '';
        foreach ($this->message as $key => $value) {
            $c .= "$key : $value \r\n";
        }
	
		return $this->respText('您触发了模块'.$c);
		
		
		
		
	}
}