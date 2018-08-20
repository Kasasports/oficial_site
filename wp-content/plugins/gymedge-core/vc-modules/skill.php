<?php
if ( !class_exists( 'RDTheme_VC_Skill' ) ) {

	class RDTheme_VC_Skill extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "GymEdge: Skills", 'gymedge-core' );
			$this->base = 'gymedge-vc-skill';
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					'type' => 'param_group',
					'value' => '',
					'param_name' => 'skills',
					"heading" => __( "Add as many skills as you want", 'gymedge-core' ),
					'params' => array(
						array(
							"type"		 => "textfield",
							"holder" 	 => "div",
							"class" 	 => "",
							"heading" 	 => __( "Title", 'gymedge-core' ),
							"param_name" => "title",
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => __( "Percentage", 'gymedge-core' ),
							"param_name" => "number",
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
				'skills' => '',
				'css'    => '',
			), $atts ) );

			$template = 'skill';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Skill;