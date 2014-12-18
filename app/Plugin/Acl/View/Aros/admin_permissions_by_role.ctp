<?php
echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');

echo $this->element('design/header');
?>

<?php
echo $this->element('Aros/links');
?>

<div class="separator"></div>

<div>
    <div class="row-fluid">
        <div class="span8">
            <form action="/admin/acl/aros/copy_role_permissions" class="form-horizontal" method="post">		
                <div class="control-group">

                    <?php
                    echo $this->Form->input('roleCopyFrom', array('class' => 'span6 m-wrap', 'type' => 'select', 'options' => $allroles,
                        'label' => array('class' => 'control-label', 'text' => __('Copiar permisos desde:  ')),
                        'after' => '&nbsp;<button type="submit" class="btn blue" onclick="return confirm(\'Estas seguro?, Esta operación sobreescribira todos los permisos del grupo actual por los del grupo seleccionado!!\')">Copiar!</button>'
                    ));
                    ?>
                    <input type="hidden" name="data[roleCopyTo]" value="<?php echo $roles[0]["Group"]["id"]; ?>" />
                    <input type="hidden" name="data[currentRole]" value="<?php echo $roles[0]["Group"]["name"]; ?>" />

                </div>
            </form>		
        </div>
        <div class="span4">
            <div style="float:right">
                <form action="<?php echo Router::url($this->here, false); ?>">
                    <label>Buscar: 
                        <input type="text" name="roleFilter" class="m-wrap medium" value="<?php echo $currRoleFilter; ?>">
                    </label>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable" id="sample_1" aria-describedby="sample_1_info">
        <thead>
            <tr role="row">
                <th role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" class="sorting_disabled" colspan="1" aria-label="Id">Control / Acción</th>
                <th role="columnheader" class="sorting_disabled" rowspan="1" colspan="1" tabindex="0">Acciones</th></tr>
        </thead>						
        <tbody role="alert" aria-live="polite" aria-relevant="all">

            <?php
            $column_count = 2;
            $previous_ctrl_name = '';
            $i = 0;

            if (isset($actions['app']) && is_array($actions['app'])) {

                foreach ($actions['app'] as $controller_name => $ctrl_infos) {
                    if ($previous_ctrl_name != $controller_name) {
                        $previous_ctrl_name = $controller_name;

                        $color = ($i % 2 == 0) ? 'color1' : 'color2';
                    }

                    foreach ($ctrl_infos as $ctrl_info) {
                        echo '<tr>';

                        echo '<td>' . $controller_name . '->' . $ctrl_info['name'] . '</td>';

                        foreach ($roles as $role) {
                            echo '<td>';
                            echo '<span id="right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';

                            if (isset($ctrl_info['permissions'][$role[$role_model_name][$role_pk_name]])) {
                                if ($ctrl_info['permissions'][$role[$role_model_name][$role_pk_name]] == 1) {
                                    $this->Js->buffer('register_role_toggle_right(true, "' . $this->Html->url('/') . '", "right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '", "' . $role[$role_model_name][$role_pk_name] . '", "", "' . $controller_name . '", "' . $ctrl_info['name'] . '")');

                                    echo $this->Html->image('/acl/img/design/tick.png', array('class' => 'pointer'));
                                } else {
                                    $this->Js->buffer('register_role_toggle_right(false, "' . $this->Html->url('/') . '", "right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '", "' . $role[$role_model_name][$role_pk_name] . '", "", "' . $controller_name . '", "' . $ctrl_info['name'] . '")');

                                    echo $this->Html->image('/acl/img/design/cross.png', array('class' => 'pointer'));
                                }
                            } else {
                                /*
                                 * The right of the action for the role is unknown
                                 */
                                echo $this->Html->image('/acl/img/design/important16.png', array('title' => __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.')));
                            }

                            echo '</span>';

                            echo ' ';
                            echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $role[$role_model_name][$role_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '_spinner', 'style' => 'display:none;'));

                            echo '</td>';
                        }

                        echo '</tr>
		    	';
                    }

                    $i++;
                }
            }
            ?>
            <?php
            if (isset($actions['plugin']) && is_array($actions['plugin'])) {

                foreach ($actions['plugin'] as $plugin_name => $plugin_ctrler_infos) {

                    echo '<tr class="title"><td style="background-color:#888888;color:#ffffff;" colspan="' . $column_count . '">' . __d('acl', 'Plugin') . ' ' . $plugin_name . '</td></tr>';

                    $i = 0;
                    foreach ($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods) {
                        //debug($plugin_ctrler_name);
                        //echo '<tr style="background-color:#888888;color:#ffffff;"><td colspan="' . $column_count . '">' . $plugin_ctrler_name . '</td></tr>';

                        if ($previous_ctrl_name != $plugin_ctrler_name) {
                            $previous_ctrl_name = $plugin_ctrler_name;

                            $color = ($i % 2 == 0) ? 'color1' : 'color2';
                        }


                        foreach ($plugin_methods as $method) {
                            echo '<tr>';

                            echo '<td>' . $plugin_ctrler_name . '->' . $method['name'] . '</td>';
                            //debug($method['name']);

                            foreach ($roles as $role) {
                                echo '<td>';
                                echo '<span id="right_' . $plugin_name . '_' . $role[$role_model_name][$role_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';

                                //if (isset($ctrl_info['permissions'][$role[$role_model_name][$role_pk_name]])) {
                                if (isset($method['permissions'][$role[$role_model_name][$role_pk_name]])) {
                                    if ($method['permissions'][$role[$role_model_name][$role_pk_name]] == 1) {
                                        //echo '<td>' . $this->Html->link($this->Html->image('/acl/img/design/tick.png'), '/admin/acl/aros/deny_role_permission/' . $role[$role_model_name][$role_pk_name] . '/plugin:' . $plugin_name . '/controller:' . $plugin_ctrler_name . '/action:' . $method['name'], array('escape' => false)) . '</td>';

                                        $this->Js->buffer('register_role_toggle_right(true, "' . $this->Html->url('/') . '", "right_' . $plugin_name . '_' . $role[$role_model_name][$role_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '", "' . $role[$role_model_name][$role_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . $method['name'] . '")');

                                        echo $this->Html->image('/acl/img/design/tick.png', array('class' => 'pointer'));
                                    } else {
                                        //echo '<td>' . $this->Html->link($this->Html->image('/acl/img/design/cross.png'), '/admin/acl/aros/grant_role_permission/' . $role[$role_model_name][$role_pk_name] . '/plugin:' . $plugin_name .'/controller:' . $plugin_ctrler_name . '/action:' . $method['name'], array('escape' => false)) . '</td>';

                                        $this->Js->buffer('register_role_toggle_right(false, "' . $this->Html->url('/') . '", "right_' . $plugin_name . '_' . $role[$role_model_name][$role_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '", "' . $role[$role_model_name][$role_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . $method['name'] . '")');

                                        echo $this->Html->image('/acl/img/design/cross.png', array('class' => 'pointer'));
                                    }
                                } else {
                                    /*
                                     * The right of the action for the role is unknown
                                     */
                                    echo $this->Html->image('/acl/img/design/important16.png', array('title' => __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.')));
                                }

                                echo '</span>';

                                echo ' ';
                                echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right_' . $plugin_name . '_' . $role[$role_model_name][$role_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '_spinner', 'style' => 'display:none;'));

                                echo '</td>';
                            }

                            echo '</tr>
    	            ';
                        }

                        $i++;
                    }
                }
            }
            ?>
        </tbody>
    </table>

    <?php
    echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'Autorizado');
    echo '&nbsp;&nbsp;&nbsp;';
    echo $this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'Bloqueado');
    ?>

</div>

<div class="row-fluid">
    <div class="span6">
        <div class="dataTables_info" id="sample_1_info"></div>
    </div>
    <div class="span6">
        <div class="dataTables_paginate paging_bootstrap pagination">
            <ul>
                <?php
                $currentPageOrig = $currentPage;

                $currentPage = $currentPage + 1;

                $pageUrl = Router::url($this->here, true);

                $pageUrl = str_replace($currentPageOrig, "", $pageUrl);

                $pageUrl = $pageUrl . "/";

                //debug($totalPages);

                echo '<li class="prev' . ((1 == $currentPage) ? ' disabled"' : '"') . '><a href="' . ((1 == $currentPage) ? '#' : $pageUrl . ($currentPage - 2) . '?roleFilter=' . $currRoleFilter) . '">← </a></li>';

                if ($currentPage >= 3) {

                    $fst = ($currentPage - 2);

                    if (($currentPage + 2) > $totalPages) {
                        $fst = ($currentPage - (($totalPages > 5) ? 4 : ($totalPages - 1)));
                    }
                    for ($i = $fst; $i <= ($currentPage + 2); $i++) {

                        if ($i <= $totalPages) {
                            echo '<li' . (($i == $currentPage) ? ' class="active"' : '') . '><a href="' . $pageUrl . ($i - 1) . '?roleFilter=' . $currRoleFilter . '">' . $i . '</a></li>';
                        }
                    }
                } else {
                    for ($i = 1; $i <= (($totalPages > 5) ? 5 : $totalPages); $i++) {

                        echo '<li' . (($i == $currentPage) ? ' class="active"' : '') . '><a href="' . $pageUrl . ($i - 1) . '?roleFilter=' . $currRoleFilter . '">' . $i . '</a></li>';
                    }
                }

                echo '<li class="next' . (($totalPages == $currentPage) ? ' disabled"' : '"') . '><a href="' . (($totalPages == $currentPage) ? '#' : $pageUrl . ($currentPage) . '?roleFilter=' . $currRoleFilter) . '"> → </a></li>';
                ?>

            </ul>
        </div>
    </div>


<?php
echo $this->element('design/footer');
?>

    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('body').removeClass('page-loading');
            
            $('form').submit(function () {
                $(this).find("button[type='submit']").text('Copiando...');
                $(this).find("button[type='submit']").prop('disabled', true);
            });
        });
        
    </script>
