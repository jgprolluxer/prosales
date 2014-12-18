<?php

App::uses('AppModel', 'Model');

/**
 * Taskflow Model
 *
 * @property Task $Task
 */
class Taskflow extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
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
        'trigger_object' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'active_flg' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    public $hasMany = array(
        'Task' => array(
            'className' => 'TaskflowTasks',
            'foreignKey' => 'taskflow_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public $belongsTo = array(
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
                $this->data['Taskflow']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['Taskflow']['updated_by'])))
                {
                    $this->data['Taskflow']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $this->data['Taskflow']['created'] = date("y-m-d H:i:s");
                $this->data['Taskflow']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['Taskflow']['updated_by'])))
                {
                    $this->data['Taskflow']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($this->data['Taskflow']['created_by'])))
                {
                    $this->data['Taskflow']['created_by'] = $loggedUser["id"];
                }
            }
        }

        return true;
    }

}
