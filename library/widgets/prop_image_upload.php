<?php

class Prop_Image_Upload extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'Prop-upload-widget',
            'Prop Upload Widget',
            array(
                'description' => 'With Prop upload any image to sidebars with captions'
            )
        );
    }
    public function widget( $args, $instance )
    {
		echo $args['before_widget'];
        $title_instance = $instance['suw_title'];
        $link_instance = $instance['suw_page_link'];
        $image_instance = $instance['suw_image_loca'];
        // basic output
		echo '<div class="find-new-home">
					<img src="'.$image_instance.'" class="img-responsive" />
					<a href="'.$link_instance.'">
						<div class="find-new-home-txt-bg"></div>
						<h4>'.$title_instance.'</h4>
					</a>	
				</div>';
		
        //printf( __('<img src="%1$s" />'), $image_instance);
		echo $args['after_widget'];
    }
    public function form( $instance )
    {
		 $title = isset( $instance['suw_title'] ) ? esc_attr( $instance['suw_title'] ) : '';
		 $link = isset( $instance['suw_page_link'] ) ? esc_attr( $instance['suw_page_link'] ) : '';
		 $img = isset( $instance['suw_image_loca'] ) ? esc_attr( $instance['suw_image_loca'] ) : '';
      ?>
	<p class="fp_label">
        <label for="<?php echo $this->get_field_id( 'suw_title' ); ?>"><?php _e( 'Caption Heading:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'suw_title' ); ?>" name="<?php echo $this->get_field_name( 'suw_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p class="fp_label">
        <label for="<?php echo $this->get_field_id( 'suw_page_link' ); ?>"><?php _e( 'Linking Page URL:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'suw_page_link' ); ?>" name="<?php echo $this->get_field_name( 'suw_page_link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
	</p>
    <p>
       <label for="<?php echo $this->get_field_id('suw_image_loca'); ?>">Image</label><br />
       <input type="text" class="suw-input-field <?php echo $this->get_field_name('suw_image_loca'); ?>" name="<?php echo $this->get_field_name('suw_image_loca'); ?>" id="<?php echo $this->get_field_id('suw_image_loca'); ?>" value="<?php echo $img; ?>" />
       <input type="button" class="suw-button-select button button-primary <?php echo $this->get_field_name('suw_image_loca'); ?>" id="<?php echo $this->get_field_name('suw_image_loca'); ?>" value="Select Image" />
    </p>
     <?php
    }
	
	function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['suw_title'] = ( ! empty( $new_instance['suw_title'] ) ) ? strip_tags( $new_instance['suw_title'] ) : '';
        $instance['suw_page_link'] = ( ! empty( $new_instance['suw_page_link'] ) ) ? strip_tags( $new_instance['suw_page_link'] ) : '';
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