<?php 
$args = array(
	'post_type'      => 'gym_testimonial',
	'posts_per_page' => $number,
);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'gym_testimonial_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}

switch ( $orderby ) {
	case 'title':
	$args['orderby'] = 'title';
	$args['order']   = 'ASC';
	break;
	case 'menu_order':
	$args['orderby'] = 'menu_order';
	$args['order']   = 'ASC';
	break;
}

$query = new WP_Query( $args );
?>
<div class="rt-vc-testimonial-3 rtin-<?php echo esc_attr( $theme );?>">
	<h2 class="rtin-title"><?php echo esc_html( $title );?></h2>
	<div class="rtin-subtitle"><?php echo wp_kses_post( $subtitle );?></div>
	<div class="rtin-content owl-wrap">
		<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php if ( $query->have_posts() ) :?>
				<?php while ( $query->have_posts() ) : $query->the_post();?>
					<?php
					$id = get_the_id();
					$designation = get_post_meta( $id, 'gym_tes_designation', true );
					?>
					<div class="rtin-item">
						<h3 class="rtin-item-title"><?php the_title();?></h3>
						<?php if ( !empty( $designation ) ): ?>
							<div class="rtin-designation"><?php echo esc_html( $designation );?></div>
						<?php endif; ?>
						<div class="rtin-item-content"><?php the_content();?></div>
						<div class="rtin-icon"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
					</div>
				<?php endwhile;?>
			<?php endif;?>
			<?php wp_reset_query();?>
		</div>
	</div>
</div>