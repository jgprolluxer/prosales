<?php

App::uses('AppModel', 'Model');

/**
 * TaskflowInstance Model
 *
 * @property Taskflow $Taskflow
 * @property Task $Task
 */
class TaskflowInstance extends AppModel
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
        'task_id' => array(
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
        'rel_object' => array(
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
        'Task' => array(
            'className' => 'TaskflowTask',
            'foreignKey' => 'task_id',
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
                $this->data['TaskflowInstance']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TaskflowInstance']['updated_by'])))
                {
                    $this->data['TaskflowInstance']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $this->data['TaskflowInstance']['created'] = date("y-m-d H:i:s");
                $this->data['TaskflowInstance']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TaskflowInstance']['updated_by'])))
                {
                    $this->data['TaskflowInstance']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($this->data['TaskflowInstance']['created_by'])))
                {
                    $this->data['TaskflowInstance']['created_by'] = $loggedUser["id"];
                }
            }
        }

        return true;
    }

}
