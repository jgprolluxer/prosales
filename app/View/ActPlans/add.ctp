<!-- BEGIN VIEW SPECIFIC CSS -->    
	<?php
	?>
<!-- END VIEW SPECIFIC JAVASCRIPTS -->  
		
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
          <h3 class="page-title">
             <?php echo __('Planes de actividad'); ?>
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
                <?php echo $this->Form->create('ActPlan', array(
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
				)));?>
				<h3 class="form-section"><?php echo __('Informacion del Plan'); ?></h3>	
				<div class="row-fluid">
                   <div class="span6 ">
	                	<?php echo $this->Form->input('name', array(
		                	'label' => array('class' => 'control-label','text'=>__('Nombre'))
		                )); ?>  
		                <?php echo $this->Form->input('trigger_object', array('type'=>'select', 'options'=> $planObj,
		                	'label' => array('class' => 'control-label','text'=>__('Objeto relacionado'))
		                )); ?>	                                            
                   </div>
                   <div class="span6 ">
	                	<?php echo $this->Form->input('type', array('type'=>'select', 'options'=> $planType,
		                	'label' => array('class' => 'control-label','text'=>__('Tipo'))
		                )); ?>
		                 <?php echo $this->Form->input('trigger_event', array('type'=>'select', 'options'=> $planEvent,
		                	'label' => array('class' => 'control-label','text'=>__('Evento relacionado'))
		                )); ?>	  
	                   </div>
                </div>
				<div class="row-fluid">
                   <div class="span12 ">                    
	            	<?php echo $this->Form->input('trigger_cond', array(
	                	'label' => array('class' => 'control-label','text'=>__('Condiciones del evento'))
	                )); ?>	
	            	<?php echo $this->Form->input('active_flg', array('checked'=>true,
	                	'label' => array('class' => 'control-label','text'=>__('Activo'))
	                )); ?>		                
    				<h3 class="form-section"><?php echo __('Descripcion del Plan'); ?></h3>	
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
