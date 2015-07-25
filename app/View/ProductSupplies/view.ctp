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
    <?php echo $this->MenuBuilder->build('menu-header-pos');?>
</div>
<!-- END eCommerce Order View Header -->

<div class="block">
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
        </div>
        <h2><?php echo __('Definición del Ingrediente');?></h2>
    </div>
    <div class="block-content">
        <?php
        echo $this->Form->create('ProductSupply', array(
            'onsubmit' => 'return false;',
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
            echo $this->Form->input('productname', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Producto')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly',
                'value' => $products["Product"]["name"]
            ));
            ?>
            <?php
            echo $this->Form->input('uomqty', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Cantidad de Unidad de Medida')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('name', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Ingrediente')),
                'class' => 'form-control',
                'type' => 'text',
                'readonly' => 'readonly',
                'value' => $supplyName
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <?php
                echo $this->AclView->link(  __('Editar'),
                    array('plugin' => $this->params['plugin'], 'prefix' => null,
                        'admin' => $this->params['admin'], 'controller' => $this->params['controller'],
                            'action' => 'edit', $this->request->data['ProductSupply']['id']),
                    array('escape' => false, 'class' => array('btn btn-warning')));
                    ?>
            </div>
        </div>
    </div>
</div>

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