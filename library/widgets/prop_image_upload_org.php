<?php

class Prop_Image_Upload extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'Prop-upload-widget',
            'PropTheme Upload Widget',
            array(
                'description' => 'With PropTheme upload any image to sidebars.'
            )
        );
    }
    public function widget( $args, $instance )
    {	
		echo $args['before_widget'];
        $heading_instance = $instance['suw_image_heading'];
        $image_instance = $instance['suw_image_loca'];
        // basic output
		echo '<div class="find-new-home">
					<img src="'.$image_instance.'"  class="img-responsive" />
					<a href="#">
						<div class="find-new-home-txt-bg"></div>
						<h4>'.$heading_instance.'</h4>
					</a>	
				</div>';
		
        //printf( __('<img src="%1$s" class="img-responsive" />'), $image_instance);
		echo $args['after_widget'];
    }
    public function form( $instance )
    {
		 $title = isset( $instance['suw_image_heading'] ) ? esc_attr( $instance['suw_image_heading'] ) : '';
		 //$img = isset( $instance['suw_image_loca'] ) ? esc_attr( $instance['suw_image_loca'] ) : '';
		 $img = '';
      ?>
     <p>
		<label for="<?php echo $this->get_field_id('suw_image_heading'); ?>">Heading</label><br />
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('suw_image_heading'); ?>" id="<?php echo $this->get_field_id('suw_image_heading'); ?>" value="<?php echo $title; ?>" />
	 </p>
	 <p>
       <label for="<?php echo $this->get_field_id('suw_image_loca'); ?>">Image</label><br />
       <input type="text" class="suw-input-field <?php echo $this->get_field_name('suw_image_loca'); ?>" name="<?php echo $this->get_field_name('suw_image_loca'); ?>" id="<?php echo $this->get_field_id('suw_image_loca'); ?>" />
	 </p>
	 <p>	
       <input type="button" class="suw-button-select button button-primary <?php echo $this->get_field_name('suw_image_loca'); ?>" id="<?php echo $this->get_field_name('suw_image_loca'); ?>" value="Select Image" />
     </p>
     <?php
    }
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['suw_image_heading'] = ( ! empty( $new_instance['suw_image_heading'] ) ) ? strip_tags( $new_instance['suw_image_heading'] ) : '';
		$instance['suw_image_loca'] = ( ! empty( $new_instance['suw_image_loca'] ) ) ? strip_tags( $new_instance['suw_image_loca'] ) : '';
		return $instance;
	}
	
}
// end class
// init the widget
add_action( 'widgets_init', create_function('', 'return register_widget("Prop_Image_Upload");') );
// queue up the necessary js
function suw_enqueue()
{
    wp_enqueue_media();
	prop_get_script('file_upload_widget_script.js', 'hrw', '3.5.0'); 
}
add_action('admin_enqueue_scripts', 'suw_enqueue');