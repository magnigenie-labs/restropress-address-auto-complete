<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://magnigeeks.com
 * @since      1.0.0
 *
 * @package    Address_Auto_Complete
 * @subpackage Address_Auto_Complete/public
 */
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Address_Auto_Complete
 * @subpackage Address_Auto_Complete/public
 * @author     Mukesh Kumar sahoo <mukeshkumarsahoo15@gmail.com>
 */
class RP_Address_Auto_Complete_Public {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'rpress_purchase_form_before_order_details', array( $this, 'auto_address_fillup' ) );
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {		 
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/address-auto-complete-public.css', array(), $this->version, 'all' );
	}
	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		$data = get_option( 'rpress_settings', array() );
		$key = $data['google_map_api_key'] ;
		wp_enqueue_script(  'rp_gmap_api_script',  'https://maps.googleapis.com/maps/api/js?key='.$key.'&libraries=places', array(  ), false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/address-auto-complete-public.js', array( 'jquery'), $this->version, false );
	}
	public function auto_address_fillup() {
		$service_type = isset( $_COOKIE['service_type'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['service_type'] ) ) : '';
		$data = get_option( 'rpress_settings', array() );
		$is_auto_address_enable = isset( $data['auto_address_enable'] ) ? true : false;
		$input_label = isset( $data['input_label'] ) ? esc_attr( $data['input_label'] ) : esc_attr__( 'Select Address', 'rp-address-auto-complete' );
		if ( $service_type == 'delivery' && $is_auto_address_enable ) :
			?>
			<p class = 'rp-col-md-6 rp-col-sm-12 rpress-checkout-fields  rpress-street-address'>
				 <label class= 'rpress-auto-comp-address' for= 'rpress-gmap-api-field'> <?php echo esc_attr( $input_label ); ?> </label> 	
				 <input class= 'rpress-input pac-target-input' id= 'rpress-gmap-api-field'>
			</p>			 
			<?php
		endif;
	}
}
