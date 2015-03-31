<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations footer-fixed');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
    <div class="header-section">
        <?php echo $this->MenuBuilder->build('menu-header-pos');?>
    </div>
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


<div class="row">
    <div class="col-sm-4 col-lg-3">
        <div class="block full">
            <div class="block-title">
                <h2><?php echo __('Categorías'); ?></h2>
            </div>
            <ul class="nav nav-pills nav-stacked" data-toggle="tabs">
                <li class="active">
                    <a href="#tabreportOrderAnalytic"><?php echo __('REPORT_INDEX_TAB_TITLE_CAT_ORDER'); ?></a>
                </li>
                <li>
                    <a href="#reportProductAnalytic"><?php echo __('REPORT_INDEX_TAB_TITLE_CAT_PRODUCT'); ?></a>
                </li>
                <li>
                    <a href="#reportSalesManAnalytic"><?php echo __('Análisis de vendedor'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8 col-lg-9">
        <div class="block">
            <div class="block-title">
                <h2>Detalle</h2>
            </div>
                <div class="block full">
                    <a class="btn btn-alt btn-sm btn-primary" id="reportrange">
                        <i class="fa fa-calendar fa-lg"></i>
                        <span><?php echo $startDt; ?> - <?php echo $endDt; ?></span> <b class="caret"></b>
                    </a>
                </div>
            <div class="table-responsive">
                <div class="tab-content">
                    <div class="tab-pane active" id="tabreportOrderAnalytic">
                        <div id="reportOrderAnalytic"></div>
                        <div id="totalOrderByDate"></div>
                    </div>
                    <div class="tab-pane" id="reportProductAnalytic">
                        <div id="totalOrderByProduct"></div>
                    </div>
                    <div class="tab-pane" id="reportSalesManAnalytic">
                        <div id="totalOrderBySalesMan"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function ()
{

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
            //handleTotalOrderBySalesMan(xData["OrderByProducts"]);
        },
        error: function (data)
        {//
           alert('Sorry vato, ocurrio un error');
           console.log(data);
       }
   });
}

function handleBarOrderByDate()
{
	
}

function handleTotalOrderBySalesMan( xData )
{

    $('#totalOrderBySalesMan').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
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
