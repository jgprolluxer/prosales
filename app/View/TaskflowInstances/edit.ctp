<!-- BEGIN VIEW SPECIFIC JAVASCRIPTS & CSS -->    
	<?php
		echo $this->Html->css("../assets/bootstrap-daterangepicker/daterangepicker.css");		
		echo $this->Html->script("../assets/bootstrap-datepicker/js/bootstrap-datepicker.js");	
		echo $this->Html->css('../css/jquery.autocomplete.css');		
	?>
<!-- END VIEW SPECIFIC JAVASCRIPTS & CSS  -->  
		
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
          <h3 class="page-title">
             <?php echo __('Flujos de trabajo'); ?>
          </h3>
	          <ul class="breadcrumb">       
	             <li>
	                <i class="icon-home"></i>
	                <a href="#"></a> 
	             </li>
	             <?php echo $this->Navigation->printBacklinks( $trail, 4 ); ?>
	          </ul>
       </div>
    </div>
    <!-- END PAGE HEADER-->  
	<?php echo $this->Taskflow->getTaskFlowExecHeader($taskflow, $taskflowInstance, $relatedObject); ?>
</div>