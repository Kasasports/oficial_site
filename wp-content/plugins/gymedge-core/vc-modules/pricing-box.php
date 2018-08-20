<?php
class GymEdge_VC_Pricing_Box extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Pricing Box", 'gymedge-core' );
		$this->base = 'gymedge-vc-pricing';
		$this->translate = array(
			'title'   => __( "STANDARD", 'gymedge-core' ),
			'price'   => __( "$199", 'gymedge-core' ),
			'unit'    => __( "month", 'gymedge-core' ),
			'btntext' => __( "DETAILS", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Style", 'gymedge-core' ),
				"param_name" => "style",
				"value" => array( 
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2", 'gymedge-core' ) => 'style2',
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value" => $this->translate['title'],
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", 'gymedge-core' ),
				"param_name" => "title2",
				"value" => $this->translate['title'],
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style2' ),
				),
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Features", 'gymedge-core' ),
				"param_name" => "features2",
				"value" => '',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style2' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Price", 'gymedge-core' ),
				"param_name" => "price",
				"value" => $this->translate['price'],
				"description" => __( "Including currency sign eg. $199", 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Unit Name", 'gymedge-core' ),
				"param_name" => "unit",
				"value" => $this->translate['unit'],
				"description" => __( "eg. month or year", 'gymedge-core' ),
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Features", 'gymedge-core' ),
				"param_name" => "features",
				"value" => "",
				"description" => __( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Free Hand<br/>Gym Fitness<br/>BLANK", 'gymedge-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Text", 'gymedge-core' ),
				"param_name" => "btntext",
				"value" => $this->translate['btntext'],
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button URL", 'gymedge-core' ),
				"param_name" => "btnurl",
				"value" => "",
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Link", 'gymedge-core' ),
				"param_name" => "url2",
				"value" => "",
				"description" => __( "Keep this field empty if don't want to link to another page", 'gymedge-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style2' ),
				),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Maximum width", 'gymedge-core' ),
				"param_name" => "maxwidth",
				"value" => "360",
				"description" => __( "Maximum width in px. Keep empty if you want full width. eg. 300", 'gymedge-core' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
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

	private function validate( $str ){
		$str = trim( $str );
		// replace EMPTY keyword
		if ( strtolower( $str ) == 'blank'  ) {
			return '&nbsp;';
		}
		return $str;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'style'     => 'style1',
			'title'     => $this->translate['title'],
			'title2'    => $this->translate['title'],
			'price'     => $this->translate['price'],		
			'unit'      => $this->translate['unit'],
			'features'  => '',
			'features2' => '',
			'btntext'   => $this->translate['btntext'],
			'btnurl'    => '',
			'url2'      => '',
			'maxwidth'  => '360',
			'css'       => '',
		), $atts ) );

		$maxwidth = (int) $maxwidth;

		$features = strip_tags( $features ); // remove tags
		$features = preg_split( "/\R/", $features ); // string to array
		$features = array_map( array( $this, 'validate' ), $features ); // validate

		$class = vc_shortcode_custom_css_class( $css );

		$template = ( $style == 'style2' ) ? 'pricing-box-2' : 'pricing-box';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Pricing_Box;