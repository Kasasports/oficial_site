<?php
/**
 * ShortCode Button Class
 *
 * This will Add a icon with tinymce editor
 *
 * @package WP_LOGO_SHOWCASE
 * @since 1.0
 * @author RadiusTheme
 */

if(!class_exists('rtWLSSCButton')):

    class rtWLSSCButton{

        public $shortcode_tag = 'wls_scg';

        function __construct() {
            if ( is_admin() ){
                add_action('admin_head', array( $this, 'admin_head') );
            }
        }
        /**
         * admin_head
         * calls your functions into the correct filters
         * @return void
         */
        function admin_head() {
            // check user permissions
            if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
                return;
            }
            // check if WYSIWYG is enabled
            if ( 'true' == get_user_option( 'rich_editing' ) ) {
                add_filter( 'mce_external_plugins', array( $this ,'mce_external_plugins' ) );
                add_filter( 'mce_buttons', array($this, 'mce_buttons' ) );
                global $rtWLS;
                echo "<style>";
                echo "i.mce-i-wls-scg{";
                echo "background: url('".$rtWLS->assetsUrl ."images/icon-scg.png');";
                echo "}";
                echo "</style>";
            }
        }

        /**
         * mce_external_plugins
         * Adds our tinymce plugin
         * @param  array $plugin_array
         * @return array
         */
        function mce_external_plugins( $plugin_array ) {
            global $rtWLS;
            $plugin_array[$this->shortcode_tag] = $rtWLS->assetsUrl .'js/mce-button.js';
            return $plugin_array;
        }

        /**
         * mce_buttons
         * Adds our tinymce button
         * @param  array $buttons
         * @return array
         */
        function mce_buttons( $buttons ) {
            array_push( $buttons, $this->shortcode_tag );
            return $buttons;
        }

    }

endif;