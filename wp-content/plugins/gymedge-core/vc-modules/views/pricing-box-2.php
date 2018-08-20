<?php
$price_html      = $unit ? "{$price}/<span>{$unit}</span>" : "{$price}";
$container_start = $url2 ? '<a href="'.esc_url( $url2 ).'" class="rtin-item">' : '<div class="rtin-item">';
$container_end   = $url2 ? '</a>' : '</div>';
?>
<div class="rt-vc-pricing-box-2 elementwidth elwidth-435 <?php echo esc_attr( $class );?>">
	<?php echo $container_start;?>
	<div class="rtin-left">
		<h3 class="rtin-title"><?php echo wp_kses_post( $title2 );?></h3>
		<div class="rtin-features"><?php echo wp_kses_post( $features2 );?></div>
	</div>
	<div class="rtin-right">
		<div class="rtin-price"><?php echo wp_kses_post( $price_html );?></div>
	</div>
	<?php echo $container_end;?>
</div>