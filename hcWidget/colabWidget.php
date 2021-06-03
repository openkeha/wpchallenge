<?php
register_sidebar(array(
    'name' =>__('Les Challenges', 'twentytwentyone'),
    'description' => __('Emplacement pour ajouter les challenges!', 'twentytwentyone'),
    'id' => 'hc-colab',
    'before_widget' => '<div class="mycover"><div id="%1s" class="%2s container"',
    'after_widget' => '</div></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

class hc_colab_widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'hc_colab_widget',
            __('Challenges', 'twentytwentyone')
        );
    }

    public function widget($args, $instance)
    {
        ?><div class='col bg'>
			<?php
            echo '<h3 class="hc_title">'.
                nl2br(htmlspecialchars_decode(apply_filters('widget_title', $instance['name']))).
                '</h3>'.
                "<img src='".$instance['image_uri']."' style='max-width: 100%;'/>".
                '<div><p class="center">'.
                nl2br($instance['description']).
                '</p>
                <button class="btn btn-dark has-background btn-center"><a href='.$instance['link'].'>EN SAVOIR +</a></button>
                </div>';
                ?>
		</div>
		<?php
    }

    public function form($instance)
    {
        if (isset($instance['name'])) {
            $name = $instance['name'];
        } else {
            $name= '';
        }
        if (isset($instance['description'])) {
            $description= $instance['description'];
        } else {
            $description = '';
        }
        if (isset($instance['link'])) {
            $link= $instance['link'];
        } else {
            $link = '';
        }
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Nom du Challenge: ') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo esc_attr($name); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description du challenge: ') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" rows=10 cols=50>
                <?php echo esc_attr($description); ?>
            </textarea>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Lien vers la page du challenge: ') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>"" type='text' value="<?php echo esc_attr($link); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php echo _e('Image', 'twentytwentyone') ?></label>
			<?php
                if (!empty($instance['image_uri'])) :
                    echo "<img class='custom_media_image attachment-post-thumbnail size-post-thumbnail' style='max-width: 100%' id='image_". $this->get_field_id('image_uri')."' src='".$instance['image_uri']."' /></br>";
        endif; ?>
			<input type='text' class='widefat custom_media_url' name='<?php echo $this->get_field_name('image_uri'); ?>' id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if (!empty($instance['image_uri'])): echo $instance['image_uri'];
        endif; ?>">
		</p>
		<p>
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button_<?php  echo $this->get_field_id('image_uri'); ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Image du Challenge', 'twentytwentyone'); ?>" />
		</p>
		<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['name'] = stripslashes(wp_filter_post_kses($new_instance['name']));
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        $instance['description'] = strip_tags($new_instance['description']);
        $instance['link'] = strip_tags($new_instance['link']);
        return $instance;
    }
}

add_action('widgets_init', 'hc_register_widget');
add_action("admin_enqueue_scripts", "hc_colab_scripts");

function hc_register_widget()
{
    register_widget('hc_colab_widget');
}

function hc_colab_scripts()
{
    wp_enqueue_media();
    wp_enqueue_script('hc_colab_widget', get_template_directory_uri().'/hcWidget/js/widget.js', false, '1.0', true);
}

wp_enqueue_style('boostrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');