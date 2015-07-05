<?php

App::uses('ModelBehavior', 'Model');
App::import('Model', 'Order');
App::import('Model', 'OrderProduct');
App::import('Model', 'ProductSupply');
App::import('Model', 'OrderProductSupply');


class OrderProductBehavior extends ModelBehavior
{

    protected function _addToWhitelist(\Model $model, $field)
    {
        return parent::_addToWhitelist($model, $field);
    }

    public function afterDelete(\Model $model)
    {
        //$this->log('after delete model');
        //$this->log($model);
        //$orderProductID = isset($model->id) ? $model->id : 0;
        //$this->updateTotalOrder($orderProductID);
        return parent::afterDelete($model);
    }

    public function afterFind(\Model $model, $results, $primary = false)
    {
        parent::afterFind($model, $results, $primary);
    }

    public function afterSave(\Model $model, $created, $options = array())
    {
        $orderProductID = isset($model->id) ? $model->id : 0;
        $model = $this->setOrderProductSupplies($model);
        $this->updateTotalOrder($orderProductID);

        return parent::afterSave($model, $created, $options);
    }

    public function afterValidate(\Model $model)
    {
        return parent::afterValidate($model);
    }

    public function beforeDelete(\Model $model, $cascade = true)
    {
        return parent::beforeDelete($model, $cascade);
    }

    public function beforeFind(\Model $model, $query)
    {
        return parent::beforeFind($model, $query);
    }

    public function beforeSave(\Model $model, $options = array())
    {
        
        $model = $this->setCreatedUpdated($model);
        return parent::beforeSave($model, $options);
    }

    public function beforeValidate(\Model $model, $options = array())
    {
        return parent::beforeValidate($model, $options);
    }

    public function cleanup(\Model $model)
    {
        return parent::cleanup($model);
    }

    public function onError(\Model $model, $error)
    {
        return parent::onError($model, $error);
    }

    public function setup(\Model $model, $config = array())
    {
        return parent::setup($model, $config);
    }

    /**
     * 
     * @param type $Model
     * @return type
     */
    private function setCreatedUpdated($Model)
    {
        $loggedUser = CakeSession::read('Auth.User');
        if (isset($loggedUser))
        {
            if ($Model->id)
            {
                $Model->data['OrderProduct']['updated'] = date("Y-m-d H:i:s");
                if (!(isset($Model->data['OrderProduct']['updated_by'])))
                {
                    $Model->data['OrderProduct']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $Model->data['OrderProduct']['created'] = date("Y-m-d H:i:s");
                $Model->data['OrderProduct']['updated'] = date("Y-m-d H:i:s");
                if (!(isset($Model->data['OrderProduct']['updated_by'])))
                {
                    $Model->data['OrderProduct']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($Model->data['OrderProduct']['created_by'])))
                {
                    $Model->data['OrderProduct']['created_by'] = $loggedUser["id"];
                }
            }
        }
        return $Model;
    }
    
    private function setOrderProductSupplies($Model)
    {
        $ProductSupplyModel = new ProductSupply();
        $OrderProductSupplyModel = new OrderProductSupply();
        
        $orderID = $Model->data["OrderProduct"]["order_id"];
        $orderProductID = $Model->data["OrderProduct"]["id"];
        $productID = $Model->data["OrderProduct"]["product_id"];
        
        $loggedUser = CakeSession::read('Auth.User');

        $productSupplies = $ProductSupplyModel->find('all', array(
            'conditions' => array(
                'ProductSupply.id >= 1',
                'ProductSupply.product_id =' => $productID
            )
        ));
        
        foreach($productSupplies as $idx => $productSupply )
        {
            $supply = $productSupply["Supply"];
            
            $newOrderProductSupply = array(
                "created" => date("Y-m-d H:i:s"),
                'updated' => date("Y-m-d H:i:s"),
                'created_by' => $loggedUser["id"],
                'updated_by' => $loggedUser["id"],
                'order_product_id' => $orderProductID,
                'supply_id' => $supply["id"],
                'added' => true
            );
            $OrderProductSupplyModel->recursive = -1;
            $OrderProductSupplyModel->create();
            $OrderProductSupplyModel->save($newOrderProductSupply);
        }
        return $Model;
    }
    
    public function updateTotalOrder($orderProductID = 0)
    {
        try
        {
            if (0 !== $orderProductID)
            {
                $OrderModel = new Order();
                $OrderProductModel = new OrderProduct();

                $orderProduct = $OrderProductModel->read(null, $orderProductID);
                if (!empty($orderProduct))
                {
                    $order = $OrderModel->read(null, $orderProduct["OrderProduct"]["order_id"]);
                    $allProducts = $orderProducts = $OrderProductModel->find('all', array(
                        'conditions' => array(
                            'OrderProduct.id >=' => 1,
                            'OrderProduct.order_id' => $orderProduct["OrderProduct"]["order_id"],
                            'OrderProduct.status' => 'active'
                        )
                    ));

                    $pSum = 0;
                    $pUnit = 0;
                    $tTax = 0;
                    $tDisc = 0;
                    $tSub = 0;
                    foreach ($allProducts as $value)
                    {
                        $orderProduct = $value["OrderProduct"];
                        $pUnit = ($orderProduct["product_price"] * $orderProduct["product_qty"]);
                        $pUnit = $pUnit - (($pUnit * $orderProduct["product_disc"]) / 100);
                        $pUnit = $pUnit + (($pUnit * $orderProduct["product_tax"]) / 100);
                        $pSum += $pUnit;
                    }
                    $order["Order"]["price"] = $pSum;
                    $order["Order"]["tax"] = 0;
                    $order["Order"]["tax_amt"] = 0;
                    $order["Order"]["subtotal_amt"] = $pSum;
                    $order["Order"]["total_amt"] = ( $pSum );
                    if(0 < ( $pSum ) )
                    {
                        $order["Order"]["status"] = 'pending';
                    }
                    $order["Order"]["disc"] = 0;
                    $order["Order"]["disc_amt"] = 0;

                    $OrderModel->recursive = -1;
                    if (!$OrderModel->save($order["Order"]))
                    {
                        $this->log('No se pudo actualizar el total de la orden');
                        $this->log($OrderModel->validationErrors);
                    }
                }
            }
        } catch (Exception $ex)
        {
            $this->log('Error al guardar el total de productos a la orden');
            $this->log($ex->getMessage());
        }
    }

}
