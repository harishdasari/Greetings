<?php
/**
 * GenesisAwesome Child Theme Settings 
 * 
 * @package    Genesis Child Theme
 * @subpackage Admin
 * @author     Harish Dasari
 * @version    1.0
 * @link       http://www.genesisawesome.com/
 */

/**
 * GenesisAwesome Childtheme Settings Class
 * 
 * @since 1.0
 */
class GenesisAwesome_Childtheme_Settings extends Genesis_Admin_Boxes {

	/**
	 * GenesisAwesome_Childtheme_Settings Constructor
	 */
	function __construct() {

		$page_id = 'genesisawesome-settings';

		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'GenesisAwesome - Greetings Theme Settings', 'genesisawesome' ),
				'menu_title'  => __( 'Greetings Settings', 'genesisawesome' )
			)
		);

		$page_ops = array(
			'screen_icon'       => 'options-general',
			'save_button_text'  => __( 'Save Settings', 'genesis' ),
			'reset_button_text' => __( 'Reset Settings', 'genesis' ),
			'saved_notice_text' => __( 'Settings saved.', 'genesis' ),
			'reset_notice_text' => __( 'Settings reset.', 'genesis' ),
			'error_notice_text' => __( 'Error saving settings.', 'genesis' ),
		);

		$settings_field = GA_CHILDTHEME_FIELD;

		$default_settings = array(
			'logo_url'                  => '',
			'logo_width'                => '',
			'logo_height'               => '',
			'enable_post_social_share'  => 1,
			'enable_post_subscribe_box' => 1,
			'enable_post_related_posts' => 1,
			'feedburner_id'             => '',
			'footer_left_text'          => '',
			'contact_email'             => '',
			'recaptcha_publickey'       => '',
			'recaptcha_privatekey'      => '',
			'recaptcha_colortheme'      => 'red',
			'enable_homepage_slider'    => 1,
			'homepage_slider_category'  => '',
			'homepage_slider_number'    => '5',
			'rssfeed_url'               => '',
			'facebook_url'              => '',
			'twitter_url'               => '',
			'linkedin_url'              => '',
			'googleplus_url'            => '',
			'stumbleupon_url'           => '',
			'pinterest_url'             => '',
			'enable_ga_typography'      => 0,
			'ga_font_size'              => '',
			'ga_font_color'             => '',
			'ga_link_color'             => '',
			'ga_link_hover_color'       => '',
			'enable_ga_h1_typography'   => 0,
			'ga_h1_font_size'           => '',
			'ga_h1_font_color'          => '',
			'ga_h1_link_color'          => '',
			'ga_h1_link_hover_color'    => '',
			'enable_ga_h2_typography'   => 0,
			'ga_h2_font_size'           => '',
			'ga_h2_font_color'          => '',
			'ga_h2_link_color'          => '',
			'ga_h2_link_hover_color'    => '',
			'enable_ga_h3_typography'   => 0,
			'ga_h3_font_size'           => '',
			'ga_h3_font_color'          => '',
			'ga_h3_link_color'          => '',
			'ga_h3_link_hover_color'    => '',
			'enable_ga_h4_typography'   => 0,
			'ga_h4_font_size'           => '',
			'ga_h4_font_color'          => '',
			'ga_h4_link_color'          => '',
			'ga_h4_link_hover_color'    => '',
			'enable_ga_h5_typography'   => 0,
			'ga_h5_font_size'           => '',
			'ga_h5_font_color'          => '',
			'ga_h5_link_color'          => '',
			'ga_h5_link_hover_color'    => '',
		);

		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		add_action( 'genesis_settings_sanitizer_init', array( $this, 'genesisawesome_childtheme_filters' ) );

		add_action( 'admin_init', array( $this, 'ga_load_scripts' ) );

	}

	/**
	 * Options Filters for Genesisawesome
	 * 
	 * @return null
	 */
	public function genesisawesome_childtheme_filters() {

		genesis_add_option_filter(
			'one_zero',
			$this->settings_field,
			array(
				'enable_homepage_slider',
				'enable_post_social_share',
				'enable_post_subscribe_box',
				'enable_post_related_posts',
				'enable_ga_typography',
				'enable_ga_h1_typography',
				'enable_ga_h2_typography',
				'enable_ga_h3_typography',
				'enable_ga_h4_typography',
				'enable_ga_h5_typography',
			)
		);

		genesis_add_option_filter(
			'no_html',
			$this->settings_field,
			array(
				'logo_url',
				'feedburner_id',
				'recaptcha_publickey',
				'recaptcha_privatekey',
				'recaptcha_colortheme',
				'rssfeed_url',
				'facebook_url',
				'twitter_url',
				'dribbble_url',
				'linkedin_url',
				'googleplus_url',
				'stumbleupon_url',
				'pinterest_url',
				'youtube_url',
				'ga_font_color',
				'ga_link_color',
				'ga_link_hover_color',
				'ga_h1_font_color',
				'ga_h1_link_color',
				'ga_h1_link_hover_color',
				'ga_h2_font_color',
				'ga_h2_link_color',
				'ga_h2_link_hover_color',
				'ga_h3_font_color',
				'ga_h3_link_color',
				'ga_h3_link_hover_color',
				'ga_h4_font_color',
				'ga_h4_link_color',
				'ga_h4_link_hover_color',
				'ga_h5_font_color',
				'ga_h5_link_color',
				'ga_h5_link_hover_color',
			)
		);

		genesis_add_option_filter(
			'requires_unfiltered_html',
			$this->settings_field,
			array(
				'footer_left_text'
			)
		);

		genesis_add_option_filter(
			'email',
			$this->settings_field,
			array(
				'contact_email'
			)
		);

		genesis_add_option_filter(
			'integer',
			$this->settings_field,
			array(
				'logo_width',
				'logo_height',
				'homepage_slider_category',
				'homepage_slider_number',
				'ga_font_size',
				'ga_h1_font_size',
				'ga_h2_font_size',
				'ga_h3_font_size',
				'ga_h4_font_size',
				'ga_h5_font_size',
			)
		);

	}

	/**
	 * Register Metaboxes
	 * 
	 * Registers the metaboxes for GenesisAwesome Child Theme Options page.
	 * 
	 * @return null
	 */
	function metaboxes() {

		add_meta_box( 'genesisawesome-childtheme-info', __( 'Theme Information', 'genesisawesome' ), array( $this, 'childtheme_info' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'genesisawesome-general-settings', __( 'General Settings', 'genesisawesome' ), array( $this, 'general_settings' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'genesisawesome-social-settings', __( 'Social Settings', 'genesisawesome' ), array( $this, 'social_settings' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'genesisawesome-slider-settings', __( 'Homepage Slider Settings', 'genesisawesome' ), array( $this, 'homepage_slider_settings' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'genesisawesome-contact-settings', __( 'Contact Page Settings', 'genesisawesome' ), array( $this, 'contact_page_settings' ), $this->pagehook, 'main', 'high' );
		add_meta_box( 'genesisawesome-typography-settings', __( 'Typography Settings', 'genesisawesome' ), array( $this, 'typography_settings' ), $this->pagehook, 'main', 'high' );

	}

	/**
	 * Child Theme Information 
	 * 
	 * @return null
	 */
	function childtheme_info() {

		?>
		<table class="form-table">
			<tr>
				<td><?php _e( 'Theme Name', 'genesisawesome' );?></td>
				<td> : <strong><a href="<?php echo esc_url( CHILD_THEME_URL ); ?>" target="_blank"><?php esc_html_e( CHILD_THEME_NAME ); ?></a></strong></td>
			</tr>
			<tr>
				<td><?php _e( 'Theme Version', 'genesisawesome' );?></td>
				<td> : v<?php esc_html_e( CHILD_THEME_VER ); ?></td>
			</tr>
			<tr>
				<td><?php _e( 'Author', 'genesisawesome' );?></td>
				<td> : <strong>Harish Dasari</strong> / <a href="http://www.genesisawesome.com/" target="_blank">GenesisAwesome</a></td>
			</tr>
			<tr align="center">
				<td colspan="2">
					<a href="http://www.genesisawesome.com/donate/" title="Donate" target="_blank"><img src="http://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="" /></a>
					<div>Your Donation will be used to future release of Free Child Themes :). Thank You! <div style="text-align:right;">-- <a href="http://about.me/harishdasari" target="_blank">Harish Dasari</a></div></div>
				</td>
			</tr>
		</table>
		<?php

	}

	/**
	 * General Settings Box
	 * 
	 * @return null 
	 */
	function general_settings() {

		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'logo_url' ); ?>"><?php _e( 'Custom Logo URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'logo_url' ); ?>" id="<?php echo $this->get_field_id( 'logo_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'logo_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'logo_width' ); ?>"><?php _e( 'Logo Width', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'logo_width' ); ?>" id="<?php echo $this->get_field_id( 'logo_width' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'logo_width' ) ); ?>" size="4" /> px</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'logo_height' ); ?>"><?php _e( 'Logo Height', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'logo_height' ); ?>" id="<?php echo $this->get_field_id( 'logo_height' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'logo_height' ) ); ?>" size="4" /> px</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'enable_post_social_share' ); ?>"><?php _e( 'Enable Post Social Share ?', 'genesisawesome' ); ?></label></th>
				<td><input type="checkbox" name="<?php echo $this->get_field_name( 'enable_post_social_share' ); ?>" id="<?php echo $this->get_field_id( 'enable_post_social_share' ); ?>" value="1"<?php checked( '1', $this->get_field_value( 'enable_post_social_share' ) ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'enable_post_subscribe_box' ); ?>"><?php _e( 'Enable Post Subscribe box ?', 'genesisawesome' ); ?></label></th>
				<td><input type="checkbox" name="<?php echo $this->get_field_name( 'enable_post_subscribe_box' ); ?>" id="<?php echo $this->get_field_id( 'enable_post_subscribe_box' ); ?>" value="1"<?php checked( '1', $this->get_field_value( 'enable_post_subscribe_box' ) ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'enable_post_related_posts' ); ?>"><?php _e( 'Enable Related Posts ?', 'genesisawesome' ); ?></label></th>
				<td><input type="checkbox" name="<?php echo $this->get_field_name( 'enable_post_related_posts' ); ?>" id="<?php echo $this->get_field_id( 'enable_post_related_posts' ); ?>" value="1"<?php checked( '1', $this->get_field_value( 'enable_post_related_posts' ) ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'feedburner_id' ); ?>"><?php _e( 'Feedburner ID', 'genesisawesome' ); ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'feedburner_id' ); ?>" id="<?php echo $this->get_field_id( 'feedburner_id' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'feedburner_id' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'footer_left_text' ); ?>"><?php _e( 'Footer Left Text', 'genesisawesome' ); ?></label></th>
				<td><textarea name="<?php echo $this->get_field_name( 'footer_left_text' ); ?>" id="<?php echo $this->get_field_id( 'footer_left_text' ); ?>"  class="widefat" rows="4"><?php echo esc_attr( $this->get_field_value( 'footer_left_text' ) ); ?></textarea></td>
			</tr>
		</table>
		<?php

	}

	/**
	 * Social Settings Box
	 * @return null
	 */
	function social_settings() {

		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'rssfeed_url' ); ?>"><?php _e( 'Rss Feed URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'rssfeed_url' ); ?>" id="<?php echo $this->get_field_id( 'rssfeed_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'rssfeed_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'facebook_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e( 'Twitter URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'twitter_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>"><?php _e( 'Linkedin URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'linkedin_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'googleplus_url' ); ?>"><?php _e( 'Google Plus URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'googleplus_url' ); ?>" id="<?php echo $this->get_field_id( 'googleplus_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'googleplus_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'stumbleupon_url' ); ?>"><?php _e( 'Stumbleupon URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'stumbleupon_url' ); ?>" id="<?php echo $this->get_field_id( 'stumbleupon_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'stumbleupon_url' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'pinterest_url' ); ?>"><?php _e( 'Pinterest URL', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'pinterest_url' ); ?>" id="<?php echo $this->get_field_id( 'pinterest_url' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'pinterest_url' ) ); ?>" class="widefat" /></td>
			</tr>
		</table>
		<p class="description">
			<?php _e( 'Leave fields as blank to hide the icon/link', 'genesisawesome' ); ?>
		</p>
		<?php

	}

	/**
	 * Home page slider settings box
	 * 
	 * @return null
	 */
	function homepage_slider_settings() {

		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'enable_homepage_slider' ); ?>"><?php _e( 'Enable the Homepage Slider', 'genesisawesome' ); ?></label></th>
				<td><input type="checkbox" name="<?php echo $this->get_field_name( 'enable_homepage_slider' ); ?>" id="<?php echo $this->get_field_id( 'enable_homepage_slider' ); ?>" value="1"<?php checked( '1', $this->get_field_value( 'enable_homepage_slider' ) ); ?> /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'enable_homepage_slider' ); ?>"><?php _e( 'Homepage Slider Category', 'genesisawesome' ); ?></label></th>
				<td><?php echo $this->ga_get_categories( 'homepage_slider_category' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'homepage_slider_number' ); ?>"><?php _e( 'Number of Slides ?', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'homepage_slider_number' ); ?>" id="<?php echo $this->get_field_id( 'homepage_slider_number' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'homepage_slider_number' ) ); ?>" size="4"/></td>
			</tr>
		</table>
		<p class="description">
			<?php _e( 'Slider will use Featuted image in post. So please set the Featured Image.', 'genesisawesome' ); ?>
		</p>
		<?php

	}

	/**
	 * Contact Page Settings Box
	 * 
	 * @return null
	 */
	function contact_page_settings() {

		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'contact_email' ); ?>"><?php _e( 'Contact Email', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'contact_email' ); ?>" id="<?php echo $this->get_field_id( 'contact_email' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'contact_email' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'recaptcha_publickey' ); ?>"><?php _e( 'reCaptcha Public Key', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'recaptcha_publickey' ); ?>" id="<?php echo $this->get_field_id( 'recaptcha_publickey' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'recaptcha_publickey' ) ); ?>" class="widefat" /></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'recaptcha_privatekey' ); ?>"><?php _e( 'reCaptcha Private Key', 'genesisawesome' ) ?></label></th>
				<td><input type="text" name="<?php echo $this->get_field_name( 'recaptcha_privatekey' ); ?>" id="<?php echo $this->get_field_id( 'recaptcha_privatekey' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'recaptcha_privatekey' ) ); ?>" class="widefat"/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="<?php echo $this->get_field_id( 'recaptcha_colortheme' ); ?>"><?php _e( 'reCaptcha Color Theme', 'genesisawesome' ) ?></label></th>
				<td>
					<select name="<?php echo $this->get_field_name( 'recaptcha_colortheme' ); ?>" id="<?php echo $this->get_field_id( 'recaptcha_colortheme' ); ?>">
						<option value="red"<?php selected( 'red', $this->get_field_value( 'recaptcha_colortheme' ) ); ?>><?php _e( 'Red', 'genesisawesome' ); ?></option>
						<option value="white"<?php selected( 'white', $this->get_field_value( 'recaptcha_colortheme' ) ); ?>><?php _e( 'White', 'genesisawesome' ); ?></option>
						<option value="blackglass"<?php selected( 'blackglass', $this->get_field_value( 'recaptcha_colortheme' ) ); ?>><?php _e( 'Blackglass', 'genesisawesome' ); ?></option>
						<option value="clean"<?php selected( 'clean', $this->get_field_value( 'recaptcha_colortheme' ) ); ?>><?php _e( 'Clean', 'genesisawesome' ); ?></option>
					</select>
				</td>
			</tr>
		</table>
		<p class="description">
			<?php _e( 'reCaptcha is free captch service from Google to prevent the Email Spams. <br/>To get reCaptcha public key and private key please visit <a href="https://www.google.com/recaptcha/admin/create" target="_blank">reCaptcha admin site</a>', 'genesisawesome' );?>
		</p>
		<?php

	}

	/**
	 * Typography Settings box
	 * 
	 * @return null
	 */
	function typography_settings() {

		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><h4><label for=""><?php _e( 'Body', 'genesisawesome' ) ?></h4></label></th>
				<td><?php $this->ga_typography_options_form( 'ga' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><h4><label for=""><?php _e( 'H1 Heading Typography', 'genesisawesome' ) ?></h4></label></th>
				<td><?php $this->ga_typography_options_form( 'ga_h1' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><h4><label for=""><?php _e( 'H2 Heading Typography', 'genesisawesome' ) ?></h4></label></th>
				<td><?php $this->ga_typography_options_form( 'ga_h2' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><h4><label for=""><?php _e( 'H3 Heading Typography', 'genesisawesome' ) ?></h4></label></th>
				<td><?php $this->ga_typography_options_form( 'ga_h3' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><h4><label for=""><?php _e( 'H4 Heading Typography', 'genesisawesome' ) ?></h4></label></th>
				<td><?php $this->ga_typography_options_form( 'ga_h4' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><h4><label for=""><?php _e( 'H5 Heading Typography', 'genesisawesome' ) ?></h4></label></th>
				<td><?php $this->ga_typography_options_form( 'ga_h5' ); ?></td>
			</tr>
		</table>
		<?php

	}

	/**
	 * Select field for Taxonomy
	 * 
	 * @since 1.0
	 * 
	 * @param  string $option_name Name of the Option
	 * @param  string $taxonomy    Name of the Taxonomy 
	 * @return string              Select field HTML for Taxonomy
	 */
	function ga_get_categories( $option_name, $taxonomy = 'category' ) {
		
		$args = array(
			'taxonomy' => $taxonomy
		);

		$cats = get_categories( $args );
		
		$field_html = '<select name="' . $this->get_field_name( $option_name ) . '" id="' . $this->get_field_id( $option_name ) . '">';
		foreach ( $cats as $cat ) {
			$field_html .= '<option value="' . $cat->term_id . '"' . selected( $cat->term_id, $this->get_field_value( $option_name ), false ) . '>' . $cat->name . '</option>';
		}
		$field_html .= '</select>';

		return $field_html;

	}

	/**
	 * Add action to load styles and scripts
	 * 
	 * @return null
	 */
	function ga_load_scripts() {

		add_action( 'load-' . $this->pagehook, array( $this, 'ga_scripts' ) );

	}

	/**
	 * Load styles and scripts for Option page.
	 * 
	 * @return null
	 */
	function ga_scripts() {

		wp_enqueue_style( 'ga-colorpicker', CHILD_URL . '/lib/css/jquery.miniColors.css' );
		wp_enqueue_script( 'ga-colorpicker', CHILD_URL . '/lib/scripts/jquery.miniColors.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'ga-custom', CHILD_URL . '/lib/scripts/ga-custom.js', array( 'ga-colorpicker' ), null, true );

	}

	/**
	 * Options table for typography
	 * 
	 * @param  string $option Options name
	 * @return null
	 */
	function ga_typography_options_form( $option ) {

		?>
		<table>
			<tr valign="top">
				<td><label for="<?php echo $this->get_field_id( 'enable_' . $option . '_typography' ); ?>"><?php _e( 'Enable ?', 'genesisawesome' );?></label></td>
				<td> <input type="checkbox" name="<?php echo $this->get_field_name( 'enable_' . $option . '_typography' ); ?>" id="<?php echo $this->get_field_id( 'enable_' . $option . '_typography' ); ?>" value="1"<?php checked( '1', $this->get_field_value( 'enable_' . $option . '_typography' ) ); ?>  /></td>
			</tr>
			<tr valign="top">
				<td><label for="<?php echo $this->get_field_id( $option . '_font_size' ); ?>"><?php _e( 'Font Size:', 'genesisawesome' );?></label></td>
				<td> <input type="text" name="<?php echo $this->get_field_name( $option . '_font_size' ); ?>" id="<?php echo $this->get_field_id( $option . '_font_size' ); ?>" value="<?php echo esc_attr( $this->get_field_value( $option . '_font_size' ) ); ?>" size="4" /> px</td>
			</tr>
			<tr valign="top">
				<td><label for="<?php echo $this->get_field_id( $option . '_font_color' ); ?>"><?php _e( 'Font Color:', 'genesisawesome' );?></label></td>
				<td> <input type="text" name="<?php echo $this->get_field_name( $option . '_font_color' ); ?>" id="<?php echo $this->get_field_id( $option . '_font_color' ); ?>" value="<?php echo esc_attr( $this->get_field_value( $option . '_font_color' ) ); ?>" size="6" class="ga-color" /> </td>
			</tr>
			<tr valign="top">
				<td><label for="<?php echo $this->get_field_id( $option . '_link_color' ); ?>"><?php _e( 'Link Color:', 'genesisawesome' );?></label></td>
				<td> <input type="text" name="<?php echo $this->get_field_name( $option . '_link_color' ); ?>" id="<?php echo $this->get_field_id( $option . '_link_color' ); ?>" value="<?php echo esc_attr( $this->get_field_value( $option . '_link_color' ) ); ?>" size="6" class="ga-color" /> </td>
			</tr>
			<tr valign="top">
				<td><label for="<?php echo $this->get_field_id( $option . '_link_hover_color' ); ?>"><?php _e( 'Link Hover Color:', 'genesisawesome' );?></label></td>
				<td> <input type="text" name="<?php echo $this->get_field_name( $option . '_link_hover_color' ); ?>" id="<?php echo $this->get_field_id( $option . '_link_hover_color' ); ?>" value="<?php echo esc_attr( $this->get_field_value( $option . '_link_hover_color' ) ); ?>" size="6" class="ga-color" /> </td>
			</tr>
		</table>
		<?php

	}

}