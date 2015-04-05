
angular.module('prosales-app')
    .controller('OrderAddController', function ($scope, $http, $location, DTOptionsBuilder, DTColumnDefBuilder, $modal, $log)
    {

        /**
         * Add Loading
         */
        $scope.enableProcessLoading = function()
        {
            var pageWrapper = $('#page-wrapper');
            if (pageWrapper.hasClass('page-loading'))
            {
            }else{
                pageWrapper.addClass('page-loading');
            }
        };

        /**
         * remove Loading
         */
        $scope.disableProcessLoading = function()
        {
            var pageWrapper = $('#page-wrapper');
            if (pageWrapper.hasClass('page-loading'))
            {
                pageWrapper.removeClass('page-loading');
            }

        };
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

        $scope.account = null;
        $scope.accounts = null;

        ////// Initialize pricelist
        $scope.pricelist = {
            Pricelist : {
                id : 0
            }
        };

        //////Initialize New Order Object
        $scope.newOrder = {
            Order: {
                updated_by: "",
                created_by: "",
                updated: "",
                created: "",
                type: "",
                status: 'open',
                folio: "",
                price: 0,
                total_amt: 0,
                subtotal_amt: 0,
                tax: 0,
                disc: 0,
                disc_desc: "",
                account_id: 0,
                description: "",
                saleschannel: ""
            }
        };

        ////// Initialize orderproducts
        $scope.orderProducts = [];

        //////Initialize New Payment Object
        $scope.newPayment = {
        };

        //////Initialize New Order Payment Object
        $scope.newOrderPayment = {
        };

        $scope.pmnt_received = 0.00;
        $scope.pmnt_change = 0.00;

        $scope.allowPartialPayd = true;
        $scope.totalPayments = 0;

        $scope.calcChange = function()
        {
            try{
                parseFloat($scope.pmnt_received);

                $scope.pmnt_change = $scope.pmnt_received - $scope.newOrder.Order.total_amt;

            }catch(e)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>Ingresar solo numeros en el importe recibido...</p>', {
                    type: 'warning',
                    delay: 4,
                    allow_dismiss: true,
                    from: "top",
                    align: "center"
                });
                $scope.pmnt_received = 0.00;
            }

        };

        $scope.cancelOrder = function()
        {
            if(confirm('Esta seguro de cancelar la orden?'))
            {
                $scope.enableProcessLoading();
                $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE&format=CancelOrder", $scope.newOrder).success(function (data)
                {
                    $scope.disableProcessLoading();
                    if (data)
                    {
                        if (data["success"])
                        {
                            alert('Orden cancelada con éxito!');
                            //$location.path(qualifyURL("/Orders/"));
                            //$scope.$apply();
                            window.location.href = qualifyURL("/Orders/");
                        } else
                        {
                            $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>'+data["message"]+'</p>', {
                                type: 'danger',
                                delay: 6000,
                                allow_dismiss: true,
                                from: "top",
                                align: "center"
                            });
                        }
                    }
                }).error(function(data, status, headers, config)
                {
                    $scope.disableProcessLoading();
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
            }
        };

        $scope.addQuickPayment = function()
        {
            if(0 == $scope.pmnt_received)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>Favor de agregar un pago mayor a cero!</p>', {
                    type: 'warning',
                    delay: 6000,
                    allow_dismiss: true,
                    from: "top",
                    align: "center"
                });
                return false;
            }
            $scope.enableProcessLoading();
            $scope.allowPartialPayd = false;
            $scope.newPayment = {
                Payment: {
                    account_id: $scope.account.Account.id,
                    type: 'cash',
                    status: 'applied',
                    folio: '',
                    amount: $scope.newOrder.Order.total_amt
                }
            };
            $http.post("/Payments/jsPayment/?CRUD_operation=CREATE", $scope.newPayment).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.disableProcessLoading();
                        $scope.newPayment = data["xData"];
                        $scope.newOrderPayment = {
                            OrderPayment: {
                                order_id: $scope.newOrder.Order.id,
                                payment_id: $scope.newPayment.Payment.id,
                                folio: '',
                                type: 'cash',
                                status: 'applied',
                                payment_date: moment().format("YYYY-MM-DD"),
                                total_amt: $scope.newPayment.Payment.amount
                            }
                        };
                        $http.post("/OrderPayments/jsOrderPayment/?CRUD_operation=CREATE", $scope.newOrderPayment).success(function (data)
                        {
                            $scope.disableProcessLoading();
                            if (data)
                            {
                                if (data["success"])
                                {
                                    $scope.newOrderPayment = data["xData"];
                                    $scope.totalPayments = $scope.newOrderPayment.OrderPayment.total_amt;
                                } else
                                {
                                    $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>'+data["message"]+'</p>', {
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
                            $scope.disableProcessLoading();
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
                    } else
                    {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>'+data["message"]+'</p>', {
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
                $scope.disableProcessLoading();
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

        $scope.loadAccounts = function()
        {
            $scope.enableProcessLoading();
            //////Load Accounts
            $http.post("/Accounts/jsfindAccount/?format=allByTeamID&teamID=" + 0, null).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.accounts = data["xData"];
                    } else
                    {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>'+data["message"]+'</p>', {
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
                $scope.disableProcessLoading();
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

////// Accounts Modal
        $scope.open = function ()
        {
            var accountmodalInstance = $modal.open({
                templateUrl: 'AccountModalContent.html',
                controller: 'AccountModalInstanceCtrl',
                size: 'lg',
                resolve: {
                    items: function () {
                        return $scope.accounts;
                    }
                }
            });
            accountmodalInstance.result.then(function (selectedItem)
            {
                $scope.account = selectedItem;
            }, function ()
            {
                //$log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.removeAccount = function()
        {
            $scope.account = null;
        };

        $scope.refreshOrder = function ()
        {
            $scope.enableProcessLoading();
            var orderID = $scope.newOrder.Order.id;
            //////Load Refresh
            $http.post("/Orders/jsOrder/?CRUD_operation=READ&format=byID&orderID=" + orderID, null).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
                        $scope.newOrder = data["xData"];
                    } else
                    {
                        alert(data["message"]);
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $scope.disableProcessLoading();
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
        $scope.selectedProduct = "";
        //////Load typeahead products to product searcher control
        $scope.loadProductNames = function( sexpr )
        {
            var _conditions = [
            { condField : "PricelistProduct.id >= " , condValue : 1 },
            { condField : "Pricelist.id = " , condValue : $scope.pricelist.Pricelist.id },
            { condField : "PricelistProduct.status" , condValue : 'active' },
            { condField : "Product.status" , condValue : 'active' },
            { condField : "Product.name LIKE" , condValue : '%'+sexpr+'%' }
            ];
            return $http.post('/PricelistProducts/jsPricelistProduct/?CRUD_operation=READ', {conditions:_conditions})
            .then(function(res)
            {
                return res.data["xData"];
            });
        };
        $scope.codeSearcher = '';
        $scope.loadProductCode = function(  )
        {
            var _conditions = [
            { condField : "PricelistProduct.id >= " , condValue : 1 },
            { condField : "Pricelist.id = " , condValue : $scope.pricelist.Pricelist.id },
            { condField : "PricelistProduct.status" , condValue : 'active' },
            { condField : "Product.status" , condValue : 'active' },
            { condField : "Product.partnumber =" , condValue : $scope.codeSearcher }
            ];
            return $http.post('/PricelistProducts/jsPricelistProduct/?CRUD_operation=READ', {conditions:_conditions})
            .then(function(res)
            {
                $scope.codeSearcher = '';
                var processed = false;
                angular.forEach(res.data["xData"], function(value, key)
                {
                    if(!processed)
                    {
                        $scope.processSelectedProduct(value);
                        processed = true;
                    }
                });
            });
        };

        $scope.loadFamilies = function ()
        {
            $scope.enableProcessLoading();
            $http.post("/Families/jsfindFamily/?format=all", null).success(function (data)
            {
                $scope.disableProcessLoading();
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
                $scope.disableProcessLoading();
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
            $scope.enableProcessLoading();
            $http.post("/Products/jsfindProduct/?format=allbyFamily&familyID=" + familyID, null).success(function (data)
            {
                $scope.disableProcessLoading();
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
                $scope.disableProcessLoading();
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
        $scope.processSelectedProduct = function (selectedProduct)
        {
            $scope.enableProcessLoading();
            var orderProduct = {
                OrderProduct: {
                    product_id:     selectedProduct.Product.id,
                    order_id:       $scope.newOrder.Order.id,
                    pricelist_id:   $scope.pricelist.Pricelist.id
                }
            };
            $http.post("/OrderProducts/addFromPOSByJs", orderProduct).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
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
                $scope.disableProcessLoading();
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
            $scope.enableProcessLoading();
            var OrderID = $scope.newOrder.Order.id;
            $http.post("/OrderProducts/jsfindOrderProduct/?format=allForPOS&orderID=" + OrderID, null).success(function (data)
            {
                $scope.disableProcessLoading();
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
                $scope.disableProcessLoading();
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
            $scope.enableProcessLoading();
            var orderProduct = {
                OrderProduct: {
                    id: orderProductID
                }
            };
            $http.post("/OrderProducts/jsCancelOrderProduct", orderProduct).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
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
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $scope.disableProcessLoading();
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
            ////// load accounts
            $scope.loadAccounts();
            ////// load Order
            $scope.refreshOrder();
            ////// load products
            $scope.loadOrderProducts();
        };

        $scope.setAccount = function()
        {
            $scope.enableProcessLoading();
            $scope.newOrder.Order.account_id = $scope.account.Account.id;
            console.log('setting account');
            console.log($scope.newOrder);
            $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE&format=SetAccount", $scope.newOrder).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
                        ////// reload Data
                        $scope.refreshData();
                    } else
                    {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>' + data["message"] + '</p>', {
                            type: 'warning',
                            delay: 0,
                            allow_dismiss: false,
                            from: "top",
                            align: "center"
                        });
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $scope.disableProcessLoading();
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

        $scope.closeOrder = function()
        {
            $scope.enableProcessLoading();
            $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE&format=CloseOrder", $scope.newOrder).success(function (data)
            {
                $scope.disableProcessLoading();
                if (data)
                {
                    if (data["success"])
                    {
                        ////// reload Data
                        $scope.refreshData();
                        $scope.setAccount();
                    } else
                    {
                        $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>' + data["message"] + '</p>', {
                            type: 'warning',
                            delay: 2000,
                            allow_dismiss: true,
                            from: "top",
                            align: "center"
                        });
                    }
                }
            }).error(function(data, status, headers, config)
            {
                $scope.disableProcessLoading();
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


        ////// Load Pricelist
        $scope.enableProcessLoading();
        $http.post("/Workstations/getPricelist/", null).success(function (data)
        {
            $scope.disableProcessLoading();
            if (data)
            {
                if (data["success"])
                {
                    $scope.pricelist = data["xData"];

                    //////Initialize New Order
                    $scope.enableProcessLoading();
                    $http.post("/Orders/jsOrder/?CRUD_operation=CREATE", $scope.newOrder).success(function (data)
                    {
                        $scope.disableProcessLoading();
                        if (data)
                        {
                            if (data["success"])
                            {
                                $scope.newOrder = data["xData"];
                                $scope.refreshData();
                            } else {
                                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p >La orden no se generará por los siguientes motivos: ' + data["message"]+'</p>', {
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
                        $scope.disableProcessLoading();
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
            $scope.disableProcessLoading();
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

        $scope.dtOrderProductsOptions = DTOptionsBuilder.newOptions()
            .withOption('bFilter', false)
            .withOption('bPaginate', false)
            .withOption('oLanguage', {

            "sLengthMenu": "_MENU_ registros por pagina",
            "oPaginate": {
                "sPrevious": "",
                "sNext": ""
            },
            "sSearch": "Buscar : ",
            "sEmptyTable": "No se encontraron registros...",
            "sInfo": "Mostrando registros _START_ a _END_",
            "sInfoFiltered": "(filtrados en un total de _MAX_)"
                //"sInfo": "<strong>_START_</strong>-<strong>_END_</strong> en un total de <strong>_TOTAL_</strong>"
            })
        ;

    }).controller('AccountModalInstanceCtrl', function ($http, $scope, $modalInstance, DTOptionsBuilder, DTColumnDefBuilder, items) {


        $scope.dtAccountModalOptions = DTOptionsBuilder.newOptions()
            //.withOption('bFilter', false)
            //.withOption('bPaginate', false)
            .withDOM("<'row'<'col-sm-6 col-xs-5'l><'col-sm-6 col-xs-7'f>r>t<'row'<'col-sm-5 hidden-xs'i><'col-sm-7 col-xs-12 clearfix'p>>")
            .withPaginationType("bootstrap")
            .withOption('oLanguage', {

            "sLengthMenu": "_MENU_ registros por pagina",
            "oPaginate": {
                "sPrevious": "",
                "sNext": ""
            },
            "sSearch": "Buscar : ",
            "sEmptyTable": "No se encontraron registros...",
            "sInfo": "Mostrando registros _START_ a _END_",
            "sInfoFiltered": "(filtrados en un total de _MAX_)"
                //"sInfo": "<strong>_START_</strong>-<strong>_END_</strong> en un total de <strong>_TOTAL_</strong>"
            })
        ;
        $scope.items = items;
        /*$scope.selected = {
         item: $scope.items[0]
         };*/


        $scope.ok = function (item)
        {
            $modalInstance.close(item);
        };
        $scope.cancel = function ()
        {
            $modalInstance.dismiss('cancel');
        };
    });

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.
