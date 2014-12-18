<?php 
class DocumentsHelper extends FormHelper
{
	public $helpers = array('Form'); 

    function displayDocuments() { 
		$documents = "";
    
		$documents = $documents . '<style>
		  #feedback { font-size: 1.4em; }
		  #selectable .ui-selecting { background: #FECA40; }
		  #selectable .ui-selected { background: #F39814; color: white; }
		  #selectable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
		  #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
		  </style>
		  <script>
		  $(function() {
		    $( "#selectable" ).selectable();
		  });
		  </script>';
  
    
		$documents = $documents . '<ol id="selectable">
		  <li class="ui-widget-content">Item 1</li>
		  <li class="ui-widget-content">Item 2</li>
		  <li class="ui-widget-content">Item 3</li>
		  <li class="ui-widget-content">Item 4</li>
		  <li class="ui-widget-content">Item 5</li>
		  <li class="ui-widget-content">Item 6</li>
		  <li class="ui-widget-content">Item 7</li>
		</ol>';
    
        return $this->output($documents); 
    } 


}
?>