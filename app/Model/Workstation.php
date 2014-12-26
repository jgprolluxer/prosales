<?php
App::uses('AppModel', 'Model');
/**
 * Workstation Model
 *
 * @property Workstation $ParentWorkstation
 * @property Store $Store
 * @property Pricelist $Pricelist
 * @property User $User
 * @property Workstation $ChildWorkstation
 */
class Workstation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
    public $actsAs = array('Tree', 'Workstation');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentWorkstation' => array(
			'className' => 'Workstation',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pricelist' => array(
			'className' => 'Pricelist',
			'foreignKey' => 'pricelist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'workstation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildWorkstation' => array(
			'className' => 'Workstation',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
