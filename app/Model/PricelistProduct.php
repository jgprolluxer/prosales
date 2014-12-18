<?php
App::uses('AppModel', 'Model');
/**
 * PricelistProduct Model
 *
 * @property Pricelist $Pricelist
 * @property Product $Product
 */
class PricelistProduct extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'product_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pricelist' => array(
			'className' => 'Pricelist',
			'foreignKey' => 'pricelist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
