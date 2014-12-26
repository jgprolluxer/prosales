<?php
App::uses('AppModel', 'Model');
/**
 * Appmenu Model
 *
 * @property Appmenu $ParentAppmenu
 * @property Appmenu $ChildAppmenu
 */
class Appmenu extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mname';
	public $actsAs = array('Tree', 'Appmenu');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentAppmenu' => array(
			'className' => 'Appmenu',
			'foreignKey' => 'parent_id',
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
		'ChildAppmenu' => array(
			'className' => 'Appmenu',
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
