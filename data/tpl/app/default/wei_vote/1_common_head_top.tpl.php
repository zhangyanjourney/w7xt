<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html >
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php  echo $this->settings[0]['name'];?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	<?php  echo register_jssdk(false);?>
	 <script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/jquery-1.8.3.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>font/iconfont.css">
