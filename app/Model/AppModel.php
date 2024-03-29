<?php

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $actsAs = array('Containable');

    function checkUnique($data, $fields) {
        // check if the param contains multiple columns or a single one
        if (!is_array($fields)) {
            $fields = array($fields);
        }

        // go trough all columns and get their values from the parameters
        foreach ($fields as $key) {
            $unique[$key] = $this->data[$this->name][$key];
        }

        // primary key value must be different from the posted value
        if (isset($this->data[$this->name][$this->primaryKey])) {
            $unique[$this->primaryKey] = "<>" . $this->data[$this->name][$this->primaryKey];
        }

        // use the model's isUnique function to check the unique rule
        return $this->isUnique($unique, false);
    }

}
