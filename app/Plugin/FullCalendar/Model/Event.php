<?php
 App::uses('CakeTime', 'Utility');

/*
 * Model/Event.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 

 
class Event extends FullCalendarAppModel {
	var $name = 'Event';
	var $displayField = 'title';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'start' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

	var $belongsTo = array(
		'EventType' => array(
			'className' => 'FullCalendar.EventType',
			'foreignKey' => 'event_type_id'
		)
	);
	
	public function beforeFind($qry) {
		$loggedUser = CakeSession::read('Auth.User');

		if(isset($loggedUser))
		{
			if($loggedUser['group_id'] != '1') {		
				$qry['conditions']['Event.adjcompanies_id'] = $loggedUser['adjcompanies_id'];
				if($loggedUser['group_id'] != '3'){
					$qry['conditions']['Event.user_id'] = $loggedUser['id'];
				}
			}
			//debug($loggedUser);
			//debug($qry);
		}
		return($qry);
	}
	
	public function beforeSave() {
		$loggedUser = CakeSession::read('Auth.User');
		
		if(isset($loggedUser)) {
			if(!(isset($this->data['Event']['user_id']))) {
				$this->data['Event']['user_id'] = $loggedUser['id'];
			}

			if(!(isset($this->data['Event']['adjcompanies_id']))) {
				$this->data['Event']['adjcompanies_id'] = $loggedUser['adjcompanies_id'];
			}
		}
		
		
		$userTimeZone = $loggedUser['time_zone'];
		$this->data['Event']['start'] = CakeTime::toServer($this->data['Event']['start'],$userTimeZone,'Y-m-d H:i:s');
		$this->data['Event']['end'] = CakeTime::toServer($this->data['Event']['end'],$userTimeZone,'Y-m-d H:i:s');
		
		return(true);	
	}	

}
?>
