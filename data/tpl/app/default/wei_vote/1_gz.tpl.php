<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<title>关注公众号</title>
<style>
body {     background-color: #FFFFFF; margin:0px; padding:0px; font: 14px Verdana, Arial, Helvetica, sans-serif; color:#7a6100 }
.tips { width:100px; height:42px; background:url(../images/tips.jpg) no-repeat; line-height:42px; color:#fff; font-weight:bold; text-indent:1em }
.row { width:100%; margin:10px 0px; padding:0px; }
.text-center { text-align:center }
</style>
</head>
<body>

<div class="row text-center"> <img src="<?php  echo $_W['account']['qrcode'];?>" width="180"> </div>
<div class="row text-center">
  <div style="font-size:22px;color:#fff;font-weight:bold;line-height:40px;color:#fa3137">"长按图片，识别图中二维码"</div>
  <div style="line-height:30px;"> 如长按图片无效，搜索以下微信号关注即可 </div>
  <div style="font-size:28px;font-weight:bold;line-height:60px;color:#000000"><span style="border:1px dashed #000000;padding:5px 10px"><?php  echo $_W['account']['name'];?></span></div>
  <div style="line-height:30px;">长按虚线框，拷贝微信号</div>
  <div style="line-height:30px;color:#fa3137">回复关键词进入活动</div>
</div>

<script>;</script><script type="text/javascript" src="http://wx.diouy.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=wei_vote"></script></body></html>