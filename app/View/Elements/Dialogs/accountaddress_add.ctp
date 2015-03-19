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
        <div class="col-md-10">
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
        </div>
        <div class="form-group form-actions">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-info"><?php echo __('ACCOUNT_ADD_FORM_BTN_SAVE'); ?></button>
            </div>
        </div>
    </div>
</div>
