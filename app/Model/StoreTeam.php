<?php
App::uses('AppModel', 'Model');
/**
 * StoreTeam Model
 *
 * @property Store $Store
 * @property Team $Team
 */
class StoreTeam extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'store_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
