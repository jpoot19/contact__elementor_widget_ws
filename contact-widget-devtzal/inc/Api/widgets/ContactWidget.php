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
            'width' => 250,
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
		/* if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		} */
        ?>

        <button class="open-button " onclick="hideWidget()" id="widget-button">Llámanos</button>

    <div class="floating-parent-container hideWidget" id="widget-contact">
        <div class="container-widget">
      
            <div class="row">
            
                <div class="floating-number col-12 col-sm-12 col-md-12">
                    <div class="row text-center">
                        <?php
                            if( !empty($instance['phone']) )
                            {
                                
                                echo '<a href="tel:+'.$instance['phone'].'" id="right_side_form_profile_number" >'
                                ?>
                                <?php
                                    //echo '<h2 class="chat-container">'.$instance['phone'].'</h2>'
                                ?>
                                </a>
                                <?php
                            }
                        ?>
                        <span class="close" onclick="hideWidget()" ><i class="far fa-times-circle"></i></span>
                        <p class="chat-container">
                            Te guiaremos personalmente a lo largo de todo el proceso de estudiar en el extranjero
                        </p>
                        <div>
                            <form id="widget-devtzal-form">
                            <?php
                            if( !empty($instance['siteId']) )
                            {
                                echo '<input hidden id="siteId" name="siteId" value="'.$instance['siteId'].'" >';
                            }
                            ?>
                                <!-- <input hidden id="siteId" > -->
                                
                                <div class="form-group">
                                    <!-- <label for="name">Name</label> -->
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="name">Name</label> -->
                                    <input type="text" class="form-control" id="lastname" placeholder="Apellidos" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="name">Name</label> -->
                                    <input type="text" class="form-control" id="email" placeholder="Correo electrónico" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="name">Name</label> -->
                                    <input type="text" class="form-control" id="phone" placeholder="Teléfono" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="name">Name</label> -->
                                    <select id="country" class=" form-control selectpicker countrypicker" data-live-search="true" data-default="United States" data-flag="false"></select>
                                </div>
                             <div class="pt-2 pb-2">
                                    <button type="submit" class="btn btn-primary ">
                                        Agendar llamada
                                    </button>
                                </di> 
                                <div class="alert alert-success" role="alert" style="display: none;" id ="alert-msg-success">
                                    ¡Mensaje enviado Correctamente!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="alert alert-danger" role="alert" style="display: none;" id ="alert-msg-error">
                                    Something went wrong!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                
                            </form>
                        </div>
                        <div class="btn-group widget-devtzal-btn" role="group" aria-label="Basic mixed styles example">
                            <?php
                            if( !empty($instance['phone']) )
                            {
                                echo '<a type="button" class="btn btn-primary widget-button" href="tel:'.$instance['phone'].'">Llamar Ahora <i class="fa fa-phone" aria-hidden="true"></i></a>';
                            }
                            if( !empty($instance['whatsapp']) )
                            {
                                echo '<a type="button" class="btn btn-success widget-button" href="https://api.whatsapp.com/send?phone='.$instance['whatsapp'].'">Whatsapp <i class="fab fa-whatsapp"></i> </a>';
                            }
                            ?>
                                <!-- <a type="button" class="btn btn-primary widget-button" href="tel:+529981533521">Phone <i class="fa fa-phone" aria-hidden="true"></i></a>
                                <a type="button" class="btn btn-success widget-button" href="https://api.whatsapp.com/send?phone=+52998200757">Whatsapp <i class="fab fa-whatsapp"></i> </a>  -->               
                        </div>
                    </div>                 
                </div><!--endcolmd6-->
            </div>  <!--endrow-->
        </div>
    </div>



      
        <?php 
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$phoneNumber = ! empty( $instance['phone'] ) ? $instance['phone'] : esc_html__( '9000000000', '' );
        $whatsappNumber = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : esc_html__( '+529000000000', '' );
        $siteId = ! empty( $instance['siteId'] ) ? $instance['siteId'] : esc_html__( 'WORKANDSTUDY', '' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_attr_e( 'Phone Number:', 'phone_number' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phoneNumber ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>"><?php esc_attr_e( 'Whatsapp Number:', 'whatsapp_number' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whatsapp' ) ); ?>" type="text" value="<?php echo esc_attr( $whatsappNumber ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'siteId' ) ); ?>"><?php esc_attr_e( 'Site Id:', 'site_id' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'siteId' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'siteId' ) ); ?>" type="text" value="<?php echo esc_attr( $siteId ); ?>">
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['phone'] = sanitize_text_field( $new_instance['phone'] );
        $instance['whatsapp'] = sanitize_text_field( $new_instance['whatsapp'] );
        $instance['siteId'] = sanitize_text_field( $new_instance['siteId'] );

		return $instance;
	}
 }

