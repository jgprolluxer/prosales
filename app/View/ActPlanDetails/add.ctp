<!-- BEGIN VIEW SPECIFIC CSS -->    
	<?php
	?>
<!-- END VIEW SPECIFIC JAVASCRIPTS -->  
		
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
          <h3 class="page-title">
             <?php echo __('Actividades asociadas al plan'); ?>
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
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
       <div class="span12">
          <!-- BEGIN SAMPLE FORM PORTLET-->   
          <div class="portlet box blue">
             <div class="portlet-title">
                <h4>Agregar Registro</h4>
                <div class="tools">
                   <a href="javascript:;" class="collapse"></a>
                </div>
             </div>
             <div class="portlet-body form">
                <!-- BEGIN FORM-->    			
                <?php echo $this->Form->create('ActPlanDetail', array(
				    'class' => 'form-horizontal',
				    'type'=>'file',
				    'inputDefaults' => array(
				        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				        'div' => array('class' => 'control-group'),
				        'label' => array('class' => 'control-label'),
				        'class' => 'span12 m-wrap',
				        'between' => '<div class="controls">',
				        'after' => '</div>',
				        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
				))); ?>
				<h3 class="form-section"><?php echo __('Informacion de la actividad'); ?></h3>	
				<div class="row-fluid">
                   <div class="span6 ">
	                	<?php echo $this->Form->input('act_plan_name', array("readonly"=>"true","value"=>$actPlans["ActPlan"]["name"],
		                	'label' => array('class' => 'control-label','text'=>__('Plan de actividades'))
		                )); ?>
						<input type="hidden" name="data[ActPlanDetail][act_plan_id]" value="<?php echo $actPlans["ActPlan"]["id"]; ?>" /> 	                   
	                	<?php echo $this->Form->input('name', array(
		                	'label' => array('class' => 'control-label','text'=>__('Nombre'))
		                )); ?>  
		                <?php echo $this->Form->input('order', array(
		                	'label' => array('class' => 'control-label','text'=>__('Orden'))
		                )); ?>
		                <?php echo $this->Form->input('duration', array(
		                	'label' => array('class' => 'control-label','text'=>__('Duracion'))
		                )); ?>			                	                                            
                   </div>
                   <div class="span6 ">
	                	<?php echo $this->Form->input('type', array('type'=>'select', 'options'=> $actType, 'value'=>'Task',
		                	'label' => array('class' => 'control-label','text'=>__('Tipo'))
		                )); ?> 
		                <?php echo $this->Form->input('initial_status', array('type'=>'select', 'options'=> $actStatus, 'value'=>'Not started',
		                	'label' => array('class' => 'control-label','text'=>__('Estado inicial'))
		                )); ?>			                
		                 <?php echo $this->Form->input('step_name', array(
		                	'label' => array('class' => 'control-label','text'=>__('Nombre del paso'))
		                )); ?>			
		                <?php echo $this->Form->input('duration_uom', array('type'=>'select', 'options'=> $actDurUOM, 'value'=>'Hours',
		                	'label' => array('class' => 'control-label','text'=>__('Duracion UOM'))
		                )); ?>			                	                 
	                   </div>
                </div>

				<h3 class="form-section"><?php echo __('Eventos automaticos'); ?></h3>				
				<div class="row-fluid">
                   <div class="span6 ">
	                	<?php echo $this->Form->input('fieldname_001', array("readonly"=>"true","value"=>$actPlans["ActPlan"]["trigger_object"],
		                	'label' => array('class' => 'control-label','text'=>__('Objeto Relacionado'))
		                )); ?>  
	                	<?php echo $this->Form->input('fieldname_001', array('type'=>'select', 'options'=> $relObjFields,
		                	'label' => array('class' => 'control-label','text'=>__('Campo'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('fieldname_002', array('type'=>'select', 'options'=> $relObjFields,
		                	'label' => array('class' => 'control-label','text'=>__('Campo'))
		                )); ?> 
	                	<?php echo $this->Form->input('fieldname_003', array('type'=>'select', 'options'=> $relObjFields,
		                	'label' => array('class' => 'control-label','text'=>__('Campo'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('fieldname_004', array('type'=>'select', 'options'=> $relObjFields,
		                	'label' => array('class' => 'control-label','text'=>__('Campo'))
		                )); ?> 
	                	<?php echo $this->Form->input('fieldname_005', array('type'=>'select', 'options'=> $relObjFields,
		                	'label' => array('class' => 'control-label','text'=>__('Campo'))
		                )); ?> 		                	                                            
                   </div>
                   <div class="span6 ">
	 	                 <?php echo $this->Form->input('trigger_event', array('type'=>'select', 'options'=> $planEvent,
		                	'label' => array('class' => 'control-label','text'=>__('Evento actividad'))
		                )); ?>	                  
	                	<?php echo $this->Form->input('fieldvalue_001', array(
		                	'label' => array('class' => 'control-label','text'=>__('Valor'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('fieldvalue_002', array(
		                	'label' => array('class' => 'control-label','text'=>__('Valor'))
		                )); ?> 
	                	<?php echo $this->Form->input('fieldvalue_003', array(
		                	'label' => array('class' => 'control-label','text'=>__('Valor'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('fieldvalue_004', array(
		                	'label' => array('class' => 'control-label','text'=>__('Valor'))
		                )); ?> 
	                	<?php echo $this->Form->input('fieldvalue_005', array(
		                	'label' => array('class' => 'control-label','text'=>__('Valor'))
		                )); ?> 
	               </div>
                </div>
    			<h3 class="form-section"><?php echo __('Descripcion de la actividad'); ?></h3>	
				<div class="row-fluid">
                   <div class="span12 ">	                

	            	<?php echo $this->Form->input('description', array(
	                	'label' => array('class' => 'control-label','text'=>__('Descripcion'))
	                )); ?> 
   					</div>
                </div>
                   <div class="form-actions">
                      <button type="submit" class="btn blue"><?php echo __("Guardar"); ?></button>
                   </div>
                </form>
                <!-- END FORM-->           
             </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->
       </div>
    </div>    
</div>
