<?php
App::uses('AppModel', 'Model');
/**
 * Attachment Model
 *
 */
class Attachment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
        public $actsAs = array('Attachment');

}
