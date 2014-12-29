<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-users fa-fw"></i><?php echo __('ADMIN_ACCOUNT_VIEW_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_ACCOUNT_VIEW_HEAD_TITLE_SMALL'); ?></small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- END Forms General Header -->
<!-- Normal Form Block -->
<div class="block">
    <!-- Normal Form Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('ADMIN_ACCOUNT_VIEW_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- Account Assist Content -->
        <?php
        echo $this->Form->create('Account', array(
            'onsubmit' => 'return false;',//////NOT SAVE READ ONLY
            'class' => 'form-horizontal',
            'type' => 'file',
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'between' => '<div class="col-md-8">',
                'after' => '</div>',
                'error' => array(
                    'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                ),
        )));
        ?>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_ID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('firstname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_FIRSTNAME')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('lastname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_LASTNAME')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('alias', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_ALIAS')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('sex', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_SEX')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('birthdate', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_BIRTHDATE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('team_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_TEAM')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('mode', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_MODE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('type', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_ACCOUNT_VIEW_FORM_FIELD_TYPE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
            	<?php
            	echo $this->AclView->link(  __('ADMIN_ACCOUNT_VIEW_BLOCK_CONTENT_BTN_GO_EDIT'),
            		array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'edit', $this->request->data['Account']['id']),
            		array('escape' => false, 'class' => array('btn btn-warning')));
            		?>
            </div>
        </div>
    </div>
    <p class="text-muted"><?php echo __('ADMIN_ACCOUNT_VIEW_BLOCK_CONTENT_FOOTER'); ?></p>
</div>
<!-- END Normal Form Block -->
