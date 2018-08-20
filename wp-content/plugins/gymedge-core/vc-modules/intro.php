<?php
class GymEdge_VC_Intro extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Introduction", 'gymedge-core' );
		$this->base = 'gymedge-vc-intro';
		$this->translate = array(
			'before_title' => "Hello, I'm",
			'title'        => 'John Doe',
			'after_title'  => 'Fitness and Body Specialist',
			'buttontext'   => __( "JOIN NOW", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Theme", 'gymedge-core' ),
				"param_name" => "theme",
				"value" => array(
					__( 'Light (No Background)', 'gymedge-core' ) => 'light',
					__( 'Dark (Requires Dark Background)', 'gymedge-core' ) => 'dark',
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Before Title", 'gymedge-core' ),
				"param_name" => "before_title",
				"value" => $this->translate['before_title'],
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" => $this->translate['title'],
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "After Title", 'gymedge-core' ),
				"param_name" => "after_title",
				"value" => $this->translate['after_title'],
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Description", 'gymedge-core' ),
				"param_name" => "content",
				"value" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'gymedge-core' ),
				"param_name" => "buttontext",
				"value" => $this->translate['buttontext'],
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button URL", 'gymedge-core' ),
				"param_name" => "buttonurl",
			),
			// Socials
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Facebook", 'gymedge-core' ),
				"param_name" => "social_facebook",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Twitter", 'gymedge-core' ),
				"param_name" => "social_twitter",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Google Plus", 'gymedge-core' ),
				"param_name" => "social_gplus",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Linkedin", 'gymedge-core' ),
				"param_name" => "social_linkedin",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Youtube", 'gymedge-core' ),
				"param_name" => "social_youtube",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Pinterest", 'gymedge-core' ),
				"param_name" => "social_pinterest",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Instagram", 'gymedge-core' ),
				"param_name" => "social_instagram",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Flickr", 'gymedge-core' ),
				"param_name" => "social_flickr",
				"group" => __( "Socials", 'gymedge-core' ),
			),
			// Design Options
			array(
				'type' => 'css_editor',
				'heading' => __( 'Css', 'gymedge-core' ),
				'param_name' => 'css',
				'group' => __( 'Design options', 'gymedge-core' ),
				'edit_field_class' => 'vc-no-bg vc-no-border',
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		$result = array(
			'theme'            => 'light',
			'before_title'     => $this->translate['before_title'],
			'title'            => $this->translate['title'],
			'after_title'      => $this->translate['after_title'],
			'buttontext'       => $this->translate['buttontext'],
			'buttonurl'        => '',

			'social_facebook'  => '',
			'social_twitter'   => '',
			'social_gplus'     => '',
			'social_linkedin'  => '',
			'social_youtube'   => '',
			'social_pinterest' => '',
			'social_instagram' => '',
			'social_flickr'    => '',

			'css'              => '',
		);
		$result = shortcode_atts( $result, $atts );

		$socials = array(
			'social_facebook' => array(
				'icon' => 'fa-facebook',
			),
			'social_twitter' => array(
				'icon' => 'fa-twitter',
			),
			'social_gplus' => array(
				'icon' => 'fa-google-plus',
			),
			'social_linkedin' => array(
				'icon' => 'fa-linkedin',
			),
			'social_youtube' => array(
				'icon' => 'fa-youtube',
			),
			'social_pinterest' => array(
				'icon' => 'fa-pinterest',
			),
			'social_instagram' => array(
				'icon' => 'fa-instagram',
			),
			'social_flickr' => array(
				'icon' => 'fa-flickr',
			),
		);

		foreach ( $result as $key => $value ) {
			$pos = strpos( $key, 'social_' );
			if ( $pos !== false  ) {
				if ( $value ) {
					$socials[$key]['url'] = $value;
				}
				else {
					unset( $socials[$key] );
				}
				unset( $result[$key] );
			}
		}

		extract( $result );

		$template = 'intro';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Intro;