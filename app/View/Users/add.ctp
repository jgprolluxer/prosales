<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations footer-fixed');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
    <div class="header-section">
        <?php echo $this->MenuBuilder->build('menu-header-pos'); ?>
    </div>
</div>
<!-- END eCommerce Order View Header -->

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
        <h2><?php echo __('USER_ADD_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- Account Assist Content -->
        <?php
        echo $this->Form->create('User', array(
            'onsubmit' => '$("#modal-loading").modal("show");return true;',
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
            echo $this->Form->input('firstname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_FIRSTNAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('lastname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_LASTNAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('username', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_USERNAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('password', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_PASSWORD')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('email', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_EMAIL')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('workstation_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_WORKSTATION')),
                'class' => 'form-control',
                'options' => $workstations
            ));
            ?>
            <?php
            echo $this->Form->input('group_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('USER_ADD_FORM_FIELD_GROUP')),
                'class' => 'form-control',
                'options' => $groups
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('USER_ADD_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
    </div>
    <p class="text-muted"><?php echo __('USER_ADD_BLOCK_CONTENT_FOOTER'); ?></p>
</div>
<script type="text/javascript">
    /**
     *Prevent hit submit form
     */
    $(document).ready(function()
    {
        $(window).keydown(function(event)
        {
            if (event.keyCode == 13)
            {
                event.preventDefault();
                return false;
            }
        });
    });
</script>
