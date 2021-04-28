<?php
/**
 * @package ContactWidgetDevtzal
 */

 namespace Inc\Api\Widgets;

 use WP_Widget;


 class ContactWidget extends WP_Widget

 {

    public $widget_ID;
    public $widget_name;
    public $widget_options = array();
    public $control_options = array();

    public function __construct()
    {
        $this->widget_ID = 'widget_devtzal';
        $this->widget_name = 'Contact Widget';
        $this->widget_options = array(
            'classname' => $this->widget_ID,
            'description' => 'Contact Widget for phone calls and Whatsapp',
            'customize_selective_refresh' => true
        );

        $this->control_options = array(
            'width' => 400,
            'height' => 350

        );
    }

    public function register(){
        parent::__construct($this->widget_ID, $this->widget_name, $this->widget_options, $this->control_options);
        add_action( 'widgets_init', array( $this, 'widgetsInit' ) );
    }

    public function widgetsInit()
	{
		register_widget( $this );
	}
    public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
        ?>
        <div class="chat-popup" id="myForm" style="position: fixed;bottom: 0;right: 15px; border: 3px solid #f1f1f1;z-index: 9;">
            <form action="/action_page.php" >
            <h1>Chat</h1>

            <label for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        <?php 
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Custom Text', '' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'awps' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		return $instance;
	}
 }

