<?php
$thumb_size = 'gymedge-size7';
$args = array(
	'posts_per_page' => 3,
	'cat' => $cat,
);

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
<div class="rt-vc-post-list elementwidth elwidth-520-480">
	<?php if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<div class="rtin-item clearfix">
				<div class="rtin-left">
					<a href="<?php the_permalink(); ?>">
						<?php
						if ( !has_post_thumbnail() ) {
							echo '<img class="media-object wp-post-image" src="'.GYMEDGE_IMG_URL.'blank_400x270.jpg" alt="'.get_the_title().'">';
						}
						else {
							the_post_thumbnail( $thumb_size );
						}
						?>
					</a>
				</div>
				<div class="rtin-right">
					<div class="rtin-date"><?php the_time( get_option( 'date_format' ) );?></div>
					<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				</div>
			</div>
		<?php endwhile;?>
	<?php endif;?>
	<?php wp_reset_query();?>
</div>