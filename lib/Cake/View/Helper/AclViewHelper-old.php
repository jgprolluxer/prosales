<?php

class AclViewHelper extends AppHelper {

    var $acos = array();
    var $helpers = array('Html');

    function __construct() {
        App::import('Component', 'Acl');
        App::import('Component', 'Session');
        App::import('Helper', 'Html');

        $collection = new ComponentCollection();
        $sesscollection = new ComponentCollection();
        $this->Acl = new AclComponent($collection);
        $controller = new Controller();
        $this->Acl->startup($controller);
        $this->Aco = $this->Acl->Aco;
        $view = new View();
        $this->Session = new SessionComponent($sesscollection);
        $this->Html = new HtmlHelper($view);
    }

    function link($name, $options = array(), $c = null, $d = null, $returnText = false, $cst_acl_chk = null) {
        $acoExists = true;
        $user = $this->Session->read('Auth.User');
        $acos = $this->Session->read('Auth.Acos');

        if (isset($options['controller']))
            $controller = $options['controller'];
        else
            $controller = $this->params['controller'];

        $action = $options['action'];
        $plugin = "";

        if ($cst_acl_chk != null) {
            $customACL = split(",", $cst_acl_chk);
            $plugin = $customACL[0];
            $controller = $customACL[1];
            $action = $customACL[2];
        }
        $controller = Inflector::camelize($controller);
        //print_r ($acos);
        //echo("<br><br>");
        //echo("<br>action=" . $action . " controller:" . $controller . " plugin:" . $plugin);

        if (!isset($acos[$controller][$action]) || $acos[$controller][$action] == "") {

            $controllerAco = $this->Acl->Aco->find('first', array('recursive' => 0, 'conditions' => array('alias' => $controller)));

            if ($cid = $controllerAco['Aco']['id']) {

                if ($plugin != 'null' && $plugin != null) {
                    $actionAco = $this->Acl->Aco->find('count', array('recursive' => 0, 'conditions' => array('parent_id' => $cid, 'alias' => $plugin)));
                } else {
                    $actionAco = $this->Acl->Aco->find('count', array('recursive' => 0, 'conditions' => array('parent_id' => $cid, 'alias' => $action)));
                }
                /* if($controller=="FullCalendar")
                  {
                  echo($controller . "===>");
                  print_r($actionAco);
                  echo("<br>");
                  } */
                if ($actionAco < 1)
                    $acoExists = false;
            } else
                $acoExists = false;

            //echo("ACL_CHECK.LINK=".$controller.DS.$action . "RES=" . $this->Acl->check(array('User'=> $user),$controller.DS.$action) . "<br>");
            //if(($acoExists && $this->Acl->check(array('User'=> $user),$controller.DS.$action)) || (!$acoExists))
            if ($acoExists && ($this->Acl->check(array('User' => $user), $controller . DS . $action) >= 1)) {
                $acos[$controller][$action] = true;
            } else {
                $acos[$controller][$action] = false;
            }
            $this->Session->write('Auth.Acos', $acos);
        }

        if ($acos[$controller][$action]) {
            /* if ($controller == 'FullCalendar')
              {
              echo("<br>");
              print_r($acos[$controller]);
              } */

            return($this->Html->link($name, $options, $c, $d));
        }
        if ($returnText)
            return $name;
        else
            return "";
    }

    function hasAccess($options = array()) {
        $acoExists = true;
        $user = $this->Session->read('Auth.User');
        $acos = $this->Session->read('Auth.Acos');

        if (isset($options['controller']))
            $controller = $options['controller'];
        else
            $controller = $this->params['controller'];

        $action = $options['action'];
        $plugin = "";

        $controller = Inflector::camelize($controller);

        if (!isset($acos[$controller][$action]) || $acos[$controller][$action] == "") {

            $controllerAco = $this->Acl->Aco->find('first', array('recursive' => 0, 'conditions' => array('alias' => $controller)));

            if ( isset($controllerAco['Aco']['id']) && $cid = $controllerAco['Aco']['id']) {

                if ($plugin != 'null' && $plugin != null) {
                    $actionAco = $this->Acl->Aco->find('count', array('recursive' => 0, 'conditions' => array('parent_id' => $cid, 'alias' => $plugin)));
                } else {
                    $actionAco = $this->Acl->Aco->find('count', array('recursive' => 0, 'conditions' => array('parent_id' => $cid, 'alias' => $action)));
                }
                if ($actionAco < 1)
                    $acoExists = false;
            } else
                $acoExists = false;
            if ($acoExists && ($this->Acl->check(array('User' => $user), $controller . DS . $action) >= 1)) {
                $acos[$controller][$action] = true;
            } else {
                $acos[$controller][$action] = false;
            }
            $this->Session->write('Auth.Acos', $acos);
        }

        if ($acos[$controller][$action]) {

            return TRUE;
        }
    }

}

?>