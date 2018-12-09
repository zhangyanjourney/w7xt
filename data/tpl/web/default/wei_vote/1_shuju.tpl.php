<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<?php  if(IMS_VERSION<1) { ?>

<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">

<?php  } ?>

<style>

.account-stat .num {

    font-size: 30px;

    margin: 20px 0;

    color: #333;

}

</style>


<div class="panel we7-panel account-stat">

		<div class="panel-heading">今日关键指标</div>

		<div class="panel-body we7-padding-vertical">

			<div class="col-sm-3 text-center">

				<div class="title">今日参与</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.new"><?php  echo $item['dailyjointotal'];?></div>

			</div>

			<div class="col-sm-3 text-center">

				<div class="title">今日投票人次</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.cancel"><?php  echo $item['dailyvotetotal'];?></div>

			</div>

			<div class="col-sm-3 text-center">

				<div class="title">今日送礼人次</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.jing_num"><?php  echo $item['dailygiftnum'];?></div>

			</div>

			<div class="col-sm-3 text-center">

				<div class="title">今日收入</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.cumulate">￥ <?php  echo $item['dailygiftcount'];?></div>

			</div>

		</div>

	</div>

	



<div class="panel we7-panel account-stat">

		<div class="panel-heading">累计指标</div>

		<div class="panel-body we7-padding-vertical">

			<div class="col-sm-3 text-center">

				<div class="title">访问量</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.new"><?php  echo $item['pvtotal'];?></div>

			</div>

			<div class="col-sm-3 text-center">

				<div class="title">投票人次</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.cancel"><?php  echo $item['votetotal'];?></div>

			</div>

			<div class="col-sm-3 text-center">

				<div class="title">选手人次</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.jing_num"><?php  echo $item['jointotal'];?></div>

			</div>

			<div class="col-sm-3 text-center">

				<div class="title">礼物总数</div>

				<div class="num ng-binding" ng-init="0" ng-bind="fans_kpi.today.cumulate">￥ <?php  echo $item['giftcount'];?></div>

			</div>

		</div>

	</div>
	
	
	
	
	
	 <div id="container" style="height: 500px"></div>
    
	
	
	
	

       <script type="text/javascript">
				
				
				
				
					require.config({
						baseUrl: "../",
						paths: {
							"echarts": "addons/wei_vote/template/style/js/echarts"
						},
					});
 
				require(["echarts"], function(echarts) {
				
				
				var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
app.title = '坐标轴刻度与标签对齐';

option = {
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
           data: [<?php  echo $tianshu_zfc;?>],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'当天收入',
            type:'bar',
            barWidth: '60%',
            data:[<?php  echo $mtje_zfc;?>]
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
				
				
				
			 
				});


				
       </script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>