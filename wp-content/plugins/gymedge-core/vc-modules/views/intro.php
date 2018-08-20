<?php
$class  = vc_shortcode_custom_css_class( $css );
$class .= " rtin-{$theme}";
?>
<div class="rt-vc-intro <?php echo esc_attr( $class );?>">
	<div class="rtin-title-area">
		<?php if ( $before_title ): ?>
			<div class="rtin-before-title"><?php echo esc_html( $before_title );?></div>
		<?php endif; ?>
		<h3 class="rtin-title"><?php echo esc_html( $title );?></h3>
		<?php if ( $after_title ): ?>
			<div class="rtin-after-title"><?php echo esc_html( $after_title );?></div>
		<?php endif; ?>
	</div>
	<div class="rtin-content"><?php echo wp_kses_post( $content );?></div>
	<?php if ( !empty( $socials ) ): ?>
		<div class="rtin-socials">
			<?php foreach ( $socials as $social ): ?>
				<a target="_blank" href="<?php echo esc_url( $social['url'] );?>"><i class="fa fa-fw <?php echo esc_attr( $social['icon'] );?>"></i></a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if ( $buttontext ): ?>
		<a class="rtin-btn" href="<?php echo esc_url( $buttonurl );?>"><?php echo esc_html( $buttontext );?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
	<?php endif; ?>
</div>  