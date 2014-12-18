<?php
App::uses('AppModel', 'Model');
/**
 * ActPlan Model
 *
 * @property ActPlanDetail $ActPlanDetail
 */
class ActPlan extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido.',
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
				'message' => 'Campo requerido.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'trigger_event' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido.',
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
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ActPlanDetail' => array(
			'className' => 'ActPlanDetail',
			'foreignKey' => 'act_plan_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'ActPlanDetail.order ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function beforeSave($options = array()) {
	
		$loggedUser = CakeSession::read('Auth.User');
	
		if(isset($loggedUser)) {
	
			if(!(isset($this->data['ActPlan']['updated_by']))) {
				$this->data['ActPlan']['updated_by'] = $loggedUser["id"];
			}
			if(!(isset($this->data['ActPlan']['created_by']))) {
				$this->data['ActPlan']['created_by'] = $loggedUser["id"];
			}
		}
		return true;
	}
}
