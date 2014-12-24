<?php
App::uses('AppModel', 'Model');
/**
 * OrderPayment Model
 *
 * @property Account $Account
 * @property Order $Order
 * @property Payment $Payment
 */
class OrderPayment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'total_amt';


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
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Payment' => array(
			'className' => 'Payment',
			'foreignKey' => 'payment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
