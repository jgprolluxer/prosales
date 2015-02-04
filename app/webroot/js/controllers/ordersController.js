angular.module('prosales-app')
    .controller('OrderAddController', function ($scope, $http, DTOptionsBuilder, DTColumnDefBuilder) {
        ////// Add Loading
        var pageWrapper = $('#page-wrapper');
        if (pageWrapper.hasClass('page-loading'))
        {//pageWrapper.removeClass('page-loading');
        }else{
            pageWrapper.addClass('page-loading');
        }
        $scope.activeStyles = [
            'themed-background-default',
            'themed-background-night',
            'themed-background-amethyst',
            'themed-background-modern',
            'themed-background-autumn',
            'themed-background-flatie',
            'themed-background-spring',
            'themed-background-fancy',
            'themed-background-fire'
        ];

        $scope.activeButtonStyles = [
            'btn-default',
            'btn-primary',
            'btn-info',
            'btn-success',
            'btn-warning',
            'btn-danger'
        ];

        $scope.getBtnStyleClass = function(idx)
        {
            var elArr = $scope.activeButtonStyles;
            var item = elArr[Math.floor(Math.random() * elArr.length)];
            return item;
        };

        ////// Initialize pricelist
        $scope.pricelist = {};

        //////Initialize New Order Object
        $scope.newOrder = {
            Order: {
                updated_by: 0,
                created_by: 0,
                updated: 0,
                created: 0,
                type: 0,
                status: 'cancelled',
                folio: 0,
                price: 0,
                total_amt: 0,
                subtotal_amt: 0,
                tax: 0,
                disc: 0,
                disc_desc: 0,
                account_id: 0,
                description: 0,
                saleschannel: 0
            }
        };

        ////// Initialize orderproducts
        $scope.orderProducts = [];

        //////Initialize New Order Object
        $scope.newOrderPayment = {
            OrderPayment: {//id:0,
                created: 0,
                updated: 0,
                created_by: 0,
                updated_by: 0,
                account_id: 0,
                payment_id: 0,
                type: 0,
                status: 'active',
                docnum: 0,
                docseq: 0,
                payment_date: 0,
                amount: 0,
                total_amt: 0,
                order_id: 0,
                bank_name: 0,
                bank_ref: 0,
                description: 0
            }
        };

        $scope.refreshOrder = function ()
        {
            var orderID = $scope.newOrder.Order.id;
            //////Load Refresh
            $http.get("/Orders/jsfindOrder/?format=POSbyID&orderID=" + orderID).success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.newOrder = data["xData"]["0"];
                    } else
                    {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };

        //////Load typeahead products to product searcher control
        $scope.loadProductNames = function ()
        {
            var pricelistID = $scope.pricelist.Pricelist.id;
            $http.get("/PricelistProducts/jsfindPricelistProduct/?format=POStypeahead&pricelistID="+pricelistID+'').success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        var products;
                        var map;
                        var selectedProduct;
                        $('#productSearcher').typeahead({
                            source: function (query, process) {
                                products = [];
                                map = {};
                                $.each(data["xData"], function (i, product) {
                                    map[product.value] = product;
                                    products.push(product.value);
                                });
                                process(products);
                            }
                            ,
                            updater: function (item) {
                                selectedProduct = map[item].id;

                                var pageWrapper = $('#page-wrapper');
                                if (pageWrapper.hasClass('page-loading'))
                                {//pageWrapper.removeClass('page-loading');
                                }else{
                                    pageWrapper.addClass('page-loading');
                                }

                                $scope.processSelectedProduct(selectedProduct);
                                return item;
                            },
                            matcher: function (item) {
                                if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1) {
                                    return true;
                                }
                            },
                            sorter: function (items) {
                                return items.sort();
                            },
                            highlighter: function (item) {
                                var regex = new RegExp('(' + this.query + ')', 'gi');
                                return item.replace(regex, "<strong>$1</strong>");
                            }
                        });
                    } else
                    {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };

        $scope.loadFamilies = function ()
        {
            $http.get("/Families/jsfindFamily/?format=all").success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.families = data["xData"];
                        $scope.loadProductsbyFam(data["xData"][0].Family.id);
                    } else
                    {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };
        $scope.loadFamilies();

        $scope.loadProductsbyFam = function (familyID)
        {
            $http.get("/Products/jsfindProduct/?format=allbyFamily&familyID=" + familyID).success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.products = data["xData"];
                    } else {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };

        //////Add new product to order
        $scope.processSelectedProduct = function (productID)
        {
            var pageWrapper = $('#page-wrapper');
            if (pageWrapper.hasClass('page-loading'))
            {//pageWrapper.removeClass('page-loading');
            }else{
                pageWrapper.addClass('page-loading');
            }
            var orderProduct = {
                OrderProduct: {
                    product_id:     productID,
                    order_id:       $scope.newOrder.Order.id,
                    pricelist_id:   $scope.pricelist.Pricelist.id
                }
            };
            $http.post("/OrderProducts/addFromPOSByJs", orderProduct).success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        if (pageWrapper.hasClass('page-loading'))
                        {
                            pageWrapper.removeClass('page-loading');
                        }
                        ////// Reload Data
                        $scope.refreshData();
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i> <p>+1 ' + $('#productSearcher').val() + ' Agregado! </p>', {
                            type: 'warning',
                            delay: 1000,
                            allow_dismiss: true,
                            from: "top",
                            align: "center"
                        });
                        ////// Clean product searcher after add
                        $('#productSearcher').val('');
                    } else {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i> <p>No se agrego el producto por las siguientes razones' + data["message"]+ ' </p>', {
                            type: 'warning',
                            delay: 10000,
                            allow_dismiss: true,
                            from: "top",
                            align: "center"
                        });
                    }
                }

            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };

        $scope.loadOrderProducts = function ()
        {
            var OrderID = $scope.newOrder.Order.id;
            $http.get("/OrderProducts/jsfindOrderProduct/?format=allForPOS&orderID=" + OrderID).success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.orderProducts = data["xData"];
                    } else {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                cosole.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };

        $scope.deleteOrderProduct = function (orderProductID)
        {

            var pageWrapper = $('#page-wrapper');
            if (pageWrapper.hasClass('page-loading'))
            {//pageWrapper.removeClass('page-loading');
            }else{
                pageWrapper.addClass('page-loading');
            }
            var orderProduct = {
                OrderProduct: {
                    id: orderProductID
                }
            };
            $http.post("/OrderProducts/jsCancelOrderProduct", orderProduct).success(function (data)
            {
                if (data)
                {
                    if (data["success"])
                    {
                        if (pageWrapper.hasClass('page-loading'))
                        {
                            pageWrapper.removeClass('page-loading');
                        }

                        ////// reload Data
                        $scope.refreshData();
                    } else
                    {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>El producto no se cancelo por las siguientes razones <br/>' + data["message"] + '</p>', {
                            type: 'warning',
                            delay: 2000,
                            allow_dismiss: true,
                            from: "top",
                            align: "center"
                        });

                        alert();
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                    type: 'danger',
                    delay: 0,
                    allow_dismiss: false,
                    from: "top",
                    align: "center"
                });
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
            });
        };

        $scope.refreshData = function ()
        {
            ////// load products
            $scope.loadProductNames();
            ////// load Order
            $scope.refreshOrder();
            ////// load products
            $scope.loadOrderProducts();
        };

        ////// Load Pricelist
        $http.get("/Workstations/getPricelist/").success(function (data)
        {
            ////// Add Loading
            var pageWrapper = $('#page-wrapper');
            if (pageWrapper.hasClass('page-loading'))
            {//pageWrapper.removeClass('page-loading');
            }else{
                pageWrapper.addClass('page-loading');
            }

            if (data)
            {
                if (data["success"])
                {
                    $scope.pricelist = data["xData"];
                    console.log('pricelist');
                    console.log($scope.pricelist);

                    //////Initialize New Order
                    $http.post("/Orders/addByPOSJS", $scope.newOrder).success(function (data)
                    {
                        if (data)
                        {
                            if (data["success"])
                            {
                                $scope.newOrder = data["xData"];
                                $scope.refreshData();
                                ////// Remove Loading
                                if (pageWrapper.hasClass('page-loading'))
                                {
                                    pageWrapper.removeClass('page-loading');
                                }
                            } else {
                                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p >La orden no se generará por los siguientes motivos' + data["message"]+'</p>', {
                                    type: 'danger',
                                    delay: 0,
                                    allow_dismiss: false,
                                    from: "top",
                                    align: "center"
                                });
                            }
                        }

                    }).error(function(data, status, headers, config)
                    {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                            type: 'danger',
                            delay: 0,
                            allow_dismiss: true,
                            from: "top",
                            align: "center"
                        });
                        // called asynchronously if an error occurs
                        // or server returns response with an error status.
                        console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
                    });
                } else {
                    ////// Remove Loading
                    if (pageWrapper.hasClass('page-loading'))
                    {
                        pageWrapper.removeClass('page-loading');
                    }
                    $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>' + data["message"] + '</p>', {
                        type: 'danger',
                        delay: 0,
                        allow_dismiss: false,
                        from: "top",
                        align: "center"
                    });
                }
            }
        }).error(function(data, status, headers, config)
        {
            $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p translate="DANGER_INTERNAL_ERROR"></p>', {
                type: 'danger',
                delay: 0,
                allow_dismiss: false,
                from: "top",
                align: "center"
            });
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            console.log('Error interno! estado: ' + status + ' Datos :: '+JSON.stringify(data));
        });

        //// Set family visibility defaults
        $scope.famIsHidden = false;
        $scope.toogleFam = function ()
        {
            ////Clean product searcher control
            $('#productSearcher').val('');
            if ($scope.famIsHidden)
            {
                $('#famContainer').slideDown(600);
                $scope.famIsHidden = false;
                $scope.familySearchLegend = 'Buscar por producto';
                $('#icon-gen').slideUp(600);
            } else {

                $('#famContainer').slideUp(600);
                $scope.famIsHidden = true;
                $scope.familySearchLegend = 'Buscar por familias';
                $('#icon-gen').slideDown(600);
            }
        };
        //// initialize families and products visibility
        $scope.toogleFam();

        $scope.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('bFilter', false)
            .withOption('bPaginate', false)
            .withOption('oLanguage', {
                "sInfo": "<strong>_START_</strong>-<strong>_END_</strong> en un total de <strong>_TOTAL_</strong>"
            })
        ;

    });
