<?php
/*
Template Name: test
*/
get_header();

?>
<div class="container">
    <div class='row'>
        <?php
            dynamic_sidebar('hc-colab');
        ?>
    </div>
</div>
<?php
get_footer();