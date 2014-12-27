<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-bars fa-fw"></i><?php echo __('ADMIN_APPMENU_EDIT_HEAD_TITLE'); ?><br><small><?php echo __('ADMIN_APPMENU_EDIT_HEAD_TITLE_SMALL'); ?></small>
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
        <h2><?php echo __('ADMIN_APPMENU_EDIT_BLOCK_TITLE'); ?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Appmenu', array(
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
            <h4><?php echo __('ADMIN_APPMENU_EDIT_BLOCK_CONTENT_CAT1'); ?></h4>
            <?php
            echo $this->Form->input('id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_ID')),
                'class' => 'form-control',
                'type' => 'hidden'
            ));
            ?>
            <?php
            echo $this->Form->input('parent_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_PARENT')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $parentAppmenus
            ));
            ?>
            <?php
            echo $this->Form->input('ordershow', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_ORDERSHOW')),
                'class' => 'form-control',
                'type' => 'number'
            ));
            ?>
            <?php
            echo $this->Form->input('mkey', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_MKEY')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('type', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_TYPE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('mname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_MNAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('title', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_TITLE')),
                'class' => 'form-control',
                'type' => 'textarea'
            ));
            ?>		
        </div>
        <div class="col-md-6">
            <h4><?php echo __('ADMIN_APPMENU_EDIT_BLOCK_CONTENT_CAT2'); ?></h4>
            <?php
            echo $this->Form->input('admin', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_ADMIN')),
                'class' => 'form-control',
                'type' => 'checkbox'
            ));
            ?>
            <?php
            echo $this->Form->input('url', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_URL')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>            
            <?php
            echo $this->Form->input('controller', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_CONTROLLER')),
                'class' => 'form-control',
                'type' => 'select',
                'id' => 's_Controllers',
                'options' => $ctrllrs,
            ));
            ?>
            <?php
            echo $this->Form->input('action', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_ACTION')),
                'class' => 'form-control',
                'type' => 'select',
                'id' => 's_ControllerActions',
                'options' => $actions
            ));
            ?>
            <h4><?php echo __('ADMIN_APPMENU_EDIT_BLOCK_CONTENT_CAT3'); ?></h4>
            <?php
            echo $this->Form->input('escapeTitle', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_ESCAPETITLE')),
                'class' => 'form-control',
                'type' => 'checkbox'
            ));
            ?>
            <?php
            echo $this->Form->input('linkClass', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_LINKCLASS')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>            
            <?php
            echo $this->Form->input('linkID', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_LINKID')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('linkDataToggle', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_LINKDATATOGGLE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('liClass', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_LICLASS')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('parentUlClass', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_PARENTULCLASS')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('menuSeparator', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('ADMIN_APPMENU_EDIT_FORM_FIELD_MENUSEPARATOR')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
        </div>
        
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('ADMIN_APPMENU_EDIT_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('ADMIN_APPMENU_EDIT_BLOCK_CONTENT_FOOTER'); ?></p>
</div>
<!-- END Normal Form Block -->
<script type="text/javascript">
/**
*Prevent hit submit form
*/
$(document).ready(function()
{
  $(window).keydown(function(event)
  {
    if(event.keyCode == 13)
    {
      event.preventDefault();
      return false;
    }
  });
});    
    /**
     * 
     * @param {type} param
     */
    $(document).ready(function ()
    {
        /**
         * 
         * @returns {undefined}
         */
        var processControllerAction = function()
        {
            var sControllerActions = $('#s_ControllerActions');
            var url = qualifyURL("/<?php echo $this->params['controller']; ?>/getControllerActions/?controller=" + $('#s_Controllers').val());
            $.ajax({
                url: url,
                dataType: "json",
                success: function (data)
                {
                    if (data)
                    {
                        if (data["success"])
                        {
                            sControllerActions.empty();
                            $.each(data["xData"], function (index, value)
                            {
                                sControllerActions.append($("<option />").val(index).text(value));
                            });
                            sControllerActions.val(originalValue);
                        } else
                        {
                            alert(data["message"]);
                        }
                    }
                }, error: function (data)
                {
                    console.log('error');
                    console.log(data);
                }
            });
        }
        /**
         * 
         */
        $('#s_Controllers').change(function (e)
        {
            e.preventDefault();
            processControllerAction();
        });
    });
</script>