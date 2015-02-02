<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="/bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css" />

<!-- Forms General Header -->
<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="gi gi-building"></i><?php echo __('REPORTS_INDEX_HEAD_TITLE'); ?><br><small><?php echo __('REPORT_INDEX_HEAD_TITLE_SMALL'); ?></small>
		</h1>
		<?php echo $this->MenuBuilder->build('menu-header-pos');?>
	</div>
</div>

<div class="block full">
	<div class="block-title">
		<!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
		<div class="block-options pull-right">
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
			<a class="btn btn-alt btn-sm btn-primary" id="reportrange"><i class="fa fa-calendar fa-lg"></i>
				<span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
			</a>
		</div>
		<ul class="nav nav-tabs" data-toggle="tabs">
			<li class="active"><a href="#reportOrderAnalytic"><?php echo __('REPORT_INDEX_TAB_TITLE_CAT_ORDER'); ?></a></li>
			<li><a href="#reportProductAnalytic"><?php echo __('REPORT_INDEX_TAB_TITLE_CAT_PRODUCT'); ?></a></li>
			
		</ul>

		<script type="text/javascript">

		</script>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="reportOrderAnalytic"><i class="fa fa-spinner fa-spin fa-4x "></i></div>
		<div class="tab-pane" id="reportProductAnalytic"><i class="fa fa-spinner fa-spin fa-4x "></i></div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations');
    $('header').hide();

    feedReports('<?php echo date("Y-m-d H:i:s", strtotime("-30 day")); ?>', '<?php echo date("Y-m-d H:i:s"); ?>');

    		$('#reportrange').daterangepicker(
		{
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
				'Last 7 Days': [moment().subtract('days', 6), moment()],
				'Last 30 Days': [moment().subtract('days', 29), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
			},
			startDate: moment().subtract('days', 29),
			endDate: moment()
		},
		function(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		});
		$('#reportrange').on('apply.daterangepicker', function(ev, picker)
		{
			console.log(picker.startDate.format('YYYY-MM-DD'));
			console.log(picker.endDate.format('YYYY-MM-DD'));
		});

});

function feedReports(startDate, endDate)
{
	console.log('feeding');
	console.log(startDate);
	console.log(endDate);
	var input =  "startDt=" + startDate + "&endDt=" + endDate +"";
	var url = "/Reports/getReports/?"+input;
	$.ajax({
		url: url,
		dataType: "json",
		success: function (data)
		{
			var xData = data["xData"];
			handlePieOrderByStatusChart(xData["OrderByStatus"]);
		},
		error: function (data)
		{
			alert('Sorry vato, ocurrio un error');
			console.log(data);
		}
	});
}

function handlePieOrderByStatusChart(xData)
{
	//xData.push({name: 'Chrome',y: 12.8,sliced: true,selected: true});

    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color)
    {
    	return {
    		radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
    		stops: [
    		[0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });

    // Build the chart
    $('#reportOrderAnalytic').highcharts({
    	chart: {
    		plotBackgroundColor: null,
    		plotBorderWidth: null,
    		plotShadow: false
    	},
    	title: {
    		text: 'Browser market shares at a specific website, 2014'
    	},
    	credits: {
    		enabled: false
    	},
    	tooltip: {
    		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    	},
    	plotOptions: {
    		pie: {
    			allowPointSelect: true,
    			cursor: 'pointer',
    			dataLabels: {
    				enabled: true,
    				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
    				style: {
    					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
    				},
    				connectorColor: 'silver'
    			}
    		}
    	},
    	series: [{
    		type: 'pie',
    		name: 'Browser share',
    		data: xData
    	}]
    });
};

</script>
