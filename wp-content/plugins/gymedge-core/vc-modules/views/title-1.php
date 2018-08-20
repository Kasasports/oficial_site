<?php
$class = vc_shortcode_custom_css_class( $css );

$title_style  = "color:{$title_color};";
$title_style .= $title_font ? "font-size:{$title_font}px;line-height:1.3;" : '';

$subtitle_style  = "color:{$subtitle_color};";
$subtitle_style .= $subtitle_font ? "font-size:{$subtitle_font}px;line-height:1.3;" : '';
?>
<div class="rt-owl-title-1 <?php echo esc_attr( $class );?> <?php echo esc_attr( $style );?>">
	<div class="section-title">
		<h2 class="owl-title" style="<?php echo esc_attr( $title_style );?>"><?php echo esc_html( $title );?></h2>
		<div class="owl-description" style="<?php echo esc_attr( $subtitle_style );?>"><?php echo wp_kses_post( $subtitle );?></div>
	</div>
</div>