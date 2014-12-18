<?php
App::uses('AppModel', 'Model');
/**
 * AdjAudit Model
 *
 * @property Adjustment $Adjustment
 * @property User $User
 */
class AdjAudit extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Adjustment' => array(
			'className' => 'Adjustment',
			'foreignKey' => 'adjustment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
