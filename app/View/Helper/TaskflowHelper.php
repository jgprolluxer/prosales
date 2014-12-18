<?php
App::uses('Helper', 'View');

class TaskflowHelper extends Helper {
	var $helpers = array('Form','Html');

	var $objectIcons     = array('Account'=>'icon-user',
			'Opportunity'=>'icon-bell',
			'Quote'=>'icon-money',
			'Order'=>'icon-shopping-cart',
			'Activity'=>'icon-calendar',
			'OrderPayment' =>'icon-usd',
	);
	
	function getTaskFlowMenu(){
		
		$currModel = Inflector::classify($this->params['controller']);
		
		App::import('Model',"Taskflow");
		$taskflow =& new Taskflow();
		
		$taskflow->recursive = 1;
		$taskflows = $taskflow->find('all', array(
				'conditions' => array('Taskflow.trigger_object' => $currModel,
						'AND' => array('Taskflow.active_flg =' =>1),
				),
		));
		
		
		if(count($taskflows) == 0) {
			return "";
		}
		
		$return = '';
		$return .= '<div class="actions">';
		$return .= '<div class="btn-group">';
		$return .= '<a class="btn green" href="#" data-toggle="dropdown">';
		$return .= '<i class="icon-magic"></i> Flujos de trabajo ';
		$return .= '<i class="icon-angle-down"></i></a>';
		$return .= '<ul class="dropdown-menu pull-right">';
		$count = 0;
		foreach($taskflows as $tf) {
			$return .= '		<li><a href="' .  Router::url("/taskflowInstances/add/" . $tf["Taskflow"]["id"] . "/" . (isset($this->data[$currModel]["id"]) ? $this->data[$currModel]["id"] : '') ) . '">' . $tf["Taskflow"]["name"] . '</a></li>';
			$count++;
		}
		
		$return .= '</ul></div></div>';
		
		return($return);
	}	

	function getTaskFlowExecHeader($taskflow, $taskflowInstanceObj, $relatedObject){
		
		if(empty($taskflow)) {
			return "";
		}
		$currController = $this->request->params["controller"];
		$currController	= Inflector::camelize($currController);
		$taskButtons 	='';
		$stepPer = 0;
		if($currController == "TaskflowInstances") {
			$stepPer = 2;
		}
		else {
			$stepPer = 5;
		}		

		$return = $this->Html->script("../assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js");
		
		$return .= '<div class="portlet box blue">';
		$return .= '<div class="portlet-title">';
		$return .= '<h4>'. __($taskflow["Taskflow"]["name"])  .'</h4>';
		$return .= '<div class="tools">';
		$return .= '<a href="javascript:;" class="collapse"></a>';
		$return .= '</div>';
		$return .= '</div>';
		$return .= '<div class="portlet-body form">';
				
		$wizard = '<div class="row-fluid" id="form_wizard_1"><form action="#" class="form-horizontal">';
		$wizard .= '<div class="form-wizard"><div class="navbar steps"><div class="navbar-inner">';
		$wizard .= '<ul class="row-fluid nav nav-pills">';

		$relatedInfo ='';
		$relatedInfo .= '<div class="row-fluid">';
		$relatedInfo .= '<div class="span12 "><ul class="unstyled inline sidebar-tags nav nav-pills">';
		
		$taskCount 		=  count($taskflow["Task"]);
		$taskSpan  		= 12 / $taskCount;
		$taskPerDelta 	= (100 / $taskCount);
		$taskflowId 	= $taskflow["Taskflow"]["id"];
		$taskflowInstanceId	= $taskflowInstanceObj["TaskflowInstance"]["id"];		
		
		$activeTaskFlg 		= true;
		$activeTaskFoundFlg = false;
		foreach($taskflow["Task"] as $task) {
			
			$taskEndCondition 	=  $task["end_condition"];
			$taskMonitorObj 	=  $task["monitor_object"];
			$taskId 			=  $task["id"];
			$taskController		=  $task["controller"];
			
			$taskModel			=  Inflector::classify(str_replace('Controller','',$taskController));
			
			App::import('Model',"TaskflowInstance");
			$taskflowInstance =& new TaskflowInstance();
			
			
			$taskflowInstance->recursive = -1;
			$doneTasks = $taskflowInstance->find('all', array(
					'conditions' => array('TaskflowInstance.taskflow_id' => $taskflowId,
							'AND' => array('TaskflowInstance.parent_id =' =>$taskflowInstanceId,
									'TaskflowInstance.rel_object_type'=> $taskMonitorObj),
					),
			));
			
			if(empty($doneTasks)) {
				$allDoneFlg = false;
				$activeTaskFlg = true;
			}
			
			$allDoneFlg = true;
			foreach($doneTasks as $dtask) {
				
				App::import('Model',$taskMonitorObj);
				$modelMonitorObject =& new $taskMonitorObj();

				$doneRelObjectId =  $dtask["TaskflowInstance"]["rel_object"];
				
				$arrTaskEnd = split("=>",$taskEndCondition);
				
				$relatedMonitorObject = $modelMonitorObject->find('all', array(
					'conditions' => array($taskMonitorObj .'.id' => $doneRelObjectId,
							'AND' => array($arrTaskEnd[0] => $arrTaskEnd[1]),
					),
				));

				if(!empty($relatedMonitorObject)) {
					$relatedObject = $relatedMonitorObject[0];
					$activeTaskFlg = false;
					$stepPer = $stepPer + $taskPerDelta;			
				}
				else {
					$allDoneFlg = false;
					$activeTaskFlg = true;
				}				
			}

			if(!$allDoneFlg && $stepPer>=100) {
				$stepPer = $stepPer-$taskPerDelta;
			}
			
			if(!empty($relatedObject[$taskModel])) {
				$relObjectId =  $relatedObject[$taskModel]["id"];
			}

			$wizard .= '<li class="span' .$taskSpan . ' ' . (($activeTaskFlg && !$activeTaskFoundFlg) ? 'active': ((!$activeTaskFlg) ? 'done':'')) .'">';
			$wizard .= '<a href="#tab1" data-toggle="tab" class="step '. (($activeTaskFlg && !$activeTaskFoundFlg) ? 'active': ((!$activeTaskFlg) ? 'done':'')) . '">';
			$wizard .= '<span class="number">' . $task["order"] .'</span>';
			$wizard .= '<span class="desc"><i class="icon-ok"></i> ' . $task["name"] . '</span>';
			$wizard .= '</a></li>';
			
			if($activeTaskFlg && !$activeTaskFoundFlg)
			{

				$taskButtons ='';
				App::import('Model',"TaskAction");
				$taskAction =& new TaskAction();
				
				$taskAction->recursive = -1;
				$taskActions = $taskAction->find('all', array(
						'conditions' => array('TaskAction.task_id' => $taskId,
						),
				));
				$taskButtons = '<div class="clearfix">';
				foreach($taskActions as $action) {
					
					$taskActionController= $action["TaskAction"]["controller"];
					$taskActionController= str_replace('Controller','',$taskActionController);
					$arrTaskAction 	  = split("=>" , ($action["TaskAction"]["action"]));
					$taskActionAction = $arrTaskAction["0"];
					$taskActionParams = "";
					if(!empty($arrTaskAction["1"])) {
						$taskActionParams = $arrTaskAction["1"];
					}
					$taskButtons .='<div class="btn-group">';
					
					$taskButtons .= $this->Html->link('<i></i> ' . __($action["TaskAction"]["text"]), array('controller'=>$taskActionController,'action' =>$taskActionAction, $taskflowInstanceId, $taskId, $relObjectId, $taskModel, $taskActionParams), array('escape' => false, 'class'=>$action["TaskAction"]["css"]));					
					$taskButtons .='</div>&nbsp;';
				}
				$taskButtons .= '</div>';
				
				$activeTaskFoundFlg = true;
				
			}
			
		}

		$doneTasks = $taskflowInstance->find('all', array(
				'conditions' => array('TaskflowInstance.taskflow_id' => $taskflowId,
						'OR' => array( 'TaskflowInstance.parent_id ='=>$taskflowInstanceId,
								'TaskflowInstance.id ='=>$taskflowInstanceId),
				),
		));
		
		$doneObjects = array();
		foreach($doneTasks as $dtask) {
		
			$doneRelObject = $dtask["TaskflowInstance"]["rel_object_type"];
			$doneRelObjectId =  $dtask["TaskflowInstance"]["rel_object"];
						
			App::import('Model',$doneRelObject);
			$modelMonitorObject =& new $doneRelObject();
			
			$relatedMonitorObject = $modelMonitorObject->find('all', array(
					'conditions' => array($doneRelObject .'.id' => $doneRelObjectId,
					),
			));
		
			if(!empty($relatedMonitorObject)) {
				$relatedObject = $relatedMonitorObject[0];
				$relObjectId =  $relatedObject[$doneRelObject]["id"];
				if($doneRelObject == "Account") {
					$relObjectName = $relatedObject[$doneRelObject]["firstname"] . ' ' . $relatedObject[$doneRelObject]["lastname"] ;
				}
				else {
					if($doneRelObject == "OrderPayment") {
						$relObjectName = $relatedObject[$doneRelObject]["docseq"];
						
					}
					else {
						$relObjectName = $relatedObject[$doneRelObject]["name"];
						
					}
				}
				
				$relatedInfo .= '<li><a href="'. Router::url("/" . Inflector::pluralize($doneRelObject) . "/edit/" . $relObjectId) .'"><i class="'  .  $this->objectIcons[$doneRelObject] . '"></i> ' . $relObjectName . '</a></li>';
					
			}
		}
		
		$relatedInfo .= '</ul>';
		$relatedInfo .= '</div>';
		
		$wizard .= '</ul></div></div>';
		$wizard .= '<div id="bar" class="progress progress-success progress-striped">';
		$wizard .= '<div class="bar" style="width: ' . $stepPer .'%"></div>';
		$wizard .= '</div></div></form>'. $taskButtons . '</div></div>';	
		
		$return .= $relatedInfo . $wizard;
		$return .= '</div>';
		$return .= '</div>';

		App::import('Model',"TaskflowInstance");
		$taskflowInstance =& new TaskflowInstance();
		
		$taskflowInstanceObj["TaskflowInstance"]["progress"] = $stepPer;
		
		if (!$taskflowInstance->save($taskflowInstanceObj)) {
			$this->Session->setFlash(__('Error, No se ha podido guardar la tarea asociada al flujo de trabajo.'));
		}		
		
		return($return);
	}
	
	function getTaskflowDropDown() {
		
		App::import('Model',"TaskflowInstance");
		$taskflowInstance =& new TaskflowInstance();
		
		
		$taskflowInstance->recursive = 1;
		$inProgressTasks = $taskflowInstance->find('all', array(
				'conditions' => array('TaskflowInstance.created_by' => CakeSession::read('Auth.User.id'),
						'AND' => array('TaskflowInstance.progress <' =>100, 
								'TaskflowInstance.task_id ='=>0,),
		)));

		if(count($inProgressTasks) == 0) {
			return "";
		}

		$result = '<li class="dropdown" id="header_task_bar">';
		$result .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
		$result .= '<i class="icon-tasks"></i></i><span class="badge">' . count($inProgressTasks) . '</span></a>';
		$result .= '<ul class="dropdown-menu extended tasks"><li>';
		$result .= '<li><p>'. __('Tienes ' . count($inProgressTasks) . ' ' . ((count($inProgressTasks) == 1) ? 'flujo' : 'flujos') . ' de trabajo en progreso...') . '</p></li>';
		
		$i=0;
		foreach ($inProgressTasks as $task){
		
			if($i == 5)
				break;
			$taskName = $task['Taskflow']['name'];
			$taskName = (strlen($taskName) > 30) ? substr($taskName,0,27).'...' : $taskName;
			
			$doneRelObject 	 = $task["TaskflowInstance"]["rel_object_type"];
			$doneRelObjectId = $task["TaskflowInstance"]["rel_object"];
			
			App::import('Model',$doneRelObject);
			$modelMonitorObject =& new $doneRelObject();
			
			$relatedMonitorObject = $modelMonitorObject->find('all', array(
					'conditions' => array($doneRelObject .'.id' => $doneRelObjectId,
					),
			));
			
			if(!empty($relatedMonitorObject)) {
				$relatedObject = $relatedMonitorObject[0];
				$relObjectId =  $relatedObject[$doneRelObject]["id"];
				if($doneRelObject == "Account") {
					$relObjectName = $relatedObject[$doneRelObject]["firstname"] . ' ' . $relatedObject[$doneRelObject]["lastname"] ;
				}
				else {
					if($doneRelObject == "OrderPayment") {
						$relObjectName = $relatedObject[$doneRelObject]["docseq"];
			
					}
					else {
						$relObjectName = $relatedObject[$doneRelObject]["name"];
			
					}
				}			
			}
					
			$result .= '<li><a href="' . Router::url("/taskflowInstances/edit/") . $task['TaskflowInstance']['id'] .'">';
			$result .= '<span class="task">';
			$result .= '<span class="desc">' . $taskName . ' | ' . $relObjectName. '</span>';
			$result .= '<span class="percent">' .  $task['TaskflowInstance']['progress'] .'%</span></span>';
			$result .= '<span class="progress progress-striped progress-success">';
			$result .= '<span style="width: ' .  $task['TaskflowInstance']['progress'] .'%;" class="bar"></span>';
			$result .= '</span></a></li>';
						
			$i++;
		}
		
		$result .= '<li class="external"><a href="' . Router::url("/taskflowInstances/") . '">' . __('Ver todos los flujos de trabajo') . '<i class="m-icon-swapright"></i></a>';
		$result .= '</li></ul></li>';
		
		return($result);
	}
}
