<?php
/*
Template Name: test
*/
get_header();

?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <h1><?php the_title(); ?></h1>

    <?php the_content(); ?>

<?php endwhile; endif; ?>
<div class="container">
    <div class='row'>
        <?php
            dynamic_sidebar('hc-colab');
        ?>
    </div>
</div>
<?php
get_footer();