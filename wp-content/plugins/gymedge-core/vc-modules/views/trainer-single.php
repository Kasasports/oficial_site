<?php
if ( !$item ) return;

$gym_designation   = get_post_meta( $item, 'gym_trainer_designation', true );
$gym_experience    = get_post_meta( $item, 'gym_trainer_experience', true );
$gym_age           = get_post_meta( $item, 'gym_trainer_age', true );
$gym_weight        = get_post_meta( $item, 'gym_trainer_weight', true );
$gym_email         = get_post_meta( $item, 'gym_trainer_email', true );
$gym_phone         = get_post_meta( $item, 'gym_trainer_phone', true );
$gym_socials       = get_post_meta( $item, 'gym_trainer_socials', true );
$gym_skills        = get_post_meta( $item, 'gym_trainer_skill', true );
?>
<div class="rt-vc-team-single">
	<div class="row">
		<div class="col-sm-4">
			<div class="trainer-detail-image">
				<div class="detail-image">
					<?php echo get_the_post_thumbnail( $item, 'gymedge-size3' );?>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="trainer-detail-content">
				<div class="detail-heading">
					<h2><?php echo get_the_title( $item );?></h2>
					<?php if ( $designation_display ): ?>
						<div class="degination"><?php echo esc_html( $gym_designation );?></div>
					<?php endif; ?>
				</div>
				<?php if ( $description_display ): ?>
					<?php
					$content = get_post( $item );
					$content = $content->post_content;
					$content = GymEdge_Helper::filter_content( $content );
					?>
					<div class="description"><?php echo wp_kses_post( $content );?></div>
				<?php endif; ?>
				<?php if ( !empty( $gym_skills ) && $skill_display ): ?>
					<div class="trainer-skills">
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
				<?php if ( $info_display ): ?>
					<div class="trainer-info">
						<?php echo empty( $gym_experience ) ? '' : '<p><span>'. esc_html__( 'Experience', 'gymedge-core' ) . ':</span>'. esc_html( $gym_experience ) . '</p>';?>
						<?php echo empty( $gym_age ) ? '' : '<p><span>'. esc_html__( 'Age', 'gymedge-core' ) . ':</span>' . esc_html( $gym_age ) . '</p>';?>
						<?php echo empty( $gym_weight ) ? '' : '<p><span>' . esc_html__( 'Weight', 'gymedge-core' ) . ':</span>'. esc_html( $gym_weight ) . '</p>';?>
						<?php echo empty( $gym_email ) ? '' : '<p><span>' . esc_html__( 'Email', 'gymedge-core' ) . ':</span><a href="mailto:'. esc_attr( $gym_email ) . '">' . esc_html( $gym_email ) . '</a></p>';?>
						<?php echo empty( $gym_phone ) ? '' : '<p><span>' . esc_html__( 'Phone', 'gymedge-core' ) . ':</span><a href="mailto:' . esc_attr( $gym_phone ) . '">'. esc_html( $gym_phone ) . '</a></p>';?>
						<?php if ( !empty( $gym_socials ) ): ?>						
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( !empty( $gym_socials ) && $social_display ): ?>
					<div class="trainer-info">
						<ul>
							<?php foreach ( $gym_socials as $gym_key => $gym_social ): ?>
								<?php if ( !empty( $gym_social ) ): ?>
									<li><a target="_blank" href="<?php echo esc_attr( $gym_social );?>"><i class="fa <?php echo esc_attr( GymEdge::$trainer_social_fields[$gym_key]['icon'] );?>"></i></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>