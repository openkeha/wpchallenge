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
<div>
    <h2 style='text-align: center;'>
        Rejoignez vous aussi nos formations
    </h2>
    <a href='https://www.diginamic.fr' target='_blank'>
        <img src='https://www.digiteamchallenge.com/wp-content/themes/twentytwentyone/assets/images/Logo_Diginamic.png' alt='diginamic' style='display: block;margin: 2px auto;background: #fff;'/>
    </a>
</div>
<div id="mapid" style="height: 450px">
</div>
<?php
dynamic_sidebar('hc-map');
get_footer();
