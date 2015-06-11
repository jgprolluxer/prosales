<!-- Interactive Block -->
<div class="block">
    <!-- Interactive Title -->
    <div class="block-title">
        <h2>Domicilio</h2>
    </div>
    <!-- END Interactive Title -->

    <!-- Interactive Content -->
    <!-- The content you will put inside div.block-content, will be toggled -->
    <div class="block-content">
        <?php
        echo $this->Form->create('Address', array(
            'class' => 'form-horizontal',
            'id' => 'addressForm',
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
        <?php
        echo $this->Form->input('account_id', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Account_ID')),
                'class' => 'form-control',
                'type' => 'hidden',
                'value' => $relObjId
            ));
        ?>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('street', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Calle')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('street_no', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Número')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('suburb', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Colonia')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('city', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Ciudad')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('state', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Estado')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('zip', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Código Postal')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('country', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('País')),
                'class' => 'form-control',
                'type' => 'text'
            ));
            ?>
            <?php
            echo $this->Form->input('billing', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Dirección de Facturación')),
                'class' => 'form-control',
                'type' => 'checkbox'
            ));
            ?>
            <?php
            echo $this->Form->input('delivery', array(
                'label' => array('class' => 'col-md-4 control-label', 'text' => __('Dirección de Entrega')),
                'class' => 'form-control',
                'type' => 'checkbox'
            ));
            ?>
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <a href="" class="btn btn-success" data-dismiss="modal" id="saveAddress"><?php echo __('ACCOUNT_ADD_FORM_BTN_SAVE'); ?></a>
                <!--<a href="javascript:saveAddress();" class="btn btn-success" data-dismiss="modal"></a>-->
                <!-- <a href="javascript:;" class="btn btn-info"><?php //echo __('Buscar'); ?></a> -->
            </div>
        </div>
    </div>
</div>