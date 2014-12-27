<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Group $Group
 * @property Workstation $Workstation
 */
class User extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'firstname';
    public $actsAs = array(
        'Acl' => array('type' => 'requester'),
        'User'
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Workstation' => array(
            'className' => 'Workstation',
            'foreignKey' => 'workstation_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function parentNode()
    {
        if (!$this->id && empty($this->data))
        {
            return null;
        }
        if (isset($this->data['User']['group_id']))
        {
            $groupId = $this->data['User']['group_id'];
        } else
        {
            $groupId = $this->field('group_id');
        }
        if (!$groupId)
        {
            return null;
        } else
        {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user)
    {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

}
