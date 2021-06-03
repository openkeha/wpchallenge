<?php
register_sidebar(array(
    'name' =>__('Les stations', 'twentytwentyone'),
    'description' => __('Emplacement pour ajouter les stations!', 'twentytwentyone'),
    'id' => 'hc-map',
    'before_widget' => '<div id="mapid" style="height: 250px">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));


class mapWidget extends WP_Widget
{
    public function __construct() {
        parent::__construct(
            'mapWidget',
            __('Positions cartographiques', 'twentytwentyone')
        );
    }

    public function widget($args, $instance) {
        echo '<script type="text/javascript">jQuery(document).ready(function(){
            var '.str_replace(' ','',$instance['name']).'=L.marker(['.$instance['lat'].','.$instance['lng'].']).addTo(mymap);
            '.str_replace(' ','',$instance['name']).'.bindPopup("'.trim($instance['adresse']).'");
        })</script>';
    }

    public function form($instance) {
        if (isset($instance['name'])){
            $name = $instance['name'];
        } else {
            $name='';
        }
        if (isset($instance['lng'])) {
            $lng = $instance['lng'];
        } else {
            $lng='';
        }
        if (isset($instance['lat'])) {
            $lat = $instance['lat'];
        } else {
            $lat='';
        }
        if (isset($instance['adresse'])) {
            $adresse = $instance['adresse'];
        } else {
            $adresse='';
        }
        ?>
        <p>
			<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Nom de la station: ') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo esc_attr($name); ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('lng'); ?>"><?php _e('Longitude: '); ?></label>
            <input class='widefat' id="<?php echo $this->get_field_id('lng'); ?>" name="<?php echo $this->get_field_name('lng'); ?>" type='text' value="<?php echo esc_attr($lng); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('lat'); ?>"><?php _e('Latitude: '); ?></label>
            <input class='widefat' id="<?php echo $this->get_field_id('lat'); ?>" name="<?php echo $this->get_field_name('lat'); ?>" type='text' value="<?php echo esc_attr($lat); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('adresse'); ?>"><?php _e('Adresse: ') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('adresse'); ?>" name="<?php echo $this->get_field_name('adresse'); ?>" rows=10 cols=50>
                <?php echo esc_attr($adresse); ?>
            </textarea>
		</p>
        <?php
    }

    public function update($new_instance,$old_instance) {
        $instance = $old_instance;
        $instance['name'] = strip_tags(str_replace(array("\r","\n"),"",$new_instance['name']));
        $instance['lng'] = strip_tags($new_instance['lng']);
        $instance['lat'] = strip_tags($new_instance['lat']);
        $instance['adresse'] = strip_tags($new_instance['adresse']);
        return $instance;
    }
}

register_widget('mapWidget');
wp_enqueue_style('css_leaflet', get_template_directory_uri().'/assets/css/leaflet.css');
wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', false, '1.0', false);
wp_enqueue_script('map', get_template_directory_uri().'/hcWidget/js/map.js', false, '1.0', false);