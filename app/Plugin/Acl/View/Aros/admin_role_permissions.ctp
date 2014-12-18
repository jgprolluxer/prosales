<?php
//echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');

echo $this->element('design/header');
?>

<?php
echo $this->element('Aros/links');
?>

<div class="separator"></div>

<div>

    <?php
    echo $this->Html->link($this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'Clear permissions table'), '/admin/acl/aros/empty_permissions', array('confirm' => __d('acl', 'Are you sure you want to delete all roles and users permissions ?'), 'escape' => false));
    ?>


</div>

<div class="separator"></div>

<table cellspacing="0">

    <tr>
        <th></th>
        <th><?php echo __d('acl', 'grant access to <em>all actions</em>'); ?></th>
        <th><?php echo __d('acl', 'deny access to <em>all actions</em>'); ?></th>
    </tr>

    <?php
    $i = 0;
    foreach ($roles as $role) {
        $color = ($i % 2 == 0) ? 'color1' : 'color2';
        echo '<tr class="' . $color . '">';
        echo '  <td>' . $this->Html->link($role[$role_model_name][$role_display_field], '/admin/acl/aros/permissions_by_role/' . $role[$role_model_name][$role_display_field] . '/', array('id' => 'linkToPermissionsByRole', 'escape' => false, $role[$role_model_name][$role_display_field])) . '</td>';

        echo '  <td style="text-align:center">' . $this->Html->link($this->Html->image('/acl/img/design/tick.png'), '/admin/acl/aros/grant_all_controllers/' . $role[$role_model_name][$role_pk_name], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to grant access to all actions of each controller to the role '%s' ?"), $role[$role_model_name][$role_display_field]))) . '</td>';
        echo '  <td style="text-align:center">' . $this->Html->link($this->Html->image('/acl/img/design/cross.png'), '/admin/acl/aros/deny_all_controllers/' . $role[$role_model_name][$role_pk_name], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to deny access to all actions of each controller to the role '%s' ?"), $role[$role_model_name][$role_display_field]))) . '</td>';
        echo '<tr>';

        $i++;
    }
    ?>
</table>

<div class="separator"></div>

<?php
echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'authorized');
echo '&nbsp;&nbsp;&nbsp;';
echo $this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'blocked');
?>


<?php
echo $this->element('design/footer');
?>