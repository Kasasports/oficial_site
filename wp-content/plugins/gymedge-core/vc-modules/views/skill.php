<?php
$class  = vc_shortcode_custom_css_class( $css );
$skills = vc_param_group_parse_atts( $skills );
?>
<div class="rt-vc-skills <?php echo esc_attr( $class );?>">  
	<?php foreach ( $skills as $skill ): ?>
		<?php
		if ( !$skill['title'] || !$skill['number'] ) continue;
		$number = intval( $skill['number'] );
		?>
		<div class="rtin-item">
			<div class="rtin-content clearfix">
				<h3 class="rtin-title"><?php echo esc_html( $skill['title'] );?></h3>
				<div class="rtin-number"><?php echo esc_html( $number );?>%</div>
			</div>
			<div class="progress">
				<div class="progress-bar" style="width: <?php echo esc_attr( $number );?>%;"></div>
			</div>
		</div>
	<?php endforeach; ?>
</div>  