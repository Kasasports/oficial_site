<?php
$style    = !empty( $width ) ? 'style="max-width: '. esc_attr( $width ) . 'px;"' : '';
$icon_css = "font-size: {$size}px;";
?>
<div class="<?php echo esc_attr( $class );?>">
	<div class="rt-counter-2" <?php echo $style;?>>
		<div class="rt-icon"><i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css );?>"></i></div>
		<h3 class="rt-title"><?php echo esc_html( $title );?></h3>
		<div class="rt-subtitle"><?php echo esc_html( $subtitle );?></div>
	</div>
</div>