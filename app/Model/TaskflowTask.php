<?php

App::uses('AppModel', 'Model');

/**
 * TaskflowTask Model
 *
 * @property Taskflow $Taskflow
 */
class TaskflowTask extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'taskflow_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'created_by' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'updated_by' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'duration' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'monitor_object' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'end_condition' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'controller' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'action' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'order' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Taskflow' => array(
            'className' => 'Taskflow',
            'foreignKey' => 'taskflow_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'CreatedBy' => array(
            'className' => 'Users',
            'foreignKey' => 'created_by'
        ),
        'UpdatedBy' => array(
            'className' => 'Users',
            'foreignKey' => 'updated_by'
        ),
    );

    public function beforeSave($options = array())
    {

        $loggedUser = CakeSession::read('Auth.User');

        if (isset($loggedUser))
        {
            if ($this->getID())
            {
                $this->data['TaskflowTask']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TaskflowTask']['updated_by'])))
                {
                    $this->data['TaskflowTask']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $this->data['TaskflowTask']['created'] = date("y-m-d H:i:s");
                $this->data['TaskflowTask']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TaskflowTask']['updated_by'])))
                {
                    $this->data['TaskflowTask']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($this->data['TaskflowTask']['created_by'])))
                {
                    $this->data['TaskflowTask']['created_by'] = $loggedUser["id"];
                }
            }
        }

        return true;
    }

}
