<?php
/**
 * @package WordPress
 * @subpackage ming
 */
 ?>
	<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	<?php else:?>
				<li id="recent-posts" class="widget-container widget_recent_posts">
				<span class="widgettitle"><?php _e('Meta','ming');?></span>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
	<?php endif;?>
	</div><!-- #left-sidebar -->