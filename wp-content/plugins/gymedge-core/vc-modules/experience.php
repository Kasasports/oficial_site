<?php
if ( !class_exists( 'RDTheme_VC_Experience' ) ) {

	class RDTheme_VC_Experience extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "GymEdge: Experience", 'gymedge-core' );
			$this->base = 'gymedge-vc-experience';
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
					'type' => 'param_group',
					'value' => '',
					'param_name' => 'experiences',
					"heading" => __( "Add as many experiences as you want", 'gymedge-core' ),
					'params' => array(
						array(
							"type"		 => "textfield",
							"holder" 	 => "div",
							"class" 	 => "",
							"heading" 	 => __( "Title", 'gymedge-core' ),
							"param_name" => "title",
						),
						array(
							"type"       => "textarea",
							"holder"     => "div",
							"class"      => "",
							"heading"    => __( "Description", 'gymedge-core' ),
							"param_name" => "description",
						),
					)
				),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'gymedge-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'gymedge-core' ),
				),
			);
			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'theme'       => 'light',
				'experiences' => '',
				'css'         => '',
			), $atts ) );

			$template = 'experience';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Experience;