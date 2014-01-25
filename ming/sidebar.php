<?php
/**
 * @since ming 1.0.0
**/
 ?>
	<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	<?php else:?>
				<li id="recent-posts" class="widget-container widget_recent_posts">
				<span class="widgettitle"><?php _e('Recent Posts','ming');?></span>
					<ul id="recentposts">
						<?php
							$recent_posts = wp_get_recent_posts();
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
							}
						?>
					</ul>
				</li>
	<?php endif;?>
	</div><!-- #right-sidebar -->