<?php

App::uses('AppModel', 'Model');

/**
 * OrderProduct Model
 *
 * @property Order $Order
 * @property Product $Product
 * @property Resource $Resource
 */
class OrderProduct extends AppModel
{

    public $actsAs = array('OrderProduct');

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'order_id';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id',
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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OrderProductSupply' => array(
			'className' => 'OrderProductSupply',
			'foreignKey' => 'order_product_id',
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
