<?php
App::uses('AppModel', 'Model');
/**
 * Report Model
 *
 */
class Report extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Reports';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
        public $actsAs = array('Report');

}
