<?php
App::uses('AppModel', 'Model');
/**
 * ActPlanDetail Model
 *
 * @property ActPlan $ActPlan
 */
class ActPlanDetail extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'act_plan_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'initial_status' => array(
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
		'ActPlan' => array(
			'className' => 'ActPlan',
			'foreignKey' => 'act_plan_id',
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
	
	public function beforeSave($options = array()) {
	
		$loggedUser = CakeSession::read('Auth.User');
	
		if(isset($loggedUser)) {
	
			if(!(isset($this->data['ActPlanDetail']['updated_by']))) {
				$this->data['ActPlanDetail']['updated_by'] = $loggedUser["id"];
			}
			if(!(isset($this->data['ActPlanDetail']['created_by']))) {
				$this->data['ActPlanDetail']['created_by'] = $loggedUser["id"];
			}
		}
		return true;
	}
}
