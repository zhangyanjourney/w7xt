<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title><?php  echo $this->settings[0]['name'];?></title>
                <meta name="apple-mobile-web-app-capable" content="yes">
                <meta name="apple-mobile-web-app-status-bar-style" content="black">
                <meta name="format-detection" content="telephone=no">
                <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=no" />-->
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport">
                    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/style.css">
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/style_PageDefault.css">
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/style_PageMaster.css">
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/swipe.css">
         
                <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>new5/zqa.css">
				<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/jquery-1.8.3.min.js"></script>
                <style>.share {display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.7);z-index: 9696969;} #faq ul{margin: 0;padding: 0;display: inline;} #faq li{line-height: 30px;padding: 0 0 5px 22px;border-bottom:1px #ccc solid;height:30px;}</style></head>
        
        <body id="body">
                <div id="div">
                        <img src="<?php  echo tomedia($this->settings[0]['touimg'])?>" width="100%">
                        <!--内容 -->
                        <div style="text-align:center;background-color:#fff;padding:10px 10% 0px;">
                                <style>.pbang{float:left;padding:6px 24px;width:33.3%;background-color:#ccc;} .xuanz{background-color:#ffcc66;}</style>
                                <div style="clear:both"></div>
                        </div>
                        <div id="contentla">
                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" id="ddtab" style="border-bottom:0px;">
                                        <tbody>
										
                                                <tr style="background-color:#fc6; line-height:38px;">
                                                        <td>排名</td>
                                                        <td>选手</td>
                                                        <td>票数</td></tr>
												<?php  if(is_array($liwujilu)) { foreach($liwujilu as $ii => $it) { ?>
                                                <tr>
                                                        <td><?php  echo $ii+1?></td>
                                                        <td><?php  echo $it['name'];?></td>
                                                        <td><?php  echo $it['piao']?></td></tr>
												<?php  } } ?>		
                                              
                                        </tbody>
                                </table>
                        </div>
                        <br>
                        <br>
                        <style>body,h1,p,form,ul,li,dl,dd,input,h2,h3,th,td,table,tr,td,tbody,thead{margin:0;padding:0}</style>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footnew5', TEMPLATE_INCLUDEPATH)) : (include template('common_footnew5', TEMPLATE_INCLUDEPATH));?>