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

<ul class="breadcrumb breadcrumb-top">
    <?php echo $this->Navigation->printBacklinks($trail, 10); ?>
</ul>
<!-- Normal Form Block -->
<div class="row">
    <!-- Widget -->
    <a href="/Orders" class="widget widget-hover-effect1">
        <div class="widget-simple">
            <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                <i class="gi gi-usd"></i>
            </div>
            <h3 class="widget-content text-right animation-pullDown">
                <strong>$</strong><br>
                <small>Ventas el día de hoy</small>
            </h3>
        </div>
    </a>
    <!-- END Widget -->
</div>