<script type="text/javascript">
$(document).ready(function ()
{
    //$('#page-container').removeClass('sidebar-visible-xs');
    //$('#page-container').removeClass('sidebar-visible-lg');

    $('#page-container').attr('class', 'sidebar-no-animations');
    $('header').hide();
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Search');
});
</script>

<!-- eCommerce Order View Header -->
<div class="content-header">
    <?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->
<!-- Normal Form Block -->
<div class="block">
    <!-- Normal Form Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('PRODUCT_EDIT_BLOCK_TITLE');?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('Product', array(
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
            echo $this->Form->input('name', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_NAME')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('type', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_TYPE')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('family_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_FAMILY')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $families
            ));
            ?>
            <?php
            echo $this->Form->input('uom', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_UOM')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('partnumber', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_PARTNUMBER')),
                'class' => 'form-control',
                'type' => 'number'
            ));
            ?>
         </div>
         <div class="col-md-6">
            <?php
            echo $this->Form->input('description', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_DESCRIPTION')),
                'class' => 'form-control',
                'type' => 'textarea'
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PRODUCT_EDIT_FORM_FIELD_STATUS')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $lovProductStatus
            ));
            ?>
            <div class="form-group">
                <div class="col-md-6">
                    <label><?php echo __('PRODUCT_EDIT_FORM_FIELD_STOCKCHECK'); ?></label>
                </div>
                <div class="col-md-6">
                    <label for="ProductStockcheck" class="switch switch-primary" data-toggle="tooltip" title="<?php echo __('PRODUCT_EDIT_FORM_FIELD_STOCKCHECK_TOOLTIP'); ?>" >
                            <input name="data[Product][stockcheck]" id="ProductStockcheck" <?php echo $this->request->data["Product"]["stockcheck"] ? 'checked' : ''; ?> class="" type="checkbox" />
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info" ><?php echo __('PRODUCT_EDIT_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('PRODUCT_EDIT_BLOCK_CONTENT_FOOTER');?></p>
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
