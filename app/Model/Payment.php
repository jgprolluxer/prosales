<?php
App::uses('AppModel', 'Model');
/**
 * Payment Model
 *
 * @property Account $Account
 */
class Payment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'amount';


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
		)
	);
}
