<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 */
class Address extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'country';
        public $actsAs = array('Address');

}
