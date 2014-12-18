<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper
{

    var $helpers = array('AclView', 'Jdialog', 'Form', 'Html');
    

    function drawMainMenu($config)
    {
        $menu = "";
        $menu = $menu . '<li>' . $this->AclView->link('<i class="gi gi-stopwatch sidebar-nav-icon"></i><span translate="MENU_DASHBOARD"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => false, 'controller' => 'Dashboards', 'action' => 'index'), 
                array('escape' => false)) . '</li>';
        
        $menu = $menu . '<li>' . $this->AclView->link('<i class="gi gi-stopwatch sidebar-nav-icon"></i><span translate="MENU_POS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => false, 'controller' => 'Orders', 'action' => 'pos'), 
                array('escape' => false)) . '</li>';

        $submenu = "";
        $submenu = "<ul class='sub'>";
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-file sidebar-nav-icon"></i><span translate="SUBMENU_ACCOUNTS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Accounts', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-file sidebar-nav-icon"></i><span translate="SUBMENU_STORES"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Stores', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-file sidebar-nav-icon"></i><span translate="SUBMENU_TEAMS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Teams', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-file sidebar-nav-icon"></i><span translate="SUBMENU_WORKAREAS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Workareas', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-file sidebar-nav-icon"></i><span translate="SUBMENU_WORSTATIONS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Workstations', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        
        $submenu = $submenu . "</ul>";
        $bhasAccess = FALSE;
        if ( $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Stores', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Accounts', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Teams', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Workareas', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Workstations', 'action' => 'index'))
        )
        {
            $bhasAccess = TRUE;
        }
        if ($bhasAccess)
        {
            $menu = $menu . '<li id="menu_administration">'
                . $this->Html->link('<i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-wallet sidebar-nav-icon"></i><span translate="MENU_ADMINISTRATION"></span>', 'javascript:;', 
                        array('escape' => false, 'id' => 'menu_administration', 'class' => 'sidebar-nav-menu')) . $submenu . '</li>';
        }

        $submenu = "";
        $submenu = "<ul class='sub'>";
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-list sidebar-nav-icon"></i><span translate="SUBMENU_LOVS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Lovs', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-global sidebar-nav-icon"></i><span translate="SUBMENU_CONFIGS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Configs', 'action' => 'edit', 1), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-group sidebar-nav-icon"></i><span translate="SUBMENU_GROUPS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Groups', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        $submenu = $submenu . '<li>' . $this->AclView->link('<i class="gi gi-user sidebar-nav-icon"></i><span translate="SUBMENU_USERS"></span>', 
                array('plugin' => null, 'prefix' => null, 'admin' => true, 'controller' => 'Users', 'action' => 'index'), 
                array('escape' => false), null, false) . '</li>';
        if ($this->AclView->hasAccess(array('controller' => 'acos', 'action' => 'admin_index')))
        {
            $submenu = $submenu . '<li>' . $this->Html->link('<i class="gi gi-roundabout sidebar-nav-icon"></i><span translate="SUBMENU_ACLS"></span>', array('plugin' => null, 'prefix' => null, 'admin' => false, 'controller' => 'admin', 'action' => 'acl'), array('escape' => false), null, false) . '</li>';
        }
        $submenu = $submenu . "</ul>";
        
        $bhasAccess = FALSE;
        if ( $this->AclView->hasAccess(array('controller' => 'Lovs', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Configs', 'action' => 'edit'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Groups', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Groups', 'action' => 'index'))
                || $this->AclView->hasAccess(array('admin' => true, 'controller' => 'Users', 'action' => 'index'))
        )
        {
            $bhasAccess = TRUE;
        }
        if ($bhasAccess)
        {
            $menu = $menu . '<li id="menu_configuration">' . $this->Html->link('<i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-settings sidebar-nav-icon"></i><span translate="MENU_CONFIGURATION"></span>', 'javascript:;', 
                        array('escape' => false, 'id' => 'link_sells', 'class' => 'sidebar-nav-menu')) . $submenu . '</li>';
        }
        
        return($menu);
    }

    function loadingModal()
    {
        $modal = '';
        $modal .= '<!-- Regular Modal -->';
        $modal .= '<div id="modal-loading" class="modal text-center" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">';
        $modal .= '<i class="fa fa-spinner fa-spin fa-4x "></i>';
        //$modal .= '<i class="fa fa-asterisk fa-spin fa-4x text-info"></i>';
        $modal .= '</div>';
        $modal .= '<!-- END Regular Modal -->';
        return($modal);
    }

    function drawAssociateUserModal()
    {

        $modal = '';
        $modal .= '';
        $modal .= '<!-- asociateUserModal -->';
        $modal .= '<div id="asociateUserModal" class="modal animation-hatch" tabindex="-1" role="dialog" aria-hidden="true">';
        $modal .= '    <div class="modal-dialog">';
        $modal .= '        <div class="modal-content">';
        $modal .= '            <div class="modal-header">';
        $modal .= '                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        $modal .= '                <h3 class="modal-title">' . __('Usuarios') . '</h3>';
        $modal .= '            </div>';
        $modal .= '            <div class="modal-body">';
        $modal .= $this->_View->element("Dialogs/user_list");
        $modal .= '            </div>';
        $modal .= '            <div class="modal-footer">';
        $modal .= '                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>';
        $modal .= '            </div>';
        $modal .= '        </div>';
        $modal .= '    </div>';
        $modal .= '</div>';
        $modal .= '<!-- END asociateUserModal -->';
        return ($modal);
    }

    function no2word($numero)
    {
        $unidades = array(
            'un',
            'dos',
            'tres',
            'cuatro',
            'cinco',
            'seis',
            'siete',
            'ocho',
            'nueve',
            'diez',
            'once',
            'doce',
            'trece',
            'catorce',
            'quince',
            'dieciséis',
            'diecisiete',
            'dieciocho',
            'diecinueve',
            'veinte',
            'veintiuno',
            'veintidós',
            'veintitrés',
            'veinticuatro',
            'veinticinco',
            'veintiséis',
            'veintisiete',
            'veintiocho',
            'veintinueve');

        $decenas = array(
            'diez',
            'veinte',
            'treinta',
            'cuarenta',
            'cincuenta',
            'sesenta',
            'setenta',
            'ochenta',
            'noventa');

        $centenas = array(
            'ciento',
            'doscientos',
            'trescientos',
            'cuatrocientos',
            'quinientos',
            'seiscientos',
            'setecientos',
            'ochocientos',
            'novecientos');

        // Ac� iremos construyendo el n�mero en palabras.
        $palabras = "";

        if ($numero == 0)
        {
            return "cero";
        }
        if ($numero < 0)
        {
            $palabras = "menos";
            $numero = abs($numero);
        }

        $numero_str = $numero;

        while (strlen($numero_str) % 3 != 0)
        {
            $numero_str = "0" . $numero_str;
        }

        $grupos_centenas = str_split($numero_str, 3);
        $num_grupos = count($grupos_centenas);

        foreach ($grupos_centenas as $i)
        {
            $i_num = (int) $i;
            $cent = floor($i_num / 100);
            if ($i_num >= 100)
            {
                // Determinamos las centenas
                // Excepci�n: Si el n�mero 100 va
                // solo, sin decenas ni unidades, es
                // "cien". Si no, es "ciento" (lo que
                // est� en el array).
                if ($i_num == 100)
                {
                    $palabras = $palabras . " cien";
                } else
                {
                    $palabras = $palabras . " " . $centenas[$cent - 1];
                }
            }
            // Ahora las decenas y unidades
            $i_num = $i_num - $cent * 100;
            if ($i_num < 30 && $i_num > 0)
            {
                $palabras = $palabras . " " . $unidades[$i_num - 1];
            } else
            {
                $dec = floor($i_num / 10);
                $i_num = $i_num - $dec * 10;

                if ($dec > 0)
                {
                    $palabras = $palabras . " " . $decenas[$dec - 1];
                }
                if ($i_num > 0)
                {
                    $palabras = $palabras . " y " . $unidades[$i_num - 1];
                }
            }

            // Finalmente, para cada grupo hay que
            // agregar el orden de magnitud correspondiente
            // (miles, mill�n/millones... creo que por ahora
            // basta con eso).

            switch ($num_grupos)
            {
                case 2:
                    // Miles
                    $palabras = $palabras . " mil";
                    break;

                case 3:
                    // Millones
                    if ((int) $i == 1)
                    {
                        $palabras = $palabras . " millón";
                    } else
                    {
                        $palabras = $palabras . " millones";
                    }
                    break;

                case 4:
                    // Miles de millones
                    $palabras = $palabras . " mil";
                    break;

                case 5:
                    // Billones
                    if ((int) $i == 1)
                    {
                        $palabras = $palabras . " billón";
                    } else
                    {
                        $palabras = $palabras . " billones";
                    }
                    break;
            }
            $num_grupos--;
        }

        return ltrim($palabras);
    }

}
