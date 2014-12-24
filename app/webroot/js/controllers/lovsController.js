/**
 * Created by hugoruiz on 12/12/14.
 */
angular.module('prosales-app')
    .controller('adminLovsIndexController', function ($scope, $http, DTOptionsBuilder, DTColumnDefBuilder)
    {

        $scope.lovs = [];

        $scope.loadIndex = function()
        {
            //////Load Lovs
            $http.get("/Lovs/adminjsIndex/").success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.lovs = data["xData"];
                    } else
                    {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                alert('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };
        $scope.loadIndex();


        //////Define dataTable Options
        $scope.dtOptions = DTOptionsBuilder.newOptions()
            //.withOption('bFilter', false)
            .withOption("sDom", "<'row'<'col-sm-6 col-xs-5'l><'col-sm-6 col-xs-7'f>r>t<'row'<'col-sm-5 hidden-xs'i><'col-sm-7 col-xs-12 clearfix'p>>")
            .withOption("sPaginationType", "bootstrap")
            .withOption('oLanguage', {
                "sLengthMenu": "_MENU_",
                "sSearch": "<div class=\"input-group\">_INPUT_<span class=\"input-group-addon\"><i class=\"fa fa-search\"></i></span></div>",
                "sInfo": "<strong>_START_</strong>-<strong>_END_</strong> of <strong>_TOTAL_</strong>",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            })
            .withOption("columnDefs", [ {  } ])
            .withOption("pageLength", 8)
            .withOption("lengthMenu", [[4, 8, 10, 20, 40, 60, 100, -1], [4, 8, 10, 20, 40, 60, 100, 'All']])

        setTimeout(function(){

            /// Add placeholder attribute to the search input
            $('.dataTables_filter input').attr('placeholder', 'Search');
            /* Add Bootstrap classes to select and input elements added by datatables above the table */
            $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
            $('.dataTables_length select').addClass('form-control');
        },800);

    })
    .controller('LovsIndexController', function ($scope, $http, DTOptionsBuilder, DTColumnDefBuilder)
    {

        $scope.lovs = [];

        $scope.loadIndex = function()
        {
            //////Load Lovs
            $http.get("/Lovs/jsIndex/").success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.lovs = data["xData"];
                    } else
                    {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                alert('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };
        $scope.loadIndex();


        //////Define dataTable Options
        $scope.dtOptions = DTOptionsBuilder.newOptions()
            //.withOption('bFilter', false)
            .withOption("sDom", "<'row'<'col-sm-6 col-xs-5'l><'col-sm-6 col-xs-7'f>r>t<'row'<'col-sm-5 hidden-xs'i><'col-sm-7 col-xs-12 clearfix'p>>")
            .withOption("sPaginationType", "bootstrap")
            .withOption('oLanguage', {
                "sLengthMenu": "_MENU_",
                "sSearch": "<div class=\"input-group\">_INPUT_<span class=\"input-group-addon\"><i class=\"fa fa-search\"></i></span></div>",
                "sInfo": "<strong>_START_</strong>-<strong>_END_</strong> of <strong>_TOTAL_</strong>",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            })
            .withOption("columnDefs", [ {  } ])
            .withOption("pageLength", 8)
            .withOption("lengthMenu", [[4, 8, 10, 20, 40, 60, 100, -1], [4, 8, 10, 20, 40, 60, 100, 'All']])

        setTimeout(function(){

            /// Add placeholder attribute to the search input
            $('.dataTables_filter input').attr('placeholder', 'Search');
            /* Add Bootstrap classes to select and input elements added by datatables above the table */
            $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
            $('.dataTables_length select').addClass('form-control');
        },800);

    });