<?php
add_action( 'widgets_init', 'gymedge_widgets_init' );
if ( !function_exists( 'gymedge_widgets_init' ) ) {
	function gymedge_widgets_init() {

		// Register Custom Widgets
		register_widget( 'GymEdge_About_Widget' );
		register_widget( 'GymEdge_Address_Widget' );

		register_sidebar( array(
			'name'          => __( 'Sidebar', 'gymedge' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar padding-bottom1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer', 'gymedge' ),
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		) );
	}
}

add_action( 'init', 'gymedge_set_footer_widget_count' );
if ( !function_exists( 'gymedge_set_footer_widget_count' ) ) {
	function gymedge_set_footer_widget_count(){
		global $wp_registered_widgets;

		$sidebars_widgets = wp_get_sidebars_widgets();
		$sidebars_widgets = isset( $sidebars_widgets['footer'] ) ? $sidebars_widgets['footer'] : array();

		// In case of WPML
		if ( defined( 'ICL_LANGUAGE_CODE' ) && function_exists( 'WPML_Widgets' ) ) {
			foreach ( (array) $sidebars_widgets as $id ) {

				if ( !isset($wp_registered_widgets[$id]) ) continue;

				$widget_class = $wp_registered_widgets[$id]['callback'][0];
				$widget_settings = $widget_class->get_settings();

				if ( !empty( $widget_settings ) ) {
					foreach ( $widget_settings as $widget_setting ) {
						if ( isset( $widget_setting['wpml_language'] ) ) {
							if ( $widget_setting['wpml_language'] == ICL_LANGUAGE_CODE || $widget_setting['wpml_language'] == 'all' ) {
								GymEdge::$footer_count++;
							}
						}
					}
				}
			}		
		}
		else {
			GymEdge::$footer_count = empty( $sidebars_widgets ) ? 4 : count( $sidebars_widgets );
		}
	}	
}

add_filter( 'dynamic_sidebar_params', 'gymedge_set_footer_widget_class' );
if ( !function_exists( 'gymedge_set_footer_widget_class' ) ) {
	function gymedge_set_footer_widget_class( $params ) {
		if ( $params[0]['id'] == 'footer' ) {
			switch ( GymEdge::$footer_count ) {
				case '1':
				$footer_class = 'col-sm-12 col-xs-12';
				break;
				case '2':
				$footer_class = 'col-sm-6 col-xs-12';
				break;
				case '3':
				$footer_class = 'col-sm-4 col-xs-12';
				break;		
				default:
				$footer_class = 'col-sm-3 col-xs-12';
				break;
			}
			$params[0]['before_widget'] = '<div class="'.$footer_class.'">' . $params[0]['before_widget'];
			$params[0]['after_widget']  = '</div></div>';
		}

		return $params;
	}	
}