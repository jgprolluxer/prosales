<!-- BEGIN VIEW SPECIFIC CSS -->    
	<?php
		echo $this->Html->css("../assets/bootstrap-daterangepicker/daterangepicker.css");		
		echo $this->Html->script("../assets/bootstrap-datepicker/js/bootstrap-datepicker.js");	
		echo $this->Html->css('../css/jquery.autocomplete.css');
		echo $this->Html->script("../assets/data-tables/jquery.dataTables.js");
		echo $this->Html->script("../assets/data-tables/DT_bootstrap.js");
	?>
<!-- END VIEW SPECIFIC JAVASCRIPTS -->  
		
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
          <h3 class="page-title">
             <?php echo __('Facturas'); ?>
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
                <?php echo $this->Form->create('Invoice', array(
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
				<h3 class="form-section"><?php echo __('Informacion de la Factura'); ?></h3>	
				<div class="row-fluid">
                   <div class="span6 ">
	                	<?php echo $this->Form->input('docnum', array(
		                	'label' => array('class' => 'control-label','text'=>__('Folio'))
		                )); ?>  		
	                	<?php echo $this->Form->input('type', array('type'=>'select', 'options'=> $invoiceType,
		                	'label' => array('class' => 'control-label','text'=>__('Tipo'))
		                )); ?>				              
	                	<?php echo $this->Form->input('account_name', array("readonly"=>"true","id"=>"account_name", "value"=>$accounts["name"],
		                	'label' => array('class' => 'control-label','text'=>__('Cuenta')),
		                	'after' => '<span></span></div>'
		                )); ?>  
		                <input type="hidden" name="data[Invoice][account_id]" id="account_id" value="<?php echo $accounts["id"]; ?>" />                                   	                              	 	  	                                           
	                	<?php if(empty($orders["id"])): ?>  
		                	<?php echo $this->Form->input('order_name', array("id"=>"order_name", 
			                	'label' => array('class' => 'control-label','text'=>__('Pedido')),
			                	'after' => '<span></span></div>'
			                )); ?> 
			            <?php else: ?>  	         
		                	<?php echo $this->Form->input('order_name', array("readonly"=>"true","id"=>"order_name", "value"=>$orders["name"], 
		                		'label' => array('class' => 'control-label','text'=>__('Pedido')),
		                		'after' => '<span></span></div>'
		              		  )); ?> 		            
			             <?php endif; ?>  	         
		                <input type="hidden" name="data[Invoice][order_id]" id="order_id" value="<?php echo (empty($orders["id"]) ? '':$orders["id"]); ?>" />  	                   
                   </div>
                   <div class="span6 ">    
		   		        <?php echo $this->Form->input('status', array('readonly'=>'true','type'=>'text', 'options'=> $invoiceStatus,'value'=>'Pendiente',
		                	'label' => array('class' => 'control-label','text'=>__('Estatus'))
		                )); ?>			                        
	 		            <?php echo $this->Form->input('invoice_date', array("readonly"=>"true",'type'=>'text','class'=>'m-wrap m-ctrl-medium date-picker',
	                		'label' => array('class' => 'control-label','text'=>__('Fecha de Factura'))
	                	)); ?>
	 		            <?php echo $this->Form->input('due_date', array("readonly"=>"true",'type'=>'text','class'=>'m-wrap m-ctrl-medium date-picker',
	                		'label' => array('class' => 'control-label','text'=>__('Fecha de Vencimiento'))
	                	)); ?>	                		                
                	</div>		                
  				</div>   			
				<h3 class="form-section"><?php echo __('Entradas'); ?></h3>	
		
				<div class="row-fluid">
					<?php 
						echo $this->element('DataTables/invoice_poentries');
					?>
				</div>   					        			              
    			<h3 class="form-section"><?php echo __('Totales'); ?></h3>	
				<div class="row-fluid">
                   <div class="span6 ">     
   	                	<?php echo $this->Form->input('price', array("readonly"=>"true","class"=>"span12 m-wrap currency", "type"=>"text",
		                	'label' => array('class' => 'control-label','text'=>__('Precio'))
		                )); ?>	                   		                                  
                   </div> 
                   <div class="span6 ">		                 
   	                	<?php echo $this->Form->input('subtotal_amt', array("readonly"=>"true","class"=>"span12 m-wrap currency", "type"=>"text",
		                	'label' => array('class' => 'control-label','text'=>__('Subtotal'))
		                )); ?>  		                		                                 
                   </div>                    
  				</div>
  				<div class="row-fluid">
                 	<div class="span6 "> 	  
   	                	<?php echo $this->Form->input('tax', array("value"=>(empty($orders["tax"]) ? '':$orders["tax"]),
		                	'label' => array('class' => 'control-label','text'=>__('% Impuestos'))
		                )); ?>    			                               	         
    	                <?php echo $this->Form->input('total_amt', array("readonly"=>"true","class"=>"span12 m-wrap currency", "type"=>"text",
		                	'label' => array('class' => 'control-label','text'=>__('Total'))
		                )); ?>        
		             </div>  
                 	<div class="span6 "> 
   	                	<?php echo $this->Form->input('tax_amt', array("readonly"=>"true","class"=>"span12 m-wrap currency", "type"=>"text",
		                	'label' => array('class' => 'control-label','text'=>__('Impuestos'))
		                )); ?>	    			                               	               
		             </div>  		             
		         </div>     		          						
                   <div class="form-actions">
                      <button type="submit" class="btn blue"><?php echo __('Guardar'); ?></button>
                   </div>
                   
                   <input type="hidden" id="submit_flg"/> 
                </form>
                <!-- END FORM-->           
             </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->
       </div>
    </div>    
</div>
<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-2" tabindex="0" style="display: none;"></ul>
<script type="text/javascript"> 
 jQuery(document).ready(function () {

 	
 	function updateQuoteInput() {
	 	if($('#account_id').val() =="") {
	 	
	 		$('#order_name').attr("placeholder","Por favor selecione una cuenta...");
	 		$('#order_name').attr("disabled",true);
	 	}
	 	else {
	 		$('#order_name').attr("placeholder","");
	 		$('#order_name').attr("disabled",false);	 	
	 	}		
 	}
 	
 	updateQuoteInput();
 	
	 var qualifyURL = function(pathOrURL) {
		   if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
			   
		     return baseAppPath + pathOrURL;
		   }
		   return pathOrURL;
		 };	
 
    jQuery( "#order_name" ).autocomplete({
	  messages: {
	        noResults: 'No se encontraron registros...',
	        results: function() {}
	  }, 
      source: function( request, response ) {
        $.ajax({      
          url: qualifyURL("/Orders/findOrder"),
          dataType: "json",
          data: {
          	'orderName': $( "#order_name" ).val(),
            'accountId': $( "#account_id" ).val(),
          },
          success: function( data ) {
          	$("#quote_name").addClass( "ui-autocomplete-loading" );
            response(data);
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
		var selectedObj = ui.item;
		if(selectedObj != null)
			$('#order_id').val(selectedObj.id);
		else
			$('#order_id').val('');
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      },
      change: function(event, ui) {
		var selectedObj = ui.item;
		if(selectedObj != null)
			$('#order_id').val(selectedObj.id);
		else
			$('#order_id').val('');
      },       
    }); 	
    
   	jQuery( "#account_name" ).autocomplete({
	  messages: {
	        noResults: 'No se encontraron registros...',
	        results: function() {}
	  },
      source: function( request, response ) {
        $.ajax({      
          url: qualifyURL("/Accounts/findAccount"),
          dataType: "json",
          data: {
            'accountName': $( "#account_name" ).val(),
          },
          success: function( data ) {
          	$("#account_name").addClass( "ui-autocomplete-loading" );
            response(data);
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
		var selectedObj = ui.item;
		if(selectedObj != null)
			$('#account_id').val(selectedObj.id);
		else
			$('#account_id').val('');
			updateQuoteInput();
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      },
      change: function(event, ui) {
		var selectedObj = ui.item;
		if(selectedObj != null) {
			$('#account_id').val(selectedObj.id);
		}
		else
			$('#account_id').val('');
			updateQuoteInput();
      },      
    });
 }); 
 </script>