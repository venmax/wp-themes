<?php
/**
 * @since ming 1.0.0
**/

	if ( ! isset( $content_width ) ) $content_width = 900;
function ming_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */

	load_theme_textdomain( 'ming', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'automatic-feed-links' );
	
	register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'ming'),
	) );	
}
add_action( 'after_setup_theme', 'ming_setup' );


if ( ! function_exists( 'ming_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since ming 1.0.0
 *
 * @return void
 */
function ming_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'ming' ),
		'next_text' => __( 'Next &rarr;', 'ming' ),
	) );

	if ( $links ) :

	?>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	<?php
	endif;
}
endif;


function ming_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'ming_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}


function ming_scripts() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'ming_scripts' );

function ming_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ming' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'ming_wp_title', 10, 2 );

function ming_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'ming' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Additional sidebar that appears on the left.', 'ming' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<span class="widgettitle">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'ming' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'Main sidebar that appears on the right.', 'ming' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<span class="widgettitle">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'ming_widgets_init' );