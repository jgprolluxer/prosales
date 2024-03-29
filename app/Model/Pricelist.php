<?php
App::uses('AppModel', 'Model');
/**
 * Pricelist Model
 *
 * @property PricelistProduct $PricelistProduct
 * @property Team $Team
 */
class Pricelist extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array('Pricelist');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'PRICELIST_VALIDATIONMESSAGE_FIELD_NAME_NOTEMPTY'
			)
		)
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PricelistProduct' => array(
			'className' => 'PricelistProduct',
			'foreignKey' => 'pricelist_id',
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
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'pricelist_id',
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
