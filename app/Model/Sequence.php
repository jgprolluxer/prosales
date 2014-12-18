<?php

App::uses('AppModel', 'Model');

/**
 * Sequence Model
 *
 */
class Sequence extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
                $this->data['Sequence']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['Sequence']['updated_by'])))
                {
                    $this->data['Sequence']['updated_by'] = $loggedUser["id"];
                }
            } else
            {
                $this->data['Sequence']['created'] = date("y-m-d H:i:s");
                $this->data['Sequence']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['Sequence']['updated_by'])))
                {
                    $this->data['Sequence']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($this->data['Sequence']['created_by'])))
                {
                    $this->data['Sequence']['created_by'] = $loggedUser["id"];
                }
            }
        }
        return true;
    }

}
