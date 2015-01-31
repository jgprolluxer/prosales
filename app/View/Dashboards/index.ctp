<!-- eCommerce Orders Header -->
<div class="content-header">
    <div class="header-section">
        <?php echo $this->MenuBuilder->build('menu-header-pos');?>
    </div>
</div>
<!-- END eCommerce Orders Header -->
<div class="jumbotron">
    <h2>hello!</h2>
</div>

<script type="text/javascript">
$(document).ready(function ()
{
        //$('#page-container').removeClass('sidebar-visible-xs');
        //$('#page-container').removeClass('sidebar-visible-lg');

        $('#page-container').attr('class', 'sidebar-no-animations');
        $('header').hide();
});
</script>