<!-- BEGIN PAGE CONTENT-->
<div class="msgArea">
    <?php echo $this->Session->flash('plugin_acl'); ?>
</div>
<div class="row-fluid ">
    <div class="span12">
        <!-- BEGIN INLINE TABS PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <h4><i></i></i>Permisos</h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
                    <div class="span12">
                        <!--BEGIN TABS-->
                        <div class="tabbable tabbable-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab">Permisos</a></li>
                                <li class=""><a href="#tab_1_2" data-toggle="tab">Acciones</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div id="acos_link" class="acl_links">
                                        <?php
                                        $selected = isset($selected) ? $selected : $this->params['action'];

                                        $links = array();
                                        $links[] = $this->Html->link(__d('acl', 'Synchronize actions ACOs'), '/admin/acl/acos/synchronize', array(array('confirm' => __d('acl', 'are you sure ?')), 'class' => ($selected == 'admin_synchronize' ) ? 'selected' : null));
                                        $links[] = $this->Html->link(__d('acl', 'Clear actions ACOs'), '/admin/acl/acos/empty_acos', array(array('confirm' => __d('acl', 'are you sure ?')), 'class' => ($selected == 'admin_empty_acos' ) ? 'selected' : null));
                                        $links[] = $this->Html->link(__d('acl', 'Build actions ACOs'), '/admin/acl/acos/build_acl', array('class' => ($selected == 'admin_build_acl' ) ? 'selected' : null));
                                        $links[] = $this->Html->link(__d('acl', 'Prune actions ACOs'), '/admin/acl/acos/prune_acos', array(array('confirm' => __d('acl', 'are you sure ?')), 'class' => ($selected == 'admin_prune_acos' ) ? 'selected' : null));


                                        echo $this->Html->nestedList($links, array('class' => 'acl_links'));
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_1_2">
                                    <div id="aros_link" class="acl_links">
                                        <?php
                                        $selected = isset($selected) ? $selected : $this->params['action'];

                                        $links = array();
                                        $links[] = $this->Html->link(__d('acl', 'Build missing AROs'), '/admin/acl/aros/check', array('class' => ($selected == 'admin_check' ) ? 'selected' : null));
                                        $links[] = $this->Html->link(__d('acl', 'Users roles'), '/admin/acl/aros/users', array('class' => ($selected == 'admin_users' ) ? 'selected' : null));

                                        if (Configure :: read('acl.gui.roles_permissions.ajax') === true) {
                                            $links[] = $this->Html->link(__d('acl', 'Roles permissions'), '/admin/acl/aros/ajax_role_permissions', array('class' => ($selected == 'admin_role_permissions' || $selected == 'admin_ajax_role_permissions' ) ? 'selected' : null));
                                        } else {
                                            $links[] = $this->Html->link(__d('acl', 'Roles permissions'), '/admin/acl/aros/role_permissions', array('id' => 'linkToRolesPermissions', 'class' => ($selected == 'admin_role_permissions' || $selected == 'admin_ajax_role_permissions' ) ? 'selected' : null));
                                        }
                                        $links[] = $this->Html->link(__d('acl', 'Users permissions'), '/admin/acl/aros/user_permissions', array('class' => ($selected == 'admin_user_permissions' ) ? 'selected' : null));

                                        echo $this->Html->nestedList($links, array('class' => 'acl_links'));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>