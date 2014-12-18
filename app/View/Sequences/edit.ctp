	
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
          <h3 class="page-title">
             <?php echo __('Secuencias'); ?>
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
                <?php echo $this->Form->create('Sequence', array(
				    'class' => 'form-horizontal',
				    'type'=>'file',
				    'inputDefaults' => array(
				        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				        'div' => array('class' => 'control-group'),
				        'label' => array('class' => 'control-label'),
				        'class' => 'span6 m-wrap',
				        'between' => '<div class="controls">',
				        'after' => '</div>',
				        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
				)));?>    
					<h3 class="form-section"><?php echo __('Informacion de la Secuencia'); ?></h3>					    
                	<?php echo $this->Form->input('name', array(
	                	'label' => array('class' => 'control-label','text'=>__('Nombre'))
	                )); ?>     
                	<?php echo $this->Form->input('value', array(
	                	'label' => array('class' => 'control-label','text'=>__('Valor Actual')),
	                )); ?>  	
                	<?php echo $this->Form->input('description', array('class' => 'span12 m-wrap',
	                	'label' => array('class' => 'control-label','text'=>__('Descripcion')),
	                )); ?>	                                	                       
                   <div class="form-actions">
                      <button type="submit" class="btn blue"><?php echo __('Guardar');?></button>
                   </div>
                </form>
                <!-- END FORM-->           
             </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->
       </div>
    </div>   
</div>