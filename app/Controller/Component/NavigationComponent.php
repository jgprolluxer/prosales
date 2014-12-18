<?php
/**
 * NavigationComponent
 **
 *
 * @author  Rene Weber
 * @website http://www.webrene.com
 * @modified by Rene Weber, 23.04.2012
 * @version 1.0
 * @cakephp 1.3
 *
 **
 * Purpose
 * ---------
 * Track your way and allow Backwards movement. 
 * The Idea is to create a trail of visited pages, allowing you always jump back.
 * This can help if a breadcrumb logical can not be used, since there is no clean hierachical structure 
 * with parent/child structure
 * I also played with referer variable, back button usage and javascript back but in the end the trac was 
 * always getting messed by functions / methods like save, edit, etc.
 * 
 * This Component/Helper pack will allow you to customize methods and controllers to be ignored and to 
 * display a nice, linked trail in the form of
 * Component ( index ) > Component ( view) > Component2 ( index ) >
 *
 *
 * What does it constis of
 * -------------------------
 * 1. NavigationComponent ( this file ) 
 *    The component constists of 4 Functions:
 *    - process: The main function to be called from appController: Stores current page, 
 *                                                                                                                                    handles clicks on links, 
 *                                                                                                                                    keeps trail short
 *    - storeTrail : Stroes current trail to session ussing $sessionVarName
 *        - walkBack   : If a Link was clicked in our trail, remove all visited pages behind this link
 *                                 This only happens for links passing $navpointUrl and the index.
 *                                     See corresponding NavigationHelper to created correct links 
 *    - shrinkTrail: Shift trail until it's length reaches $maxItems or the given length
 *    - cleanTrail: Call this on logout in order to remove trail variable
 *
 * 2. NavigationHelper
 *         Meant to create correct Links to jump back in time. These links also include the index in our trail
 *    and therefor the trail will be adjusted after clicking such a link.
 *
 *
 * Installation
 * ----------------
 *
 * 1. Add Component to app/controllers/components/
 * 2. Add Helper to app/views/helpers/
 * 3. Add Helper to AppController ( nessecary to use in layout) in app/app_controller.php:
 *
 *           var $helpers = array(...       , 'Navigation');
 *             --> If $helpers was not defined yet, you will have to add all used helpers like 'Html' etc.
 *
 * 4. Call 'process' in app_controller.php directly at the beginning of beforeFilter and set variable
 *
 *             $this->Navigation->Process( $this );
 *            $this->set('trail', $this->Navigation->trail );
 * 
 * 5. In your Layout or in your desired View, call the trail creator or only read the link:
 *
 *            $this->Navigation->printBacklinks( $trail, 8 )
 *            or
 *            echo $this->Html->link("Back", $this->Navigation->getBacklinkForView( $trail ) );
 *
 * 6. Possibly you want to enclose 'printBacklinks' into a div and adjust its hover and look.
 *    i.e.  
 *    <div class='crumb'>$this->Navigation->printBacklinks( $trail, 8 )</div>
 *    and
 *    .crumbs {    color: #999; }
 *        .crumbs a { color: #aaa;    font: 0.9em arial; }
 *    .crumbs a:hover { font-size: 1em; color: #000; font-weight: bold; }
 *
 *
 *
 *
 * @property Session $Session
 */
class NavigationComponent extends Component {

    /************************************** GLOBAL VARIABLES MAY BE ADJUSTED ***************************************/

	public $components = array('RequestHandler', 'Session');
    
        /**
     * Methods that shall not be stored. I.e. going from Index to View to Edit to Save 
     * forwarding you to View again, a back button should ignore the Edit but push you back to Index.
     */
    
    var $ignoreMethods     = array('findPriceList', 'display','viewTicket','viewPdf',
    		'feed','jsindex','delete','findUser','findContact','findTeam','addTeam',
    		'findAccount','findOpportunity','findQuote','findOrder','login','logout');
    var $ignoreControllers = array( 'CakeError','Aros','Acos','Acl','Pages');
    
       
    /**
     * Keyname to store session variable in
     */
    
       var $sessionVarName        = 'Navigation';
       
              
       /**
        * This is the key we will use in URL to pass the index to our component.
        * Default is 'navpoint' and MUST BE THE SAME IN HELPER!
        * i.e. http://myhost/posts/123?navpoint=3  -> Will jump to 3rd point and delete the rest behind
        */
        
       var $navpointUrl            = 'navpoint';
       
       
       
       /**
        *  Maximum entries in our trail variable. Default: 8
        */
       
       var $maxItems = 4;
       
       
       
       
       /******************************** END OF GLOBAL VARIABLES. DO NOT CHANGE BELOW ***********************************/
               
       
       
       /**
        *  Array holding the Trail we are Moving in
        */
       
       var $trail = array();
           
           
           
       
       /**
         * Write Trail to Session
        */ 
       
       function storeTrail(){               
       
           $this->Session->write( $this->sessionVarName, $this->trail );
                      
       }
   
       

       
       
       public function initialize(Controller $controller){
       	$this->controller = $controller;

       }
       
       /**
         * If a navigation click brought us here, let's clean all other items
         * This happens if we came here via helper. This can be parsed from the params.
         * e.g. /posts/view/1/navpoint/3  --> Navpoint = 3, clean everything behind
         * It will be next value behind navpoint
        */ 
        
       function walkBack( &$controller ){
           if( isset( $controller->params['url'][$this->navpointUrl] ) ){
           
               for ( $i=sizeof($this->trail); $i>$controller->params['url'][$this->navpointUrl]; $i-- ){
                   unset( $this->trail[$i] );                   
               }
               
           }           
       
       }
    
    
    
       function process( &$controller ) {
   
          
           $skipThis = 0;
           
           $controllerName     = $controller->name;
           
           
           
           /* Restore from Session if exists */           
           if( ( $sessionVar = $this->Session->read( $this->sessionVarName ) ) )               
               $this->trail = $sessionVar;
               
                            
           /* Check if one of our crumbs was clicked ( will be passed via URL ) */           
           $this->walkBack( $controller );
               
           
           /* Check if current Method is included in our Ignore List */    
           
           if( in_array( $controller->params['action'], $this->ignoreMethods ) )
               $skipThis = 1;
          
           /* Check if current Controller is included in our Ignore List */
           if( in_array( $controller->name, $this->ignoreControllers ) )
               $skipThis = 1;

            /* Ignore reload of same controller and same action */              
           if( sizeof( $this->trail ) > 0 ){
                   
           		 	$lastElement = $this->trail[sizeof( $this->trail ) -1 ];
	               if ( !empty( $lastElement['url'] ) && 
	                       $lastElement['url'] == $controller->params->url ) {
	                       $skipThis = 1;
	               }  
           }
           
           //debug($controller->params["NAV_DISPLAY"]);
           /* Add current Page to trail */
           if( $skipThis != 1 ) {
                $this->trail[] = array(  'url' =>    $controller->params->url,
     									'action'         => $controller->params['action'],
										'controller' => $controllerName,
                						'navDisplay' => $controller->params["NAV_DISPLAY"],
       				);
			
                //debug($this->trail);
           }
           
           /* Shorten Trail to maximum lenght */
           $this->shrinkTrail();
                       
           /* Store trail to session */    
           $this->storeTrail();
           
       }
       

        function shrinkTrail( $length=-1 ){
        
          if( $length == -1 ){
              $length = $this->maxItems;
          }
          
          while( sizeof( $this->trail ) > $length ){
              array_shift( $this->trail);
          }             
          
      }

      
       function cleanTrail() {
       
              $this->trail = array();
               $this->Session->delete( $this->sessionVarName );
       
       }
       

       
}