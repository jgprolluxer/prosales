<?php

App::uses('AppModel', 'Model');

/**
 * TeamWorkstation Model
 *
 * @property Team $Team
 * @property Workstation $Workstation
 */
class TeamWorkstation extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'workstation_id';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Team' => array(
            'className' => 'Team',
            'foreignKey' => 'team_id',
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
        ),
        'CreatedBy' => array(
            'className' => 'Users',
            'foreignKey' => 'created_by'
        ),
        'UpdatedBy' => array(
            'className' => 'Users',
            'foreignKey' => 'updated_by'
        )
    );

    public function beforeSave($options = array()) {

        $loggedUser = CakeSession::read('Auth.User');

        if (isset($loggedUser)) {
            if ($this->getID()) {
                $this->data['TeamWorkstation']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TeamWorkstation']['updated_by']))) {
                    $this->data['TeamWorkstation']['updated_by'] = $loggedUser["id"];
                }
            } else {
                $this->data['TeamWorkstation']['created'] = date("y-m-d H:i:s");
                $this->data['TeamWorkstation']['updated'] = date("y-m-d H:i:s");
                if (!(isset($this->data['TeamWorkstation']['updated_by']))) {
                    $this->data['TeamWorkstation']['updated_by'] = $loggedUser["id"];
                }
                if (!(isset($this->data['TeamWorkstation']['created_by']))) {
                    $this->data['TeamWorkstation']['created_by'] = $loggedUser["id"];
                }
            }
        }

        return true;
    }

}
