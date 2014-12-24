<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-bars fa-fw"></i><?php echo __('ADMIN_APPMENU_VIEW_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_APPMENU_VIEW_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_APPMENU_VIEW_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Appmenu', array(
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
            <h4><?php echo __('ADMIN_APPMENU_VIEW_BLOCK_CONTENT_CAT1'); ?></h4>
            <?php
            echo $this->Form->input('id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_ID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('parent_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_PARENT')),
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->request->data["ParentAppmenu"]["mname"],
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('ordershow', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_ORDERSHOW')),
                'class' => 'form-control',
                'type' => 'number',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('mkey', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_MKEY')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('type', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_TYPE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('mname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_MNAME')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('title', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_TITLE')),
                'class' => 'form-control',
                'type' => 'textarea',
                'readonly' => 'readonly'
            ));
            ?>		
        </div>
        <div class="col-md-6">
            <h4><?php echo __('ADMIN_APPMENU_VIEW_BLOCK_CONTENT_CAT2'); ?></h4>
            <?php
            echo $this->Form->input('admin', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_ADMIN')),
                'class' => 'form-control',
                'type' => 'checkbox',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('url', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_URL')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>            
            <?php
            echo $this->Form->input('controller', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_CONTROLLER')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('action', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_ACTION')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <h4><?php echo __('ADMIN_APPMENU_VIEW_BLOCK_CONTENT_CAT3'); ?></h4>
            <?php
            echo $this->Form->input('escapeTitle', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_ESCAPETITLE')),
                'class' => 'form-control',
                'type' => 'checkbox',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('linkClass', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_LINKCLASS')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>            
            <?php
            echo $this->Form->input('linkID', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_LINKID')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('linkDataToggle', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_LINKDATATOGGLE')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('liClass', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_LICLASS')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('parentUlClass', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_PARENTULCLASS')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
            <?php
            echo $this->Form->input('menuSeparator', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_VIEW_FORM_FIELD_MENUSEPARATOR')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
            	<?php
            	echo $this->AclView->link(  __('ADMIN_APPMENU_VIEW_BLOCK_CONTENT_BTN_GO_EDIT'),
            		array('plugin' => $this->params['plugin'], 'prefix' => null, 'admin' => $this->params['admin'], 'controller' => $this->params['controller'], 'action' => 'edit', $this->request->data['Appmenu']['id']),
            		array('escape' => false, 'class' => array('btn btn-warning')));
            		?>
            </div>
        </div>

        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('ADMIN_APPMENU_VIEW_BLOCK_CONTENT_FOOTER'); ?></p>
</div>
<!-- END Normal Form Block -->