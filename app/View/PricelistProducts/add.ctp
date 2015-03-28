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
        <?php echo $this->MenuBuilder->build('menu-header-pos');?>
    </div>
</div>
<!-- END eCommerce Order View Header -->
<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- Normal Form Block -->
<div class="block">
    <!-- Normal Form Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('Agregar producto a lista de precios, definicion');?></h2>
    </div>
    <!-- END Normal Form Title -->
    <div class="block-content">
        <!-- User Assist Content -->
        <?php
        echo $this->Form->create('PricelistProduct', array(
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
            echo $this->Form->input('pricelist_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('PricelistID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'readonly' => 'readonly',
                'value' => $pricelists["Pricelist"]["id"]
            ));
            ?>
            <?php
            echo $this->Form->input('pricelistname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Lista de precios')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly',
                'value' => $pricelists["Pricelist"]["name"]
            ));
            ?>
            <?php
            echo $this->Form->input('product_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Producto')),
                'class' => 'form-control',
                'type' => 'select',
                'options' => $products
            ));
            ?>
            <?php
            echo $this->Form->input('unit_price', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Precio unitario')),
                'class' => 'form-control',
                'type' => 'number'
            ));
            ?>
            <?php
            echo $this->Form->input('tax', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('% Impuesto')),
                'class' => 'form-control',
                'type' => 'number'
            ));
            ?>
         </div>
         <div class="col-md-6">
            <?php
            echo $this->Form->input('startdt', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Fecha de inicio')),
                'class' => 'form-control',
                'type' => 'date'
            ));
            ?>
            <?php
            echo $this->Form->input('enddt', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Fecha de fin')),
                'class' => 'form-control',
                'type' => 'date'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info" ><?php echo __('Guardar'); ?></button>
            </div>
        </div>
        </form>
        <!-- END User Assist Content -->
    </div>
    <p class="text-muted"><?php echo __('Recuerde revisar todos los campos');?></p>
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