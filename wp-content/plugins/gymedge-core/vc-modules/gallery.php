<?php
class GymEdge_VC_Gellery extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Gallery", 'gymedge-core' );
		$this->base = 'gymedge-vc-gallery';
		$this->translate = array(
			'title' => __( "OUR GALLERY", 'gymedge-core' ),
			'all'   => __( "All", 'gymedge-core' ),
		);
		parent::__construct();
	}

	public function load_scripts(){
		wp_enqueue_style( 'magnific-popup' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'jquery-magnific-popup' );
		wp_enqueue_script( 'gym-vc-gallery' );
	}

	public function fields(){
		$terms = get_terms( array( 'taxonomy' => 'gym_gallery_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array();

		foreach ( $terms as $id => $name ) {
			$category_dropdown[] = array( 'label' => $name, 'value' => $id );
		}

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
				'type'        => 'autocomplete',
				'heading'     => __( 'Categories to Display', 'gymedge-core' ),
				'param_name'  => 'categories',
				'settings'    => array(
					'multiple' => true,
					'sortable' => true,
					'min_length' => 1,
						'no_hide' => true,
						'unique_values' => true,
						'display_inline' => true,
						'values'   => $category_dropdown,
					),
				'description' => __( 'Start typing category names to select. If not selected all categories will be displayed', 'gymedge-core' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Order By", 'gymedge-core' ),
				"param_name" => "orderby",
				"value" => array(
					__( 'Date (Recents comes first)', 'gymedge-core' )  => 'date',
					__( 'Title', 'gymedge-core' ) => 'title',
					__( 'Custom Order (Available via Order field inside Page Attributes box)', 'gymedge-core' ) => 'menu_order',
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
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "All items name", 'gymedge-core' ),
				"param_name" => "all",
				'value' => $this->translate['all'],
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'style'   => 'style1',
			'orderby' => 'date',
			'categories' => '',
			'title'   => $this->translate['title'],
			'all'     => $this->translate['all'],
			), $atts ) );

		$this->load_scripts();

		$template = 'gallery-1';

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Gellery;