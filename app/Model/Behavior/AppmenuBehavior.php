<?php

App::uses('ModelBehavior', 'Model');

class AppmenuBehavior extends ModelBehavior
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


}
