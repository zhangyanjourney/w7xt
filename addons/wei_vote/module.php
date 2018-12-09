<?php
/**
 * 投票活动模块定义
 *
 * @author zhouchong
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Wei_voteModule extends WeModule {
	public $tablename = 'wei_vote_reply';
	public function fieldsFormDisplay($rid = 0) {
		//要嵌入规则编辑页的自定义内容，这里 $rid 为对应的规则编号，新增时为 0
		global $_W;
		if (!empty($rid)) {
			$reply = pdo_fetch("SELECT * FROM ".tablename($this->tablename)." WHERE acid = :acid AND rid = :rid ORDER BY `id` DESC", array(':acid' => $_W['uniacid'], ':rid' => $rid));
		}
		load()->func('tpl');
		include $this->template('form');
	}

	public function fieldsFormValidate($rid = 0) {
		//规则编辑保存时，要进行的数据验证，返回空串表示验证无误，返回其他字符串将呈现为错误提示。这里 $rid 为对应的规则编号，新增时为 0
		return '';
	}

	public function fieldsFormSubmit($rid) {
		global $_GPC, $_W;
		$id = intval($_GPC['reply_id']);
		$data = array(
			'acid' => $_W['uniacid'],
			'rid' => $rid,
			'title' => $_GPC['title'],
			'avatar' => $_GPC['avatar'],
			'description' => $_GPC['description'],
			'dateline' => time()
		);
		if(empty($id)) {
			pdo_insert($this->tablename, $data);
		}else {
			pdo_update($this->tablename, $data, array('id' => $id));
		}
	}

	public function ruleDeleted($rid) {
		//删除规则时调用，这里 $rid 为对应的规则编号
	}

	public function settingsDisplay($settings) {
		global $_W, $_GPC;
		//点击模块设置时将调用此方法呈现模块设置页面，$settings 为模块设置参数, 结构为数组。这个参数系统针对不同公众账号独立保存。
		//在此呈现页面中自行处理post请求并保存设置参数（通过使用$this->saveSettings()来实现）
		global $_W;
		$sql = 'SELECT * FROM ' . tablename('wei_vote_peizhi') . ' WHERE uniacid = :uniacid';
		//'SELECT 'settings' FROM ' . tablename('uni_account_modules') . ' WHERE 'uniacid' = :uniacid';
		$settings = pdo_fetchall($sql, array(':uniacid' => $_W['uniacid']));
		//$this->settings = iunserializer($settings);
		$this->settings = $settings;
		
		
		if(checksubmit()) {
			//字段验证, 并获得正确的数据$dat
			$this->saveSettings($dat);
		}
		//这里来展示设置项表单
		include $this->template('setting');
	}

}