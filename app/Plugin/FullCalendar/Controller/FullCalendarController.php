<?php
/*
 * Controller/FullCalendarController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class FullCalendarController extends FullCalendarAppController {

	var $name = 'FullCalendar';

	function index() {
	}

	public function beforeFilter() {
		$this->params['CURRENT_PAGE'] = "calendar";
		$this->params['APP_INIT'] = "calendar";
		parent::beforeFilter();
	}

}
?>
