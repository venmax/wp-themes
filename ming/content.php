<?php
/**
 * @since ming 1.0.0
**/
?>
		<div <?php post_class(''); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ming' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="info">
					<div class="infometa box">
						<?php the_category(' ');?>
					</div><span class="seprator">/</span>
					<div class="infometa">
						<?php the_time( get_option( 'date_format' )); ?>
					</div><span class="seprator">/</span>
					<div class="infometa">
						<?php comments_popup_link(); ?>
					</div>
			</div>
			<div class="clear"></div>
			<?php if ( has_post_thumbnail() ){ ?>
				<div class="thumb">
						<a href="<?php the_permalink() ?>" class="post-thumb">
						<?php the_post_thumbnail('thumbnail'); ?></a>
				</div>
			<?php }  ?>
			<div class="indexentry">
				<?php the_content(''); ?>
				<div class="clear"></div>
				<div><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ming' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php _e('Read More','ming');?></a></div>
			</div>
			<div class="clear"></div>
		</div>