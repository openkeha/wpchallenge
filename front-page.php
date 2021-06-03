<?php
get_header();
?>
<div style="background: url('<?php echo get_template_directory_uri().'/assets/images/codage.jpg'; ?>'); background-size: cover; padding: 10px 2px;">
    <div class="container">
        
        <div class='row'>
            <?php
                dynamic_sidebar('hc-colab');
            ?>
        </div>
    </div>
</div>
<div id="mapid" style="height: 450px">
</div>
<?php
//dynamic_sidebar('hc-map');
get_footer();
