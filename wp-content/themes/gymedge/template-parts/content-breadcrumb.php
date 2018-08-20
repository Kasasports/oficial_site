<?php
if( function_exists( 'bcn_display') ){
	echo '<div class="breadcrumb-area"><div class="entry-breadcrumb">';
	if ( is_rtl() ) {
		bcn_display( false, true, true );
	}
	else {
		bcn_display();
	}
	echo '</div></div>';
}