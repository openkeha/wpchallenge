<?php
register_sidebar(array(
    'name' =>__('Les stations', 'twentytwentyone'),
    'description' => __('Emplacement pour ajouter les stations!', 'twentytwentyone'),
    'id' => 'hc-map',
    'before_widget' => '<div id="mapId" style="height: 250px">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));


/*class mapWidget extends WP_Widget
{
    public function __construct() {
        parent::__construct();
    }

    public function widget($args, $instance) {

    }

    public function form($instance) {

    }

    public function update($new_instance,$old_instance) {
        $instance = $old_instance;
        return $instance;
    }
}

register_widget('mapWidget');*/
wp_enqueue_style('css_leaflet', get_template_directory_uri().'/assets/css/leaflet.css');
wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', false, '1.0', false);
wp_enqueue_script('map', get_template_directory_uri().'/hcWidget/js/map.js', false, '1.0', true);