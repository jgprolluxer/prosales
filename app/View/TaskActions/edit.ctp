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
             <?php echo __('Configuracion de acciones de flujo de trabajo'); ?>
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
                <?php echo $this->Form->create('TaskAction', array(
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
				<h3 class="form-section"><?php echo __('Informacion de la accion'); ?></h3>	
				<div class="row-fluid">
                   <div class="span6 ">
  	                	<?php echo $this->Form->input('taskflow_name', array("readonly"=>"true","value"=>$task["Taskflow"]["name"],
		                	'label' => array('class' => 'control-label','text'=>__('Flujo de trabajo'))
		                )); ?>                                    
	                	<?php echo $this->Form->input('name', array(
		                	'label' => array('class' => 'control-label','text'=>__('Nombre'))
		                )); ?>  		                	                                            
                   </div>
                   <div class="span6 ">
	                	<?php echo $this->Form->input('task_name', array("readonly"=>"true","value"=>$task["Task"]["name"],
		                	'label' => array('class' => 'control-label','text'=>__('Tarea'))
		                )); ?>
						<input type="hidden" name="data[TaskAction][task_id]" value="<?php echo $task["Task"]["id"]; ?>" /> 			                	                 
	                   </div>
                </div>
		
				<?php $ctrls = (array_combine(array_keys($ctrlList), array_keys($ctrlList))); ?>
				<?php $models = (array_combine(App::objects('model'), App::objects('model'))); ?>
				<h3 class="form-section"><?php echo __('Comportamiento'); ?></h3>				
				<div class="row-fluid">
                   <div class="span12">
 	                	<?php echo $this->Form->input('text', array('class'=>'span6 m-wrap',
		                	'label' => array('class' => 'control-label','text'=>__('Nombre del control'))
		                )); ?>
 	                	<?php echo $this->Form->input('css', array('class'=>'span6 m-wrap',
		                	'label' => array('class' => 'control-label','text'=>__('Estilo CSS del control'))
		                )); ?>	                   		                                 
	                	<?php echo $this->Form->input('controller', array('type'=>'select', 'options'=>$ctrls, 'class'=>'span6 m-wrap',
		                	'label' => array('class' => 'control-label','text'=>__('Controlador'))
		                )); ?>  		                	                 
	                	<?php echo $this->Form->input('action', array(
		                	'label' => array('class' => 'control-label','text'=>__('Accion'))
		                )); ?> 
		            	<?php echo $this->Form->input('tip', array(
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
