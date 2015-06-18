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
        <h2><?php echo __('STORE_ADD_BLOCK_TITLE');?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Store', array(
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
            echo $this->Form->input('owner_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_OWNER')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $owners,
                'value' => 0
            ));
            ?>
            <?php
            echo $this->Form->input('name', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_NAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('alias', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_ALIAS')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('pricelist_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_PRICELIST')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $pricelists
            ));
            ?>
            <?php
            echo $this->Form->input('billing_rfc', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_TAXNUMBER')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('billing_name', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_BILLNAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('STORE_ADD_FORM_FIELD_STATUS')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovStoreStatus,
                'value' => 0
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('STORE_ADD_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('STORE_ADD_BLOCK_CONTENT_FOOTER');?></p>
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
</script>