<?php

App::uses('ModelBehavior', 'Model');
App::import('Model', 'OrderPayment');
App::import('Model', 'Payment');

class OrderBehavior extends ModelBehavior
{

    protected function _addToWhitelist(\Model $model, $field)
    {
        return parent::_addToWhitelist($model, $field);
    }

    public function afterDelete(\Model $model)
    {
        return parent::afterDelete($model);
    }

    public function afterFind(\Model $model, $results, $primary = false)
    {
        parent::afterFind($model, $results, $primary);
    }

    public function afterSave(\Model $model, $created, $options = array())
    {
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
        $model = $this->validateCancelOrder($model);
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
    
    private function validateCancelOrder($Model)
    {
        //$this->log('ESTADO DE LA ORDEN AL TRATAR DE CANCELAR EL PAGO');
        //$this->log($Model->data['Order']['status']);
        if('cancelled' == $Model->data['Order']['status'] && 0 < $Model->data['Order']['total_amt'])
        {
            $this->OrderPayment->recursive = -1;
            if( !$this->OrderPayment->updateAll( array('OrderPayment.order_id' => $Model->data['Order']["id"]),array('OrderPayment.status =' => 'cancelled')) )
            {
                $this->log('NO SE PUDIERON ACTUALIZARLOSPAGOS A CANCELADOS');
            }
        }
        return $Model;
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
                $Model->data['Order']['updated'] = date("Y-m-d H:i:s");
                if (!(isset($Model->data['Order']['updated_by'])))
                {
                    $Model->data['Order']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $Model->data['Order']['created'] = date("Y-m-d H:i:s");
                $Model->data['Order']['updated'] = date("Y-m-d H:i:s");
                if (!(isset($Model->data['Order']['updated_by'])))
                {
                    $Model->data['Order']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($Model->data['Order']['created_by'])))
                {
                    $Model->data['Order']['created_by'] = $loggedUser["id"];
                }
            }
        }
        return $Model;
    }

}


