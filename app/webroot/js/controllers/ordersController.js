
angular.module('prosales-app')
    .controller('OrderPOSController', function ($scope, $http, $location, $log, uniqueID, $modal, $alert, $q, $injector, formatDollar)
    {
        //var Notification = $injector.get('Notification');
        //Notification('Primary notification');
        
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
        
        $scope.editingOrderProduct = {};
        $scope.orderProductSupplies = [];
        
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
        
        $scope.updateOrderProduct = function($object)
        {
            var deferred = $q.defer();
                $http({
                	url: '//' + $location.host() + '/OrderProducts/api/'+$object.id,
                	method: "PUT",
                	data: {
                	    body: $object
                	}
                }).success(function (data, status, headers, config)
                {
                    if(data["success"])
                    {
                        deferred.resolve(data["xData"]);
                        
                        $scope.$emit('orderProductUpdatedLoaded', data["xData"]);
                        $.bootstrapGrowl(data["message"], {
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
        
        $scope.updateOrderProductSupply = function($object)
        {
            var deferred = $q.defer();
                $http({
                	url: '//' + $location.host() + '/OrderProductSupplies/api/'+$object.id,
                	method: "PUT",
                	data: {
                	    body: $object
                	}
                }).success(function (data, status, headers, config)
                {
                    if(data["success"])
                    {
                        deferred.resolve(data["xData"]);
                        
                        $scope.$emit('orderProductSupplyUpdatedLoaded', data["xData"]);
                        $.bootstrapGrowl(data["message"], {
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
        
        $scope.cancelOrderProduct = function(orderProduct, $index)
        {
            $scope.enableProcessLoading();
            $log.info('deleting product');
            $log.info(orderProduct);
            $log.info($index);
            orderProduct.status = 'inactive';
            var promise = $scope.updateOrderProduct(orderProduct);
            $scope.orderProducts.splice($index, 1);
            promise.then(function(data){
                $scope.disableProcessLoading();
            },function(err){
                $scope.disableProcessLoading();
            });
            $scope.$emit('pricelistLoaded', {});
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
                $scope.createOrder().then(function(data){
                    window.location.href = '//' + $location.host() + '/Orders/pos/' + $scope.order.Order.id
                });
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
        
        $scope.getOrderProductSupplies = function($OrderProductID)
        {
            var deferred = $q.defer();
            $http.get('//' + $location.host() +'/OrderProductSupplies/api/?parent_field=order_product_id&parent_value='+$OrderProductID).success(function(data)
            {
                if(data["success"])
                {
                    $scope.orderProductSupplies = data["xData"];
                    deferred.resolve( data["xData"] );
                }else {
                    deferred.reject('Error: '+ data["message"]);
                }
            });
            return deferred.promise;
            
        };
        
        
        $scope.showeditOrderProductModal = function(editingOrderProduct)
        {
            $scope.editingOrderProduct = editingOrderProduct;
            $scope.getOrderProductSupplies(editingOrderProduct.id).then(function()
            {
                var myModal = $modal({
                    title: 'My Title',
                    content: 'My Content',
                    scope: $scope,
                    template: '/js/editOrderProductModal.html',
                    show: true
                });
            });
        };
        
        $scope.toogleOrderProductSupply = function(orderProductSupply)
        {
            $scope.updateOrderProductSupply(orderProductSupply.OrderProductSupply);
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
        $scope.totalOfProducts = 0;
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