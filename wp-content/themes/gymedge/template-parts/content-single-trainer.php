<?php
global $post;
$gym_designation   = get_post_meta( $post->ID, 'gym_trainer_designation', true );
$gym_experience    = get_post_meta( $post->ID, 'gym_trainer_experience', true );
$gym_age           = get_post_meta( $post->ID, 'gym_trainer_age', true );
$gym_weight        = get_post_meta( $post->ID, 'gym_trainer_weight', true );
$gym_email         = get_post_meta( $post->ID, 'gym_trainer_email', true );
$gym_phone         = get_post_meta( $post->ID, 'gym_trainer_phone', true );
$gym_socials       = get_post_meta( $post->ID, 'gym_trainer_socials', true );
$gym_skills        = get_post_meta( $post->ID, 'gym_trainer_skill', true );

if ( GymEdge::$layout == 'full-width' ) {
	$gym_trainer_img_class = 'col-sm-4';
	$gym_trainer_details_class = 'col-sm-8';
}
else{
	$gym_trainer_img_class = 'col-sm-12 col-md-5 col-lg-4';
	$gym_trainer_details_class = 'col-sm-12 col-md-7 col-lg-8';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="<?php echo esc_attr( $gym_trainer_img_class );?>">
			<div class="trainer-detail-image">
				<div class="detail-image">
					<?php the_post_thumbnail( 'gymedge-size3' );?>
				</div>
				<div class="trainer-info">
					<?php echo empty( $gym_experience ) ? '' : '<p><span>'. esc_html__( 'Experience', 'gymedge' ) . ':</span>'. esc_html( $gym_experience ) . '</p>';?>
					<?php echo empty( $gym_age ) ? '' : '<p><span>'. esc_html__( 'Age', 'gymedge' ) . ':</span>' . esc_html( $gym_age ) . '</p>';?>
					<?php echo empty( $gym_weight ) ? '' : '<p><span>' . esc_html__( 'Weight', 'gymedge' ) . ':</span>'. esc_html( $gym_weight ) . '</p>';?>
					<?php echo empty( $gym_email ) ? '' : '<p><span>' . esc_html__( 'Email', 'gymedge' ) . ':</span><a href="mailto:'. esc_attr( $gym_email ) . '">' . esc_html( $gym_email ) . '</a></p>';?>
					<?php echo empty( $gym_phone ) ? '' : '<p><span>' . esc_html__( 'Phone', 'gymedge' ) . ':</span><a href="mailto:' . esc_attr( $gym_phone ) . '">'. esc_html( $gym_phone ) . '</a></p>';?>
					<?php if ( !empty( $gym_socials ) ): ?>
						<ul>
							<?php foreach ( $gym_socials as $gym_key => $gym_social ): ?>
								<?php if ( !empty( $gym_social ) ): ?>
									<li><a target="_blank" href="<?php echo esc_attr( $gym_social );?>"><i class="fa <?php echo esc_attr( GymEdge::$trainer_social_fields[$gym_key]['icon'] );?>"></i></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>						
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="<?php echo esc_attr( $gym_trainer_details_class );?>">
			<div class="trainer-detail-content">
				<div class="detail-heading">
					<h2><?php the_title();?></h2>
					<p><span class="degination"><?php echo esc_html( $gym_designation );?></span></p>
					<h3 class="title"><?php esc_html_e( 'Biography:', 'gymedge' );?></h3>
					<?php the_content();?>
				</div>
				<?php if ( !empty( $gym_skills ) ): ?>
					<div class="trainer-skills">
						<h3><?php esc_html_e( 'Skills:', 'gymedge' );?></h3>
						<div class="skill">
							<?php foreach ( $gym_skills as $gym_skill ): ?>
								<?php
								if ( empty( $gym_skill['skill_name'] ) || empty( $gym_skill['skill_value'] ) ) {
									continue;
								}
								?>
								<?php $gym_skill_value = (int) $gym_skill['skill_value'];?>
								<div class="progress">
									<div class="lead"><?php echo esc_html( $gym_skill['skill_name'] );?></div>
									<div class="progress-bar wow fadeInLeft" data-progress="<?php echo esc_attr( $gym_skill_value );?>%" style="width: <?php echo esc_attr( $gym_skill_value );?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span><?php echo esc_html( $gym_skill_value );?>%</span></div>
								</div>  				
							<?php endforeach;?>                  
						</div>            
					</div>					
				<?php endif;?>
			</div>
		</div>
	</div>
</article>