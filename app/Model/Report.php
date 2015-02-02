<?php
App::uses('AppModel', 'Model');
/**
 * Report Model
 *
 */
class Report extends AppModel
{

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
        public $actsAs = array('Report');

}
