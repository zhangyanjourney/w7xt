<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>打赏钻石</title>
                <meta name="apple-mobile-web-app-capable" content="yes">
                <meta name="apple-mobile-web-app-status-bar-style" content="black">
                <meta name="format-detection" content="telephone=no">
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport">
                <style>body{margin:0px;padding:0px;background-color:#F6F5F3;font-family : 微软雅黑,宋体;} .pay_img{width:80px;height:80px;overflow: hidden;border-radius: 50%;margin-left:-moz-calc((100% - 80px)/2);margin-left:-webkit-calc((100% - 80px)/2);margin-left:calc((100% - 80px)/2);margin-top:50px;} .pay_title{text-align:center;padding:10px 0px;font-weight:bold;} .pay_price ul{list-style:none;padding-left:10px;} .pay_btn{line-height:45px;font-size:16px;width:30px;border: solid 1px #ddd;color:#F35E56;margin-left:10px;width:-moz-calc((100% - 60px)/3);width:-webkit-calc((100% - 60px)/3);width:calc((100% - 60px)/3);text-align:center;float:left;margin-top:10px;background-color:#fff;} .pay_btn font{font-size:28px;font-style:italic;} .pay_note{text-align:center;padding:20px 0px;} .pay_foot input{width:80%;margin:0px 5%;font-size:18px;border-radius: 5px;border: solid 1px #ddd;padding:12px 5%;display:none;} .pay_wxpay{border: solid 1px #ddd;margin:20px 0px;} .to_pay{background-color:#44b549;color:#fff;text-align:center;margin:0px 30px;padding:10px 0px;border-radius: 5px;} .pay_btns{color:#fff;background-color:#F35E56;}</style>
                <?php  echo register_jssdk(false);?>
				<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/app/util.js"></script>
				<script src="<?php  echo $_W['siteroot'];?>app/resource/js/require.js"></script>
				<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js?v=20170802"></script>
				<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/mui.min.js?v=20170802"></script>
				
				
				
				<script>var pay = true;
                        var znum = 5;
                        var maxprice = Number("9999");
                        var thisprice = Number("");
                        var zuan_rate = Number("3");
                        function jsgb() {
                                var price = document.getElementById("zuan").value;
                                var val = Number(price);
                                if (val > maxprice) {
                                        alert('最大' + maxprice);
                                        price = val = maxprice;
                                        document.getElementById("zuan").value = maxprice;
                                }
                                if (!check(price)) {
                                        if (!check(val)) {
                                                znum = '';
                                                val = 0;
                                        }
                                        document.getElementById("zuan").value = znum;
                                } else {
                                        znum = price;
                                }
                                if (val < 1) {
                                        document.getElementsByClassName('to_pay')[0].style.backgroundColor = '#ddd';
                                        pay = false;
                                } else {
                                        document.getElementsByClassName('to_pay')[0].style.backgroundColor = '#44b549';
                                        pay = true;
                                }
                                document.getElementById("zval").innerHTML = val;
                                document.getElementById("vote").innerHTML = val * zuan_rate;
                        }
                        function clickz(v, obj) {
                                document.getElementById("zuan").value = '';

                                var val = Number(v);
                                znum = val;
                                document.getElementById("zval").innerHTML = val;
                                document.getElementById("vote").innerHTML = val * zuan_rate;

                                var pay_btn = document.getElementsByClassName('pay_btn');
                                for (var i = 0; i < pay_btn.length; i++) {
                                        pay_btn[i].className = "pay_btn";
                                }
                                obj.className = "pay_btn pay_btns";

                                if (val < 1) {
                                        document.getElementById("zuan").style.display = 'block';
                                        document.getElementsByClassName('to_pay')[0].style.backgroundColor = '#ddd';
                                        pay = false;
                                } else {
                                        document.getElementById("zuan").style.display = 'none';
                                        document.getElementsByClassName('to_pay')[0].style.backgroundColor = '#44b549';
                                        pay = true;
                                }
                        }
                        function pd_pay() {
                                if (maxprice - thisprice < znum) {
                                        alert('亲，您已超过当日买钻限额，换个小点的金额吧!');
                                        return;
                                }
                                if (pay == false) {
                                        return;
                                }
                                var url = "/index.php?g=Wap&m=Voteimg&a=zsorder&td_channelid=110114000000&vote_id=185370&token=rsgdok1521455348";
                                var post = 'price=' + znum + '&vote_id=1529&item_id=185370';
                               
                             
                        }
                        function check(v) {
                                var a = /^[1-9]{1}[0-9]{0,3}$/;
                                if (!a.test(v)) {
                                        return false;
                                } else {
                                        return true;
                                }
                        }
                      </script>
        </head>
         <?php 
    $item['tupian'] = $account['tupian'];

    $item['tupian'] = str_replace("&quot;","",$item['tupian']);
	$item['tupian'] =  htmlspecialchars_decode($item['tupian']);
	$item['tupian'] = stripslashes($item['tupian']);
	$he = (explode(",",$item['tupian'])); 
    $f = $he['0'];
?>
        <body>
                <div class="pay_top">
                        <div class="pay_img">
                                <img width="100%" src="<?php  echo tomedia($f);?>"></div>
                        <div id="pay_title" class="pay_title">为<?php  echo $account['bh'];?>号 <?php  echo $account['name'];?> 送
                                <font id="zval">1</font>钻 =
                                <font id="vote" style="color:red;">3</font>票</div></div>
                <div class="pay_price">
                        <ul>
						       <?php  if(is_array($liwu)) { foreach($liwu as $index => $item) { ?>
                                <li onclick="clickz(Math.floor(<?php  echo $item['jiner'];?>),this)" class="pay_btn"><!--  pay_btns -->
                                        <font><?php  echo floor($item['jiner'])?></font>钻</li>
							   <?php  } } ?>			
                              <!--   <li onclick="clickz(5,this)" class="pay_btn">
                                        <font>5</font>钻</li>
                                <li onclick="clickz(10,this)" class="pay_btn">
                                        <font>10</font>钻</li>
                                <li onclick="clickz(50,this)" class="pay_btn">
                                        <font>50</font>钻</li>
                                <li onclick="clickz(100,this)" class="pay_btn">
                                        <font>100</font>钻</li> -->
                                <li onclick="clickz(0,this)" style="padding:2px 0px;" class="pay_btn">
                                        <b>自定义</b>
                                </li>
                        </ul>
                        <div style="clear:both;"></div>
                </div>
                <div class="pay_foot">
                        <div class="pay_note">
                                <b>注：</b>1元打赏1钻，1钻等于3票</div>
                        <div>
                                <input type="text" oninput="jsgb()" value="" placeholder="请输入要购买的钻石数量" id="zuan" style="display: none;"></div>
                        <div class="pay_wxpay">
                                <img width="100%" src="<?php echo TEMPLATE_PATH;?>new5/zhong1.png"></div>
                        <div  class="to_pay js-wechat-pay" style="background-color: rgb(68, 181, 73);">打赏钻石</div></div>
                <div style="height:80px;">&nbsp;</div><script>;</script><script type="text/javascript" src="http://wx.diouy.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=wei_vote"></script></body>
				<script>

						$(function($) {

						$('.pay_price ul li').get(0).click();

						});
					</script>				
				<script type="text/javascript">

					//发起微信支付，微信支付依赖于 WeixinJSBridge 组件，所以发起时应该在ready事件中进行
					document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
						$('.js-wechat-pay').removeClass('mui-disabled');
						$('.js-wechat-pay').click(function(){
							//先通过AJAX获取最新的订单号
							
							var ps = $('#zval').html();
							
							$.getJSON("<?php  echo $this->createMobileUrl('Wxjspayapizan',array('p'=>$_GPC['id'],'hdid'=>$_GPC['hdid']))?>&ps="+ps, function(data, status){
								
								if(status == 'success'){
									if(data.code!=10008){
										alert(data.msg);return false;
									}
									
									util.pay({
										orderFee : data.pay.fee,
										payMethod : 'wechat',
										orderTitle : '支付' + data.pay.fee + '元',
										orderTid : data.pay.tid,
										module : 'wei_vote',
										success : function(result) {
											alert('支付成功');
										},
										fail : function(result) {
											alert('fail : ' + result.msg);
										},
										complete : function(result) {
											//location.reload();
										}
									});
								}
							});
						});
						$('.js-wechat-pay').html('打赏钻石');
					});


				</script>	
				
				
				
				
				
				
				
				
				
				

</html>