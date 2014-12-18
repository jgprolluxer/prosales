<?php
App::uses('AppModel', 'Model');
/**
 * Activity Model
 *
 * @property Account $Account
 * @property Resource $Resource
 */
class Activity extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Account' => array(
			'className' => 'Account',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Resource' => array(
			'className' => 'Resource',
			'foreignKey' => 'resource_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
