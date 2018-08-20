<?php
$class  = vc_shortcode_custom_css_class( $css );
$class .= " rtin-{$theme}";
$experiences = vc_param_group_parse_atts( $experiences );
?>
<div class="rt-vc-experience <?php echo esc_attr( $class );?>">  
	<?php foreach ( $experiences as $experience ): ?>
		<?php if ( !$experience['title'] && !$experience['description'] ) continue;?>
		<div class="rtin-item">
			<h3 class="rtin-title"><?php echo esc_html( $experience['title'] );?></h3>
			<div class="rtin-description"><?php echo esc_html( $experience['description'] );?></div>
		</div>
	<?php endforeach; ?>
</div>  