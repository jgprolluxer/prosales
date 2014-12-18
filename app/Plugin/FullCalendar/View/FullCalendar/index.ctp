<!-- BEGIN VIEW SPECIFIC CSS -->    
<!-- END VIEW SPECIFIC CSS -->    
<!-- BEGIN VIEW SPECIFIC JAVASCRIPTS -->   
<!-- END VIEW SPECIFIC JAVASCRIPTS --> 
<!-- BEGIN PAGE CONTAINER-->

<?php
	$resViewFlg = $_GET["resources"];
?>
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
			<h3 class="page-title">
				<?php echo __( (($resViewFlg == "true") ? 'Calendario x Recursos' : 'Mi Calendario') ); ?>				
				<small>Tu calendario de actividades y tareas</small>
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
        <?php echo $this->Form->create('Calendar', array(
		    'class' => 'form-horizontal',
		    'style' => 'margin:0px !important;',
		    'inputDefaults' => array(
		        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
		        'div' => array('class' => 'control-group'),
		        'label' => array('class' => 'control-label'),
		        'class' => 'span12 m-wrap',
		        'between' => '<div class="controls">',
		        'after' => '</div>',
		        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
		)));?>
		<?php if($resViewFlg == "true"): ?> 
		<div class="row-fluid">
	         <div class="span6"> 
	          	<?php echo $this->Form->input('team_id', array('type'=>'select', 'options'=> $userTeams,
	            	'label' => array('class' => 'control-label','text'=>__('Sucursal'))
	            )); ?>			                
	        </div>
	    </div>
	    <?php else: ?>
	    	<input id='CalendarTeamId' type='hidden' value='0'></input>
	    <?php endif; ?>		
    </form>
 	<div class="row-fluid">       
		<div class="portlet box blue calendar">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>Calendario</h4>
			</div>
			
			<div class="portlet-body light-grey">
				<div class="row-fluid">
					<?php if($resViewFlg == "true"): ?> 
					<div class="span2 responsive span12 fix-margin" data-tablet="span12 fix-margin" data-desktop="span">
						<!-- BEGIN DRAGGABLE EVENTS PORTLET-->		
						<h3 class="event-form-title">Actividades x asignar</h3>
						<div id="external-events">
							<hr>
							<div id="event_box">
							</div>
							<hr class="visible-phone">
						</div>
						<!-- END DRAGGABLE EVENTS PORTLET-->			
					</div>	
					<?php endif; ?>				
					<div class="<?php echo (($resViewFlg == "true") ? 'span10' : 'span12'); ?>">
						<div id="calendar" class="has-toolbar"></div>
					</div>
				</div>
				<!-- END CALENDAR PORTLET-->
			</div>
			
		</div>
	</div>
	<!-- END PAGE CONTENT-->
	<input id='calendarResViewFlg' type='hidden' value='<?php echo $_GET["resources"]; ?>'></input>
</div>
<script>
	 $(document).ready(function() {	
	
		$('#CalendarTeamId').change(function() {
			App.refreshCalendar();
		});	

	  });
</script>
