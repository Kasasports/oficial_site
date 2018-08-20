<?php
class GymEdge_VC_Title extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Section Title", 'gymedge-core' );
		$this->base = 'gymedge-vc-title';
		$this->translate = array(
			'title' => __( "I AM TITLE", 'gymedge-core' ),
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
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle", 'gymedge-core' ),
				"param_name" => "subtitle",
				"value" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, libero sed cum. Delectus suscipit tempore fugit, accusamus inventore, sunt quod ullam saepe consequuntur quasi illo odit",
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Title color", "gymedge-core" ),
				"param_name" => "title_color",
				"value" => '#111111',
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Subtitle color", "gymedge-core" ),
				"param_name" => "subtitle_color",
				"value" => '#111111',
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title font size", 'gymedge-core' ),
				"param_name" => "title_font",
				'description' => __( 'Font size in px eg. 28px', 'gymedge-core' ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subtitle font size", 'gymedge-core' ),
				"param_name" => "subtitle_font",
				'description' => __( 'Font size in px eg. 20px', 'gymedge-core' ),
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

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'style'           => 'style1',
			'title'           => $this->translate['title'],
			'subtitle'        => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, libero sed cum. Delectus suscipit tempore fugit, accusamus inventore, sunt quod ullam saepe consequuntur quasi illo odit",
			'title_color'     => '#111111',
			'subtitle_color'  => '#111111',
			'title_font'      => '',
			'subtitle_font'   => '',
			'css'             => '',
		), $atts ) );

		$title_font    = intval( $title_font );
		$subtitle_font = intval( $subtitle_font );

		$template = 'title-1';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Title;