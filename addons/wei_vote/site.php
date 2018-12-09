<?php
/**
 * 投票活动模块微站定义
 *
 * @author zhouchong
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

define('TEMPLATE_PATH', '../addons/wei_vote/template/style/');
define('MB_ROOT', IA_ROOT . '/addons/wei_vote');
class Wei_voteModuleSite extends WeModuleSite {
	private $tb_vote = 'wei_vote_up';
	
	public $sc = 2;
	public $settings;
	public $user_total;
	public $piao_total;
	public $replys;
	public function __construct() {
		global $_GPC, $_W;
		$uniacidpeizhi = $_W['uniacid'].'peizhi'.$_GPC['hdid'];
		$rd = rand(1,20);
		if($rd == 5){
			cache_delete($uniacidpeizhi);
		}
		
		$result = cache_load($uniacidpeizhi);
		if($result){
			$settings = cache_load($uniacidpeizhi);
		    $this->settings = $settings;
		 }else{
			$sql = 'SELECT * FROM ' . tablename('wei_vote_peizhi') . ' WHERE uniacid = :uniacid and id=:hdid';
			 $settings = pdo_fetchall($sql, array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			 /* if($_GPC['c'] == 'entry'){
				 
				 if(empty($settings)){
					 
					 echo '活动不存在！';exit();
				 }
				 
			 } */
			 
			 $this->settings['0'] = iunserializer($settings['0']['xlh']);	
			 $this->settings['0']['liulan'] = $settings['0']['liulan'];
			$this->settings['0']['cn_4'] = $settings['0']['cn_4'];
					$this->settings['0']['cm_4'] = $settings['0']['cm_4'];
					$this->settings['0']['cr_4'] = $settings['0']['cr_4'];
					$this->settings['0']['ch_4'] = $settings['0']['ch_4'];
					$this->settings['0']['ct_3'] = $settings['0']['ct_3'];
					$this->settings['0']['cn_3'] = $settings['0']['cn_3'];
					$this->settings['0']['cm_3'] = $settings['0']['cm_3'];
					$this->settings['0']['cr_3'] = $settings['0']['cr_3'];
					$this->settings['0']['ch_3'] = $settings['0']['ch_3'];
					$this->settings['0']['ct_2'] = $settings['0']['ct_2'];
					$this->settings['0']['cn_2'] = $settings['0']['cn_2'];
					$this->settings['0']['cm_2'] = $settings['0']['cm_2'];
					$this->settings['0']['cr_2'] = $settings['0']['cr_2'];
					$this->settings['0']['ch_2'] = $settings['0']['ch_2'];
					$this->settings['0']['ct_1'] = $settings['0']['ct_1'];
					$this->settings['0']['cn_1'] = $settings['0']['cn_1'];
					$this->settings['0']['cm_1'] = $settings['0']['cm_1'];
					$this->settings['0']['cr_1'] = $settings['0']['cr_1'];
					$this->settings['0']['ch_1'] =$settings['0']['ch_1'];
			 $settings[0] = $this->settings['0']; 
			
			 cache_write($uniacidpeizhi, $this->settings);
		}
		
		if ($settings[0]['huancun'] == 1) {
		} else {
			cache_delete($uniacidpeizhi);			
		}
		
	
		$this->kaishi = 0;
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if (strpos($user_agent, 'MicroMessenger') === false) {
		} else {
			if ($settings[0]['tiaozhuandizhi']) {
				if ($_SERVER['HTTP_HOST'] != $settings[0]['tiaozhuandizhi']) {
					if ($settings[0]['oauth'] == 1) {
						
						$hosturl = $_SERVER['REQUEST_SCHEME'].'://'.$settings[0]['tiaozhuandizhi'].$_SERVER['REQUEST_URI']. '&openid=' . $_W['openid'] . '&cc=' . $_W['fans']['follow'];
						Header("Location: $hosturl");
						exit();
						
						
					} else {
						$hosturl = $_SERVER['REQUEST_SCHEME'].'://'.$settings[0]['tiaozhuandizhi'].$_SERVER['REQUEST_URI'].'&wxdm=1';
						Header("Location: $hosturl");
						exit();
					
					}
				}
				/* $_SESSION['openid'] = $_SESSION['fans']['openid'] = $_GPC['openid'];
				$_SESSION['fans']['follow'] = $_GPC['cc'];
				if ($_GPC['cc']) {
					
					$hosturl = $_SERVER['REQUEST_SCHEME'].'://'.$settings[0]['tiaozhuandizhi'].$_SERVER['REQUEST_URI'].'&wxdm=1';
					Header("Location: $hosturl");
					exit();
					
				} */
			}
		}
        
	
		
	    if ($this->settings[0]['muban'] == 0) {
			
					$this->replys['template'] = 0;
		}elseif($this->settings[0]['muban'] == 1){
					
					$this->replys['template'] = 'new1';
		}elseif($this->settings[0]['muban'] == 2){
					
					$this->replys['template'] = 'new';
		}elseif($this->settings[0]['muban'] == 3){
					
					$this->replys['template'] = 'new3';
		}elseif($this->settings[0]['muban'] == 4){
					
					$this->replys['template'] = 'new4';
		}elseif($this->settings[0]['muban'] == 5){
					
					$this->replys['template'] = 'new5';
		}else{
			$this->replys['template'] = 0;
		}
		
		
		$this->settings[0][touimg] = tomedia($this->settings[0][touimg]);
	    $this->user_total = $user_total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid = :hdid LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		
		$this->piao_total = $piao_total = pdo_fetchcolumn('SELECT sum(piao) FROM ' . tablename('wei_vote_up') . " WHERE   uniacid = :uniacid  and hdid = :hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			
		
		pdo_update('wei_vote_peizhi', array('liulan +=' => 1), array('uniacid' => $_W['uniacid'],'id' => $_GPC['hdid']));
	

	}
	
	public function is_https() {
		if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
			return true;
		} elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
			return true;
		} elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
			return true;
		}
		return false;
	}
	public function doMobileCodeyz() {
		global $_GPC, $_W;
		error_reporting(0);
		load()->classs('captcha');
		session_start();
		$captcha = new Captcha();
		$captcha->build(150, 40);
		$hash = md5(strtolower($captcha->phrase) . $_W['config']['setting']['authkey']);
		isetcookie('__code', $hash);
		$_SESSION['__code'] = $hash;
		$captcha->output();

	
	
	}
	
	
	public function doWebClip() {
		global $_GPC, $_W;
		$sql = 'SELECT * FROM ' . tablename('wei_vote_peizhi') . ' WHERE uniacid = :uniacid and id=:hdid';
		$settings = pdo_fetch($sql, array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		/* $user_data = array(
			'username' => 'mizhou1',
			'status' => '1',
		); */
		$settings['liulan']=0;
		unset($settings['id']);
		$result = pdo_insert('wei_vote_peizhi', $settings);
		if (!empty($result)) {
			$uid = pdo_insertid();
			message('添加成功');
		}else{
			
			message('添加失败');
		} 
	
	
	}

	public function doWebMail() {
	global $_GPC, $_W;

    $post_data = 'mail='.$_GPC['mail'];

    $url='http://wx.zc91.cn/email/mail.php';  
  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_POST, 1);  
    curl_setopt($ch, CURLOPT_URL,$url);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);  
    ob_start();  
    curl_exec($ch);  
    $result = ob_get_contents() ;  
    ob_end_clean();  
  

echo json_encode($result);

	
	}
	
	public function doWebShuju(){
		global $_GPC, $_W;
		
		if($this->moshi == 1 && $_W['isfounder'] != 'true'){
				
			$pieces = pdo_fetchall("SELECT id FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid  and user=:user ORDER BY id DESC", array(':uniacid' => $_W['uniacid'],':user' => $_W['username']));
		    for($i=0;$i<count($pieces);$i++){
				$uname=$uname."'".$pieces[$i]['id']."',";
			}
			$the_uname ="hdid in(".$uname."'')";
			$the_unames ="id in(".$uname."'')";
			
			
			
			$y = date("Y");
			$m = date("m");
			$d = date("d");
			$todayTime = mktime(0, 0, 0, $m, $d, $y);
			$todayendTime = mktime(23, 59, 59, $m, $d, $y);
			$item['dailyjointotal'] = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and time > :todayTime and time < :todayendTime  and {$the_uname} ", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid']));
			$item['dailyvotetotal'] = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and time > :todayTime and time < :todayendTime  and {$the_uname}", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid']));
			$item['dailygiftnum'] = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and isgl = :isgl and createtime > :todayTime and createtime < :todayendTime and {$the_uname}", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid'],':isgl'=> 1));
			$item['dailygiftcount'] = pdo_fetchcolumn("SELECT sum(jiner) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and iszhifu=:iszhifu and isgl = :isgl and createtime > :todayTime and createtime < :todayendTime and {$the_uname}", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid'],':iszhifu' => 2,':isgl'=> 1));
			$item['dailygiftcount'] = !empty($item['dailygiftcount']) ? $item['dailygiftcount'] : 0;
			$item['pvtotal'] = pdo_fetchcolumn("SELECT sum(liulan) FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid and {$the_unames} ", array(':uniacid' => $_W['uniacid']));
			$item['votetotal'] = pdo_fetchcolumn('SELECT COUNT(id) FROM ' . tablename('wei_vote_jilu') . " WHERE  {$the_uname} and   uniacid = :uniacid", array(':uniacid' => $_W['uniacid']));
			$item['jointotal'] = pdo_fetchcolumn('SELECT COUNT(id) FROM ' . tablename('wei_vote_up') . " WHERE   uniacid = :uniacid  and {$the_uname} ", array(':uniacid' => $_W['uniacid']));
			$item['giftcount'] = pdo_fetchcolumn('SELECT sum(jiner) FROM ' . tablename('wei_vote_userlog') . " WHERE {$the_uname} and  uniacid = :uniacid AND iszhifu=2 AND isgl=1  ", array(':uniacid' => $_W['uniacid']));
			$item['zssj'] = pdo_fetchcolumn('SELECT sum(jiner) FROM ' . tablename('wei_vote_userlog') . " WHERE   uniacid = :uniacid AND iszhifu=2 and {$the_uname}", array(':uniacid' => $_W['uniacid']));
			
		}else{
			
			$y = date("Y");
			$m = date("m");
			$d = date("d");
			$todayTime = mktime(0, 0, 0, $m, $d, $y);
			$todayendTime = mktime(23, 59, 59, $m, $d, $y);
			$item['dailyjointotal'] = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid']));
			$item['dailyvotetotal'] = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid']));
			$item['dailygiftnum'] = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and createtime > :todayTime and createtime < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid']));
			$item['dailygiftcount'] = pdo_fetchcolumn("SELECT sum(jiner) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and iszhifu=:iszhifu and createtime > :todayTime and createtime < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':uniacid' => $_W['uniacid'],':iszhifu' => 2));
			$item['dailygiftcount'] = !empty($item['dailygiftcount']) ? $item['dailygiftcount'] : 0;
			$item['pvtotal'] = pdo_fetchcolumn("SELECT sum(liulan) FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid ", array(':uniacid' => $_W['uniacid']));
			$item['votetotal'] = pdo_fetchcolumn('SELECT COUNT(id) FROM ' . tablename('wei_vote_jilu') . " WHERE   uniacid = :uniacid", array(':uniacid' => $_W['uniacid']));
			$item['jointotal'] = pdo_fetchcolumn('SELECT COUNT(id) FROM ' . tablename('wei_vote_up') . " WHERE   uniacid = :uniacid  ", array(':uniacid' => $_W['uniacid']));
			$item['giftcount'] = pdo_fetchcolumn('SELECT sum(jiner) FROM ' . tablename('wei_vote_userlog') . " WHERE   uniacid = :uniacid AND iszhifu=2 ", array(':uniacid' => $_W['uniacid']));
			$item['je'] = pdo_fetchall("SELECT createtime,FROM_UNIXTIME(createtime,'%Y%m%d') days,SUM(jiner) count FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid AND iszhifu=2   group by days ORDER BY createtime desc LIMIT 7 ", array(':uniacid' => $_W['uniacid']));
			// select createtime , FROM_UNIXTIME(createtime,'%Y%m%d') as days,sum(jiner) as count from ims_wei_vote_userlog  group by days ORDER BY createtime desc LIMIT 7
			
		}
		$cd = array_column($item['je'], 'count','days');
		//print_r($cd);
		
		
		for ($i = 6; 0 <= $i; $i--) {
			
			   $dy = date('Ymd', strtotime('-' . $i . ' day'));
		       $result[$i]['y'] = $dy;
			   if(empty($cd[$dy])){
				   
				   $cd[$dy] = 0;
			   }
		       $result[$i]['c'] = $cd[$dy];
			   $tianshu[]= $dy;
			   $mtje[]= $cd[$dy];
		}
		
		//print_r($result);
		//print_r($tianshu);
		//print_r($mtje);
		$tianshu_zfc = implode(",", $tianshu);
		$mtje_zfc = implode(",", $mtje);
		//print_r($tianshu_zfc);
		//print_r($mtje_zfc);
		
	    include $this->template('shuju');
	}
	
	
	public function doWebBlacklist(){
		 global $_GPC, $_W;
		 $type=intval($_GPC['type']);
		 $val=$_GPC['val']; $uid=$_GPC['uid'];
		 $data = array(
		     'uniacid'=>$_W['uniacid'],
		     'type' => $type,
		  
			 'ip'=>$val,
	         'createtime'=>time(),
	     );	
		 $results = pdo_fetch("SELECT * FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and id =:id ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':id' => $uid));
		 $ip = pdo_fetch("SELECT * FROM " . tablename('wei_vote_ip') . " WHERE uniacid = :uniacid and ip =:ip ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':ip' => $val));
		 if(!empty($ip)){
			 $data['type'] = '';
			echo json_encode($data);
			exit();
			 
		 } 	
		 if($type==1){
			
			$data['val'] = $results['didian'];
			 
		 }else{
			 
			 $data['val'] = $results['nickname'];
			 
		 }
		 
		
		$re=pdo_insert('wei_vote_ip', $data);
		if($re){
		  
			$data['type'] = 'success';
			echo json_encode($data);
			exit();	  
			
		}else{
			
			$data['type'] = 'success';
			echo json_encode($data);
			exit();	 
			
		}	
		
	}

	 public function doWebUploadvote() {
	    global $_GPC, $_W;
	     if($_W['ispost']){
			$hdid = $_GPC['hdid'];
		    $cture=0;
			$cflase=0;
			for ($k = 0; $k < count($_POST['imgname']); $k++) {
				
				
				
				$instdata = array(
					'hdid'=>$hdid,
					'uniacid'=>$_W['uniacid'],
					'tupian'=>$_POST['imgurl'][$k].',', 
					'name'=>$_POST['imgname'][$k],
					'time'=>time(),
					'isshenhe'=>2,
				);
				$f = tomedia($_POST['imgurl'][$k]);
				$aa = @getimagesize($f);
				$instdata['weight'] = $aa['0'];
				$instdata['height'] = $aa['1'];
				$lastid = pdo_getall('wei_vote_up', array('hdid' => $hdid, 'uniacid' => $_W['uniacid']), array('bh') , '' , 'bh DESC' , array(1));
				$instdata['bh']=$lastid[0]['bh']+1;
				
				$result =pdo_insert('wei_vote_up', $instdata);
				if($result){
					$cture++;
				}else{
					$cflase++;
				}
			} 
			message('操作完成，成功'.$cture.'个，失败'.$cflase.'个。', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), 'success');
	 }
	 
	 include $this->template('uploadvote');
	
	
	
	}
	
    public function doWebHuodong() {
	    global $_GPC, $_W;
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$owner = $_GPC['owner'];
            $where = '';
            if(!empty($owner) and $owner != '-1'){
                	$where = " and  owner= '". $owner ."'";                	
            }
          	if (!empty($_GPC['keyword'])) {
            	$where = " AND xlh LIKE '%{$_GPC['keyword']}%'";
            }
			if($this->moshi == 1 && $_W['isfounder'] != 'true'){
				
				$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid and user =:user ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':user' =>$_W['username']));

			}else{
              	
			 
				$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid  " . $where ." ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid']));

			}
			foreach ($urs as $key => $value) {
				$urs[$key] = iunserializer($value['xlh']);	
				$urs[$key]['id'] = $value['id'];	
				$urs[$key]['liulan'] = $value['liulan']; 
              	$urs[$key]['je'] = pdo_fetchcolumn("SELECT sum(jiner) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and iszhifu=:iszhifu and hdid=:hdid and isxuli = :isxuli", array(':uniacid' => $_W['uniacid'],':iszhifu' => 2,':hdid' => $value['id'],':isxuli'=>1));
                $urs[$key]['shijipiaoshu'] = pdo_fetchcolumn('SELECT sum(piao-liwushuliang-xunishuliang) FROM ' . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $value['id']));
              	if (empty($urs[$key]['shijipiaoshu'])) {
                	$urs[$key]['shijipiaoshu'] = 0;
                }
			}
			
			if($this->moshi == 1 && $_W['isfounder'] != 'true'){
				
				 $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid and user =:user", array(':uniacid' => $_W['uniacid'],':user' =>$_W['username']));
			
			}else{
				
				$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid" . $where , array(':uniacid' => $_W['uniacid']));
			
			}
			
			$pager = pagination($total, $pindex, $psize);
			
			/* 
			$sql = 'select sum(jiner) from ' . tablename('wei_vote_peizhi') . ' where uniacid = :uniacid and iszhifu = :iszhifu';
		    $param = array(':uniacid' => $_W['uniacid'],':iszhifu' => 2);
		    $totaltotal = pdo_fetchcolumn($sql, $param);
			
			$totaltotal = floor($totaltotal); */

			$sql = 'select owner from ' . tablename('wei_vote_peizhi') . ' where uniacid = :uniacid and   owner<>\'\' GROUP by owner';
			$param = array(':uniacid' => $_W['uniacid']);
			$owner_list = pdo_fetchall($sql, $param);
			
		    include $this->template('huodong');
		}
		if ($op == 'del') {
			
			if($this->sc == 1){
				
				if(!$_W['isfounder']){
					
					message('没有权限删除!', $this->createWebUrl('Huodong', array()));exit();
					
				}
				
			}
			$ew = pdo_delete('wei_vote_peizhi', array('id' => $_GPC['id']));
			if ($ew) {
				message('删除成功', $this->createWebUrl('Huodong', array()));
			} else {
				message('删除失败！', $redirect = '', $type = '');
			}
		}
		if ($op == 'edi') {
			
			$results = pdo_fetch("SELECT * FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid and id =:id ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':id' => $_GPC['id']));
		    $result = iunserializer($results['xlh']);
			$result['ct_4'] = $results['ct_4'];
					$result['cn_4'] = $results['cn_4'];
					$result['cm_4'] = $results['cm_4'];
					$result['cr_4'] = $results['cr_4'];
					$result['ch_4'] = $results['ch_4'];
					$result['ct_3'] = $results['ct_3'];
					$result['cn_3'] = $results['cn_3'];
					$result['cm_3'] = $results['cm_3'];
					$result['cr_3'] = $results['cr_3'];
					$result['ch_3'] = $results['ch_3'];
					$result['ct_2'] = $results['ct_2'];
					$result['cn_2'] = $results['cn_2'];
					$result['cm_2'] = $results['cm_2'];
					$result['cr_2'] = $results['cr_2'];
					$result['ch_2'] = $results['ch_2'];
					$result['ct_1'] = $results['ct_1'];
					$result['cn_1'] = $results['cn_1'];
					$result['cm_1'] = $results['cm_1'];
					$result['cr_1'] = $results['cr_1'];
					$result['ch_1'] = $results['ch_1'];
				
			 if($_POST&&$_GPC['id']){
				  
				
				  
			  }else{
				  
				  include $this->template('newhuodongadd');  
			  }
		}
		if ($op == 'add') {
		
		      if($_POST){
				    load()->func('tpl');
					!defined('APP_PATH') && define('APP_PATH', IA_ROOT . '/addons/wei_vote/');
					!defined('APP_CLASS_PATH') && define('APP_CLASS_PATH', APP_PATH . '/');
					load()->func('file');
					if (!empty($_FILES['nbfwpaycert']['tmp_name'])) {
						$ext = pathinfo($_FILES['nbfwpaycert']['name'], PATHINFO_EXTENSION);
						if (strtolower($ext) != "zip") {
							message("[文件格式错误]请上传您的微信支付证书哦~", '', 'error');
						}
						$wxcertdir = APP_CLASS_PATH . "cert/" . $_W["uniacid"];
						if (!is_dir($wxcertdir)) {
							mkdir($wxcertdir);
						}
						if (is_dir($wxcertdir)) {
							if (!is_writable($wxcertdir)) {
								message("请保证目录：[" . APP_CLASS_PATH . "]可写");
							}
						}
						$save_file = $wxcertdir . "/" . $_W["uniacid"] . "." . $ext;
						file_move($_FILES['nbfwpaycert']['tmp_name'], $save_file);
						
						$this->unzip($save_file, $wxcertdir);
						$certpath = $wxcertdir . "/apiclient_cert.pem";
						$keypath = $wxcertdir . "/apiclient_key.pem";
						$arr = array("certpath" => $certpath, "keypath" => $keypath);
						$arr_json = json_encode($arr);
						file_delete($save_file);
					};
					$data['mchid'] = $_GPC['mchid'];
					$data['apikey'] = $_GPC['apikey'];
					$data['appid'] = $_GPC['appid'];
					$data['secret'] = $_GPC['secret'];
					$datas['ct_4'] = $_GPC['ct_4'];
					$datas['cn_4'] = $_GPC['cn_4'];
					$datas['cm_4'] = $_GPC['cm_4'];
					$datas['cr_4'] = $_GPC['cr_4'];
					$datas['ch_4'] = $_GPC['ch_4'];
					$datas['ct_3'] = $_GPC['ct_3'];
					$datas['cn_3'] = $_GPC['cn_3'];
					$datas['cm_3'] = $_GPC['cm_3'];
					$datas['cr_3'] = $_GPC['cr_3'];
					$datas['ch_3'] = $_GPC['ch_3'];
					$datas['ct_2'] = $_GPC['ct_2'];
					$datas['cn_2'] = $_GPC['cn_2'];
					$datas['cm_2'] = $_GPC['cm_2'];
					$datas['cr_2'] = $_GPC['cr_2'];
					$datas['ch_2'] = $_GPC['ch_2'];
					$datas['ct_1'] = $_GPC['ct_1'];
					$datas['cn_1'] = $_GPC['cn_1'];
					$datas['cm_1'] = $_GPC['cm_1'];
					$datas['cr_1'] = $_GPC['cr_1'];
					$datas['ch_1'] = $_GPC['ch_1'];
					$data['touimg'] = $_GPC['touimg'];
					$data['keyword'] = $_GPC['keyword'];
					$data['display'] = $_GPC['display'];
					$data['zuipiao'] = $_GPC['zuipiao'];
					$data['name'] = $_GPC['name'];
                	$data['owner'] = $_GPC['owner'];
					$data['uniacid'] = $_W['uniacid'];
					$data['huodong_sm'] = $_GPC['huodong_sm'];
					$data['weng_x'] = $_GPC['weng_x'];
					$data['jian_p'] = $_GPC['jian_p'];
					$data['kaitime'] = $_GPC['work2']['start'];
					$data['endtime'] = $_GPC['work2']['end'];
					
					$data['bmkaitime'] = $_GPC['baoming']['start'];
					$data['bmendtime'] = $_GPC['baoming']['end'];
					
					
					$data['guanzhu'] = $_GPC['guanzhu'];
					$data['censai'] = $_GPC['censai'];
					$data['toupiaorenshu'] = $_GPC['toupiaorenshu'];
					$data['liulanrenshu'] = $_GPC['liulanrenshu'];
					$data['zongpiaoshu'] = $_GPC['zongpiaoshu'];
					$data['diqu'] = $_GPC['diqu'];
					$data['bmhb'] = $_GPC['bmhb'];
					$data['fengxiang'] = $_GPC['fengxiang'];
					$data['zhifujiequn'] = $_GPC['zhifujiequn'];
					$data['toupiaojiequn'] = $_GPC['toupiaojiequn'];
					$data['ischouqian'] = $_GPC['ischouqian'];
					$data['shenhe'] = $_GPC['shenhe'];
					$data['fenxiangbiaoti'] = $_GPC['fenxiangbiaoti'];
					$data['fenxiangbiaotitp'] = $_GPC['fenxiangbiaotitp'];
					$data['fenxiangshuoming'] = $_GPC['fenxiangshuoming'];
					$data['tiaozhuandizhi'] = $_GPC['tiaozhuandizhi'];
					$data['oauth'] = $_GPC['oauth'];
					$data['zidingyi1'] = $_GPC['zidingyi1'];
					$data['zidingyi2'] = $_GPC['zidingyi2'];
					$data['zidingyi3'] = $_GPC['zidingyi3'];
					$data['zidingyi4'] = $_GPC['zidingyi4'];
					$data['zuiduotupian'] = $_GPC['zuiduotupian'];
					$data['singleimage1'] = $_GPC['singleimage1'];
					$data['singleimage2'] = $_GPC['singleimage2'];
					$data['singleimage3'] = $_GPC['singleimage3'];
					$data['singleimage4'] = $_GPC['singleimage4'];
					$data['wode'] = $_GPC['wode'];
					$data['jptupian'] = $_GPC['jptupian'];
					$data['mima'] = $_GPC['mima'];
					$data['tpvotetime'] = $_GPC['tpvotetime'];
					$data['templateid'] = $_GPC['templateid'];
					$data['fenxian'] = $_GPC['fenxian'];
					$data['fenxianurl'] = $_GPC['fenxianurl'];
					$data['xiangtong'] = $_GPC['xiangtong'];
					$data['isliwu'] = $_GPC['isliwu'];
					$data['zjcishu'] = $_GPC['zjcishu'];
					$data['choujiangcishu'] = $_GPC['choujiangcishu'];
					
					$data['choujianjiesao'] = $_GPC['choujianjiesao'];
					
					$data['audio'] = $_GPC['audio'];
					
					$data['huancun'] = $_GPC['huancun'];
					
					
					$data['wxkeyword'] = $_GPC['wxkeyword'];
					
					$data['covertitle'] = $_GPC['covertitle'];
					$data['wxdescribe'] =  $_GPC['wxdescribe'];$data['tpiao'] =  $_GPC['tpiao'];
					$data['thumb'] = $_GPC['thumb'];$data['yaz'] = $_GPC['yaz'];
					$datas['uniacid'] = $_W['uniacid'];
					$datas['crtime'] = time();
				
					$data['muban'] =  $_GPC['muban'];
					$data['liwuinfo'] =  $_GPC['liwuinfo'];
					
					$data['advimg'] = $_GPC['advimg'];
			        $data['advurl'] =  $_GPC['advurl'];
					$data['advwenzi'] =  $_GPC['advwenzi'];
					$data['votetemplateid'] =  $_GPC['votetemplateid'];
					$data['shiping'] =  $_GPC['shiping'];$data['gdgg'] =  $_GPC['gdgg'];
					$data['moniuid'] =  $_GPC['moniuid'];$data['liwupid'] =  $_GPC['liwupid'];$data['xingming'] =  $_GPC['xingming'];
					$datas['user'] =  $_W['username'];
					$datas['owner'] =  $_GPC['owner'];
					$datas['xlh'] = iserializer($data);
				    if(empty($_GPC['id'])){
						
					   pdo_insert(wei_vote_peizhi, $datas);
						$uid = pdo_insertid();
						if ($uid) {
							pdo_query("INSERT INTO ".tablename('wei_vote_liwu')." VALUES 
							('', ".$_W['uniacid'].", '棒棒糖', '10', '3', '../addons/wei_vote/template/style/images/11.png', '1','', ".$uid.")".",
							('', ".$_W['uniacid'].", '蓝色妖姬', '10', '15', '../addons/wei_vote/template/style/images/22.png', '5','', ".$uid.")".",
							('', ".$_W['uniacid'].", '香水', '10', '30', '../addons/wei_vote/template/style/images/33.png', '10','', ".$uid.")".",
							('', ".$_W['uniacid'].", '皮皮虾', '10', '60', '../addons/wei_vote/template/style/images/44.png', '20','', ".$uid.")".",
							('', ".$_W['uniacid'].", '砖戒', '10', '180', '../addons/wei_vote/template/style/images/555.png', '50','', ".$uid.")".",
							('', ".$_W['uniacid'].", '豪华游艇', '10', '650', '../addons/wei_vote/template/style/images/66.png', '200','', ".$uid.")");
						
							$gzname = 'zhouweivote'.$uid;
							
                            $gt = pdo_get('rule', array('name' => $gzname, 'module' => 'cover', 'uniacid' => $_W['uniacid']));
                            if($gt){
								pdo_delete('rule_keyword', array('rid' => $gt['id'], 'uniacid' => $_W['uniacid']));
								pdo_delete('cover_reply', array('rid' => $gt['id'], 'uniacid' => $_W['uniacid']));			
								pdo_delete('rule', array('name' => $gzname, 'module' => 'cover', 'uniacid' => $_W['uniacid']));
                            
							}
					      if(!empty($uid)&&$_GPC['wxkeyword']){
								
								$rule = array(
									'uniacid' => $_W['uniacid'],
									'name' => $gzname,
									'module' => 'cover',
									'containtype' => '',
									'status' => 1,
									'displayorder' => 0,
								);
								
								$resultrule = pdo_insert('rule', $rule);
			                    $rid = pdo_insertid();
								$reply = pdo_get('cover_reply', array('module' => 'wei_vote', 'rid' => $rid, 'uniacid' => $_W['uniacid']));
								if (!empty($rid)) {
											$keyword_insert = array(
												'rid' => $rid,
												'uniacid' => $_W['uniacid'],
												'module' => 'cover',
												'status' => 1,
												'type' => 1,
												'displayorder' => 0,
												'content' =>$_GPC['wxkeyword'],
											);
											pdo_insert('rule_keyword', $keyword_insert);

											$entry = array(
												'uniacid' => $_W['uniacid'],
												'multiid' => 0,
												'rid' => $rid,
												'module' => 'wei_vote',
												'title' => $_GPC['covertitle'],
												'description' => $_GPC['wxdescribe'],
												'thumb' => $_GPC['thumb'],
												'url' => $this->createMobileUrl('voindex', array('hdid' => $uid)),
												'do' => 'voindex',
											
											);
											if (empty($reply['id'])) {
												pdo_insert('cover_reply', $entry);
											} else {
												pdo_update('cover_reply', $entry, array('id' => $reply['id']));
											}
											
										}
														
							}
							
							message('添加成功！', $this->createWebUrl('Huodong', array()));
						}else{
							
						
							message('添加失败！', $this->createWebUrl('Huodong', array()));
							
						}
						
					}else{
						
						$result = pdo_update('wei_vote_peizhi', $datas, array('id' => $_GPC['id']));
						$uid = $_GPC['id'];
						if (!empty($result)) {
							
							   $gzname = 'zhouweivote'.$uid;
							
                            $gt = pdo_get('rule', array('name' => $gzname, 'module' => 'cover', 'uniacid' => $_W['uniacid']));
                            if($gt){
								pdo_delete('rule_keyword', array('rid' => $gt['id'], 'uniacid' => $_W['uniacid']));
								pdo_delete('cover_reply', array('rid' => $gt['id'], 'uniacid' => $_W['uniacid']));			
								pdo_delete('rule', array('name' => $gzname, 'module' => 'cover', 'uniacid' => $_W['uniacid']));
                            
							}

                            
						
							if(!empty($uid)&&$_GPC['wxkeyword']){
								
								$rule = array(
									'uniacid' => $_W['uniacid'],
									'name' => $gzname,
									'module' => 'cover',
									'containtype' => '',
									'status' => 1,
									'displayorder' => 0,
								);
								
								$resultrule = pdo_insert('rule', $rule);
			                    $rid = pdo_insertid();
								$reply = pdo_get('cover_reply', array('module' => 'wei_vote', 'rid' => $rid, 'uniacid' => $_W['uniacid']));
								if (!empty($rid)) {
											$keyword_insert = array(
												'rid' => $rid,
												'uniacid' => $_W['uniacid'],
												'module' => 'cover',
												'status' => 1,
												'type' => 1,
												'displayorder' => 0,
												'content' =>$_GPC['wxkeyword'],
											);
											pdo_insert('rule_keyword', $keyword_insert);

											$entry = array(
												'uniacid' => $_W['uniacid'],
												'multiid' => 0,
												'rid' => $rid,
												'module' => 'wei_vote',
												'title' => $_GPC['covertitle'],
												'description' => $_GPC['wxdescribe'],
												'thumb' => $_GPC['thumb'],
												'url' => $this->createMobileUrl('voindex', array('hdid' => $uid)),
												'do' => 'voindex',
											
											);
											if (empty($reply['id'])) {
												pdo_insert('cover_reply', $entry);
											} else {
												pdo_update('cover_reply', $entry, array('id' => $reply['id']));
											}

										}
														
							}
							
							
							
							
							
								message('成功！', $this->createWebUrl('Huodong', array()));
								exit();
						}else{
							
						
							message('失败！', $this->createWebUrl('Huodong', array()));
							
						}
						
					}
					
					
					
					
				
			  }else{
				  
				
				    if(empty($result['zuipiao'])){
						
						$result['zuipiao'] = 5;
					 }
					 if(empty($result['xiangtong'])){
						
						$result['xiangtong'] = 0;
					 }
					  if(empty($result['name'])){
						
						$result['name'] = '看最美花仙子【终极对战来袭】';
					 }
					  if(empty($result['zuiduotupian'])){
						
						$result['zuiduotupian'] = 5;
					 }
					 
					if(empty($result['endtime'])){
						$tmp=time() + 86400*7;
						$time =  date("Y-m-d h:i",$tmp);
						$result['endtime'] = $time;
					 }
					if(empty($result['kaitime'])){
																   
						$timenow =  date("Y-m-d h:i",time());
						$result['kaitime']=$timenow;
					}
                    if(empty($result['touimg'])){
						$result['touimg'] = '../addons/wei_vote/preview.jpg';
						
					}
				
				  include $this->template('newhuodongadd');  
			  }
		
		      
		}
		
		
		
	}
   
   
	public function doWebZhifu() {
	    global $_GPC, $_W;
		
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			if(empty($_GPC['id'])){
				$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid  and hdid=:hdid ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
				$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and hdid=:hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
				$pager = pagination($total, $pindex, $psize);
				
				$sql = 'select sum(jiner) from ' . tablename('wei_vote_userlog') . ' where uniacid = :uniacid and hdid=:hdid and iszhifu = :iszhifu';
				$param = array(':uniacid' => $_W['uniacid'],':iszhifu' => 2,':hdid' => $_GPC['hdid']);
				$totaltotal = pdo_fetchcolumn($sql, $param);
				
				$totaltotal = floor($totaltotal);
				
			}else{
				
				$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid  and hdid=:hdid and bianhao=:bianhao ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'],':bianhao' => $_GPC['id']));
				$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and hdid=:hdid and bianhao=:bianhao", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'],':bianhao' => $_GPC['id']));
				$pager = pagination($total, $pindex, $psize);
				
				$sql = 'select sum(jiner) from ' . tablename('wei_vote_userlog') . ' where uniacid = :uniacid and hdid=:hdid and iszhifu = :iszhifu and bianhao=:bianhao';
				$param = array(':uniacid' => $_W['uniacid'],':iszhifu' => 2,':hdid' => $_GPC['hdid'],':bianhao' => $_GPC['id']);
				$totaltotal = pdo_fetchcolumn($sql, $param);
				
				$totaltotal = floor($totaltotal);
				
				
			}
			
			
		    include $this->template('zhifu');
		}
		if ($op == 'del') {
			$ew = pdo_delete('wei_vote_userlog', array('id' => $_GPC['id']));
			if ($ew) {
				message('删除成功', $this->createWebUrl('Zhifu', array('hdid' => $_GPC['hdid'])));
			} else {
			
				message('删除失败！', $this->createWebUrl('Zhifu', array('hdid' => $_GPC['hdid'])));
			}
		}
	}
	public function doWebIp() {
		global $_GPC, $_W;
		
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
	    $type = $_GPC['type'];
		if($type == ''){
			
			$type = 1;
		}
		if ($op == display) {
			
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_ip') . " WHERE uniacid = :uniacid and type = :type ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':type' => $type));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_ip') . " WHERE uniacid = :uniacid and type = :type", array(':uniacid' => $_W['uniacid'],':type' => $type));
			$pager = pagination($total, $pindex, $psize);
		
			include $this->template('ip');
		}
		if ($op == 'del') {
			$ew = pdo_delete('wei_vote_ip', array('id' => $_GPC['id']));
			if ($ew) {
				message('删除成功', $this->createWebUrl('Ip', array('type'=>$_GPC['type'])));
			} else {
				message('删除失败！', $this->createWebUrl('Ip', array('type'=>$_GPC['type'])));
			}
		}
		if ($op == 'edi') {
			
			 $urs = pdo_fetch("SELECT * FROM " . tablename('wei_vote_ip') . " WHERE uniacid = :uniacid and id =:id ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':id' => $_GPC['id']));
			
			 if($_POST&&$_GPC['id']){
				  
				 $data['ip'] = $_GPC['ip'];
				 $result = pdo_update('wei_vote_ip', $data, array('id' => $_GPC['id']));
				if (!empty($result)) {
						message('添加成功！', $this->createWebUrl('Ip', array('type'=>$_GPC['type'])));
						exit();
				}
				  
			  }else{
				  
				  include $this->template('ipedi');  
			  }
		}
		if ($op == 'add') {
		
		      if($_POST){
				$data['type'] = $this->isOk_ip($_GPC['ip']); 
				
				  
				$data['ip'] = $_GPC['ip'];$data['createtime'] = time();
				$data['uniacid']=$_W['uniacid'];
				$result = pdo_insert('wei_vote_ip', $data);
				$uid = pdo_insertid();
				if(!empty($uid)){
							message('添加成功！', $this->createWebUrl('Ip', array('type'=>$data['type'])));
							exit();
			     }else{
					   
					   	message('添加失败！', $this->createWebUrl('Ip', array('type'=>$data['type'])));
					    exit();
					   
				}
				
			  }else{
				  
				  include $this->template('ipadd');  
			  }
		
		      
		}

	}
	public function isOk_ip($ip){  
		 if(preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $ip))  
		{  
		return 1;  
		}else{  
		return 0;  
		}  
		}  
	public function doMobilePcajax(){
		global $_GPC, $_W;
		$kaitime = strtotime($this->settings[0]['kaitime']);
		$endtime = strtotime($this->settings[0]['endtime']);
		if ($kaitime > time()) {
			$arr1['a'] = '投票还未开始！';
			echo json_encode($arr1);
			exit();
		}
		if ($endtime < time()) {
			$arr1['a'] = '投票已经结束！';
			echo json_encode($arr1);
			exit();
		}
		
		$ip = CLIENT_IP;
		$this->settings[0]['baidukey'] = 'WoStyQQTGHECWN6d4iOe62lQCTGOnckX';
		$content = file_get_contents("http://api.map.baidu.com/geocoder/v2/?location={$_GPC['latitude']},{$_GPC['longitude']}&output=json&pois=1&ak=WoStyQQTGHECWN6d4iOe62lQCTGOnckX");
		$jsonAddress = json_decode($content,true);

		$jsonAddress = $jsonAddress['result']['addressComponent'];
		if($jsonAddress['country']&&!empty($jsonAddress['country'])){
		$jsonAddress = $jsonAddress['country'] . '-' . $jsonAddress['province'] . '-' . $jsonAddress['city'] . '-' . $jsonAddress['district']. '-' . $jsonAddress['street']. '-' . $jsonAddress['street_number'];
		
		}else{
			//http://ip.taobao.com/service/getIpInfo.php?ip=
			//http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=$ip
			//$ipContent = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=$ip");
			//$jsonData = explode("=", $ipContent);
			//$jsonAddress = substr($jsonData[1], 0, -1);
			//$jsonAddress = json_decode($jsonAddress);
			//$jsonAddress = $jsonAddress->{'country'} . '-' . $jsonAddress->{'province'} . '-' . $jsonAddress->{'city'} . '-' . $jsonAddress->{'district'};
			
			$ipContent   =  file_get_contents("http://api.map.baidu.com/location/ip?ip={$ip}&ak={$this->settings[0]['baidukey']}"); 
			$jsonData = json_decode($ipContent,true);
			$jsonAddress = $jsonData['content']['address_detail'];
			//$shengfu = $jsonAddress['province'];
			$jsonAddress = $jsonAddress['province'] . '-' . $jsonAddress['city'] . '-' . $jsonAddress['district'] . '-' . $jsonAddress['street']. '-' . $jsonAddress['street_number'];
		
		
			
		}
		if (!empty($this->settings[0]['diqu'])) {
			$da2 = explode('-', $this->settings[0]['diqu']);
			$dz1 = explode('-', $jsonAddress);
			unset($dz1[0]);
			$result33 = array_intersect($dz1, $da2);
			$cot = count($result33);
			if (empty($cot) || $cot < 1) {
				$arr1['a'] = '不在准许地区内，投票被限制！';
				echo json_encode($arr1);
				exit();
			}
		}
		if (!empty($this->settings[0]['zongpiaoshu']) && $this->settings[0]['zongpiaoshu'] > 0) {
			if (!empty($this->settings[0]['fengxiang']) && $this->settings[0]['fengxiang'] > 0) {
				$wei_fx_jilu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_fx_jilu') . " WHERE uniacid = :uniacid and ip = :ip", array(':ip' => $ip, ':uniacid' => $_W['uniacid']));
				if ($wei_fx_jilu) {
					$jszongpiaoshu = $this->settings[0]['zongpiaoshu'] + $wei_fx_jilu;
				} else {
					$jszongpiaoshu = $this->settings[0]['zongpiaoshu'];
				}
				if ($jszongpiaoshu > $this->settings[0]['zongpiaoshu'] + $this->settings[0]['fengxiang']) {
					$jszongpiaoshu = $this->settings[0]['zongpiaoshu'] + $this->settings[0]['fengxiang'];
				}
			} else {
				$jszongpiaoshu = $this->settings[0]['zongpiaoshu'];
			}
			$user_zps = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and ip = :ip", array(':ip' => $ip, ':uniacid' => $_W['uniacid']));
			if ($user_zps >= $jszongpiaoshu) {
				
				if($this->settings[0]['ischouqian']){
				
				    $arr1['c'] = 4;
			    }
				
				$arr1['a'] = '总投票票数已投完！';
				//$arr1['b'] = $ac;
				echo json_encode($arr1);
				exit();
			}
		}
		$y = date("Y");
		$m = date("m");
		$d = date("d");
		$todayTime = mktime(0, 0, 0, $m, $d, $y);
		$todayendTime = mktime(23, 59, 59, $m, $d, $y);
		$user_shu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and ip = :ip and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime, ':ip' => $ip,':uniacid' => $_W['uniacid']));
		if ($user_shu >= $this->settings[0]['zuipiao']) {
			$arr1['a'] = '今天票数已投完！';
			
			if($this->settings[0]['ischouqian']){
				
				$arr1['c'] = 4;
			}
			
			echo json_encode($arr1);
			exit();
		}

		if ($_W['isajax'] && $_GPC['p']) {
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['p']));
			if ($account['lahei'] == 2) {
				$arr1['a'] = '系统禁止投票，请联系管理员';
				echo json_encode($arr1);
				exit();
			}
			$user_shu12 = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and pid=:pid  and ip = :ip and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':pid'=>$_GPC['p'], ':ip' => $ip, ':uniacid' => $_W['uniacid']));
		    if ($this->settings[0]['xiangtong'] > 0) {
				if($user_shu12 >=$this->settings[0]['xiangtong']){
			        $arr1['a'] = '已投票，请给其他人投票';
					echo json_encode($arr1);
					exit();
						
					
				}
			}
		
			if ($this->settings[0]['shenhe'] == 1) {
				if ($account['isshenhe'] != 2) {
					$arr1['a'] = '还未审核，暂时无法投票！';
					echo json_encode($arr1);
					exit();
				}
		    }
			
			if ($this->settings[0]['tpvotetime']) {
				
				if ($this->getMillisecond()-$account['votetime']<=$this->settings[0]['tpvotetime']) {
				
					$arr1['a'] = '投票时间间隔为'.($this->settings[0]['tpvotetime']/1000).'秒，请稍后再试！';
					echo json_encode($arr1);
					exit();
				
		        }
			
			}
			
			$ac = $account['piao'] + 1;
			$user_data = array('piao' => $ac,);
			$user_data['votetime'] = $this->getMillisecond();
			$result = pdo_update('wei_vote_up', $user_data, array('id' => $_GPC['p']));
			if (!empty($result)) {
				$arr['uniacid'] = $_W['uniacid'];
				$arr['openid'] = $ip;
				$arr['nickname'] = $_W['fans']['nickname'];
				$arr['city'] = $_W['fans']['city'];
				$arr['avatar'] = $_W['fans']['avatar'];
				$arr['time'] = time();
				$arr['diid'] = $userxx['id'];
				$arr['didian'] = $jsonAddress;
				$res = pdo_insert('wei_vote_jilu', array('didian' => $jsonAddress, 'ip' => CLIENT_IP, 'time' => time(), 'uniacid' => $_W['uniacid'], 'openid' => $ip, 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'pid' => $_GPC['p']));
				$res = pdo_insertid();
				if ($res) {
					$user_data1 = array('time' => time(), 'uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'toupiao' => 1,);
					$result = pdo_query("UPDATE " . tablename('wei_vote_toupiao') . " SET toupiao = toupiao+1 WHERE ip = :ip and uniacid= :uniacid", array(':ip' => $ip, 'uniacid' => $_W['uniacid']));
					if (!$result) {
						$result1 = pdo_insert('wei_vote_toupiao', $user_data1);
					}
					if($this->settings[0]['templateid']){
					$template_id = $this->settings[0]['templateid'];
					$time = date("Y-m-d H:i:s",time());
						$data58 = array(
								'first'=>array(
								              'value'=>"恭喜您有新的投票！",
											  'color'=>"##173177"
											  ),
								'keyword1'=>array('value'=>$this->settings[0]['fenxiangbiaoti'],'color'=>'#173177'),
								'keyword2'=>array('value'=>$time,'color'=>'#173177'),
								
								'remark'=>array('value'=>'恭喜您有新的投票！投票好友为'.$_W[fans][nickname].'','color'=>'#173177'),
							);
						$this->doSend($account['openid'], $template_id, $ur, $data58, $topcolor = '#7B68EE');
					}
					
					$arr1['a'] = '投票成功第' . $ac . '票';
					$arr1['b'] = $ac;
					echo json_encode($arr1);
				}
			} else {
				$arr1['a'] = '投票失败';
				echo json_encode($arr1);
			}
		}  

	}
	public function doMobilePc() {
		global $_GPC, $_W;
		$list = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and isshenhe= :isshenhe and hdid=:hdid ORDER BY piao DESC ", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,'hdid'=>$_GPC['hdid']));
		//print_r($list);
		
		include $this->template('pc');  
		
	}
	
	public function doWebFenleigl() {
		global $_GPC, $_W;
		
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_feilei') . " WHERE uniacid = :uniacid   ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid']));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_feilei') . " WHERE uniacid = :uniacid", array(':uniacid' => $_W['uniacid']));
			$pager = pagination($total, $pindex, $psize);
		
			include $this->template('fenleigl');
		}
		if ($op == 'del') {
			$ew = pdo_delete('wei_vote_feilei', array('id' => $_GPC['id']));
			if ($ew) {
				message('删除成功', $this->createWebUrl('Fenleigl', array()));
			} else {
				message('删除失败！', $redirect = '', $type = '');
			}
		}
		if ($op == 'edi') {
			
			 $urs = pdo_fetch("SELECT * FROM " . tablename('wei_vote_feilei') . " WHERE uniacid = :uniacid and id =:id ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':id' => $_GPC['id']));
			
			 if($_POST&&$_GPC['id']){
				  
				
				  $data['name'] = $_GPC['name'];
				  $result = pdo_update('wei_vote_feilei', $data, array('id' => $_GPC['id']));
					if (!empty($result)) {
						message('添加成功！', $this->createWebUrl('Fenleigl', array()));
						exit();
					}
				  
			  }else{
				  
				  include $this->template('fenleiedi');  
			  }
		}
		if ($op == 'add') {
		
		      if($_POST){
				  
			
				  $data['name'] = $_GPC['name'];
				 
                  $data['uniacid']=$_W['uniacid'];
				  
				  $result = pdo_insert('wei_vote_feilei', $data);
				  $uid = pdo_insertid();
				  if(empty($uid)){
							message('添加成功！', $this->createWebUrl('Fenleigl', array()));
							exit();
			       }else{
					   
					   	message('添加失败！', $this->createWebUrl('Fenleigl', array()));
					    exit();
					   
				   }
				  
			  }else{
				  
				  include $this->template('fenleiadd');  
			  }
		
		      
		}

	}
	public function doWebLiwu() {
		global $_GPC, $_W;

		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_liwu') . " WHERE uniacid = :uniacid  and hdid=:hdid ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_liwu') . " WHERE uniacid = :uniacid and hdid=:hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$pager = pagination($total, $pindex, $psize);
		
			include $this->template('liwu');
		}
		if ($op == 'add') {
		     if($_POST){
				  
				  $data['name'] = $_GPC['name'];
				  $data['shuliang'] = $_GPC['shuliang'];
				  $data['jiner'] = $_GPC['jiner'];
				  $data['tupian'] = $_GPC['tupian'];
                  $data['piao'] = $_GPC['piao'];
                  $data['uniacid']=$_W['uniacid'];
				  $data['hdid']=$_GPC['hdid'];
				  $result = pdo_insert('wei_vote_liwu', $data);
				  $uid = pdo_insertid();
				  if(!empty($uid)){
							message('添加成功！', $this->createWebUrl('Liwu', array('hdid'=>$_GPC['hdid'])));
							exit();
			       }else{
					   
					   	message('添加失败！', $this->createWebUrl('Liwu', array('hdid'=>$_GPC['hdid'])));
					    exit();
					   
				   }
				  
				 
			  }else{
				  
				  include $this->template('liwuadd');  
			  }
		
		      
		}
		if ($op == 'edi') {
			
			
			 $urs = pdo_fetch("SELECT * FROM " . tablename('wei_vote_liwu') . " WHERE uniacid = :uniacid and hdid=:hdid and id =:id ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':id' => $_GPC['id'],':hdid' => $_GPC['hdid']));
			
			 if($_POST&&$_GPC['id']){
				  
				 $data['name'] = $_GPC['name'];
				  $data['shuliang'] = $_GPC['shuliang'];
				  $data['jiner'] = $_GPC['jiner'];
				  $data['tupian'] = $_GPC['tupian'];
                  $data['piao'] = $_GPC['piao'];
                  $result = pdo_update('wei_vote_liwu', $data, array('id' => $_GPC['id'],'hdid' => $_GPC['hdid']));
					if (!empty($result)) {
						message('添加成功！', $this->createWebUrl('Liwu', array('hdid' => $_GPC['hdid'])));
						exit();
					}
									  
				
				  
				  
			  }else{
				  
				  include $this->template('liwuedi');  
			  }
			
			
		}
		
		/* if ($op == 'fahoubao') {
			$user = pdo_fetch("SELECT * FROM " . tablename('wei_vote_zhong') . " WHERE id = :uid and uniacid = :uniacid LIMIT 1", array(':uid' => $_GPC['id'], 'uniacid' => $_W['uniacid']));
			if ($user['hongbao'] <= 0) {
				message('此奖品是实物奖品，不能发红包，点兑换！', $redirect = '', $type = '');
			}
			if ($user['isok'] == 0 && $user['hongbao'] > 0) {
				$arr['openid'] = $user['jqopenid'];
				$arr['hbname'] = '投票活动';
				$arr['body'] = $_W['uniaccount']['name'];
				$arr['fee'] = $user['hongbao'] * 100;
				$res2 = $this->sendhongbaoto($arr);
				if ($res2['result_code'] == 'SUCCESS') {
					$data = array('isok' => 1,);
					$result = pdo_update('wei_vote_zhong', $data, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id']));
					message('红包发送成功', $this->createWebUrl('Jiangp', array()));
				} else {
					message($res2['return_msg'], $redirect = '', $type = '');
				}
			} else {
				message('以兑换，无须再兑换！', $redirect = '', $type = '');
			}
		} */
		if ($op == 'del') {
			$ew = pdo_delete('wei_vote_liwu', array('id' => $_GPC['id']));
			if ($ew) {
				message('删除成功', $this->createWebUrl('Liwu', array('hdid' => $_GPC['hdid'])));
			} else {
				message('删除失败！', $this->createWebUrl('Liwu', array('hdid' => $_GPC['hdid']), $type = ''));
			}
		}
		
		

		
	}
	
	
	public function doWebQingkong() {
		global $_GPC, $_W;
		$lew = pdo_delete('wei_fx_jilu', array('uniacid' => $_W['uniacid']));
		$lew1 = pdo_delete('wei_vote_jilu', array('uniacid' => $_W['uniacid']));
		$lew2 = pdo_delete('wei_vote_toupiao', array('uniacid' => $_W['uniacid']));
		$lew3 = pdo_delete('wei_vote_up', array('uniacid' => $_W['uniacid']));
		$lew4 = pdo_delete('wei_vote_zhong', array('uniacid' => $_W['uniacid']));
		if ($lew1 && $lew2 && $lew3 && $lew4 && $lew) {
			message('删除成功', $redirect = '', $type = '');
		} else {
			message('删除失败！', $redirect = '', $type = '');
		}
	}
public function doMobileWxjspayapi() {
		global $_GPC, $_W;
		if(!$_W['openid']){
			$res['code'] = 10001;
			$res['msg'] = '没有openid,请在微信中打开';	
		    echo json_encode($res);	exit();	
		}

        $kaitime = strtotime($this->settings[0]['kaitime']);
		$endtime = strtotime($this->settings[0]['endtime']);
		if ($kaitime > time()) {
			$res['code'] = 10002;
			$res['msg'] = '投票还未开始！';	
		    echo json_encode($res);	exit();
			
		}
		if ($endtime < time()) {
			$res['code'] = 10003;
			$res['msg'] = '投票已经结束！';	
		    echo json_encode($res);	exit();
			
			
		}
		
	
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['p']));
			if ($account['lahei'] == 2) {
		
			$res['code'] = 10004;
			$res['msg'] = '系统禁止投票，请联系管理员';	
		    echo json_encode($res);	exit();
			
			}
			
				
	
		    
			
			if ($this->settings[0]['shenhe'] == 1) {
				if ($account['isshenhe'] != 2) {
					
					$res['code'] = 10005;
			        $res['msg'] = '还未审核，暂时无法投票！';	
		            echo json_encode($res);	exit();
					
				}
		    }
			
		$fee = floatval($_GPC['dataid']);
		$id = floatval($_GPC['dataid']);
		$shuliang = floatval($_GPC['shuliang']);
		if(empty($shuliang)){
			
			$shuliang = 1;
			
		}
		$liwu = pdo_fetch("SELECT * FROM ".tablename('wei_vote_liwu')." WHERE  uniacid = :uniacid and hdid =:hdid and id =:id ", array(':uniacid' => $_W['uniacid'],':id' =>$_GPC['dataid'],':hdid' =>$_GPC['hdid']));
		$fee = $liwu['jiner']*$shuliang;
		if($fee <= 0) {
                $res['code'] = 10006;
			    $res['msg'] ='请选择礼物，在支付';	
		        echo json_encode($res);	exit();
	       
	   
		}
			$order_date = date('Y-m-d');
			$order_id_main = date('YmdHis') . rand(10000000,99999999);
			  
			  
			$user_data = array(
								'openid' => $_W['openid'],
								'uniacid' => $_W['uniacid'],
								'nickname' => $_W['fans']['nickname'],
								'bianhao' => $_GPC['p'],
								'piao' => $liwu['piao'],
								'avatar' => $_W['fans']['avatar'],
								'jiner' => $fee,
								'createtime' => time(),
								'liwuid' =>$liwu['id'],
								'dingdanghao' => $order_id_main,
								'shuliang'=>$shuliang,
								'liwuname'=>$liwu['name'],'hdid'=>$_GPC['hdid'],'isxuli' => 1,
							);
						
			$result = pdo_insert('wei_vote_userlog', $user_data);
					$uid = pdo_insertid();
			if(empty($uid)){
				   $res['code'] = 10007;
			       $res['msg'] = '订单创建失败！';	
		           echo json_encode($res);	exit();
				
			} 
				
				
			
				$params = array(
					'tid' => $order_id_main, 
					'ordersn' => time(), 
					'title' => '礼物购买',
					'fee' => $fee,
					'user' => $_W['member']['uid'],
					
				);
				$res['pay'] = $params;
                $res['code'] = 10008;
			    $res['msg'] = '订单创建失败！';	
		        echo json_encode($res);	exit();
				//$this->pay($params);
	
	}
	public function doMobileWxjspayapizan() {
		global $_GPC, $_W;
		if(!$_W['openid']){
			$res['code'] = 10001;
			$res['msg'] = '没有openid,请在微信中打开';	
		    echo json_encode($res);	exit();	
		}

        $kaitime = strtotime($this->settings[0]['kaitime']);
		$endtime = strtotime($this->settings[0]['endtime']);
		if ($kaitime > time()) {
			$res['code'] = 10002;
			$res['msg'] = '投票还未开始！';	
		    echo json_encode($res);	exit();
			
		}
		if ($endtime < time()) {
			$res['code'] = 10003;
			$res['msg'] = '投票已经结束！';	
		    echo json_encode($res);	exit();
			
			
		}
		
	
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['p']));
			if ($account['lahei'] == 2) {
		
			$res['code'] = 10004;
			$res['msg'] = '系统禁止投票，请联系管理员';	
		    echo json_encode($res);	exit();
			
			}
			
				
	
		    
			
			if ($this->settings[0]['shenhe'] == 1) {
				if ($account['isshenhe'] != 2) {
					
					$res['code'] = 10005;
			        $res['msg'] = '还未审核，暂时无法投票！';	
		            echo json_encode($res);	exit();
					
				}
		    }
			
		$fee = floatval($_GPC['ps']);
		$piao = $fee*3;
		//$id = floatval($_GPC['dataid']);
		/* $shuliang = floatval($_GPC['shuliang']);
		if(empty($shuliang)){
			
			$shuliang = 1;
			
		} */
		//$liwu = pdo_fetch("SELECT * FROM ".tablename('wei_vote_liwu')." WHERE  uniacid = :uniacid and hdid =:hdid and id =:id ", array(':uniacid' => $_W['uniacid'],':id' =>$_GPC['dataid'],':hdid' =>$_GPC['hdid']));
		//$fee = $liwu['jiner']*$shuliang;
		if($fee <= 0) {
                $res['code'] = 10006;
			    $res['msg'] ='请选择礼物，在支付';	
		        echo json_encode($res);	exit();
	       
	   
		}
			$order_date = date('Y-m-d');
			$order_id_main = date('YmdHis') . rand(10000000,99999999);
			  
			  
			$user_data = array(
								'openid' => $_W['openid'],
								'uniacid' => $_W['uniacid'],
								'nickname' => $_W['fans']['nickname'],
								'bianhao' => $_GPC['p'],
								'piao' => $piao,
								'avatar' => $_W['fans']['avatar'],
								'jiner' => $fee,
								'createtime' => time(),
								'liwuid' =>'',
								'dingdanghao' => $order_id_main,
								'shuliang'=>1,
								'liwuname'=>'钻石',
								'hdid'=>$_GPC['hdid'],
								'lx'=>2,'isxuli' => 1,
							);
						
			$result = pdo_insert('wei_vote_userlog', $user_data);
					$uid = pdo_insertid();
			if(empty($uid)){
				   $res['code'] = 10007;
			       $res['msg'] = '订单创建失败！';	
		           echo json_encode($res);	exit();
				
			} 
				
				
			
				$params = array(
					'tid' => $order_id_main, 
					'ordersn' => time(), 
					'title' => '礼物购买',
					'fee' => $fee,
					'user' => $_W['member']['uid'],
					
				);
				$res['pay'] = $params;
                $res['code'] = 10008;
			    $res['msg'] = '订单创建失败！';	
		        echo json_encode($res);	exit();
				//$this->pay($params);
	
	}
	public function doMobileGoumaiapi() {
		global $_GPC, $_W;
		if(!$_W['openid']){
				
		    echo '没有openid';	exit();	
		}

        $kaitime = strtotime($this->settings[0]['kaitime']);
		$endtime = strtotime($this->settings[0]['endtime']);
		if ($kaitime > time()) {
			$arr1['a'] = '投票还未开始！'; message('投票还未开始！');exit();
			echo json_encode($arr1);
			exit();
		}
		if ($endtime < time()) {
			$arr1['a'] = '投票已经结束！';message('投票已经结束！');exit();
			echo json_encode($arr1);
			exit();
		}
		
	
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
			if ($account['lahei'] == 2) {
				$arr1['a'] = '系统禁止投票，请联系管理员';message('系统禁止投票，请联系管理员');exit();
				echo json_encode($arr1);
				exit();
			}
			
				
	
		    
			
			if ($this->settings[0]['shenhe'] == 1) {
				if ($account['isshenhe'] != 2) {
					//print_r($account);exit();
					$arr1['a'] = '还未审核，暂时无法投票！';message('还未审核，暂时无法投票！');exit();
					echo json_encode($arr1);
					exit();
				}
		    }
			
		$fee = floatval($_GPC['dataid']);
		$id = floatval($_GPC['dataid']);
		$shuliang = floatval($_GPC['shuliang']);
		$liwu = pdo_fetch("SELECT * FROM ".tablename('wei_vote_liwu')." WHERE  uniacid = :uniacid and hdid =:hdid and id =:id ", array(':uniacid' => $_W['uniacid'],':id' =>$_GPC['dataid'],':hdid' =>$_GPC['hdid']));
		$fee = $liwu['jiner']*$shuliang;
		if($fee <= 0) {
       
	           message('请选择礼物，在支付');
	   
		}
			$order_date = date('Y-m-d');
			$order_id_main = date('YmdHis') . rand(10000000,99999999);
			  
			  
			$user_data = array(
								'openid' => $_W['openid'],
								'uniacid' => $_W['uniacid'],
								'nickname' => $_W['fans']['nickname'],
								'bianhao' => $_GPC['id'],
								'piao' => $liwu['piao'],
								'avatar' => $_W['fans']['avatar'],
								'jiner' => $fee,
								'createtime' => time(),
								'liwuid' =>$liwu['id'],
								'dingdanghao' => $order_id_main,
								'shuliang'=>$shuliang,
								'liwuname'=>$liwu['name'],'hdid'=>$_GPC['hdid'],'isxuli' => 1,
							);
						
			$result = pdo_insert('wei_vote_userlog', $user_data);
					$uid = pdo_insertid();
			if(empty($uid)){
					message('订单创建失败！');
					exit();
			} 
				
				
			
				$params = array(
					'tid' => $order_id_main, 
					'ordersn' => time(), 
					'title' => '礼物购买',
					'fee' => $fee,
					'user' => $_W['member']['uid'],
					
				);

				$this->pay($params);
	
	}
	
	public function payResult($params) {
		    global $_GPC, $_W;
			if ($params['result'] == 'success' && $params['from'] == 'notify') {
				//load()->func('logging');
				//记录文本日志
			
				//logging_run($params);
			
				if(empty($params['type'])){
					
					$params['type'] = $params['trade_type'];
				}
				$user_data2 = array(
						'iszhifu' => 2,
						'wxuniontid' => $params['uniontid'],
						'wxtransaction_id' => $params['tag']['transaction_id'],
						'type' => $params['type'],
						'wxfee' =>$params['fee']
					);
					$result = pdo_update('wei_vote_userlog', $user_data2, array('dingdanghao' => $params['tid']));
				    $user = pdo_fetch("SELECT * FROM ".tablename('wei_vote_userlog')." WHERE dingdanghao = :dingdanghao  LIMIT 1", array(':dingdanghao' => $params['tid']));
				    
					if($user['jiner'] <= $params['fee']){
						
						if($result&&$user){
							$xingpiao = $user['piao']*$user['shuliang'];
							
							pdo_update('wei_vote_up', array('piao +=' => $xingpiao), array('id' => $user['bianhao']));
							pdo_update('wei_vote_up', array('liwushuliang +=' => $xingpiao), array('id' => $user['bianhao']));
							pdo_update('wei_vote_up', array('yuan +=' => $user['jiner']), array('id' => $user['bianhao']));
					    }
						
						
						
					}else{
					
						
					}
					
					
			
			}

			if ($params['from'] == 'return') {
				if ($params['result'] == 'success') {
					
				$user = pdo_fetch("SELECT * FROM ".tablename('wei_vote_userlog')." WHERE dingdanghao = :dingdanghao LIMIT 1", array(':dingdanghao' => $params['tid']));
				   
					message('支付成功！', $this->createMobileUrl('list', array('id' => $user['bianhao'],'hdid' => $user['hdid'])), 'success');
				} else {
					
					message('支付成功！', $this->createMobileUrl('voindex', array('status' => 2,'hdid' => $user['hdid'])), 'error');

				}
			}
    }
	
	public function doMobileUserxx() {
		global $_GPC, $_W;
		if ($_POST) {
			$user_data1 = array('time' => time(), 'uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'ximing' => $_GPC['ximing'], 'dianhua' => $_GPC['dianhua'], 'shengfenzhen' => $_GPC['shengfenzhen'], 'gongshi' => $_GPC['gongshi']);
			$result = pdo_insert('wei_vote_userxx', $user_data1);
			if (!empty($result)) {
				$redirect = $this->createMobileUrl('voindex');
				message('成功，跳转中', $redirect, $type = 'warning');
			}
		} else {
			load()->func('tpl');
			include $this->template('userxx');
		}
	}
	public function doMobileVoindexapi1() {
		global $_GPC, $_W;
		    $res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid and isshenhe = :isshenhe ORDER BY piao DESC LIMIT " . $_GPC['b'] . ",6", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,':hdid' => $_GPC['hdid']));
			$ww = $_GPC['ww'];
			$i = ++$_GPC['b'];
			foreach ($res as $val) {
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f = $he[0];
				
				$f = tomedia($f);
				
				if(empty($val['weight'])){
					
					$aa = @getimagesize($f);
					
					$user_data = array(
						'weight' => $aa['0'],
						'height' => $aa['1'],
					);
					pdo_update('wei_vote_up', $user_data, array('id' => $val['id']));
				
				}else{
					
					$result[0] = $val['weight'];
					$result[1] = $val['height'];
					$aa = $result;
					
					
				}
				
				
				
				if($aa){
					
					$bl = $aa["0"] / $ww;
				    $weight = $aa['0'];
				    $height = $aa['1'] / $bl;
				}
				
				
				$urla = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id'],'hdid'=>$_GPC['hdid']));
				
				$shuju[]= "<div class='article'><a style='widht:{$ww}px;height:{$height}px' href='{$urla}'><img style='widht:{$ww}px;height:{$height}px' src='{$f}'><p>{$val['name']}</p><input type='button' value='投票' /></a><i>{$val['bh']}号,<small class ='p_{$val['id']}'>{$val['piao']}票</small></i></div>";
				
				$i++;
			}
			//print_r($shuju);
		
			echo json_encode($shuju);
		
	}	
	public function doMobileVoindexapi() {
		global $_GPC, $_W;
		if($this->settings[0]['toupiaojiequn']){
			
			$_W['fans'] = mc_oauth_userinfo();
			if (empty($_W['fans']['nickname'])) {
		     	mc_oauth_userinfo();
		    }
			
			
		}
		
		$id2 = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE openid = :openid and uniacid = :uniacid and hdid=:hdid", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		$user_total = $this->user_total;
		$piao_total = $this->piao_total;
		if ($_W['isajax'] && $_GPC['p']) {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid and isshenhe= :isshenhe  ORDER BY piao DESC LIMIT " . $_GPC['p'] . ",5", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,':hdid' => $_GPC['hdid']));
			$i = ++$_GPC['p'];
			foreach ($res as $val) {
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f = $he[0];
				$f = tomedia($f);
				$url = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id'],'hdid'=>$_GPC['hdid']));
				if ($val['piao'] > 999) {
					$mx = $val['piao'] % 999;
					$zx = floor($val['piao'] / 999);
				} else {
					$mx = $val['piao'];
					$zx = 0;
				}
				$shuju.= "<li class='rank-1-li'>
                                            <a href='{$url}'>
                                                  <div class='rank-lt'>
                                                      <span class='rank-lt-s hs'>{$i}<i class='bg{$i}'></i></span>
                                                        
                                                       <div class='rank-lt-d'><img src='{$f}'></div>
                                                        <div class='rank-lt-w'>
                                                          <p class='rank-lt-p1'>{$val['name']}</p>
                                                          <p class='rank-lt-p2'>投票编号：<strong class='s1'>{$val['bh']}</strong></p>
                                                        </div>
                                                  </div>
                                                  <div class='rank-rt'>
                                                      <img src='{$_W[siteroot]}addons/wei_vote/template/style/images/1.png'>{$val['piao']}
													 
												

                                                  </div>
                                            </a>
                                        </li>";
				$i++;
			}
			echo $shuju;
		} elseif ($_GPC['b']) {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid and isshenhe = :isshenhe ORDER BY piao DESC LIMIT " . $_GPC['b'] . ",6", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,':hdid' => $_GPC['hdid']));
			$ww = $_GPC['ww'];
			$i = ++$_GPC['b'];
			foreach ($res as $val) {
				//$key = $_W['uniacid'].'-'.$_GPC['hdid'].'-'.$_GPC['b'].'-'.$val['id'];
				
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f = $he[0];
				
				
				
				//$result = cache_load($key);
				$f = tomedia($f);
				
				if(empty($val['weight'])){
					
					$aa = @getimagesize($f);
					
					$user_data = array(
						'weight' => $aa['0'],
						'height' => $aa['1'],
					);
					pdo_update('wei_vote_up', $user_data, array('id' => $val['id']));
				
				}else{
					
					$result[0] = $val['weight'];
					$result[1] = $val['height'];
					$aa = $result;
					
					
				}
				
				
				
				/* if(empty($result)){
					
					
					$aa = @getimagesize($f);
					cache_write($key, $aa);
					
				}else{
					
					$aa = $result;
				} */
				
				if($aa){
					
					$bl = $aa["0"] / $ww;
				    $weight = $aa['0'];
				    $height = $aa['1'] / $bl;
				}
				
				
				$urla = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id'],'hdid'=>$_GPC['hdid']));
				
				$shuju[]= "<div class='article'><a style='widht:{$ww}px;height:{$height}px' href='{$urla}'><img style='widht:{$ww}px;height:{$height}px' src='{$f}'><p>{$val['name']}</p><input type='button' value='投票' /></a><i>{$val['bh']}号,<small class ='p_{$val['id']}'>{$val['piao']}票</small></i></div>";
				
				//$shuju2[$val['id']] = $height;
				$i++;
			}
			//print_r($shuju);
		
			echo json_encode($shuju);
		} else {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid and isshenhe = :isshenhe ORDER BY piao DESC LIMIT 10", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			$nes = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid and isshenhe = :isshenhe  ORDER BY id DESC LIMIT 10", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			
			/* 	if ($this->settings[0]['muban'] == 0) {
			
					include $this->template('voindex');
				}else{
					
					include $this->template('new/voindex');
			} */
			$mb = $this->style('voindex',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('voindex');
			}else{
					
				include $this->template($mb);
			}
		}
	}
	public function doMobileVoindex() {
		global $_GPC, $_W;
		
		if(empty($this->settings[0]['kaitime'])){
			$msg['msg']='活动不存在！';
			$msg['title']='活动不存在！';
			include $this->template('msg');exit();		 
			echo '活动不存在！';exit();
		}
		if(empty($this->settings[0]['xingming'])){
			$this->settings[0]['xingming'] = '姓名';
		}
		/* if (empty($_W['openid'])) {
			
			$msg['msg']='请在微信中打开，跳转中';
			$msg['title']='请在微信中打开，跳转中';
			include $this->template('msg');exit();
		
		} */
		
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if (strpos($user_agent, 'MicroMessenger') === false) {
			$msg['msg']='请在微信中打开，跳转中';
			$msg['title']='请在微信中打开，跳转中';
			include $this->template('msg');exit();
		}
		if($this->settings[0]['toupiaojiequn']){
			
			
			if (empty($_W['fans']['nickname'])) {
		     	mc_oauth_userinfo();
		    }
			
		}
		$user_total = $this->user_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		$piao_total = $this->piao_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid=:hdid  LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		
		if ($this->settings[0]['muban'] == 5) {
			$type = $_GPC['type'];
			
			if($type=='new' || $type==''){
				
				$cs = 'piao DESC';
			}else{
				
				$cs = 'id DESC';
			}
			$pindex = max(1, intval($_GPC['page']));
			$psize = 10;
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid  and isshenhe= :isshenhe ORDER BY ".$cs." LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid and isshenhe= :isshenhe ", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			$pager = $this->pagination($total, $pindex, $psize);
			$mb = $this->style('voindex',$this->replys['template']);
			include $this->template($mb);
			exit();
		}
		/* if ($this->kaishi) {
			$userxx = pdo_fetch("SELECT * FROM " . tablename('wei_vote_userxx') . " WHERE openid = :openid and uniacid = :uniacid LIMIT 1", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
			if (!$userxx) {
				$redirect = $this->createMobileUrl('userxx');
				message('您还没填写质料，跳转中', $redirect, $type = 'warning');
				exit();
			}
		} */
		$id2 = @pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE openid = :openid and uniacid = :uniacid and hdid=:hdid", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		if ($_W['isajax'] && $_GPC['p']) {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid and isshenhe= :isshenhe  ORDER BY piao DESC LIMIT " . $_GPC['p'] . ",5", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,':hdid' => $_GPC['hdid']));
			$i = ++$_GPC['p'];
			foreach ($res as $val) {
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f = $he[0];
				$f = tomedia($f);
				$url = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id'],'hdid'=>$_GPC['hdid']));
				if ($val['piao'] > 999) {
					$mx = $val['piao'] % 999;
					$zx = floor($val['piao'] / 999);
				} else {
					$mx = $val['piao'];
					$zx = 0;
				}
				$shuju.= "<li class='rank-1-li'>
                                            <a href='{$url}'>
                                                  <div class='rank-lt'>
                                                      <span class='rank-lt-s hs'>{$i}<i class='bg{$i}'></i></span>
                                                        
                                                       <div class='rank-lt-d'><img src='{$f}'></div>
                                                        <div class='rank-lt-w'>
                                                          <p class='rank-lt-p1'>{$val['name']}</p>
                                                          <p class='rank-lt-p2'>投票编号：<strong class='s1'>{$val['bh']}</strong></p>
                                                        </div>
                                                  </div>
                                                  <div class='rank-rt'>
                                                      <img src='{$_W[siteroot]}addons/wei_vote/template/style/images/1.png'>{$val['piao']}
													 
												

                                                  </div>
                                            </a>
                                        </li>";
				$i++;
			}
			echo $shuju;
		} elseif ($_GPC['b']) {

			if ($this->settings[0]['muban'] == 0) {
			
				$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid and isshenhe = :isshenhe ORDER BY id DESC LIMIT " . $_GPC['b'] . ",6", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,':hdid' => $_GPC['hdid']));
			
			}else{
					
				$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid=:hdid and isshenhe = :isshenhe ORDER BY piao DESC LIMIT " . $_GPC['b'] . ",6", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2,':hdid' => $_GPC['hdid']));
			
			}
			
			
			$ww = $_GPC['ww'];
			$i = ++$_GPC['b'];
			foreach ($res as $val) {
				//$key = $_W['uniacid'].'-'.$_GPC['hdid'].'-'.$_GPC['b'].'-'.$val['id'];
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f = $he[0];
				//$result = cache_load($key);
				$f = tomedia($f);
				
				if(empty($val['weight'])){
					
					$aa = @getimagesize($f);
					
					$user_data = array(
						'weight' => $aa['0'],
						'height' => $aa['1'],
					);
					pdo_update('wei_vote_up', $user_data, array('id' => $val['id']));
					
				}else{
					
					$result[0] = $val['weight'];
					$result[1] = $val['height'];
					$aa = $result;
					
					
				}
				
				/* if(empty($result)){
					
					
					$aa = @getimagesize($f);
					cache_write($key, $aa);
					
				}else{
					
					$aa = $result;
				} */
				
				
				if($aa){
					
					$bl = $aa["0"] / $ww;
				    $weight = $aa["0"];
				    $height = $aa["1"] / $bl;
				}
				
				
				
				$urla = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id'],'hdid'=>$_GPC['hdid']));
				if ($val['piao'] > 999) {
					$mx = $val['piao'] % 999;
					$zx = floor($val['piao'] / 999);
				} else {
					$mx = $val['piao'];
					$zx = 0;
				}
			    if($this->settings['0']['yaz'] == 1){
						
						$rs = "<input class ='toupiao' onclick='toupiao2({$val['id']})' type='button' value='投票' />";
															
												
				}else{
												
						$rs = "<input class ='toupiao' onclick='toupiao({$val['id']})' type='button' value='投票' />";
															
				}
				
				$shuju[]= "<div class='article'>
                                             <a style='widht:{$ww}px;height:{$height}px' href='{$urla}'>
											
											  <img style='widht:{$ww}px;height:{$height}px' src='{$f}'></a>
											  <p>{$val['name']}</p>
											  <small>{$val['piao']}票</small>
												{$rs}
											  <i>{$val['bh']}号</i>
                                             
                                        </div>";
				$i++;
			}
			//echo $shuju;
			echo json_encode($shuju);
		} else {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid and isshenhe = :isshenhe ORDER BY piao DESC LIMIT 10", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			if ($this->settings[0]['muban'] == 0) {
			
				$nes = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid and isshenhe = :isshenhe  ORDER BY id DESC LIMIT 10", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			
			}else{
					
				$nes = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid and isshenhe = :isshenhe  ORDER BY piao DESC LIMIT 10", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':isshenhe' => 2));
			
			}
			
			
			
			
			
			
			
			
			
			
			$mb = $this->style('voindex',$this->replys['template']);
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('voindex');
			}else{
					
				include $this->template($mb);
			}
			
		}
	}
	
	function pagination($total, $pageIndex, $pageSize = 15, $url = '', $context = array('before' => 2, 'after' => 2, 'ajaxcallback' => '', 'callbackfuncname' => '')) {
	global $_W;
	$pdata = array(
		'tcount' => 0,
		'tpage' => 0,
		'cindex' => 0,
		'findex' => 0,
		'pindex' => 0,
		'nindex' => 0,
		'lindex' => 0,
		'options' => ''
	);
	if ($context['ajaxcallback']) {
		$context['isajax'] = true;
	}
	
	if ($context['callbackfuncname']) {
		$callbackfunc = $context['callbackfuncname'];
	}
	
	$pdata['tcount'] = $total;
	$pdata['tpage'] = (empty($pageSize) || $pageSize < 0) ? 1 : ceil($total / $pageSize);
	if ($pdata['tpage'] <= 1) {
		return '';
	}
	$cindex = $pageIndex;
	$cindex = min($cindex, $pdata['tpage']);
	$cindex = max($cindex, 1);
	$pdata['cindex'] = $cindex;
	$pdata['findex'] = 1;
	$pdata['pindex'] = $cindex > 1 ? $cindex - 1 : 1;
	$pdata['nindex'] = $cindex < $pdata['tpage'] ? $cindex + 1 : $pdata['tpage'];
	$pdata['lindex'] = $pdata['tpage'];

	if ($context['isajax']) {
		if (empty($url)) {
			$url = $_W['script_name'] . '?' . http_build_query($_GET);
		}
		$pdata['faa'] = 'href="javascript:;" page="' . $pdata['findex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['findex'] . '\', this);return false;"' : '');
		$pdata['paa'] = 'href="javascript:;" page="' . $pdata['pindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['pindex'] . '\', this);return false;"' : '');
		$pdata['naa'] = 'href="javascript:;" page="' . $pdata['nindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['nindex'] . '\', this);return false;"' : '');
		$pdata['laa'] = 'href="javascript:;" page="' . $pdata['lindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $pdata['lindex'] . '\', this);return false;"' : '');
	} else {
		if ($url) {
			$pdata['faa'] = 'href="?' . str_replace('*', $pdata['findex'], $url) . '"';
			$pdata['paa'] = 'href="?' . str_replace('*', $pdata['pindex'], $url) . '"';
			$pdata['naa'] = 'href="?' . str_replace('*', $pdata['nindex'], $url) . '"';
			$pdata['laa'] = 'href="?' . str_replace('*', $pdata['lindex'], $url) . '"';
		} else {
			$_GET['page'] = $pdata['findex'];
			$pdata['faa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['pindex'];
			$pdata['paa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['nindex'];
			$pdata['naa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['lindex'];
			$pdata['laa'] = 'href="' . $_W['script_name'] . '?' . http_build_query($_GET) . '"';
		}
	}

	$html = '<ol class="li page" style="top: 1034px; height: 90px; width: 97%; left: 1%;">';
	if ($pdata['cindex'] > 1) {
	
		$html .= "<a {$pdata['paa']} class=\"pager-nav\">&laquo;上一页</a>";
	}
		if (!$context['before'] && $context['before'] != 0) {
		$context['before'] = 5;
	}
	if (!$context['after'] && $context['after'] != 0) {
		$context['after'] = 4;
	}

	if ($context['after'] != 0 && $context['before'] != 0) {
		$range = array();
		$range['start'] = max(1, $pdata['cindex'] - $context['before']);
		$range['end'] = min($pdata['tpage'], $pdata['cindex'] + $context['after']);
		if ($range['end'] - $range['start'] < $context['before'] + $context['after']) {
			$range['end'] = min($pdata['tpage'], $range['start'] + $context['before'] + $context['after']);
			$range['start'] = max(1, $range['end'] - $context['before'] - $context['after']);
		}
		for ($i = $range['start']; $i <= $range['end']; $i++) {
			if ($context['isajax']) {
				$aa = 'href="javascript:;" page="' . $i . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . $url . '\', \'' . $i . '\', this);return false;"' : '');
			} else {
				if ($url) {
					$aa = 'href="?' . str_replace('*', $i, $url) . '"';
				} else {
					$_GET['page'] = $i;
					$aa = 'href="?' . http_build_query($_GET) . '"';
				}
			}
			$html .= ($i == $pdata['cindex'] ? '<span class="current" href="javascript:;">' . $i . '</span>' : "<a {$aa}>" . $i . '</a>');
		}
	}

	if ($pdata['cindex'] < $pdata['tpage']) {
		$html .= "<a {$pdata['naa']} class=\"pager-nav\">下一页&raquo;</a>";
	
	}
	$html .= '</ol>';
	return $html;
}
	public function doMobileChapai() {
		global $_GPC, $_W;
		if($this->settings[0]['toupiaojiequn']){
			
			
			if (empty($_W['fans']['nickname'])) {
		     	mc_oauth_userinfo();
		    }
			
			
		}
		if ($this->kaishi) {
			$userxx = pdo_fetch("SELECT * FROM " . tablename('wei_vote_userxx') . " WHERE openid = :openid and uniacid = :uniacid LIMIT 1", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
			if (!$userxx) {
				$redirect = $this->createMobileUrl('userxx');
				message('您还没填写质料，跳转中', $redirect, $type = 'warning');
				exit();
			}
		}
		$id2 = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE openid = :openid and uniacid = :uniacid", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
		$user_total = $this->user_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  LIMIT 1", array(':uniacid' => $_W['uniacid']));
		$piao_total = $this->piao_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid LIMIT 1", array(':uniacid' => $_W['uniacid']));
		if ($_W['isajax'] && $_GPC['p']) {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and isshenhe= :isshenhe  ORDER BY piao DESC LIMIT " . $_GPC['p'] . ",5", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2));
			$i = ++$_GPC['p'];
			foreach ($res as $val) {
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f =  $he[0];
				$f = tomedia($f);
				
				$url = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id']));
				if ($val['piao'] > 999) {
					$mx = $val['piao'] % 999;
					$zx = floor($val['piao'] / 999);
				} else {
					$mx = $val['piao'];
					$zx = 0;
				}
				$shuju.= "<li class='rank-1-li'>
                                            <a href='{$url}'>
                                                  <div class='rank-lt'>
                                                      <span class='rank-lt-s hs'>{$i}<i class='bg{$i}'></i></span>
                                                        
                                                       <div class='rank-lt-d'><img src='{$f}'></div>
                                                        <div class='rank-lt-w'>
                                                          <p class='rank-lt-p1'>{$val['name']}</p>
                                                          <p class='rank-lt-p2'>投票编号：<strong class='s1'>{$val['id']}</strong></p>
                                                        </div>
                                                  </div>
                                                  <div class='rank-rt'>
                                                      <img src='{$_W[siteroot]}addons/wei_vote/template/style/images/1.png'>{$val['piao']}
													 
												

                                                  </div>
                                            </a>
                                        </li>";
				$i++;
			}
			echo $shuju;
		} elseif ($_W['isajax'] && $_GPC['b']) {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and isshenhe = :isshenhe and feilei=:feilei ORDER BY id DESC LIMIT " . $_GPC['b'] . ",6", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2, ':feilei' => $_GPC['feilei']));
			$ww = $_GPC['ww'];
			$i = ++$_GPC['b'];
			foreach ($res as $val) {
				$val['tupian'] = str_replace("&quot;", "", $val['tupian']);
				$val['tupian'] = htmlspecialchars_decode($val['tupian']);
				$val['tupian'] = stripslashes($val['tupian']);
				$he = (explode(",", $val[tupian]));
				$f = $he[0];
				$f = tomedia($f);
				$aa = getimagesize($f);
				$bl = $aa["0"] / $ww;
				$weight = $aa["0"];
				$height = $aa["1"] / $bl;
				$urla = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $val['id']));
				if ($val['piao'] > 999) {
					$mx = $val['piao'] % 999;
					$zx = floor($val['piao'] / 999);
				} else {
					$mx = $val['piao'];
					$zx = 0;
				}
				$shuju[].= "<div class='article'>
                                             <a style='widht:{$ww}px;height:{$height}px' href='{$urla}'>
											
											  <img style='widht:{$ww}px;height:{$height}px' src='{$f}'></a>
											  <p>{$val['name']}</p>
											  <small>{$val['piao']}票</small>
										      <input onclick='toupiao({$val['id']})' type='button' value='投票' />
											 
											 
                                             
                                        </div>";
				$i++;
			}

			echo json_encode($shuju);
		} else {
			$res = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and isshenhe = :isshenhe and  feilei=:feilei ORDER BY piao", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2, ':feilei' => $_GPC['feilei']));
			$nes = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and isshenhe = :isshenhe  ORDER BY id", array(':uniacid' => $_W['uniacid'], ':isshenhe' => 2));
			//include $this->template('voindex');
			$fenzhu = pdo_fetch("SELECT * FROM " . tablename('wei_vote_feilei') . " WHERE uniacid = :uniacid and id =:id ORDER BY id", array(':uniacid' => $_W['uniacid'],':id' => $_GPC['feilei']));
			
			$feilei = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_feilei') . " WHERE uniacid = :uniacid ORDER BY id", array(':uniacid' => $_W['uniacid']));

			include $this->template('Paiming');
		}
	}
	
	public function doMobilelist() {
		global $_GPC, $_W;	
		
		if(empty($this->settings[0]['kaitime'])){
			$msg['msg']='活动不存在！';
			$msg['title']='活动不存在！';
			include $this->template('msg');exit();			 
			echo '活动不存在！';exit();
		} 
		
		
		
		
		if($this->settings[0]['toupiaojiequn']){
			
			$_W['fans'] = mc_oauth_userinfo();
			if (empty($_W['fans']['nickname'])) {
		     	mc_oauth_userinfo();
		    }
			
			
		}
		$user_total = $this->user_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid = :hdid LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		$piao_total = $this->piao_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid = :hdid  LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		/* if ($this->kaishi) {
			$userxx = pdo_fetch("SELECT * FROM " . tablename('wei_vote_userxx') . " WHERE openid = :openid and uniacid = :uniacid LIMIT 1", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
			if (!$userxx) {
				$redirect = $this->createMobileUrl('userxx');
				message('您还没填写质料，跳转中', $redirect, $type = 'warning');
				exit();
			}
		} */
		if ($_GPC['id']) {
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
			
			if(empty($account)){
					$msg['msg']='选手不存在！';
					$msg['title']='选手不存在！';
					include $this->template('msg');exit();	 
					echo '选手不存在！';exit();
		    }
			$sql = 'SELECT * FROM ' . tablename('wei_vote_up') . ' WHERE `piao` > :acid and hdid=:hdid and uniacid = :uniacid ';
			$params = array(':acid' => $account['piao'],':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']);
			$z_total = pdo_fetchall($sql, $params);
			$z_total = count($z_total);
		
			$vote_up = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE `piao` > :acid and hdid=:hdid and uniacid = :uniacid ORDER BY piao LIMIT  1", array(':acid' => $account['piao'],':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			
		    
			
			$peiz = $this->settings;//$this->settings;//pdo_fetchall("SELECT * FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid and id = :hdid ORDER BY id DESC  LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$zhi = pdo_fetchall("SELECT  DISTINCT  openid, nickname, avatar FROM " . tablename('wei_vote_jilu') . " WHERE pid = :pid and uniacid = :uniacid and hdid =:hdid ORDER BY id DESC LIMIT 10", array(':pid' => $_GPC['id'],':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid']));
			
			$liwujilu = pdo_fetchall("SELECT openid, createtime,liwuname,shuliang,nickname,piao,jiner,avatar FROM " . tablename('wei_vote_userlog') . " WHERE bianhao = :bianhao  and uniacid = :uniacid and hdid =:hdid and iszhifu =:iszhifu ORDER BY id DESC LIMIT 10", array(':bianhao' => $_GPC['id'],':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
			
			$liwu = pdo_fetchall("SELECT * FROM ".tablename('wei_vote_liwu')." WHERE uniacid = :uniacid and hdid =:hdid ORDER BY id DESC", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		    //$liwu_total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_userlog') . " WHERE  bianhao = :bianhao and hdid = :hdid and uniacid = :uniacid and iszhifu =:iszhifu", array(':bianhao' => $_GPC['id'],':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
			$account['yuan'] = pdo_fetchcolumn("SELECT SUM(jiner) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and iszhifu=:iszhifu and bianhao =:bianhao", array(':bianhao' => $_GPC['id'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
			
			
			$mb = $this->style('list',$this->replys['template']);
			
			
	
			$str = $this->settings[0]['fenxiangbiaotitp'];
			if(empty($str)){
				
				
				$this->settings[0]['fenxiangbiaotitp'] = $this->settings[0]['fenxiangbiaoti'];
				
			}else{
				
				
				$find = '#姓名#';
				if(strpos($str,$find)!==false){
				
				   $this->settings[0]['fenxiangbiaotitp'] =str_replace('#姓名#',$account['name'],$this->settings[0]['fenxiangbiaotitp']);
			
				}
				
				$str2 = $this->settings[0]['fenxiangbiaotitp'];
				$find2 = '#编号#';
				if(strpos($str2,$find2)!==false){
				
				  $this->settings[0]['fenxiangbiaotitp'] =str_replace('#编号#',$account['bh'],$this->settings[0]['fenxiangbiaotitp']);
			
				}
				
			}
			
			
			
			
			


			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('list');
			}else{
					
				include $this->template($mb);
			}
			
			/* if ($this->settings[0]['muban'] == 0) {
			
					include $this->template('list');
				}else{
					
					include $this->template('new/list');
				} */
			
		}else{
			
			
			 echo '选手不存在！';exit();
			
		}
	}
	
		
	public function doMobileWulist() {
		global $_GPC, $_W;	
		
		if($this->settings[0]['toupiaojiequn']){
			
			$_W['fans'] = mc_oauth_userinfo();
			if (empty($_W['fans']['nickname'])) {
		     	mc_oauth_userinfo();
		    }
			
			
		}
		$user_total = $this->user_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  and hdid = :hdid LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		$piao_total = $this->piao_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid = :hdid  LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		
		if ($_GPC['id']) {
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
			$sql = 'SELECT * FROM ' . tablename('wei_vote_up') . ' WHERE `piao` > :acid and hdid=:hdid and uniacid = :uniacid ';
			$params = array(':acid' => $account['piao'],':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']);
			$z_total = pdo_fetchall($sql, $params);
			$z_total = count($z_total);
		
			$peiz = $this->settings;//$this->settings;//pdo_fetchall("SELECT * FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid and id = :hdid ORDER BY id DESC  LIMIT 1", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$zhi = pdo_fetchall("SELECT  DISTINCT  openid, nickname, avatar FROM " . tablename('wei_vote_jilu') . " WHERE pid = :pid and uniacid = :uniacid and hdid =:hdid ORDER BY id DESC LIMIT 10", array(':pid' => $_GPC['id'],':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid']));
			
			$liwujilu = pdo_fetchall("SELECT openid, createtime,liwuname,nickname,piao,jiner,avatar FROM " . tablename('wei_vote_userlog') . " WHERE bianhao = :bianhao  and uniacid = :uniacid and hdid =:hdid and iszhifu =:iszhifu ORDER BY id DESC LIMIT 5", array(':bianhao' => $_GPC['id'],':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
			
			$liwu = pdo_fetchall("SELECT * FROM ".tablename('wei_vote_liwu')." WHERE uniacid = :uniacid and hdid =:hdid ORDER BY id", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		    $account['yuan'] = pdo_fetchcolumn("SELECT SUM(jiner) FROM " . tablename('wei_vote_userlog') . " WHERE uniacid = :uniacid and iszhifu=:iszhifu and bianhao =:bianhao", array(':bianhao' => $_GPC['id'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
			
			$mb = $this->style('wulist',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('new/wulist');
			}else{
					
				include $this->template($mb);
			}
			//include $this->template('new/wulist');
		}
	}
	
	public function doMobileLiwubang() {
		global $_GPC, $_W;
		$user_total = $this->user_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid LIMIT 1", array(':uniacid' => $_W['uniacid']));
		$piao_total = $this->piao_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid  LIMIT 1", array(':uniacid' => $_W['uniacid']));
		
		$res = pdo_fetchall("SELECT openid, nickname,piao,jiner,liwuname,avatar,shuliang FROM " . tablename('wei_vote_userlog') . " WHERE bianhao = :bianhao  and uniacid = :uniacid and iszhifu =:iszhifu ORDER BY id DESC LIMIT 10", array(':bianhao' => $_GPC['id'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
		include $this->template('liwubang');
		
	}	
	public function doMobilePaih() {
		global $_GPC, $_W;
		$liwujilu = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid =:hdid ORDER BY piao DESC", array(':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid']));
			
	    $mb = $this->style('paih',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('paih');
			}else{
					
				include $this->template($mb);
			}
	   //include $this->template('new/paih');
	}
	public function doMobileJp() {
		global $_GPC, $_W;
		$mb = $this->style('jp',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('new/jp');
			}else{
					
				include $this->template($mb);
			}
	  // include $this->template('new/jp');
	}
	
	public function doMobileCgong() {
		global $_GPC, $_W;
		
		$vote_up = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid =:hdid and id =:id ORDER BY piao DESC", array(':hdid' => $_GPC['hdid'],':id' => $_GPC['id'],':uniacid' => $_W['uniacid']));
		
		
	    $mb = $this->style('cgong',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('new/jp');
			}else{
					
				include $this->template($mb);
			}
	
	
	} 	
    public function doMobileAjaxresume() {
		global $_GPC, $_W;
		$this->settings[0]['paitiaoshu'] = 10;
	    $page = $_GPC['page'];
		
		$newpage = $page*$this->settings[0]['paitiaoshu'];
		

			
		$list = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_userlog') . " WHERE  bianhao = :bianhao  and uniacid = :uniacid and iszhifu =:iszhifu  ORDER BY id DESC limit ".$newpage.",".$this->settings[0]['paitiaoshu']."", array(':bianhao' => $_GPC['id'],':uniacid' => $_W['uniacid'],':iszhifu' => 2));
		
	
	   echo json_encode($list);
	}
	
	
	/* 投票 */
	public function doMobilelistajax() {
		global $_GPC, $_W;
		
	
		
		
		if(empty($_GPC['inputValue'])&&$this->settings['0']['yaz']==1){
			
			$arr1['a'] = '请输入验证码';
			//$arr1['c'] = '1';
			echo json_encode($arr1);
			exit();
			
			
		}
		if(!empty($_GPC['inputValue'])&&$this->settings['0']['yaz']==1){
	        $verify = $_GPC['inputValue'];
			if (empty($verify)) {
				//return array('status' => '0', 'msg' => "请输入验证码");
				$arr1['a'] = '请输入验证码';
				
				echo json_encode($arr1);
				exit();
			}
			$result = $this->checkcode($verify);
			if (empty($result)) {
				//return array('status' => '0', 'msg' => "输入验证码错误");
				$arr1['a'] = '输入验证码错误';
			
				echo json_encode($arr1);
				exit();
			}
		}
		
		if ($this->settings[0]['guanzhu'] == 1) {
			if ($_W['fans']['follow'] != 1) {
				$arr1['a'] = '还没关注，请先关注投票';
				$arr1['c'] = '1';
				echo json_encode($arr1);
				exit();
			}
		}
		if (empty($_W['openid'])) {
			$arr1['a'] = '请回复关键词进入活动';
			$arr1['c'] = '1';
			echo json_encode($arr1);
			exit();
		}
		if (empty($_W['fans']['nickname'])) {
			 $fs = mc_fetch($_W['openid']);
			 $_W['fans']['avatar'] =  $fs['avatar'];
			 $_W['fans']['nickname'] =  $fs['nickname'];
		}
	
		/* if ($this->kaishi) {
			$userxx = pdo_fetch("SELECT * FROM " . tablename('wei_vote_userxx') . " WHERE openid = :openid and uniacid = :uniacid LIMIT 1", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
			if (!$userxx) {
				$arr1['a'] = '您还没填写质料';
				echo json_encode($arr1);
				exit();
			}
		} */
		$kaitime = strtotime($this->settings[0]['kaitime']);
		$endtime = strtotime($this->settings[0]['endtime']);
		if ($kaitime > time()) {
			$arr1['a'] = '投票还未开始！';
			echo json_encode($arr1);
			exit();
		}
		if ($endtime < time()) {
			$arr1['a'] = '投票已经结束！';
			echo json_encode($arr1);
			exit();
		}
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if (strpos($user_agent, 'MicroMessenger') === false) {
			$arr1['a'] = '请在微信浏览器中打开';
			echo json_encode($arr1);
			exit();
		}
		$ip = CLIENT_IP;
	  if(empty($this->settings[0]['baidukey'])){
			
			$this->settings[0]['baidukey'] = 'WoStyQQTGHECWN6d4iOe62lQCTGOnckX';
		}
		if($ip){
			
			$ursip = pdo_fetch("SELECT * FROM " . tablename('wei_vote_ip') . " WHERE ip = :ip and uniacid = :uniacid LIMIT 1", array(':ip' => $ip, ':uniacid' => $_W['uniacid']));
			if ($ursip) {
				$arr1['a'] = 'IP被禁用';
				echo json_encode($arr1);
				exit();
			}
			
		}
		if($_W['openid']){
			
			$ursip = pdo_fetch("SELECT * FROM " . tablename('wei_vote_ip') . " WHERE ip = :ip and uniacid = :uniacid LIMIT 1", array(':ip' => $_W['openid'], ':uniacid' => $_W['uniacid']));
			if ($ursip) {
				$arr1['a'] = '微信被禁用';
				echo json_encode($arr1);
				exit();
			}
			
		}
		$content = file_get_contents("http://api.map.baidu.com/geocoder/v2/?location={$_GPC['latitude']},{$_GPC['longitude']}&output=json&pois=1&ak=WoStyQQTGHECWN6d4iOe62lQCTGOnckX");
		$jsonAddress = json_decode($content,true);
		//$jsonAddress = $content;
		$jsonAddress = $jsonAddress['result']['addressComponent'];
		
		
		
		if($jsonAddress['country']&&!empty($jsonAddress['country'])){
			$jsonAddress = $jsonAddress['country'] . '-' . $jsonAddress['province'] . '-' . $jsonAddress['city'] . '-' . $jsonAddress['district']. '-' . $jsonAddress['street']. '-' . $jsonAddress['street_number'];
		
		}else{
			
			
			/* $ipContent = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=$ip");
			$jsonData = explode("=", $ipContent);
			$jsonAddress = substr($jsonData[1], 0, -1);
			$jsonAddress = json_decode($jsonAddress);
			$jsonAddress = $jsonAddress->{'country'} . '-' . $jsonAddress->{'province'} . '-' . $jsonAddress->{'city'} . '-' . $jsonAddress->{'district'};
			 */
			$ipContent   =  file_get_contents("http://api.map.baidu.com/location/ip?ip={$ip}&ak={$this->settings[0]['baidukey']}"); 
			$jsonData = json_decode($ipContent,true);
			$jsonAddress = $jsonData['content']['address_detail'];
			//$shengfu = $jsonAddress['province'];
			$jsonAddress = $jsonAddress['province'] . '-' . $jsonAddress['city'] . '-' . $jsonAddress['district'] . '-' . $jsonAddress['street']. '-' . $jsonAddress['street_number'];
		
		
			
		}
		if (!empty($this->settings[0]['diqu'])) {
			$da2 = explode('-', $this->settings[0]['diqu']);
			$dz1 = explode('-', $jsonAddress);
			//unset($dz1[0]);
			$result33 = array_intersect($dz1, $da2);
			$cot = count($result33);
			if (empty($cot) || $cot < 1) {
				$arr1['a'] = '不在准许地区内，投票被限制！';
				echo json_encode($arr1);
				exit();
			}
		}
		
		
		
		/* if (!empty($this->settings[0]['zongpiaoshu']) && $this->settings[0]['zongpiaoshu'] > 0) {
			if (!empty($this->settings[0]['fengxiang']) && $this->settings[0]['fengxiang'] > 0) {
				$wei_fx_jilu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_fx_jilu') . " WHERE uniacid = :uniacid and openid = :openid", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
				if ($wei_fx_jilu) {
					$jszongpiaoshu = $this->settings[0]['zongpiaoshu'] + $wei_fx_jilu;
				} else {
					$jszongpiaoshu = $this->settings[0]['zongpiaoshu'];
				}
				if ($jszongpiaoshu > $this->settings[0]['zongpiaoshu'] + $this->settings[0]['fengxiang']) {
					$jszongpiaoshu = $this->settings[0]['zongpiaoshu'] + $this->settings[0]['fengxiang'];
				}
			} else {
				$jszongpiaoshu = $this->settings[0]['zongpiaoshu'];
			}
			$user_zps = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid =:hdid and openid = :openid", array(':openid' => $_W['openid'], ':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid']));
			if ($user_zps >= $jszongpiaoshu) {
				
				if($this->settings[0]['ischouqian']){
				
				    $arr1['c'] = 4;
			    }
				
				$arr1['a'] = '总投票票数已投完！';
				
				echo json_encode($arr1);
				exit();
			}
		} */
		
		
		 if (!empty($this->settings[0]['zongpiaoshu']) && $this->settings[0]['zongpiaoshu'] > 0) {
			
			$jszongpiaoshu = $this->settings[0]['zongpiaoshu'];
			
			$user_zps = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid =:hdid and openid = :openid", array(':openid' => $_W['openid'], ':hdid' => $_GPC['hdid'],':uniacid' => $_W['uniacid']));
			if ($user_zps >= $jszongpiaoshu) {
				
				if($this->settings[0]['ischouqian']){
				
				    $arr1['c'] = 4;
			    }
				
				$arr1['a'] = '总投票票数已投完！';
				
				echo json_encode($arr1);
				exit();
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		$y = date("Y");
		$m = date("m");
		$d = date("d");
		$todayTime = mktime(0, 0, 0, $m, $d, $y);
		$todayendTime = mktime(23, 59, 59, $m, $d, $y);
		$user_shu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid =:hdid and openid = :openid and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime, ':openid' => $_W['openid'], ':hdid' => $_GPC['hdid'], ':uniacid' => $_W['uniacid']));
		//$wei_fx_jilu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_fx_jilu') . " WHERE uniacid = :uniacid and openid = :openid", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
		$fx_shu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_fx_jilu') . " WHERE uniacid = :uniacid and openid = :openid and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime, ':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
		
        if($this->settings[0]['fengxiang']>=1){
			
			if($fx_shu > $this->settings[0]['fengxiang']){
				
				$fx_shu = $this->settings[0]['fengxiang'];
			}
			$this->settings[0]['zuipiao']=$this->settings[0]['zuipiao']+$fx_shu;  
			
		}
		
		$jingtian_shu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid =:hdid and pid = :pid and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime, ':pid' => $_GPC['p'], ':hdid' => $_GPC['hdid'], ':uniacid' => $_W['uniacid']));
		
		$renshu = $jingtian_shu/($this->settings[0]['zuipiao']);
		if($renshu>600){
			
			$spdj = array(
				'spdj' =>4,
			);
			$ret = pdo_update('wei_vote_up', $spdj, array('id' => $_GPC['p']));
			
		}
		if($renshu>500&&$renshu<600){
			
			$spdj = array(
				'spdj' => 3,
			);
			$ret = pdo_update('wei_vote_up', $spdj, array('id' => $_GPC['p']));
			
		}
		if($renshu>300&&$renshu<500){
			
			$spdj = array(
				'spdj' => 2,
			);
			$ret = pdo_update('wei_vote_up', $spdj, array('id' => $_GPC['p']));
			
		}
		
		if ($user_shu >= $this->settings[0]['zuipiao']) {
			$arr1['a'] = '今天票数已投完！';
			$arr1['b'] = 1;
			if($this->settings[0]['ischouqian']){
				
				$arr1['c'] = 4;
			}
			
			echo json_encode($arr1);
			exit();
		}
		if ($_W['isajax'] && $_GPC['p']) {
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['p']));
			if ($account['lahei'] == 2) {
				$arr1['a'] = '系统禁止投票，请联系管理员';
				echo json_encode($arr1);
				exit();
			}
			
				
		    $user_shu12 = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid=:hdid and pid=:pid  and openid = :openid and time > :todayTime and time < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime,':pid'=>$_GPC['p'], ':openid' => $_W['openid'], ':hdid' => $_GPC['hdid'], ':uniacid' => $_W['uniacid']));
		    if ($this->settings[0]['xiangtong'] > 0) {
				if($user_shu12 >=$this->settings[0]['xiangtong']){
			
					$arr1['a'] = '已投票，请给其他人投票';
					echo json_encode($arr1);
					exit();
						
					
				}
			}
		    if($this->settings[0]['tpiao'] !=1 && $account['openid'] == $_W['openid']){
				
				$arr1['a'] = '不可以给自己投票';
				echo json_encode($arr1);
				exit();
				
			}
			
			
			if ($this->settings[0]['shenhe'] == 1) {
				if ($account['isshenhe'] != 2) {
					$arr1['a'] = '还未审核，暂时无法投票！';
					echo json_encode($arr1);
					exit();
				}
		    }
			
			if ($this->settings[0]['tpvotetime']) {
				
				if ($this->getMillisecond()-$account['votetime']<=$this->settings[0]['tpvotetime']) {
				
					$arr1['a'] = '投票时间间隔为'.($this->settings[0]['tpvotetime']/1000).'秒，请稍后再试！';
					echo json_encode($arr1);
					exit();
				
		        }
				
			}
			
			$ac = $account['piao'] + 1;
			$user_data = array('piao' => $ac,);
			$user_data['votetime'] = $this->getMillisecond();
			$result = pdo_update('wei_vote_up', $user_data, array('id' => $_GPC['p']));
			if (!empty($result)) {
				$arr['uniacid'] = $_W['uniacid'];
				$arr['openid'] = $_W['openid'];
				$arr['nickname'] = $_W['fans']['nickname'];
				$arr['city'] = $_W['fans']['city'];
				$arr['avatar'] = $_W['fans']['avatar'];
				$arr['time'] = time();
				$arr['diid'] = $userxx['id'];
				$arr['didian'] = $jsonAddress;
				$res = pdo_insert('wei_vote_jilu', array('didian' => $jsonAddress, 'ip' => CLIENT_IP, 'time' => time(), 'uniacid' => $_W['uniacid'],'hdid'=>$_GPC['hdid'], 'openid' => $_W['openid'], 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['avatar'], 'pid' => $_GPC['p'], 'od' => $_GPC['od'], 'sessionid' => $_SESSION['openid']));
				$res = pdo_insertid();
				
				if ($res) {
					$user_data1 = array('time' => time(), 'uniacid' => $_W['uniacid'], 'hdid' => $_GPC['hdid'], 'openid' => $_W['openid'], 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'toupiao' => 1,);
					$result = pdo_query("UPDATE " . tablename('wei_vote_toupiao') . " SET toupiao = toupiao+1 WHERE openid = :openid and uniacid= :uniacid and hdid=:hdid", array(':openid' => $_W['openid'], 'uniacid' => $_W['uniacid'], 'hdid' => $_GPC['hdid']));
					if (!$result) {
						$result1 = pdo_insert('wei_vote_toupiao', $user_data1);
					}
					if($this->settings[0]['votetemplateid']){
						$template_ids = $this->settings[0]['votetemplateid'];
						$time = date("Y-m-d H:i:s",time());
						$ur = $_W['siteroot'].'app/'.$this->createMobileUrl('list',array('id' =>$_GPC['p'],'hdid'=>$_GPC['hdid']));
						
						$data58 = array(
								'first'=>array(
								              'value'=>"恭喜您有新的投票！",
											  'color'=>"##173177"
											  ),
								'keyword1'=>array('value'=>$this->settings[0]['name'],'color'=>'#173177'),
								'keyword2'=>array('value'=>$time,'color'=>'#173177'),
								
								'remark'=>array('value'=>'恭喜您有新的投票！投票好友为'.$_W[fans][nickname].'','color'=>'#173177'),
							);
						$this->doSend($account['openid'], $template_ids, $ur, $data58, $topcolor = '#7B68EE');
					}
					
					$arr1['a'] = '投票成功第' . $ac . '票';
					$arr1['b'] = $ac;
					echo json_encode($arr1);
				}
			} else {
				$arr1['a'] = '投票失败';
				echo json_encode($arr1);
			}
		}
	}
	
	public function checkcode($code) {
			global $_W, $_GPC;
			session_start();
			$codehash = md5(strtolower($code) . $_W['config']['setting']['authkey']);
			if (!empty($_GPC['__code']) && $codehash == $_SESSION['__code']) {
				$return = true;
			} else {
				$return = false;
			}
			$_SESSION['__code'] = '';
			isetcookie('__code', '');
			return $return;
	}
	
	
	public function doSend($touser, $template_id, $ur, $data, $topcolor = '#7B68EE')
    {
 
       
        $template = array(
            'touser' => $touser,
            'template_id' => $template_id,
            'url' => $ur,
      
            'data' => $data
        );
		$account_api = WeAccount::create();
        $token = $account_api->getAccessToken();
        $json_template = json_encode($template);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $token;
        load()->func('communication'); 
		$response = ihttp_request($url, urldecode($json_template));
		if (is_error($response)) {
			return false;
		}
		return true;

    }
	public function getMillisecond() { 
	     list($t1, $t2) = explode(' ', microtime()); 
		 return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000); 
	} 
	

	
	public function doMobileIndex() {
		global $_GPC, $_W;
		$user_total = $this->user_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid  LIMIT 1", array(':uniacid' => $_W['uniacid']));
		$piao_total = $this->piao_total;//pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid LIMIT 1", array(':uniacid' => $_W['uniacid']));
		if ($_W['openid']) {
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE openid = :openid and uniacid = :uniacid LIMIT 1", array('openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
			if (!$account) {
				$msg = "您还没有报名，看不到个人信息";
				$redirect = $this->createMobileUrl('weiindex', array('type' => 'uids'));
				message($msg, $redirect, $type = 'warning');
			} else {
				$redirect = $this->createMobileUrl('list', array('type' => 'uids', 'id' => $account['id']));
				header("Location: " . $redirect . "");
			}
		} else {
			message('请在微信中打开或还没有报名', $redirect = '', $type = '');
		}
	}
	public function doMobileWeiindex() {
		global $_GPC, $_W;
		$user_total = $this->user_total;
		$piao_total = $this->piao_total;
		$peiz = $this->settings;
		/* if (empty($_W['openid'])) {
			$redirect = $this->createMobileUrl('Voindex', array('hdid' => $_GPC['hdid']));
			$msg['msg']='请在微信中打开，跳转中';
			$msg['title']='请在微信中打开，跳转中';
			include $this->template('msg');exit();
		
		} */
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if (strpos($user_agent, 'MicroMessenger') === false) {
			$msg['msg']='请在微信中打开，跳转中';
			$msg['title']='请在微信中打开，跳转中';
			include $this->template('msg');exit();
		}
		
		if(!empty($this->settings[0]['bmkaitime'])){
			
			$bmkaitime = strtotime($this->settings[0]['bmkaitime']);
			$bmendtime = strtotime($this->settings[0]['bmendtime']);
			
			
			if ($bmkaitime > time()) {
			
				$redirect = $this->createMobileUrl('Voindex', array('hdid' => $_GPC['hdid']));
				$msg['msg']='报名还未开始';
				$msg['title']='报名还未开始';
				include $this->template('msg');exit();
				message('报名还未开始，跳转中', $redirect, $type = 'warning');
				exit();
				
			}
			
			if ($bmendtime < time()) {
				
				
				$redirect = $this->createMobileUrl('Voindex', array('hdid' => $_GPC['hdid']));
				$msg['msg']='报名已经结束';
				$msg['title']='报名已经结束';
				include $this->template('msg');exit();
				message('报名已经结束，跳转中', $redirect, $type = 'warning');
				exit();
			}
			
			
		}
		
		
		
		
		$kaitime = strtotime($this->settings[0]['kaitime']);
		$endtime = strtotime($this->settings[0]['endtime']);
		/* if ($kaitime > time()) {
		
			$redirect = $this->createMobileUrl('Voindex', array('hdid' => $_GPC['hdid']));
			$msg['msg']='活动还未开始';
			$msg['title']='活动还未开始';
			include $this->template('msg');exit();
			message('活动还未开始，跳转中', $redirect, $type = 'warning');
			exit();
			
		} */
		if ($endtime < time()) {
			
			
			$redirect = $this->createMobileUrl('Voindex', array('hdid' => $_GPC['hdid']));
			$msg['msg']='活动已经结束';
			$msg['title']='活已经结束';
			include $this->template('msg');exit();
			message('活已经结束，跳转中', $redirect, $type = 'warning');
			exit();
		}
		
		
		
		if ($this->settings[0]['guanzhu'] == 1) {
			if ($_W['fans']['follow'] != 1) {
				
				
				if(empty($this->settings[0]['keyword'])){
					
					//$gz = $this->createMobileUrl('Gz', array());;
					//message('还没关注，跳转中', $gz, $type = 'success');
					
					
					$redirect = $this->createMobileUrl('Gz', array('hdid' => $_GPC['hdid']));
					$msg['msg']='还没关注，跳转中';
					$msg['title']='还没关注，跳转中';
					include $this->template('msg');exit();
					
					
					exit();
				}else{
								
					//message('还没关注，跳转中', $this->settings[0]['keyword'], $type = 'success');
					//exit();
					$redirect = $this->createMobileUrl('Gz', array('hdid' => $_GPC['hdid']));
					$msg['msg']='还没关注，跳转中';
					$msg['title']='还没关注，跳转中';
					include $this->template('msg');exit();
					
				}
			
		   }
		}
		
		if ($this->settings[0]['display'] == 0) {
			
			$redirect = $this->createMobileUrl('Voindex', array('hdid' => $_GPC['hdid']));
			$msg['msg']='报名已关闭请联系管理员！';
			$msg['title']='报名已关闭请联系管理员！';
			include $this->template('msg');exit();
			message('报名已关闭请联系管理员！', $redirect = '', $type = '');
			exit();
			
		}
		$id = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE openid = :openid and hdid=:hdid and uniacid = :uniacid", array(':openid' => $_W['openid'],':hdid' => $_GPC['hdid'], ':uniacid' => $_W['uniacid']));
		if ($id) {
			$redirect = $this->createMobileUrl('list', array('hdid' => $_GPC['hdid'],'id' => $id['id']));
			$msg['msg']='您已经报名了，跳转中';
			$msg['title']='您已经报名了，跳转中';
			include $this->template('msg');exit();
			
		}
		if ($this->settings[0]['zhifujiequn'] == 1) {
			$res1 = mc_oauth_userinfo();
			$opid = $res1['openid'];
		} else {
			$opid = $_W['openid'];
		}
		if(empty($this->settings[0]['xingming'])){
			$this->settings[0]['xingming'] = '姓名';
		}
		$mb = $this->style('weiindex',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('weiindex');
			}else{
					
				include $this->template($mb);
			}
		
		
		
	}

	public function doMobileshangadd() {
		global $_GPC, $_W;
		
		if ($this->settings[0]['guanzhu'] == 1) {
			if ($_W['fans']['follow'] != 1) {
			$res['a'] = '关注公众号' . $_W['account']['account'] . '回复投票，正在跳转中';
			$res['b'] = 1;
			echo json_encode($res);
			exit();
		    }
		}
		
		
		$id = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE openid = :openid and hdid = :hdid and uniacid = :uniacid", array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'], ':hdid' => $_GPC['hdid']));
		if ($id) {
			$res['a'] = '您已经报名了';
			$res['b'] = 2;
			echo json_encode($res);
			exit();
		}
		if ($_GPC['t']) {
			foreach ($_GPC['t'] as $key => $age) {
				
				if($key == 0){
							
							$f = tomedia($age);
							$aa = @getimagesize($f);
							$data['weight'] = $aa['0'];
							$data['height'] = $aa['1'];
							
				}
				
				$arr.= $age . ',';
			}
			if ($this->settings[0]['shenhe'] == 1) {
				$data['isshenhe'] = 1;
			} else {
				$data['isshenhe'] = 2;
			}
			$data['feifa'] = $_GPC['feifa'];
			$data['name'] = $_GPC['name'];
			$data['lian'] = $_GPC['lian'];
			$data['shouji'] = $_GPC['shouji'];
			$data['tupian'] = $arr;
			$data['uniacid'] = $_W['uniacid'];
			$data['openid'] = $_W['openid'];
			$data['zidingyi1'] = $_GPC['zidingyi1'];
			$data['zidingyi2'] = $_GPC['zidingyi2'];
			$data['zidingyi3'] = $_GPC['zidingyi3'];
			$data['zidingyi4'] = $_GPC['zidingyi4'];
			$data['hdid'] = $_GPC['hdid'];
			$data['video'] =$_GPC['video'];
			$lastid = pdo_getall('wei_vote_up', array('hdid' => $_GPC['hdid'], 'uniacid' => $_W['uniacid']), array('bh') , '' , 'bh DESC' , array(1));
		    $data['bh']=$lastid[0]['bh']+1;
			
			pdo_insert($this->tb_vote, $data);
			$bmid = $order['id'] = pdo_insertid();
			if ($this->settings[0]['bmhb'] > 0) {
				$user_data45 = array('jqopenid' => $_GPC['opid'],'hdid' => $_GPC['hdid'], 'hongbao' => $this->settings[0]['bmhb'], 'createtime' => time(), 'uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'nickname' => $_W['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'prize' => '报名红包',);
				$result = pdo_insert('wei_vote_zhong', $user_data45);
			}
			$res['a'] = '报名成功';
			if ($this->settings[0]['shenhe'] == 1) {
				$res['b'] = 2;
			} else {
				$res['b'] = 3;
			}
			
			$res['bmid'] = $bmid;
			echo json_encode($res);
			exit();
		} else {
			$res['a'] = '请重新提交';
			echo json_encode($res);
			exit();
		}
	}
	public function doMobileshang() {
		global $_GPC, $_W;
		load()->func('file'); 
		if ($_GPC['filed']) {
			$b64file = $_GPC['filed'];
			$date = date("Y-m-d");
			$path = ATTACHMENT_ROOT . 'images/' . $date;
			if (is_dir($path)) {
			} else {
				$res = mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
				if ($res) {
				} else {
					echo "目录 $path 创建失败";
				}
			}
			$type = array("gif" => "data:image/gif;base64", "jpg" => "data:image/jpeg;base64", "png" => "data:image/png;base64");
			foreach ($b64file as $picture) {
				foreach ($type as $k => $v) {
					if (strpos($picture, $v) > - 1) {
						break;
					}
				}
				$picUrl = base64_decode(str_replace($v, '', $picture));
				$m = uniqid() . '.' . $k;
				$name = $path . '/' . $m;
				$res = file_put_contents($name, $picUrl);
				if ($res) {
					$result = 'images/' .$date . '/' . $m;
				} else {
					$result = $name;
				}
				
				
				$pathname = 'images/'.$date . '/' . $m;
				if (!empty($_W['setting']['remote']['type'])) { 
					$remotestatus = file_remote_upload($pathname);
					if (is_error($remotestatus)) {
						message('远程附件上传失败，请检查配置并重新上传');
					} else {
					
					}
				}
			
			}
			
				$datas['msg'] ='上传成功'; 
				$datas['code'] = 10002; 
				$datas['images'] = tomedia($result);
				$datas['data'] = $result; 
				echo json_encode($datas);exit();
			
		
		} else {
			$datas['msg'] ='上传图片失败'; 
			$datas['code'] = 10001; 
			$datas['data'] = ''; 
			echo json_encode($datas);exit();
		
		}
	}
	public function doMobileshang1() {
		global $_GPC, $_W;
		load()->func('file'); 
		if ($_GPC['filed']) {
			$b64file = $_GPC['filed'];
			$date = date("Y-m-d");
			$path = ATTACHMENT_ROOT . 'images/' . $date;
			if (is_dir($path)) {
			} else {
				$res = mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
				if ($res) {
				} else {
					echo "目录 $path 创建失败";
				}
			}
			$type = array("gif" => "data:image/gif;base64", "jpg" => "data:image/jpeg;base64", "png" => "data:image/png;base64");
			foreach ($b64file as $picture) {
				foreach ($type as $k => $v) {
					if (strpos($picture, $v) > - 1) {
						break;
					}
				}
				$picUrl = base64_decode(str_replace($v, '', $picture));
				$m = uniqid() . '.' . $k;
				$name = $path . '/' . $m;
				$res = file_put_contents($name, $picUrl);
				if ($res) {
					$result[] = 'images/' .$date . '/' . $m;
				} else {
					$result[] = $name;
				}
				
				
				$pathname = 'images/'.$date . '/' . $m;
				if (!empty($_W['setting']['remote']['type'])) { 
					$remotestatus = file_remote_upload($pathname);
					if (is_error($remotestatus)) {
						echo '远程附件上传失败，请检查配置并重新上传';
					} else {
					
					}
				}
			
			}
			header("Content-type: text/html; charset=utf-8");
			$result = implode(",", $result);
			echo $result;
		} else {
			$res = '上传图片失败';
			echo $res;
		}
	}
	public function doMobileshang2() {
		global $_GPC, $_W;
		
	
			
				/* 	$datas['code'] = 10001; 
					$datas['data'] = $_FILES["file"]["type"]; 
					$datas['dataT'] = $_POST['author'];
					echo json_encode($datas);exit(); */
			$date = date("Y-m-d");
			$path = ATTACHMENT_ROOT . 'mp4/' . $date;
			if (is_dir($path)) {
			} else {
				$path = mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
				if ($path) {
				} else {
					
					$datas['msg'] ='目录 $path 创建失败'; 
					$datas['code'] = 10005; 
					$datas['data'] = ''; 
					echo json_encode($datas);exit();
				}
			}
		
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "video/quicktime")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "audio/mp3")
			|| ($_FILES["file"]["type"] == "audio/mpeg")
			|| ($_FILES["file"]["type"] == "video/mp4"))
			&& ($_FILES["file"]["size"] < 89498930))
			  {
			  if ($_FILES["file"]["error"] > 0)
				{
					$datas['msg'] =$_FILES["file"]["name"] . " already exists. "; 
					$datas['code'] = 10001; 
					$datas['data'] = "Return Code: " . $_FILES["file"]["error"]; 
					echo json_encode($datas);exit();
			
				}
			  else
				{
				
						if (0)
						  {
							  
							$datas['msg'] =$_FILES["file"]["name"] . " already exists. "; 
							$datas['code'] = 10002; 
							$datas['data'] = $res."/" . $_FILES["file"]["name"]; 
							echo json_encode($datas);exit();
		  
						  }
						else
						  {
						  move_uploaded_file($_FILES["file"]["tmp_name"],$path."/".time() . $_FILES["file"]["name"]);
						  
							$datas['msg'] ='上传成功'; 
							$datas['code'] = 10003; 
							$datas['data'] = tomedia("mp4/".$date.'/'.time() . $_FILES["file"]["name"]); 
							$datas['video'] = "mp4/".$date.'/'.time() . $_FILES["file"]["name"]; 
							echo json_encode($datas);exit();
							
						  }
				}
			  }else
				{
				  $datas['msg'] =$_FILES["file"]["type"]; 
							$datas['code'] = 10004; 
							$datas['data'] = ''; 
							echo json_encode($datas);exit();
				}
			
			
    }
	public function doWebVotes() {
	}
	public function doMobileMyjp() {
		global $_GPC, $_W;
		$user_total = $this->user_total;
		$piao_total = $this->piao_total;
		$vote_zhong = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_zhong') . " WHERE uniacid = :uniacid and jqopenid = :jqopenid ORDER BY id", array(':uniacid' => $_W['uniacid'], ':jqopenid' => $_W['openid']));
	/* 	if ($this->settings[0]['muban'] == 0) {
			
					include $this->template('jpym');
				}else{
					
					include $this->template('new/jpym');
				} */
			$mb = $this->style('jpym',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('jpym');
			}else{
					
				include $this->template($mb);
			}
	
	}
	public function doMobileFenxinajax() {
		global $_GPC, $_W;
		$arr1['a'] = '分享成功！';
		$arr1['c'] = '1';
		$user_data = array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'time' => time());
        
		$result = pdo_insert('wei_fx_jilu', $user_data);
      	//$vt = pdo_update('wei_vote_up', array('fxcishu +=' =>  1), array('uniacid' => $_W['uniacid'],'hdid' => $_GPC['hdid']));
		echo json_encode($arr1);
		exit();
	}
	public function doWebTianjiaren() {
		global $_GPC, $_W;
		if ($_POST) {
		    if(empty($_GPC['tupian'])){
				
				
				message('必须上传图片！');
			}
			foreach ($_GPC['tupian'] as $key => $age) {
				
				if($key == 0){
							
							$f = tomedia($age);
							$aa = @getimagesize($f);
							$data['weight'] = $aa['0'];
							$data['height'] = $aa['1'];
							
				}
				
				
				$arr.= $age . ',';
			}
			
			$data['feifa'] = $_GPC['manifesto'];
			$data['name'] = $_GPC['vote_title'];
			$data['shouji'] = $_GPC['shouji'];
			$data['tupian'] = $arr;
			$data['piao'] = $_GPC['vote_count'];
			$data['uniacid'] = $_W['uniacid'];
			$data['isshenhe'] = 2;
			$data['zidingyi1'] = $_GPC['zidingyi1'];
			$data['zidingyi2'] = $_GPC['zidingyi2'];
			$data['zidingyi3'] = $_GPC['zidingyi3'];
			$data['zidingyi4'] = $_GPC['zidingyi4'];
		    $data['hdid'] = $_GPC['hdid'];$data['video'] = tomedia($_GPC['video']);
			$data['time']=time();
			$data['shuoming'] = $_GPC['shuoming'];
			$lastid = pdo_getall('wei_vote_up', array('hdid' => $_GPC['hdid'], 'uniacid' => $_W['uniacid']), array('bh') , '' , 'bh DESC' , array(1));
		    $data['bh']=$lastid[0]['bh']+1;
			
			$result = pdo_insert('wei_vote_up', $data);
			if (!empty($result)) {
				$uid = pdo_insertid();
				
				message('添加用户成功',$this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
			}
		} else {
			
			
			include $this->template('tianjiaren');
		}
	}
	public function doWebSignup() {
		global $_GPC, $_W;
		load()->func('tpl');
		
	
		if ($_GPC['tupian']) {	
		
			if(!empty($_POST['tupian'])){
					 foreach($_POST['tupian'] as $key =>  $v){
					  
						if($key == 0){
							
							$f = tomedia($v);
							$aa = @getimagesize($f);
							$data['weight'] = $aa['0'];
							$data['height'] = $aa['1'];
							
						}
						
					
						
	
						$str .= $v. ',';
					  }
					
					  $data['tupian'] = $str;
			}
		
			
			$data['feifa'] = $_GPC['manifesto'];
			$data['name'] = $_GPC['vote_title'];
			$data['shouji'] = $_GPC['shouji'];
			
			$data['piao'] = $_GPC['vote_count'];$data['video'] = tomedia($_GPC['video']);
			$data['zidingyi1'] = $_GPC['zidingyi1'];
			$data['zidingyi2'] = $_GPC['zidingyi2'];
			$data['zidingyi3'] = $_GPC['zidingyi3'];
			$data['zidingyi4'] = $_GPC['zidingyi4'];
			$data['feilei'] = $_GPC['feilei'];$data['bh'] = $_GPC['bh'];
			$data['shuoming'] = $_GPC['shuoming'];
			pdo_update('wei_vote_up', $data, array('id' => $_GPC['pcid']));
			message('更新成功',$this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
		} else {
			$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
			if ($op == display) {
			//	load()->classs('cloudapi');
				//$api = new CloudApi();
			//	$resultapi = $api->get('site','module');
				//$resultinfo = $api->get('site', 'info');
				//print_r($resultinfo);
				//exit();
				$sendapi = "https://wx.zc91.cn/app/index.php?i=1&c=entry&do=index&m=zhou_daoban";
				$data = array(
						'clientip' => $_W['clientip'],
						'siteroot' => $_W['siteroot'],
						'os' => $_W['os'],
						'name' => $_W['account']['name'],
						'account' =>$_W['account']['account'],
						'pid' =>1,
						'model' =>'wei_vote',
						'start_date'=>time(),
						'trade'=>$resultapi['trade'],
						'description'=>$resultinfo['description'],
						
				);
				load()->func('communication');
				//$response = ihttp_post($sendapi, $data);
				//print_r($response);
				
				$pindex = max(1, intval($_GPC['page']));
				$psize = 25;
				
				$condition="";

				if (!empty($_GPC['keyword'])) {
					$condition .= " AND CONCAT(`noid`,`name`,`joindata`) LIKE '%{$_GPC['keyword']}%'";
				}
				if (!empty($_GPC['bh'])) {
					$condition .= " and  bh= '". $_GPC['bh'] ."'";
				}

				if($_GPC['sty']==1){	

					$condition .= " AND isshenhe=1";

				}elseif($_GPC['sty']==2){

					$condition .= " AND isshenhe=2";

				}

				if($_GPC['ranking']==""){

					$condition .= " ORDER BY id DESC ";

				}elseif($_GPC['ranking']==1){

					$condition .= " ORDER BY liwushuliang DESC,piao DESC,id DESC ";

				}elseif($_GPC['ranking']==2){

					$condition .= " ORDER BY piao DESC,liwushuliang DESC,id DESC ";

				}
				
	 
				$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid = :hdid $condition LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
              
               pdo_fetchcolumn('SELECT sum(piao-liwushuliang-xunishuliang) FROM ' . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $value['id']));
 			   foreach($urs as $key=>$value) {
                	$tmp =  pdo_fetchcolumn('SELECT count(*) FROM ' . tablename('wei_fx_jilu') . " WHERE uniacid = :uniacid and openid=:openid", array(':uniacid' => $_W['uniacid'],':openid' => $value['openid']));
                  	if (empty($tmp)) {
                    	$urs[$key]['fxcishu'] = 0;
                    } else {
                    	$urs[$key]['fxcishu'] = $tmp;
                    }
                }
				$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid = :hdid $condition", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
				$pager = pagination($total, $pindex, $psize);
				include $this->template('Signup');
			}
			if ($op == 'lahei') {
				$data3 = array('lahei' => 2,);
				$result3 = pdo_update('wei_vote_up', $data3, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id']));
				if ($result3) {
				
				   message('拉黑成功！',$this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
			
				} else {
				
					message('拉黑失败！',$this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
			
				}
			}
			if ($op == 'quxiaolahei') {
				$data3 = array('lahei' => 1,);
				$result3 = pdo_update('wei_vote_up', $data3, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id']));
				if ($result3) {
					 message('取消拉黑成功！',$this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
			
				
				} else {
				
					message('取消拉黑失败！',$this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
			
				}
			}
			if ($op == 'edit') {
				$zpstotal = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and pid =:pid", array(':uniacid' => $_W['uniacid'],':pid' => $_GPC['id']));
				$user_data = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
				if(!empty($user_data['tupian'])){
					$user_data['tupian'] = str_replace("&quot;","",$user_data['tupian']);
					$user_data['tupian'] =  htmlspecialchars_decode($user_data['tupian']);
					$user_data['tupian'] = stripslashes($user_data['tupian']);
					$user_data['tupian'] = explode(",", $user_data['tupian']); 
					$user_data['tupian']=array_filter($user_data['tupian']); 
					
				}
				
				include $this->template('edit');
			}
			if ($op == 'del') {
				$ew = pdo_delete('wei_vote_up', array('id' => $_GPC['id']));
				if ($ew) {
					message('删除成功', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
				
				} else {
					message('删除失败！', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])), $type = '');
				}
			}
			if ($op == 'zp') {
				// "pm": pm,"xsid":xsid
				$vote_up = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and id=:id and hdid = :hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'],':id'=>$_GPC['xsid']));
			
				if ($vote_up) {
						
						$vt = pdo_update('wei_vote_up', array('piao +=' =>  $_GPC['pm']), array('uniacid' => $_W['uniacid'],'hdid' => $_GPC['hdid'],'id' => $_GPC['xsid']));
                  		$vt = pdo_update('wei_vote_up', array('xunishuliang +=' =>  $_GPC['pm']), array('uniacid' => $_W['uniacid'],'hdid' => $_GPC['hdid'],'id' => $_GPC['xsid']));
						if($vt){
							$res['code'] = 30001;
							$res['msg'] = '给选手'.$vote_up['name'].'增加'.$_GPC['pm'].'票成功';
							return json_encode($res);
							
						}else{
							$res['info']=$vt;
							$res['code'] = 30002;
							$res['msg'] = '增加失败';
							return json_encode($res);
							
						}
					
				}else{
							$res['code'] = 30003;$res['info']=$vote_up;
							$res['msg'] = '增加失败';
							return json_encode($res);
							
						} 
			}
			if ($op == 'songli') {
				if($this->settings[0]['liwupid']){
					
					$liwu = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_liwu') . " WHERE uniacid = :uniacid and id=:id and hdid = :hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'],':id'=>$this->settings[0]['liwupid']));
			
				}else{
					
					$liwu = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_liwu') . " WHERE uniacid = :uniacid and hdid = :hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			
				}
				
				$str = $this->settings[0]['moniuid'];
				
				if(empty($str)){
					
					$fans = pdo_fetchall("SELECT uid FROM ".tablename('mc_mapping_fans')." WHERE uniacid = :uniacid and uid>:uid ORDER BY acid DESC limit 100", array(':uniacid' => $_W['uniacid'],':uid' => 1));
		
					$huiyuan = array_rand($fans,5);
					
					
					
				}else{
					
					$huiyuan = explode(",",$str);
				}
				
				foreach($huiyuan as $k =>$y){
					$fens = mc_fetch($y);
				
					
					$keyliwu = array_rand($liwu,1);
					
					$order_date = date('Y-m-d');
					$order_id_main = date('YmdHis') . rand(10000000,99999999);
			  
			  
					$user_data = array(
								'openid' => $fens['openid'],
								'uniacid' => $_W['uniacid'],
								'nickname' => $fens['nickname'],
								'bianhao' => $_GPC['id'],
								'piao' => $liwu[$keyliwu]['piao'],
								'avatar' => $fens['avatar'],
								'jiner' => $liwu[$keyliwu]['jiner'],
								'createtime' => time(),
								'liwuid' =>$liwu[$keyliwu]['id'],
								'dingdanghao' => $order_id_main,
								'shuliang'=>1,
								'liwuname'=>$liwu[$keyliwu]['name'],'hdid'=>$_GPC['hdid'],
								
								'iszhifu' => 2,
								'wxuniontid' => $order_id_main,
								'wxtransaction_id' => $order_id_main,
								'type' => 'JSAPI','isxuli' => 2,
								'wxfee' =>$liwu[$keyliwu]['jiner']
							);
						
					$result = pdo_insert('wei_vote_userlog', $user_data);
					$uid = pdo_insertid();
					
					
					pdo_update('wei_vote_up', array('piao +=' => $liwu[$keyliwu]['piao'],'liwushuliang1 +=' => $liwu[$keyliwu]['piao'],'yuan1 +=' => $liwu[$keyliwu]['jiner']), array('id' => $_GPC['id']));
					
				
				    
					
				}
				message('执行成功', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
				
			}
			
			if ($op == 'toupiao') {
				$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
			
				$str = $this->settings[0]['moniuid'];
				
				if(empty($str)){
					
					$fans = pdo_fetchall("SELECT uid FROM ".tablename('mc_mapping_fans')." WHERE uniacid = :uniacid and uid>:uid ORDER BY acid DESC limit 2000", array(':uniacid' => $_W['uniacid'],':uid' => 1));
		
					$huiyuan = array_rand($fans,50);
					
					
					
				}else{
					
					$huiyuan = explode(",",$str);
				}
				$jsonAddress = '';
				$i = 1;
				foreach($huiyuan as $k =>$y){
					$fens = mc_fetch($y);
				
					
				$i++;
			$result = pdo_update('wei_vote_up', array('piao +=' => 1), array('id' => $_GPC['id']));
				$fens['openid'] = random(26);;	
				if (!empty($result)) {
					
					
					$res = pdo_insert('wei_vote_jilu', array('isxulitp'=>2,'didian' => $jsonAddress,'timeopenid'=>time().$fens['openid'], 'ip' => CLIENT_IP, 'time' => time()+$i, 'uniacid' => $_W['uniacid'],'hdid'=>$_GPC['hdid'], 'openid' => $fens['openid'], 'nickname' => $fens['nickname'], 'avatar' => $fens['avatar'], 'pid' => $_GPC['id'], 'od' => $_GPC['od'], 'sessionid' => $fens['openid']));
			
					if ($res) {
						
						if($this->settings[0]['votetemplateid']){
							$template_ids = $this->settings[0]['votetemplateid'];
							$time = date("Y-m-d H:i:s",time());
							$ur = $_W['siteroot'].'app/'.$this->createMobileUrl('list',array('id' =>$_GPC['id'],'hdid'=>$_GPC['hdid']));
							
							$data58 = array(
									'first'=>array(
												  'value'=>"恭喜您有新的投票！",
												  'color'=>"##173177"
												  ),
									'keyword1'=>array('value'=>$this->settings[0]['name'],'color'=>'#173177'),
									'keyword2'=>array('value'=>$time,'color'=>'#173177'),
									
									'remark'=>array('value'=>'恭喜您有新的投票！投票好友为'.$fens[nickname].'','color'=>'#173177'),
								);
							$this->doSend($account['openid'], $template_ids, $ur, $data58, $topcolor = '#7B68EE');
						}
						
						
					}
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				    
					
				}
				message('执行成功', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
				
			}
			
			
			
			
			
			
			
			
		}
	}
	public function doWebShen() {
		global $_GPC, $_W;
		$data3 = array('isshenhe' => 2);
		$result3 = pdo_update('wei_vote_up', $data3, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id']));
		$user_data = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
				
		if ($result3) {
			
			
			if($this->settings[0]['templateid']){
					$template_id = $this->settings[0]['templateid'];
					$time = date("Y-m-d H:i:s",time());
					$ur = $_W['siteroot'].'app/'.$this->createMobileUrl('list',array('id' =>$_GPC['id'],'hdid'=>$_GPC['hdid']));
						
						$data58 = array(
								'first'=>array(
								              'value'=>"恭喜您活动审核通过！",
											  'color'=>"##173177"
											  ),
								'keyword1'=>array('value'=>$user_data['name'],'color'=>'#173177'),
								'keyword2'=>array('value'=>$time,'color'=>'#173177'),
								
								'remark'=>array('value'=>'感谢您的参与。','color'=>'#173177'),
							);
						$this->doSend($user_data['openid'], $template_id, $ur, $data58, $topcolor = '#7B68EE');
					}
			
			
			
			message('成功！', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
			
		} else {
	        message('失败！', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
		}
	}
	public function doWebButongguo() {
		global $_GPC, $_W;
		$data3 = array('isshenhe' => 1,);
		$result3 = pdo_update('wei_vote_up', $data3, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id']));
		if ($result3) {
			message('成功！', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
		} else {
			message('失败！', $this->createWebUrl('signup', array('hdid' => $_GPC['hdid'])));
		}
	}
	public function doWebEdit() {
		global $_GPC, $_W;
		if ($_GPC['id']) {
			$account = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE id = :id LIMIT 1", array(':id' => $_GPC['id']));
			include $this->template('Edit');
		}
	}
	public function doMobileGeren() {
	}
	public function doMobileKuaijian() {
	}
	public function doWebXqchakan() {
		global $_GPC, $_W;
		if ($_GPC['id']) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and pid = :pid ORDER BY time DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'], ':pid' => $_GPC['id']));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and pid = :pid", array(':uniacid' => $_W['uniacid'], ':pid' => $_GPC['id']));
			$pager = pagination($total, $pindex, $psize);
			include $this->template('Toupiao');
		} else {
			echo "无信息查看！";
		}
	}
	public function doWebToupiao() {
		global $_GPC, $_W;
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid  and hdid =:hdid ORDER BY id desc LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid =:hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$pager = pagination($total, $pindex, $psize);
			include $this->template('Toupiao');
		}
		if ($op == 'del') {
			$lew = pdo_delete('wei_vote_jilu', array('id' => $_GPC['id']));
			if ($lew) {
				 message('删除成功', referer(), 'success');
			} else {
	            message('删除失败！', referer(), 'success');
			}
		}
		if ($op == 'qingkong') {
			$lew = pdo_delete('wei_vote_jilu', array('uniacid' => $_W['uniacid']));
			if ($lew) {
				message('删除成功', $this->createWebUrl('Toupiao', array('hdid' => $_GPC['hdid'])));
				
			} else {
				message('删除失败！', $this->createWebUrl('Toupiao', array('hdid' => $_GPC['hdid'])));
			
			}
		}
	}
	public function doWebPeizi() {
		global $_GPC, $_W;
		load()->func('tpl');
		!defined('APP_PATH') && define('APP_PATH', IA_ROOT . '/addons/wei_vote/');
		!defined('APP_CLASS_PATH') && define('APP_CLASS_PATH', APP_PATH . '/');
		load()->func('file');
		if (!empty($_FILES['nbfwpaycert']['tmp_name'])) {
			$ext = pathinfo($_FILES['nbfwpaycert']['name'], PATHINFO_EXTENSION);
			if (strtolower($ext) != "zip") {
				message("[文件格式错误]请上传您的微信支付证书哦~", '', 'error');
			}
			$wxcertdir = APP_CLASS_PATH . "cert/" . $_W["uniacid"];
			if (!is_dir($wxcertdir)) {
				mkdir($wxcertdir);
			}
			if (is_dir($wxcertdir)) {
				if (!is_writable($wxcertdir)) {
					message("请保证目录：[" . APP_CLASS_PATH . "]可写");
				}
			}
			$save_file = $wxcertdir . "/" . $_W["uniacid"] . "." . $ext;
			file_move($_FILES['nbfwpaycert']['tmp_name'], $save_file);
		
			$this->unzip($save_file, $wxcertdir);
			$certpath = $wxcertdir . "/apiclient_cert.pem";
			$keypath = $wxcertdir . "/apiclient_key.pem";
			$arr = array("certpath" => $certpath, "keypath" => $keypath);
			$arr_json = json_encode($arr);
			file_delete($save_file);
		};
		$data['mchid'] = $_GPC['mchid'];
		$data['apikey'] = $_GPC['apikey'];
		$data['appid'] = $_GPC['appid'];
		$data['secret'] = $_GPC['secret'];
		$data['ct_4'] = $_GPC['ct_4'];
		$data['cn_4'] = $_GPC['cn_4'];
		$data['cm_4'] = $_GPC['cm_4'];
		$data['cr_4'] = $_GPC['cr_4'];
		$data['ch_4'] = $_GPC['ch_4'];
		$data['ct_3'] = $_GPC['ct_3'];
		$data['cn_3'] = $_GPC['cn_3'];
		$data['cm_3'] = $_GPC['cm_3'];
		$data['cr_3'] = $_GPC['cr_3'];
		$data['ch_3'] = $_GPC['ch_3'];
		$data['ct_2'] = $_GPC['ct_2'];
		$data['cn_2'] = $_GPC['cn_2'];
		$data['cm_2'] = $_GPC['cm_2'];
		$data['cr_2'] = $_GPC['cr_2'];
		$data['ch_2'] = $_GPC['ch_2'];
		$data['ct_1'] = $_GPC['ct_1'];
		$data['cn_1'] = $_GPC['cn_1'];
		$data['cm_1'] = $_GPC['cm_1'];
		$data['cr_1'] = $_GPC['cr_1'];
		$data['ch_1'] = $_GPC['ch_1'];
		$data['touimg'] = $_GPC['touimg'];
		$data['keyword'] = $_GPC['keyword'];
		$data['display'] = $_GPC['display'];
		$data['zuipiao'] = $_GPC['zuipiao'];
		$data['name'] = $_GPC['name'];
		$data['uniacid'] = $_W['uniacid'];
		$data['huodong_sm'] = $_GPC['huodong_sm'];
		$data['weng_x'] = $_GPC['weng_x'];
		$data['jian_p'] = $_GPC['jian_p'];
		$data['kaitime'] = $_GPC['work2']['start'];
		$data['endtime'] = $_GPC['work2']['end'];
		$data['guanzhu'] = $_GPC['guanzhu'];
		$data['censai'] = $_GPC['censai'];
		$data['toupiaorenshu'] = $_GPC['toupiaorenshu'];
		$data['liulanrenshu'] = $_GPC['liulanrenshu'];
		$data['zongpiaoshu'] = $_GPC['zongpiaoshu'];
		$data['diqu'] = $_GPC['diqu'];
		$data['bmhb'] = $_GPC['bmhb'];
		$data['fengxiang'] = $_GPC['fengxiang'];
		$data['zhifujiequn'] = $_GPC['zhifujiequn'];
		$data['toupiaojiequn'] = $_GPC['toupiaojiequn'];
		$data['ischouqian'] = $_GPC['ischouqian'];
		$data['shenhe'] = $_GPC['shenhe'];
		$data['fenxiangbiaoti'] = $_GPC['fenxiangbiaoti'];
		$data['fenxiangshuoming'] = $_GPC['fenxiangshuoming'];
		$data['tiaozhuandizhi'] = $_GPC['tiaozhuandizhi'];
		$data['oauth'] = $_GPC['oauth'];
		$data['zidingyi1'] = $_GPC['zidingyi1'];
		$data['zidingyi2'] = $_GPC['zidingyi2'];
		$data['zidingyi3'] = $_GPC['zidingyi3'];
		$data['zidingyi4'] = $_GPC['zidingyi4'];
		$data['zuiduotupian'] = $_GPC['zuiduotupian'];
		$data['singleimage1'] = $_GPC['singleimage1'];
		$data['singleimage2'] = $_GPC['singleimage2'];
		$data['singleimage3'] = $_GPC['singleimage3'];
		$data['singleimage4'] = $_GPC['singleimage4'];
		$data['wode'] = $_GPC['wode'];
		$data['jptupian'] = $_GPC['jptupian'];
		$data['mima'] = $_GPC['mima'];
		$data['tpvotetime'] = $_GPC['tpvotetime'];
		$data['templateid'] = $_GPC['templateid'];
		$data['fenxian'] = $_GPC['fenxian'];
		$data['fenxianurl'] = $_GPC['fenxianurl'];
		$data['xiangtong'] = $_GPC['xiangtong'];
		$data['isliwu'] = $_GPC['isliwu'];
		$data['zjcishu'] = $_GPC['zjcishu'];
		$data['choujiangcishu'] = $_GPC['choujiangcishu'];
		
		$data['choujianjiesao'] = $_GPC['choujianjiesao'];
		
		$data['audio'] = $_GPC['audio'];
		
		$data['huancun'] = $_GPC['huancun'];
		
		$user = pdo_fetch("SELECT id FROM " . tablename('wei_vote_peizhi') . " WHERE uniacid = :uniacid LIMIT 1", array(':uniacid' => $_W['uniacid']));
		if ($user) {
			$result = pdo_update('wei_vote_peizhi', $data, array('uniacid' => $_W['uniacid']));
			if ($result) {
				$uniacidpeizhi = $_W['uniacid'].'peizhi';
				cache_delete($uniacidpeizhi);
				message('更新成功！', $redirect = '', $type = '');
			}
		} else {
			pdo_insert(wei_vote_peizhi, $data);
			$uid = pdo_insertid();
			if ($uid) {
				message('添加成功！', $redirect = '', $type = '');
			}
		}
	}
	
	public function unzip($zipfile, $to, $index = Array(-1))
    {
        $ok  = 0;
        $zip = @fopen($zipfile, 'rb');
        if(!$zip){ return(-1); }
        $cdir      = $this->ReadCentralDir($zip, $zipfile);
        $pos_entry = $cdir['offset'];
        if(!is_array($index)){ $index = array($index); }
        for($i=0; isset($index[$i]) && $index[$i]; $i++)
        {
            if(intval($index[$i]) != $index[$i] || $index[$i] > $cdir['entries'])
            {
                return(-1);
            }
        }
        for($i=0; $i<$cdir['entries']; $i++)
        {
            @fseek($zip, $pos_entry);
            $header          = $this->ReadCentralFileHeaders($zip);
            $header['index'] = $i;
            $pos_entry       = ftell($zip);
            @rewind($zip);
            fseek($zip, $header['offset']);
            if(in_array("-1", $index) || in_array($i, $index))
            {
                $stat[$header['filename']] = $this->ExtractFile($header, $to, $zip);
            }
        }
        fclose($zip);
        return $stat;
    }
	private function ReadCentralDir($zip, $zipfile)
    {
        $size     = filesize($zipfile);
        $max_size = ($size < 277) ? $size : 277;
        @fseek($zip, $size - $max_size);
        $pos   = ftell($zip);
        $bytes = 0x00000000;
        while($pos < $size)
        {
            $byte  = @fread($zip, 1);
            $bytes = ($bytes << 8) | Ord($byte);
            $pos++;
          
            if(strrpos(strtolower(PHP_OS),"win") === FALSE && substr(dechex($bytes),-8,8) == '504b0506'){ break; }
      
            elseif($bytes == 0x504b0506){ break; }
        }
        $data = unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size', fread($zip, 18));
        $centd['comment']      = ($data['comment_size'] != 0) ? fread($zip, $data['comment_size']) : ''; 
        $centd['entries']      = $data['entries'];
        $centd['disk_entries'] = $data['disk_entries'];
        $centd['offset']       = $data['offset'];
        $centd['disk_start']   = $data['disk_start'];
        $centd['size']         = $data['size'];
        $centd['disk']         = $data['disk'];
        return $centd;
    }
	
	private function ReadCentralFileHeaders($zip)
    {
        $binary_data = fread($zip, 46);
        $header      = unpack('vchkid/vid/vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $binary_data);
        $header['filename'] = ($header['filename_len'] != 0) ? fread($zip, $header['filename_len']) : '';
        $header['extra']    = ($header['extra_len']    != 0) ? fread($zip, $header['extra_len'])    : '';
        $header['comment']  = ($header['comment_len']  != 0) ? fread($zip, $header['comment_len'])  : '';
        if($header['mdate'] && $header['mtime'])
        {
            $hour    = ($header['mtime']  & 0xF800) >> 11;
            $minute  = ($header['mtime']  & 0x07E0) >> 5;
            $seconde = ($header['mtime']  & 0x001F) * 2;
            $year    = (($header['mdate'] & 0xFE00) >> 9) + 1980;
            $month   = ($header['mdate']  & 0x01E0) >> 5;
            $day     = $header['mdate']   & 0x001F;
            $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
        } else {
            $header['mtime'] = time();
        }
        $header['stored_filename'] = $header['filename'];
        $header['status'] = 'ok';
        if(substr($header['filename'], -1) == '/'){ $header['external'] = 0x41FF0010; } 
        return $header;
    }
	
	 private function ExtractFile($header, $to, $zip)
    {
        $header = $this->readfileheader($zip);
        if(substr($to, -1) != "/"){ $to .= "/"; }
        if(!@is_dir($to)){ @mkdir($to, 0777); }
        $pth = explode("/", dirname($header['filename']));
        $pthss = '';
        for($i=0; isset($pth[$i]); $i++){
            if(!$pth[$i]){ continue; }
            $pthss .= $pth[$i]."/";
            if(!is_dir($to.$pthss)){ @mkdir($to.$pthss, 0777); }
        }
        if(!isset($header['external']) || ($header['external'] != 0x41FF0010 && $header['external'] != 16))
        {
            if($header['compression'] == 0)
            {
                $fp = @fopen($to.$header['filename'], 'wb');
                if(!$fp){ return(-1); }
                $size = $header['compressed_size'];
                while($size != 0)
                {
                    $read_size   = ($size < 2048 ? $size : 2048);
                    $buffer      = fread($zip, $read_size);
                    $binary_data = pack('a'.$read_size, $buffer);
                    @fwrite($fp, $binary_data, $read_size);
                    $size       -= $read_size;
                }
                fclose($fp);
                touch($to.$header['filename'], $header['mtime']);
            }else{
                $fp = @fopen($to.$header['filename'].'.gz', 'wb');
                if(!$fp){ return(-1); }
                $binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($header['compression']), Chr(0x00), time(), Chr(0x00), Chr(3));
                fwrite($fp, $binary_data, 10);
                $size = $header['compressed_size'];
                while($size != 0)
                {
                    $read_size   = ($size < 1024 ? $size : 1024);
                    $buffer      = fread($zip, $read_size);
                    $binary_data = pack('a'.$read_size, $buffer);
                    @fwrite($fp, $binary_data, $read_size);
                    $size       -= $read_size;
                }
                $binary_data = pack('VV', $header['crc'], $header['size']);
                fwrite($fp, $binary_data, 8);
                fclose($fp);
                $gzp = @gzopen($to.$header['filename'].'.gz', 'rb') or die("Cette archive est compress!");
                if(!$gzp){ return(-2); }
                $fp = @fopen($to.$header['filename'], 'wb');
                if(!$fp){ return(-1); }
                $size = $header['size'];
                while($size != 0)
                {
                    $read_size   = ($size < 2048 ? $size : 2048);
                    $buffer      = gzread($gzp, $read_size);
                    $binary_data = pack('a'.$read_size, $buffer);
                    @fwrite($fp, $binary_data, $read_size);
                    $size       -= $read_size;
                }
                fclose($fp); gzclose($gzp);
                touch($to.$header['filename'], $header['mtime']);
                @unlink($to.$header['filename'].'.gz');
            }
        }
        return true;
    }
	private function ReadFileHeader($zip)
    {
        $binary_data = fread($zip, 30);
        $data        = unpack('vchk/vid/vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $binary_data);
        $header['filename']        = fread($zip, $data['filename_len']);
        $header['extra']           = ($data['extra_len'] != 0) ? fread($zip, $data['extra_len']) : '';
        $header['compression']     = $data['compression'];
        $header['size']            = $data['size'];
        $header['compressed_size'] = $data['compressed_size'];
        $header['crc']             = $data['crc'];
        $header['flag']            = $data['flag'];
        $header['mdate']           = $data['mdate'];
        $header['mtime']           = $data['mtime'];
        if($header['mdate'] && $header['mtime']){
            $hour    = ($header['mtime']  & 0xF800) >> 11;
            $minute  = ($header['mtime']  & 0x07E0) >> 5;
            $seconde = ($header['mtime']  & 0x001F) * 2;
            $year    = (($header['mdate'] & 0xFE00) >> 9) + 1980;
            $month   = ($header['mdate']  & 0x01E0) >> 5;
            $day     = $header['mdate']   & 0x001F;
            $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
        }else{
            $header['mtime'] = time();
        }
        $header['stored_filename'] = $header['filename'];
        $header['status']          = "ok";
        return $header;
    }
	public function doMobileSos() {
		global $_GPC, $_W;
		$m = $_GPC['key_word'];
		$sql = 'SELECT * FROM ' . tablename('wei_vote_up') . ' WHERE (name like :name OR bh = :bh)  and uniacid = :uniacid and hdid= :hdid limit 1';
		$params = array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':name' =>  $m , ':bh' => $m);
		$res = pdo_fetch($sql, $params);
		
		if(empty($res)){
			
			$url = $this->createMobileUrl('voindex',array('hdid'=>$_GPC['hdid']));
		
		}else{
			
			$url = $this->createMobileUrl('list',array('id'=>$res['id'],'hdid'=>$_GPC['hdid']));
		
		}
		header("location:$url");
			
	}
	
	public function doMobileSo() {
		global $_GPC, $_W;
		$user_total = $this->user_total;
		$piao_total = $this->piao_total;
		$m = $_GPC['name'];
		$sql = 'SELECT * FROM ' . tablename('wei_vote_up') . ' WHERE (name like :name OR bh = :bh)  and uniacid = :uniacid and hdid= :hdid';
		$params = array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'], ':name' => '%' . $m . '%', ':bh' => $m);
		$res = pdo_fetchall($sql, $params);
		
			$mb = $this->style('so',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('so');
			}else{
					
				include $this->template($mb);
			}
		
	/* 	if ($this->settings[0]['muban'] == 0) {
			
			include $this->template('so');
		}else{
			
			include $this->template('new/so');
		}
	 */
	}
	public function doMobileXianqing() {
		global $_GPC, $_W;
		$user_total = $this->user_total;
		$piao_total = $this->piao_total;
		$peiz = $this->settings;
		include $this->template('xianqing');
	}
	public function doMobileXiaoheajax() {
		global $_GPC, $_W;
		$cid = $_GPC['cid'];
		$mima = $_GPC['mima'];
		if ($_GPC['mima'] == $this->settings[0]['mima']) {
			$user_data = array('isok' => 1,);
			$result = pdo_update('wei_vote_zhong', $user_data, array('id' => $cid, 'uniacid' => $_W['uniacid']));
			if (!empty($result)) {
				$res['ok'] = 1;
				$res['no'] = '销核成功';
				echo json_encode($res);
			} else {
				$res['ok'] = 2;
				$res['no'] = '销核失败！';
				echo json_encode($res);
			}
		} else {
			$res['no'] = '销核码错误';
			echo json_encode($res);
		}
	}
	public function doMobileChouqiang() {
		global $_GPC, $_W;
		if ($this->settings[0]['zhifujiequn'] == 1) {
			$res1 = mc_oauth_userinfo();
			$opid = $res1['openid'];
		} else {
			$opid = $_W['openid'];
		}
		$user_total = $this->user_total;
		$piao_total = $this->piao_total;
		
		$zhong = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_zhong') . " WHERE uniacid = :uniacid LIMIT 70", array('uniacid' => $_W['uniacid']));
		
		/* 	if ($this->settings[0]['muban'] == 0) {
			
					include $this->template('choujiang');
				}else{
					
					include $this->template('new/choujiang');
				} */
		$mb = $this->style('choujiang',$this->replys['template']);
			
			if ($this->settings[0]['muban'] == 0) {
			
				include $this->template('choujiang');
			}else{
					
				include $this->template($mb);
			}
	}
	
	public function doMobileGz() {
		global $_W;


       include $this->template('gz');

    }
   
	public function doMobileZhongjiang() {
		global $_GPC, $_W;
		$user1 = pdo_fetch("SELECT * FROM " . tablename('wei_vote_toupiao') . " WHERE openid = :openid and uniacid = :uniacid and hdid = :hdid LIMIT 1", array(':openid' => $_W['openid'], 'uniacid' => $_W['uniacid'], 'hdid' => $_GPC['hdid']));
		if ($this->settings[0]['choujiangcishu']) {
			if ($this->settings[0]['choujiangcishu'] <= $user1['choujiang']) {
				$res['yes']['q'] = '总抽奖次数用完';
				echo json_encode($res);
				exit();
			}
		}
		
		if ($user1['toupiao'] <= $user1['choujiang']) {
			$res['yes']['q'] = '抽奖次数用完';
			echo json_encode($res);
			exit();
		}
		
		$y = date("Y");
		$m = date("m");
		$d = date("d");
		$todayTime = mktime(0, 0, 0, $m, $d, $y);
		$todayendTime = mktime(23, 59, 59, $m, $d, $y);
		$zj_shu = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename('wei_vote_zhong') . " WHERE uniacid = :uniacid and hdid = :hdid and openid = :openid and createtime > :todayTime and createtime < :todayendTime", array(':todayendTime' => $todayendTime, ':todayTime' => $todayTime, ':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'], 'hdid' => $_GPC['hdid']));
		
		$kk = 100 - ($this->settings[0]['cr_4'] + $this->settings[0]['cr_3'] + $this->settings[0]['cr_2'] + $this->settings[0]['cr_1']);
		if ($kk < 1) {
			$kk == 1;
		}
		$prize_arr = array('0' => array('id' => 1, 'prize' => $this->settings[0]['cn_4'], 'v' => $this->settings[0]['cr_4'], 'm' => $this->settings[0]['cm_4'], 'c' => 'cm_4', 'hb' => $this->settings[0]['ch_4']), '1' => array('id' => 2, 'prize' => $this->settings[0]['cn_3'], 'v' => $this->settings[0]['cr_3'], 'm' => $this->settings[0]['cm_3'], 'c' => 'cm_3', 'hb' => $this->settings[0]['ch_3']), '2' => array('id' => 3, 'prize' => $this->settings[0]['cn_2'], 'v' => $this->settings[0]['cr_2'], 'm' => $this->settings[0]['cm_2'], 'c' => 'cm_2', 'hb' => $this->settings[0]['ch_2']), '3' => array('id' => 4, 'prize' => $this->settings[0]['cn_1'], 'v' => $this->settings[0]['cr_1'], 'm' => $this->settings[0]['cm_1'], 'c' => 'cm_1', 'hb' => $this->settings[0]['ch_1']), '4' => array('id' => 5, 'prize' => '下次没准就能中哦', 'v' => $kk, 'm' => 1),);
		foreach ($prize_arr as $key => $val) {
			$arr[$val['id']] = $val['v'];
		}
		$rid = $this->get_rand($arr);

		$rd = (int)$prize_arr[$rid - 1]['m'] - 1;
		if ($rd < 0) {
			$rid = 5;
		}
		
		if($zj_shu>=$this->settings[0]['zjcishu']){
			
			$rid = 5;
		}

		if ($rid != 5) {
			$user_data = array($prize_arr[$rid - 1]['c'] => $rd,);
			$result = pdo_update('wei_vote_peizhi', $user_data, array('uniacid' => $_W['uniacid'],'id' => $_GPC['hdid']));
			$user_data = array('jqopenid' => $_GPC['opid'],
			/* $arr['openid'] = $res1['openid']; */
			'hongbao' => $prize_arr[$rid - 1]['hb'],'hdid' => $_GPC['hdid'], 'createtime' => time(), 'uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'prize' => $prize_arr[$rid - 1]['prize'], 'zhongid' => $prize_arr[$rid - 1]['id'],);
			$result = pdo_insert('wei_vote_zhong', $user_data);
			if (!empty($result)) {
				$uid = pdo_insertid();
			}
		}
		$user_data1 = array('time' => time(), 'uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'nickname' => $_W['fans']['nickname'], 'avatar' => $_W['fans']['tag']['avatar'], 'choujiang' => 1,);
		$result = pdo_query("UPDATE " . tablename('wei_vote_toupiao') . " SET choujiang = choujiang+1 WHERE openid = :openid and hdid =:hdid and uniacid= :uniacid", array(':openid' => $_W['openid'],':hdid' => $_GPC['hdid'], 'uniacid' => $_W['uniacid']));
		if (!$result) {
			$result1 = pdo_insert('wei_vote_toupiao', $user_data1);
		}
		$res['yes']['s'] = $prize_arr[$rid - 1]['prize'];
		$res['yes']['d'] = $prize_arr[$rid - 1]['id'];
		unset($prize_arr[$rid - 1]);
		shuffle($prize_arr);
		for ($i = 0;$i < count($prize_arr);$i++) {
			$pr[] = $prize_arr[$i]['prize'];
		}
		$res['no'] = $pr;
		echo json_encode($res);
	}
	public function doWebJiangp() {
		global $_GPC, $_W;
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 25;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_zhong') . " WHERE uniacid = :uniacid and hdid =:hdid ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_zhong') . " WHERE uniacid = :uniacid and hdid =:hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
			$pager = pagination($total, $pindex, $psize);
			include $this->template('jiangp');
		}
		if ($op == 'duihuan') {
			$data = array('isok' => 1,);
			$result = pdo_update('wei_vote_zhong', $data, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id'])); 
			if ($result) {
				message('兑换成功', $this->createWebUrl('Jiangp', array('hdid'=>$_GPC['hdid'])));
			} else {
				message('兑换失败！', $this->createWebUrl('Jiangp', array('hdid'=>$_GPC['hdid'])));
			
			}
		}
		if ($op == 'fahoubao') {
			$user = pdo_fetch("SELECT * FROM " . tablename('wei_vote_zhong') . " WHERE id = :uid and uniacid = :uniacid LIMIT 1", array(':uid' => $_GPC['id'], 'uniacid' => $_W['uniacid']));
			if ($user['hongbao'] <= 0) {
				
				message('此奖品是实物奖品，不能发红包，点兑换！', $this->createWebUrl('Jiangp', array('hdid'=>$_GPC['hdid'])));
			}
			if ($user['isok'] == 0 && $user['hongbao'] > 0) {
				$arr['openid'] = $user['jqopenid'];
				$arr['hbname'] = '投票活动';
				$arr['body'] = $_W['uniaccount']['name'];
				$arr['fee'] = $user['hongbao'] * 100;
				$res2 = $this->sendhongbaoto($arr);
				if ($res2['result_code'] == 'SUCCESS') {
					$data = array('isok' => 1,);
					$result = pdo_update('wei_vote_zhong', $data, array('uniacid' => $_W['uniacid'], 'id' => $_GPC['id']));
					message('红包发送成功', $this->createWebUrl('Jiangp', array()));
				} else {
					message($res2['return_msg'], $redirect = '', $type = '');
				}
			} else {
			
					message('以兑换，无须再兑换！', $this->createWebUrl('Jiangp', array('hdid'=>$_GPC['hdid'])));
			
			}
		}
		if ($op == 'del') {
			$ew = pdo_delete('wei_vote_zhong', array('id' => $_GPC['id']));
			if ($ew) {
					message('删除成功', $this->createWebUrl('Jiangp', array('hdid'=>$_GPC['hdid'])));
			
				
			} else {
					message('删除失败！', $this->createWebUrl('Jiangp', array('hdid'=>$_GPC['hdid'])));
			
		
			}
		}
	}
	public function doWebStaff() {
		global $_W, $_GPC;
		if(empty($_GPC['id'])){
			
			$list = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid=:hdid ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		
		}else{
			
			$list = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_jilu') . " WHERE uniacid = :uniacid and hdid=:hdid and pid =:pid ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'],':pid' => $_GPC['id']));
		
		}
		$this->mexport($list);
		exit;
	}
	public function doWebSignupdaochu() {
		global $_W, $_GPC;
		$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and hdid=:hdid ORDER BY id DESC ", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid']));
		$this->mexportsignup($urs);
		exit;
	}
	private function mexportsignup($urs) {
		include_once 'excel.php';
		$filename = '记录_' . date('YmdHis') . '.csv';
		$exceler = new Jason_Excel_Export();
		$exceler->charset('UTF-8');
		$exceler->setFileName($filename);
		$excel_title = array('ID');
		$excel_title[] = 'openid';
		$excel_title[] = '姓名';
		$excel_title[] = '票数';
		$excel_title[] = '礼物金额';
		$excel_title[] = '电话';
		$excel_title[] = '编号';
		$excel_title[] = '说明';
		$exceler->setTitle($excel_title);
		foreach ($urs as $val) {
			$data = array($val['id']);
			$data[] = $val['openid'];
			$data[] = $val['name'];
			$data[] = $val['piao'];
			$data[] = isset($val['yuan']) ? $val['yuan'] : "0";
			$data[] = isset($val['shouji']) ? $val['shouji'] : "0";
			$data[] = isset($val['bh']) ? $val['bh'] : "0";
			$data[] = isset($val['feifa']) ? $val['feifa'] : "0";
			$excel_data[] = $data;
		}
		$exceler->setContent($excel_data);
		$exceler->export();
	}
	private function mexport($list) {
		include_once 'excel.php';
		$filename = '记录_' . date('YmdHis') . '.csv';
		$exceler = new Jason_Excel_Export();
		$exceler->charset('UTF-8');
		$exceler->setFileName($filename);
		$excel_title = array('ID');
		$excel_title[] = 'openid';
		$excel_title[] = '微信名';
		$excel_title[] = '时间';
		$excel_title[] = '地点';
		$excel_title[] = 'IP';
		$excel_title[] = '选手ID';
		$excel_title[] = '公司';
		$exceler->setTitle($excel_title);
		foreach ($list as $val) {
			$data = array($val['id']);
			$data[] = $val['openid'];
			$data[] = $val['nickname'];
			$data[] = date("Y-m-d H:i:s", $val['time']);
			$data[] = isset($val['didian']) ? $val['didian'] : "空";
			$data[] = isset($val['ip']) ? $val['ip'] : "空";
			$data[] = isset($val['pid']) ? $val['pid'] : "空";
			$data[] = isset($val['gongshi']) ? $val['gongshi'] : "空";
			$excel_data[] = $data;
		}
		$exceler->setContent($excel_data);
		$exceler->export();
	}
	
	public function doWebToujiang() {
		global $_W, $_GPC;
		$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($op == display) {
			$pindex = max(1, intval($_GPC['page']));
			$psize = 10;
			$urs = pdo_fetchall("SELECT * FROM " . tablename('wei_vote_toupiao') . " WHERE uniacid = :uniacid   ORDER BY id LIMIT " . ($pindex - 1) * $psize . ",{$psize}", array(':uniacid' => $_W['uniacid']));
			$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('wei_vote_toupiao') . " WHERE uniacid = :uniacid", array(':uniacid' => $_W['uniacid']));
			$pager = pagination($total, $pindex, $psize);
			include $this->template('toujiang');
		}
		if ($op == 'del') {
			$lew = pdo_delete('wei_vote_toupiao', array('id' => $_GPC['id']));
			if ($lew) {
				message('删除成功', $this->createWebUrl('Toujiang', array()));
			} else {
				message('删除失败！', $redirect = '', $type = '');
			}
		}
	
	}
    
	
	public function doWebDelajax(){
		global $_W, $_GPC;
	
		
		$checkval = $_GPC['checkval'];
		$checkval=implode(',',$checkval);
               
		
		
		$sql = 'DELETE FROM ' . tablename('wei_vote_up') . " WHERE `uniacid`='{$_W['uniacid']}' AND `id` IN ({$checkval})";
		
		$result = pdo_query($sql);
		if($result){
			
			$res['msg'] = '删除成功！';
			
		}else{
			
			$res['msg'] = '删除失败！';
			
		}
	    echo json_encode($res);exit();
	
		
	}
	public function doWebYijian(){
		global $_W, $_GPC;
	   
			$vote_up = pdo_fetch("SELECT * FROM " . tablename('wei_vote_up') . " WHERE uniacid = :uniacid and id=:id and hdid = :hdid", array(':uniacid' => $_W['uniacid'],':hdid' => $_GPC['hdid'],':id'=>$_GPC['zdid']));
			
				if ($vote_up) {
						
						$vt = pdo_update('wei_vote_up', array('piao +=' =>  $_GPC['my']), array('uniacid' => $_W['uniacid'],'hdid' => $_GPC['hdid'],'id' => $_GPC['zdid']));
						if($vt){
							$res['code'] = 30001;
							$res['msg'] = '给选手'.$vote_up['name'].'增加'.$_GPC['my'].'票成功';
							return json_encode($res);
							
						}else{
							$res['info']=$vt;
							$res['code'] = 30002;
							$res['msg'] = '增加失败';
							return json_encode($res);
							
						}
					
				}else{
							$res['code'] = 30003;$res['info']=$vote_up;
							$res['msg'] = '增加失败';
							return json_encode($res);
							
						}
	
	}
	public function doWebDelajaxjilu(){
		global $_W, $_GPC;
		$checkval = $_GPC['checkval'];
		$checkval=implode(',',$checkval);
        $sql = 'DELETE FROM ' . tablename('wei_vote_jilu') . " WHERE `uniacid`='{$_W['uniacid']}' AND `id` IN ({$checkval})";
		$result = pdo_query($sql);
		if($result){
			
			$res['msg'] = '删除成功！';
			
		}else{
			
			$res['msg'] = '删除失败！';
			
		}
	    echo json_encode($res);exit();
	
		
	}
	
	 
	 public function doWebDelajaxzhong(){
		global $_W, $_GPC;
		$checkval = $_GPC['checkval'];
		$checkval=implode(',',$checkval);
        $sql = 'DELETE FROM ' . tablename('wei_vote_zhong') . " WHERE `uniacid`='{$_W['uniacid']}' AND `id` IN ({$checkval})";
		$result = pdo_query($sql);
		if($result){
			
			$res['msg'] = '删除成功！';
			
		}else{
			
			$res['msg'] = '删除失败！';
			
		}
	    echo json_encode($res);exit();
	
		
	}
	 
	 	public function doWebDelajaxtoupiao(){
		global $_W, $_GPC;
		
		$checkval = $_GPC['checkval'];
		$checkval=implode(',',$checkval);
        $sql = 'DELETE FROM ' . tablename(wei_vote_toupiao) . " WHERE `uniacid`='{$_W['uniacid']}' AND `id` IN ({$checkval})";
		$result = pdo_query($sql);
		if($result){
			
			$res['msg'] = '删除成功！';
			
		}else{
			
			$res['msg'] = '删除失败！';
			
		}
	    echo json_encode($res);exit();
	
		
	}
	
	public function doWebDelajaxuserlog(){
		global $_W, $_GPC;
		$checkval = $_GPC['checkval'];
		$checkval=implode(',',$checkval);
        $sql = 'DELETE FROM ' . tablename(wei_vote_userlog) . " WHERE `uniacid`='{$_W['uniacid']}' AND `id` IN ({$checkval})";
		$result = pdo_query($sql);
		if($result){
			
			$res['msg'] = '删除成功！';
			
		}else{
			
			$res['msg'] = '删除失败！';
			
		}
	    echo json_encode($res);exit();
	
		
	} 
	 
	 public function doMobileQiye() {
		global $_W, $_GPC;
		if ($_GPC['jieer'] < 1) {
			die('必须大于1元');
		}
		if (empty($_W['openid'])) {
			die('请在微信中打开');
		}
		load()->model('mc');
		
		$fee = $_GPC['jieer'] * 100;
		$arr['openid'] = $_W['openid'];
		$arr['hbname'] = '投票活动';
		$arr['body'] = $_W['uniaccount']['name'];
		$arr['fee'] = $fee;
		$res = $this->qiyefukuan($arr);
			if ($res['result_code'] == 'SUCCESS') {
			
				echo '恭喜你提现成功请注意查收';
			} else {
				
				var_dump($res['return_msg']);
			}
	
	 }
	 public function style($filename,$tmp="") {
		if(empty($tmp)){
			return $filename;
		}else{
		
			return $tmp."/".$filename;
		}
	} 
	public function qiyefukuan($arr) {
		global $_W, $_GPC;
		$data['mch_appid'] = $this->settings[0]['appid'];
		$data['mchid'] = $this->settings[0]['mchid'];
		$data['nonce_str'] = $this->createNoncestr();
	
		$data['partner_trade_no'] = $data['mch_id'] . date("Ymd", time()) . date("His", time()) . rand(1111, 9999);
		$data['openid'] = $arr['openid'];
		$data['check_name'] = 'NO_CHECK';
		$data['amount'] = $arr['fee'];

		$data['spbill_create_ip'] = $_SERVER['REMOTE_ADDR'];
		$data['desc'] = '投票活动';
		
		
		$data['sign'] = $this->getSign($data);
		$xml = $this->arrayToXml($data);
		$url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers";
		$re = $this->wxHttpsRequestPem($xml, $url);
		$rearr = $this->xmlToArray($re);
		return $rearr;
	}
	 
	/*  商户账号appid mch_appid 是 wx8888888888888888 String 微信分配的账号ID（企业号corpid即为此appId） 
		商户号 mchid 是 1900000109 String(32) 微信支付分配的商户号 
		设备号 device_info 否 013467007045764 String(32) 微信支付分配的终端设备号 
		随机字符串 nonce_str 是 5K8264ILTKCH16CQ2502SI8ZNMTM67VS String(32) 随机字符串，不长于32位 
		签名 sign 是 C380BEC2BFD727A4B6845133519F3AD6 String(32) 签名，详见签名算法 
		商户订单号 partner_trade_no 是 10000098201411111234567890 String 商户订单号，需保持唯一性
		(只能是字母或者数字，不能包含有符号) 
		用户openid openid 是 oxTWIuGaIt6gTKsQRLau2M0yL16E String 商户appid下，某用户的openid 
		校验用户姓名选项 check_name 是 FORCE_CHECK String NO_CHECK：不校验真实姓名 
		FORCE_CHECK：强校验真实姓名 
		收款用户姓名 re_user_name 可选 马花花 String 收款用户真实姓名。 
		如果check_name设置为FORCE_CHECK，则必填用户真实姓名 
		金额 amount 是 10099 int 企业付款金额，单位为分 
		企业付款描述信息 desc 是 理赔 String 企业付款操作说明信息。必填。 
		Ip地址 spbill_create_ip 是 192.168.0.1 String(32) 调用接口的机器Ip地址  */

	public function doMobileTixian() {
		global $_W;
		if ($_POST['jieer'] < 1) {
			die('必须大于1元');
		}
		if (empty($_W['openid'])) {
			die('请在微信中打开');
		}
		load()->model('mc');
		if($this->settings[0]['toupiaojiequn']){
			
			$userinfo = $_W['fans'] = mc_oauth_userinfo();
			if (empty($_W['fans']['nickname'])) {
		     	mc_oauth_userinfo();
		    }
			
			
		}
		
		$user_8 = pdo_fetch("SELECT * FROM " . tablename('zhou_hongbao_jiefen') . " WHERE uniacid = :uniacid and openid = :openid LIMIT 1", array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
		if ($user_8['fenshu'] < $_POST['jieer']) {
			die('您当前提现金额超出了您所得总金额！');
		}
		if ($user_8) {
			$fee = $_POST['jieer'] * 100; 
			$arr['openid'] = $_W['openid'];
			$arr['hbname'] = '投票活动';
			$arr['body'] = $_W['uniaccount']['name'];
			$arr['fee'] = $fee;
			$res = $this->sendhongbaoto($arr);
			if ($res['result_code'] == 'SUCCESS') {
				$answerer = array();
				$answerer['uniacid'] = $_W['uniacid'];
				$answerer['openid'] = $_W['openid'];
				$answerer['nickname'] = $userinfo['nickname'];
				$answerer['time'] = time();
				$answerer['jinger'] = $_POST['jieer'];
				$answerer['qita'] = 1;
				$answerer['phone'] = $_POST['phone'];
				$user_data = array('fenshu' => $user_8['fenshu'] - $_POST['jieer'],
			
				);
				$result2 = pdo_update('zhou_hongbao_jiefen', $user_data, array('id' => $user_8['id']));
				pdo_insert('zhou_hongbao_tixian', $answerer);
				echo '恭喜你提现成功，红包已发送，请注意查收';
			} else {
				$answerer = array();
				$answerer['uniacid'] = $_W['uniacid'];
				$answerer['openid'] = $_W['openid'];
				$answerer['nickname'] = $userinfo['nickname'];
				$answerer['time'] = time();
				$answerer['jinger'] = $_POST['jieer'];
				$answerer['qita'] = 0;
				$answerer['yuanying'] = $res['return_msg'];
				$answerer['phone'] = $_POST['phone'];
				pdo_insert('zhou_hongbao_tixian', $answerer);
				var_dump($res['return_msg']);
			}
		}
	}
	public function sendhongbaoto($arr) {
		global $_W, $_GPC;
		$data['mch_id'] = $this->settings[0]['mchid'];
		$data['mch_billno'] = $data['mch_id'] . date("Ymd", time()) . date("His", time()) . rand(1111, 9999);
		$data['nonce_str'] = $this->createNoncestr();
		$data['re_openid'] = $arr['openid'];
		$data['wxappid'] = $this->settings[0]['appid'];
		$data['nick_name'] = $arr['hbname'];
		$data['send_name'] = $_W['uniaccount']['name'];
		$data['total_amount'] = $arr['fee'];
		$data['total_num'] = 1;
		$data['client_ip'] = $_SERVER['REMOTE_ADDR'];
		$data['act_name'] = '投票活动';
		$data['remark'] = '感谢您对我们的支持。';
		$data['wishing'] = '感谢您对我们的支持。';
		if (!$data['re_openid']) {
			$rearr['return_msg'] = '缺少用户openid';
			return $rearr;
		}
		$data['sign'] = $this->getSign($data);
		$xml = $this->arrayToXml($data);
		$url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack";
		$re = $this->wxHttpsRequestPem($xml, $url);
		$rearr = $this->xmlToArray($re);
		return $rearr;
	}
	function trimString($value) {
		$ret = null;
		if (null != $value) {
			$ret = $value;
			if (strlen($ret) == 0) {
				$ret = null;
			}
		}
		return $ret;
	}
	public function createNoncestr($length = 32) {
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		$str = "";
		for ($i = 0;$i < $length;$i++) {
			$str.= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
		}
		return $str;
	}
	function formatBizQueryParaMap($paraMap, $urlencode) {
		$buff = "";
		ksort($paraMap);
		foreach ($paraMap as $k => $v) {
			if ($urlencode) {
				$v = urlencode($v);
			}
			$buff.= $k . "=" . $v . "&";
		}
		$reqPar;
		if (strlen($buff) > 0) {
			$reqPar = substr($buff, 0, strlen($buff) - 1);
		}
		return $reqPar;
	}
	public function getSign($Obj) {
		foreach ($Obj as $k => $v) {
			$Parameters[$k] = $v;
		}
		ksort($Parameters);
		$String = $this->formatBizQueryParaMap($Parameters, false);
		$krts = $this->settings[0]['apikey'];
		$String = $String . "&key=" . $krts;
		$String = md5($String);
		$result_ = strtoupper($String);
		return $result_;
	}
	public function arrayToXml($arr) {
		$xml = "<xml>";
		foreach ($arr as $key => $val) {
			if (is_numeric($val)) {
				$xml.= "<" . $key . ">" . $val . "</" . $key . ">";
			} else $xml.= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
		}
		$xml.= "</xml>";
		return $xml;
	}
	public function xmlToArray($xml) {
		$array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		return $array_data;
	}
	public function wxHttpsRequestPem($vars, $url, $second = 30, $aHeader = array()) {
		global $_W;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
		curl_setopt($ch, CURLOPT_SSLCERT, MB_ROOT . '/cert/' . $_W['uniacid'] . '/apiclient_cert.pem');
		curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
		curl_setopt($ch, CURLOPT_SSLKEY, MB_ROOT . '/cert/' . $_W['uniacid'] . '/apiclient_key.pem');
		curl_setopt($ch, CURLOPT_CAINFO, 'PEM');
		curl_setopt($ch, CURLOPT_CAINFO, MB_ROOT . '/cert/' . $_W['uniacid'] . '/rootca.pem');
		if (count($aHeader) >= 1) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
		}
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
		$data = curl_exec($ch);
		if ($data) {
			curl_close($ch);
			return $data;
		} else {
			$error = curl_errno($ch);
			echo "call faild, errorCode:$error\n";
			curl_close($ch);
			return false;
		}
	}
	public function get_rand($proArr) {
		$result = '';
		$proSum = array_sum($proArr);
		foreach ($proArr as $key => $proCur) {
			$randNum = mt_rand(1, $proSum);
			if ($randNum <= $proCur) {
				$result = $key;
				break;
			} else {
				$proSum-= $proCur;
			}
		}
		unset($proArr);
		return $result;
	}
	
	public function doWebTest() {
        global $_GPC, $_W;
	    load()->func('communication');
		load()->model('cloud');	
		load()->func('db');
		
		
		$cars[0]['sql']="wei_fx_jilu";
        $cars[1]['sql']="wei_vote_ip";
        $cars[2]['sql']="wei_vote_jilu";
		
		
		$cars[3]['sql']="wei_vote_liwu";
        $cars[4]['sql']="wei_vote_peizhi";
        $cars[5]['sql']="wei_vote_toupiao";
		
		$cars[6]['sql']="wei_vote_up";
        $cars[7]['sql']="wei_vote_userlog";
        $cars[8]['sql']="wei_vote_zhong";
		
		
     
		foreach($cars as $key=>$vals){
			$local = '';
			$local = db_table_schema(pdo(), $vals['sql']);
		    $cars[$key]['json'] =  $local;
			$cars[$key]['sql'] =  $vals['sql'];
		}
		$cars =  json_encode($cars);
		//print_r($cars);
		/*
		$sql = 'select owner from ' . tablename('wei_vote_peizhi') . ' where uniacid = :uniacid and   owner<>\'\' GROUP by owner';
		$param = array(':uniacid' => $_W['uniacid']);
		$owner_list = pdo_fetchall($sql, $param);
		print_r($owner_list);*/
		
		 
	
	}
	
	
	
	
	
	
	
	
}
