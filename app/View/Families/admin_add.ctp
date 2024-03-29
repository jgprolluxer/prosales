<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-bars fa-fw"></i><?php echo __('ADMIN_FAMILY_ADD_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_FAMILY_ADD_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_FAMILY_ADD_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Family', array(
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
            echo $this->Form->input('title', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_FAMILY_ADD_FORM_FIELD_TITLE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('description', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_FAMILY_ADD_FORM_FIELD_DESCRIPTION')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('color', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_FAMILY_ADD_FORM_FIELD_COLOR')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_FAMILY_ADD_FORM_FIELD_STATUS')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovFamilyStatus
            ));
            ?>
            <?php
            echo $this->Form->input('picture', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_FAMILY_ADD_FORM_FIELD_PICTURE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>		
        </div>

        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('ADMIN_FAMILY_ADD_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('ADMIN_FAMILY_ADD_BLOCK_CONTENT_FOOTER'); ?></p>
</div>
<!-- END Normal Form Block -->
<script type="text/javascript">
    /**
     *Prevent hit submit form
     */
    $(document).ready(function ()
    {
        $(window).keydown(function (event)
        {
            if (event.keyCode == 13)
            {
                event.preventDefault();
                return false;
            }
        });
    });


</script>