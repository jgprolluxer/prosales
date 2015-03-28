<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
    <?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<?php 
echo $this->Html->script("/bower_components/moment/min/moment.min.js");
echo $this->Html->script("/bower_components/bootstrap-daterangepicker/daterangepicker.js");

echo $this->Html->css('/bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css');

echo $this->Html->script("/js/plugins/highcharts/highcharts.js");
echo $this->Html->script("/js/plugins/highcharts/modules/exporting.js");
?>
<input type="hidden" id="rptStartDT" value="<?php echo $startDt; ?>">
<input type="hidden" id="rptEndDT" value="<?php echo $endDt; ?>">

<div class="block full">
	<div class="block-title">
		<!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
		<div class="block-options pull-right">
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
				<i class="fa fa-arrows-v"></i>
			</a>
			<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen">
				<i class="fa fa-desktop"></i>
			</a>
			<a class="btn btn-alt btn-sm btn-primary" id="reportrange">
				<i class="fa fa-calendar fa-lg"></i>
				<span><?php echo $startDt; ?> - <?php echo $endDt; ?></span> <b class="caret"></b>
			</a>
		</div>
	</div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked" data-toggle="tabs">
                <li class="active"><a href="#tabreportOrderAnalytic"><?php echo __('REPORT_INDEX_TAB_TITLE_CAT_ORDER'); ?></a></li>
                <li><a href="#reportProductAnalytic"><?php echo __('REPORT_INDEX_TAB_TITLE_CAT_PRODUCT'); ?></a></li>
            </ul>
        </div>
        <div class="col-md-9">
           <div class="tab-content">
              <div class="tab-pane active" id="tabreportOrderAnalytic">
                <div id="reportOrderAnalytic">
                </div>
                <div id="totalOrderByDate">
                </div>
            </div>
              <div class="tab-pane" id="reportProductAnalytic">
                <div id="totalOrderByProduct">
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations');
    $('header').hide();

    feedReports($('#rptStartDT').val(), $('#rptEndDT').val());

    $('#reportrange').daterangepicker(
    {
    	format: 'YYYY-MM-DD',
    	ranges: {
    		'Hoy': [moment(), moment()],
    		'Ayer': [moment().subtract('days', 1), moment().subtract('days', 1)],
    		'Ultimos 7 dias': [moment().subtract('days', 6), moment()],
    		'Ultimos 30 dias': [moment().subtract('days', 29), moment()],
    		'Este Mes': [moment().startOf('month'), moment().endOf('month')],
    		'Pasado Mes': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
    	},
    	startDate: moment().subtract('days', 29),
    	endDate: moment()
    },
    function(start, end)
    {
    	$('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    });
    $('#reportrange').on('apply.daterangepicker', function(ev, picker)
    {
    	window.location.href = qualifyURL("/Reports/index/?startDt="
    		+ picker.startDate.format('YYYY-MM-DD') + " 00:00:00&endDt="
    		+ picker.endDate.format('YYYY-MM-DD') + " 23:59:59");
    });

});

function feedReports(startDate, endDate)
{
	var input =  "startDt=" + startDate + "&endDt=" + endDate +"";
	var url = "/Reports/getReports/?"+input;
	$.ajax({
		url: url,
		dataType: "json",
		success: function (data)
		{
			var xData = data["xData"];
			handlePieOrderByStatusChart(xData["OrderByStatus"]);
            handleTotalOrderByDate(xData["TotalOrderByDate"])
            handleOrdersByProducts(xData["OrderByProducts"]);
		},
		error: function (data)
		{
			alert('Sorry vato, ocurrio un error');
			console.log(data);
		}
	});
}

function handleBarOrderByDate()
{
	
}

function handleTotalOrderByDate( xData )
{

    $('#totalOrderByDate').highcharts({
        chart: {
            type: 'column'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Ventas por día'
        },
        subtitle: {
            text: 'subtitle ventas:'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Ventas $'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Ventas: $ <b>{point.y:.1f}</b>'
        },
        series: [{
            name: 'Population',
            data: xData,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
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
    		text: '<?php echo __("REPORTS_CAT_ORDER_REPORT_BY_STATUS_TITLE"); ?>'
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

function handleOrdersByProducts( xData )
{
    $('#totalOrderByProduct').highcharts({
        chart: {
            type: 'column'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Ventas por producto'
        },
        subtitle: {
            text: 'subtitle ventas:'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Ventas $'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Ventas: $ <b>{point.y:.1f}</b>'
        },
        series: [{
            name: 'Population',
            data: xData,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

};

</script>
