<?php

App::uses('AppModel', 'Model');

/**
 * TaskAction Model
 *
 * @property Task $Task
 */
class TaskAction extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'css' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'text' => array(
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
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
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
                $this->data['TaskAction']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TaskAction']['updated_by'])))
                {
                    $this->data['TaskAction']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $this->data['TaskAction']['created'] = date("y-m-d H:i:s");
                $this->data['TaskAction']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TaskAction']['updated_by'])))
                {
                    $this->data['TaskAction']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($this->data['TaskAction']['created_by'])))
                {
                    $this->data['TaskAction']['created_by'] = $loggedUser["id"];
                }
            }
        }

        return true;
    }

}
