<?php  
/* 
Plugin Name: Netrobe
Plugin URI: http://netrobe.com/widgets
Description: Your virtual closet. 
Version: 0.1 
Author: Netrobe
Author URI: http://netrobe.com
License: GPL2 
*/  

class Netrobe extends WP_Widget
{
  function Netrobe()
  {
    $widget_ops = array('classname' => 'Netrobe', 'description' => 'Displays your virtual closet. ' );
    $this->WP_Widget('Netrobe', 'Netrobe', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
    $title = $instance['title'];
    $code = $instance['code'];
?>
    <p>
      <label for="<?php echo $this->get_field_id('code'); ?>">Please visit  <a href="http://netrobe.com/widgets/" target="_blank">Netrobe</a> to get your code</label>
    </p> 
    <p>  
      <textarea class="widefat" id="<?php echo $this->get_field_id('code'); ?>" name="<?php echo $this->get_field_name('code'); ?>" placeholder="Paste code here"><?php echo $code; ?></textarea>
    </p>
  
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['code'] = $new_instance['code'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);

    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $code = $instance['code'];
    if (!empty($title)){
      echo $before_title . $title . $after_title;
    }

    echo $code;

    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("Netrobe");') );
?>