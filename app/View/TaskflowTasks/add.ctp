<!-- BEGIN VIEW SPECIFIC JAVASCRIPTS -->   
	<?php
		echo $this->Html->script("../assets/data-tables/jquery.dataTables.js");
		echo $this->Html->script("../assets/data-tables/DT_bootstrap.js");
	?>
<!-- END VIEW SPECIFIC JAVASCRIPTS --> 
		
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
          <h3 class="page-title">
             <?php echo __('Configuracion de tareas de flujo de trabajo'); ?>
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
                <h4>Editar Registro</h4>
                <div class="tools">
                   <a href="javascript:;" class="collapse"></a>
                </div>
             </div>
             <div class="portlet-body form">
                <!-- BEGIN FORM-->    			
                <?php echo $this->Form->create('TaskflowTask', array(
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
				<h3 class="form-section"><?php echo __('Informacion de la tarea'); ?></h3>	
				<div class="row-fluid">
                   <div class="span6 ">
	                	<?php echo $this->Form->input('taskflow_name', array("readonly"=>"true","value"=>$taskflow["Taskflow"]["name"],
		                	'label' => array('class' => 'control-label','text'=>__('Flujo de trabajo'))
		                )); ?>
						<input type="hidden" name="data[TaskflowTask][taskflow_id]" value="<?php echo $taskflow["Taskflow"]["id"]; ?>" /> 	                   
	                	<?php echo $this->Form->input('name', array(
		                	'label' => array('class' => 'control-label','text'=>__('Nombre'))
		                )); ?>  		                	                                            
                   </div>
                   <div class="span6 ">
		                <?php echo $this->Form->input('order', array(
		                	'label' => array('class' => 'control-label','text'=>__('Orden'))
		                )); ?>
		                <?php echo $this->Form->input('duration', array(
		                	'label' => array('class' => 'control-label','text'=>__('Duracion'))
		                )); ?>			                	                 
	                   </div>
                </div>
		
				<?php $ctrls = (array_combine(array_keys($ctrlList), array_keys($ctrlList))); ?>
				<?php $models = (array_combine(App::objects('model'), App::objects('model'))); ?>
				<h3 class="form-section"><?php echo __('Accion asociada'); ?></h3>				
				<div class="row-fluid">
                   <div class="span12">
	                	<?php echo $this->Form->input('controller', array('type'=>'select', 'options'=>$ctrls, 'class'=>'span6 m-wrap',
		                	'label' => array('class' => 'control-label','text'=>__('Controlador'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('action', array(
		                	'label' => array('class' => 'control-label','text'=>__('Accion'))
		                )); ?> 		                	                                            
                   </div>
                </div>
 				<h3 class="form-section"><?php echo __('Condicion de fin'); ?></h3>				
				<div class="row-fluid">
                   <div class="span12">
	                	<?php echo $this->Form->input('monitor_object', array('type'=>'select', 'options'=>$models, 'class'=>'span6 m-wrap',
		                	'label' => array('class' => 'control-label','text'=>__('Objeto a monitorear'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('end_condition', array(
		                	'label' => array('class' => 'control-label','text'=>__('Condiciones'))
		                )); ?> 		                	                                            
                   </div>
                </div>              
    			<h3 class="form-section"><?php echo __('Descripcion de la tarea'); ?></h3>	
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
