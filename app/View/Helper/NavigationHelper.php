<?php

/**
 * NavigationHelper
 * *
 *
 * @author  Rene Weber
 * @website http://www.webrene.com
 * @modified by Rene Weber, 23.04.2012
 * @version 1.0
 * @cakephp 1.3
 *
 * *
 *
 * Purpose
 * ---------
 * Create Links for jumping back in trail and add Information for NavigationComponent to adjust its trail
 *
 *
 * Which files are needed? 
 * -------------------------
 * 1. NavigationHelper ( This file )
 *         Meant to create correct Links to jump back in time. These links also include the index in our trail
 *    and therefor the trail will be adjusted after clicking such a link.
 *    - printBackLinks:            Need trail variable and length
 *                                                    Will print length amount of the last visited pages with links in one row seperated
 *                                                    by $this->seperator ( see global variables )
 *        - getBacklinkForView:    Yes, this is a long function name. It will return only an URL to be used.
 *
 * 2. NavigationComponent 
 *    The component constists of 4 Functions:
 *    - process: The main function to be called from appController: Stores current page, 
 *                                                                                                                                    handles clicks on links, 
 *                                                                                                                                    keeps trail short
 *    - storeTrail : Stroes current trail to session ussing $sessionVarName
 *        - walkBack   : If a Link was clicked in our trail, remove all visited pages behind this link
 *                                 This only happens for links passing $navpointUrl and the index.
 *                                     See corresponding NavigationHelper to created correct links 
 *    - shrinkTrail: Shift trail until it's length reaches $maxItems or the given length
 *
 *
 *
 *
 * Installation
 * ----------------
 *
 * See Component!
 *
 * *
 * @author  Rene Weber
 * @website http://www.webrene.com
 * @modified by Rene Weber, 23.04.2012
 * @version 1.0
 * @cakephp 1.3
 *
 */
class NavigationHelper extends AppHelper {
    /*     * ************************************ GLOBAL VARIABLES MAY BE ADJUSTED ************************************** */

    /**
     * This array allows you to define aliases for printBackLinks function. Simple example: 
     * Without aliases:  Posts ( indexEditor ) > Messages( indexNoNews ) > ...
     * With aliases:         Posts ( Mine )              > Messages( Read )              >...
     */
    var $actionAliases = array(
        'indexSelection' => 'Type Selection',
        'indexGrouped' => 'Grouped',
        'indexEditor' => 'My Edits',
        'indexOldVersion' => 'Old Version',
        'index' => '<i class="hi hi-th-list"></i>',
        'add' => '<i class="gi gi-plus"></i>',
        'view' => '<i class="fa fa-eye fa-fw"></i>',
        'edit' => '<i class="gi gi-pencil"></i>',
    );

    /**
     * Seperator for function printBackLinks
     */
    var $seperator = '<span class="icon-angle-right"></span>';

    /**
     * This is the key we will use in URL to pass the index to our component.
     * Default is 'navpoint' and MUST BE THE SAME IN HELPER!
     * i.e. http://myhost/posts/123?navpoint=3  -> Will jump to 3rd point and delete the rest behind
     */
    var $navpointUrl = 'navpoint';


    /*     * ****************************** END OF GLOBAL VARIABLES. DO NOT CHANGE BELOW ********************************** */
    var $helpers = array('Html');
    var $controllerAliases = array(
        'Lovs' => 'Listas de valores',
        'Products' => 'Productos',
        'Groups' => 'Grupos',
        'Users' => 'Usuarios',
        'Dashboards' => 'Dashboard',
        'Activities' => 'Actividades',
        'FullCalendar' => 'Calendario',
        'Configs' => 'Parametros',
        'Reports' => 'Reportes',
        'Teams' => 'Equipo de venta',
    );

    function printBackLinks($trail, $count = 1) {


        for ($i = $count; $i > 0; $i--) {

            if (sizeof($trail) < $i)
                continue;

            if (empty($trail[sizeof($trail) - $i])) {
                continue;
            }
            $lastElement = $trail[sizeof($trail) - $i];

            $displayController = $lastElement['controller'];
            $displayAction = $lastElement['action'];

            if (isset($this->actionAliases[$lastElement['action']]))
                $displayAction = $this->actionAliases[$lastElement['action']];

            if (isset($this->controllerAliases[$lastElement['controller']]))
                $displayController = $this->controllerAliases[$lastElement['controller']];

            if (!empty($displayAction)) {

                if (!empty($lastElement['navDisplay'])) {
                    $displayAction = ' (' . $displayAction . $lastElement['navDisplay'] . ') ';
                } else {
                    $displayAction = ' (' . $displayAction . ')';
                }
            }
            $url = '/' . $lastElement['url'] . '?' . $this->navpointUrl . '=' . (sizeof($trail) - $i);
            echo "<li>";
            echo $this->Html->Link($displayController . $displayAction, $url, array('escape' => false, 'class'=>''));

            if ($i - 1 > 0)
                //echo "&nbsp;" . $this->seperator . "&nbsp;";
            echo "</li>";
        }
    }

    function getBacklinkForView($trail) {

        $url = '';

        if (isset($trail[sizeof($trail) - 2])) {
            $lastElement = $trail[sizeof($trail) - 2];

            $url = '/' . $lastElement['url'] . '?' . $this->navpointUrl . '=' . (sizeof($trail) - 2);
        }

        return $url;
    }

}

?>
