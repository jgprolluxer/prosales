
angular.module('prosales-app')
    .controller('OrderPOSController', function ($scope, $http, $location, $log, uniqueID, $modal, $alert, $q, $injector, formatDollar)
    {
        //var Notification = $injector.get('Notification');
        //Notification('Primary notification');
        
        //var myModal = $modal({title: 'My Title', content: 'My Content', show: true});
        
        //////Initialize New Order Object
        $scope.order = {
            Order: {
                id: null,
                type: "POS",
                status: 'open',
                folio: uniqueID.getID(12),
                price: 0,
                total_amt: 0,
                subtotal_amt: 0,
                tax: 0,
                disc: 0,
                disc_desc: "",
                account_id: 0,
                description: "POS",
                saleschannel: "POS",
                payment_received_amt: 0
            }
        };
        
        ////// Initialize pricelist
        $scope.pricelist = {
            Pricelist : {
                id : 0
            }
        };
        
        $scope.accounts = [];
        $scope.account = {};
        $scope.selectedAccount = {};
        
        $scope.orderProducts = [];
        $scope.product = {};
        $scope.selectedProduct = {};
        
        $scope.createOrder = function()
        {
            var deferred = $q.defer();
                $http({
                	url: '//' + $location.host() + '/Orders/api/',
                	method: "POST",
                	data: {
                	    body: $scope.order
                	}
                }).success(function (data, status, headers, config)
                {
                    if(data["success"])
                    {
                        deferred.resolve(data["xData"]);
                        $scope.order = data["xData"];
                        
                        $scope.$emit('orderCreatedLoaded', data["xData"]);
                        $scope.$emit('orderLoaded', $scope.order);
                        
                        $.bootstrapGrowl('Nueva venta inicializada!', {
                                type: 'success',
                                delay: 2000,
                                allow_dismiss: true
                            });
                        
                    } else {
                        $.bootstrapGrowl(data["message"], {
                                type: 'danger',
                                delay: 8*8000,
                                allow_dismiss: false
                            });
                        deferred.reject(data["message"]);
                    }
                    
                }).error(function (data, status, headers, config)
                {
                	alert(status + ' ' + data);
                	deferred.reject('Error: '+status + ' ' + data);
                });
            return deferred.promise;
        };
        
        $scope.updateOrder = function($order)
        {
            var deferred = $q.defer();
                $http({
                	url: '//' + $location.host() + '/Orders/api/'+$order.id,
                	method: "PUT",
                	data: {
                	    body: $order
                	}
                }).success(function (data, status, headers, config)
                {
                    if(data["success"])
                    {
                        deferred.resolve(data["xData"]);
                        $scope.order = data["xData"];
                        
                        $scope.$emit('orderUpdatedLoaded', data["xData"]);
                        
                        $.bootstrapGrowl('Venta actualizada!', {
                                type: 'success',
                                delay: 2000,
                                allow_dismiss: true
                            });
                            
                    } else {
                        $.bootstrapGrowl(data["message"], {
                                type: 'danger',
                                delay: 8000,
                                allow_dismiss: true
                            });
                            
                        deferred.reject(data["message"]);
                    }
                    
                }).error(function (data, status, headers, config)
                {
                	alert(status + ' ' + data);
                	deferred.reject('Error: '+status + ' ' + data);
                });
            return deferred.promise;
        };
        
        $scope.cancelOrder = function()
        {
            $scope.order.Order.status = 'cancelled';
            $scope.updateOrder($scope.order.Order);
        };
        
        $scope.createOrderProduct = function($object)
        {
            var deferred = $q.defer();
                $http({
                	url: '//' + $location.host() + '/OrderProducts/api/',
                	method: "POST",
                	data: {
                	    body: $object
                	}
                }).success(function (data, status, headers, config)
                {
                    if(data["success"])
                    {
                        deferred.resolve(data["xData"]);
                        $scope.$emit('orderProductCreatedLoaded', data["xData"]);
                        
                        $.bootstrapGrowl(data["message"], {
                                type: 'success',
                                delay: 2000,
                                allow_dismiss: true
                            });
                        
                    } else {
                        $.bootstrapGrowl(data["message"], {
                                type: 'danger',
                                delay: 8*8000,
                                allow_dismiss: true
                            });
                        deferred.reject(data["message"]);
                    }
                    
                }).error(function (data, status, headers, config)
                {
                	alert(status + ' ' + data);
                	deferred.reject('Error: '+status + ' ' + data);
                });
            return deferred.promise;
        };
        
        $scope.find = function()
        {
            if($scope.order.Order.id)
            {
                $http.get('//' + $location.host() + '/Orders/api/' + $scope.order.Order.id).success(function(data)
                {
                    if(data["success"]){
                        $scope.order = data["xData"];
                        
                        $scope.$emit('orderLoaded', $scope.order);
                    } else {
                        $scope.order.Order.status = 'cancelled';
                        $.bootstrapGrowl(data["message"], {
                                type: 'danger',
                                delay: 8*8000,
                                allow_dismiss: false
                            });
                    }
                });
            } else {
                $scope.createOrder();
            }
        };
        
        $scope.getOrderProducts = function()
        {
            var objParams = {
    			'dyn_model':'OrderProduct', 
    			'type_search':'all', 
    			'search_options': {
    				"conditions": [
    				"OrderProduct.id >= 1",
    				"Order.id = " + $scope.order.Order.id,
    				"OrderProduct.status = 'active' "
    				], 
    			"recursive": 1
    			}
    		};
    		$http.get('//' + $location.host() + '/Utils/queryModel?params='+JSON.stringify(objParams)).success(function(data)
    		{
    		    if (data["success"])
                {
                    $scope.orderProducts = data["xData"];
                    $scope.$emit('orderProductsLoaded', data["xData"]);
                } else {
                    $.bootstrapGrowl(data["message"], {
                        type: 'danger',
                        delay: 8*8000,
                        allow_dismiss: false
                    });
                }
    		});
        };
        
        $scope.getProductByName = function( sexpr )
        {
            var objParams = {
    			'dyn_model':'PricelistProduct', 
    			'type_search':'all', 
    			'search_options': {
    				"conditions": [
    				"PricelistProduct.id >= 1",
    				"Pricelist.id = " + $scope.pricelist.Pricelist.id,
    				"PricelistProduct.status = 'active' ",
    				"Product.name LIKE '%25" + sexpr + "%25'"
    				], 
    			"recursive": 1
    			}
    		};
    		return $http.get('//' + $location.host() + '/Utils/queryModel?params='+JSON.stringify(objParams)).then(function(res) {
    			return res.data["xData"];
    		});
        };
        
        $scope.loadPricelist = function()
        {
            $http.get('/Workstations/getPricelist/').success(function(data)
                {
                    if (data["success"])
                    {
                        $scope.pricelist = data["xData"];
                        $scope.$emit('pricelistLoaded', data["xData"]);
                        
                    } else {
                        $.bootstrapGrowl('No hay lista de precios asignada a su puesto, no puede continuar!', {
                                type: 'success',
                                delay: 8*8000,
                                allow_dismiss: false
                            });
                    }
                });
        };
        
        $scope.init = function($idOrder)
        {
            $scope.order.Order.id = $idOrder;
            
            $.bootstrapGrowl('Inicializando!', {
                                type: 'success',
                                delay: 2000,
                                allow_dismiss: true
                            });
            
            $scope.loadPricelist();
        };
        
        $scope.findAccounts = function()
        {
            var deferred = $q.defer();
            $scope.accounts = [];
            $http.get('//' + $location.host() +'/Accounts/api/').success(function(data)
            {
                if(data["success"])
                {
                    $scope.accounts = data["xData"];
                    deferred.resolve($scope.accounts);
                }else {
                    deferred.reject('Error: '+ data["message"]);
                }
            });
            return deferred.promise;
        };
        
        $scope.getAccount = function()
        {
            var deferred = $q.defer();
            $http.get('//' + $location.host() +'/Accounts/api/'+$scope.order.Order.account_id).success(function(data)
            {
                if(data["success"])
                {
                    $scope.account = data["xData"];
                    deferred.resolve($scope.account);
                    $scope.$emit('accountLoaded');
                }else {
                    deferred.reject('Error: '+ data["message"]);
                }
            });
            return deferred.promise;
        };
        
        $scope.$watch('selectedAccount', function(newValue, oldValue)
        {
            $log.info('account changed');
            $log.info($scope.selectedAccount);
          if($scope.selectedAccount.Account)
          {
              if('closed' != $scope.order.Order.status || 'cancelled' != $scope.order.Order.status)
              {
                  $scope.order.Order.account_id = $scope.selectedAccount.Account.id;
                  var promise = $scope.updateOrder($scope.order.Order);
                  promise.then(function()
                  {
                      $scope.selectedAccount = {};
                  }, function(){
                      console.log('error al insertar el cliente a la orden');
                  });
              }
          }
        });
        
        $scope.$watch('selectedProduct', function(newValue, oldValue)
        {
          if($scope.selectedProduct.Product)
          {
            var orderProduct = {
                OrderProduct: {
                    status: 'active',
                    order_id:       $scope.order.Order.id,
                    product_id:     $scope.selectedProduct.Product.id,
                    pricelist_id:   $scope.pricelist.Pricelist.id,
                    product_qty: 1,
                    product_disc: 0,
                    product_price: $scope.selectedProduct.PricelistProduct.unit_price,
                    product_tax: $scope.selectedProduct.PricelistProduct.tax
                }
            };
              var promise = $scope.createOrderProduct(orderProduct.OrderProduct);
              promise.then(function()
              {
                  $scope.selectedProduct = {};
                  $scope.$emit('pricelistLoaded', {});
              }, function(){
                  console.log('error al insertar el producto a la orden');
              });
          }

        });
        
        
        $scope.$on('pricelistLoaded', function(data)
        {
            $log.info('pricelistLoaded event emited');
            $scope.find();
            $scope.findAccounts();
        });
        
        $scope.$on('orderCreatedLoaded', function()
        {
            $scope.find();
        });
        
        $scope.$on('orderUpdatedLoaded', function()
        {
            $scope.find();
        });
        
        $scope.$on('orderLoaded', function(data)
        {
            $log.info('orderLoaded event emited');
            $scope.getAccount();
            $scope.getOrderProducts();
        });
        
        $scope.$on('accountLoaded', function(data)
        {
            $log.info('accountLoaded event emited');
            
        });
        
        $scope.$on('orderProductsLoaded', function(data)
        {
            $log.info('orderProductsLoaded event emited');
            $log.info('orderProducts');
            $log.info($scope.orderProducts);
        });
        
        
        
        $scope.frmtNumber = function(number)
        {
            try{number = parseFloat(number);}catch(err){}
            return "$" + formatDollar.format(number);
        };
        
    });

angular.module('prosales-app')
    .controller('OrderAddController', function ($scope, $http, $location, DTOptionsBuilder, DTColumnDefBuilder, $modal, $log)
    {
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
                saleschannel: "",
                payment_received_amt: 0
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

        $scope.pmnt_change = 0.00;

        $scope.allowPartialPayd = true;
        $scope.totalPayments = 0;

        $scope.cancelOrder = function()
        {
            if(confirm('Esta seguro de cancelar la orden?'))
            {
                $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE&format=CancelOrder", $scope.newOrder).success(function (data)
                {
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
            console.log($scope.newOrder.Order.payment_received_amt);
            console.log($scope.newOrder.Order.total_amt);
            console.log($scope.newOrder.Order.payment_received_amt < $scope.newOrder.Order.total_amt);
            if($scope.newOrder.Order.payment_received_amt < $scope.newOrder.Order.total_amt)
            {
                $.bootstrapGrowl('<i class="fa fa-exclamation-circle"></i><p>Favor de agregar un pago que cubra el total de la orden!</p>', {
                    type: 'warning',
                    delay: 6000,
                    allow_dismiss: true,
                    from: "top",
                    align: "center"
                });
                return false;
            }
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
                if (data)
                {
                    if (data["success"])
                    {
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
                            if (data)
                            {
                                if (data["success"])
                                {
                                    $scope.newOrderPayment = data["xData"];
                                    $scope.totalPayments = $scope.newOrderPayment.OrderPayment.total_amt;
                                    
                                        $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE", $scope.newOrder).success(function (data)
                                        {
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
            //////Load Accounts
            $http.post("/Accounts/jsfindAccount/?format=allByTeamID&teamID=" + 0, null).success(function (data)
            {
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
            var orderID = $scope.newOrder.Order.id;
            //////Load Refresh
            $http.post("/Orders/jsOrder/?CRUD_operation=READ&format=byID&orderID=" + orderID, null).success(function (data)
            {
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
            $http.post("/Families/jsfindFamily/?format=all", null).success(function (data)
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
            $http.post("/Products/jsfindProduct/?format=allbyFamily&familyID=" + familyID, null).success(function (data)
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
        $scope.processSelectedProduct = function (selectedProduct)
        {
            var orderProduct = {
                OrderProduct: {
                    product_id:     selectedProduct.Product.id,
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
            $http.post("/OrderProducts/jsfindOrderProduct/?format=allForPOS&orderID=" + OrderID, null).success(function (data)
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
            $scope.newOrder.Order.account_id = $scope.account.Account.id;
            $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE&format=SetAccount", $scope.newOrder).success(function (data)
            {
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
            $http.post("/Orders/jsOrder/?CRUD_operation=UPDATE&format=CloseOrder", $scope.newOrder).success(function (data)
            {
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
        $http.post("/Workstations/getPricelist/", null).success(function (data)
        {
            if (data)
            {
                if (data["success"])
                {
                    $scope.pricelist = data["xData"];

                    //////Initialize New Order
                    $http.post("/Orders/jsOrder/?CRUD_operation=CREATE", $scope.newOrder).success(function (data)
                    {
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
