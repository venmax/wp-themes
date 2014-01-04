<?php
/**
 * @package WordPress
 * @subpackage summ
 */
 add_theme_support( 'automatic-feed-links' );
 
 if ( ! isset( $content_width ) ) $content_width = 900;
 	/** -----------------------------------------------
		 * custom background
	*/ 
	add_theme_support( 'custom-background');

	/** -----------------------------------------------
		 * LOCALIZATION
	*/ 
load_theme_textdomain('summ', get_template_directory() . '/languages');
 	/** -----------------------------------------------
		 * gets included in the site header
	*/ 
function header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
		.siteName a,.description{color:#<?php header_textcolor() ?>}
    </style><?php
}
	/** -----------------------------------------------
		 * gets included in the admin header
	*/ 
function admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
$defaults = array(
	'default-image'          => '%s/images/default_header.jpg',
	'random-default'         => false,
	'width'                  => 1000,
	'height'                 => 138,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '111111',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => 'header_style',
	'admin-head-callback'    => 'admin_header_style',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
    register_sidebar( array(
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	));
	/** -----------------------------------------------
		 * Theme uses wp_nav_menu() in one location. Chack if function exist
	*/ 
if( function_exists('register_nav_menus') )
register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'summ' ),
) );

function summ_filter_wp_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description' );
	$filtered_title = '';
    // If site front page, append description
    if ( is_front_page() ) {
        // Append Site Description to title
        $filtered_title .=$site_name.' | '.$site_description;
    }
	else{
	
    // Prepend name
    $filtered_title = $title.$site_name;
	}
    // Return the modified title
    return $filtered_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'summ_filter_wp_title' );

	/** -----------------------------------------------
	 * custom comments
	*/
function summ_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
<span class="avatarx"><?php echo get_avatar($comment,$size='40',$default='<path_to_url>' ); ?></span>
<div class="message_head">
<span class="name"><?php comment_author_link() ?></span>
<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
<br/>
<span class="date"><?php printf( __( '%1$s at %2$s', 'summ' ), get_comment_date(),  get_comment_time() ); ?></span>
<div class="cmt_text"><?php comment_text(); ?></div>
	</div>
</div>	
<?php }



/* Theme Options*/
function summ_theme_options(){
	$items = array (
		array(
			'id' => 'logo_src',
			'name' => __('Logo image', 'summ'),
			'desc' => __('Put your logo image address here (max size: 280px*100px). If empty, display blog title with text.', 'summ')
		),
		array(
			'id' => 'rss_url',
			'name' => __('RSS URL', 'summ'),
			'desc' => __('Put your full rss subscribe address here.(with http://). If empty, auto-set system defaults.', 'summ')
		),
		array(
			'id' => 'excerpt_check',
			'name' => __('Excerpt?', 'summ'),
			'desc' => __('If the home page and archive pages to display excerpt of post, check.', 'summ')
		),
		array(
			'id' => 'desc',
			'name' => __('Disable the site description','summ'),
			'desc' => __('Disabling this will remove the site description.', 'summ')
		)
	);
	return $items;
}

add_action( 'admin_init', 'summ_theme_options_init' );
add_action( 'admin_menu', 'summ_theme_options_add_page' );
function summ_theme_options_init(){
	register_setting( 'summ_options', 'summ_theme_options', 'summ_options_validate' );
}
function summ_theme_options_add_page() {
	add_theme_page( __( 'Theme Options' , 'summ'), __( 'Theme Options' , 'summ'), 'edit_theme_options', 'theme_options', 'summ_theme_options_do_page' );
}

function summ_default_options() {
	$options = get_option( 'summ_theme_options' );
	foreach ( summ_theme_options() as $item ) {
		if ( ! isset( $options[$item['id']] ) ) {
			$options[$item['id']] = '';
		}
	}
	update_option( 'summ_theme_options', $options );
}
add_action( 'init', 'summ_default_options' );

function summ_theme_options_do_page() {
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;
?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . sprintf( __( '%1$s Theme Options', 'summ' ), get_current_theme() )	 . "</h2>"; ?>
		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'summ' ); ?></strong></p></div>
		<?php endif; ?>
		<form method="post" action="options.php">
			<?php settings_fields( 'summ_options' ); ?>
			<?php $options = get_option( 'summ_theme_options' ); ?>
			<table class="form-table">
			<?php foreach (summ_theme_options() as $item) { ?>
				<?php if ($item['id'] == 'rss_url' || $item['id'] == 'logo_src') { ?>
				<tr valign="top" style="margin:0 10px;">
					<th scope="row"><?php echo $item['name']; ?></th>
					<td>
						<input name="<?php echo 'summ_theme_options['.$item['id'].']'; ?>" type="text" value="<?php if ( $options[$item['id']] != "") { echo $options[$item['id']]; } else { echo ''; } ?>" size="80" />
						<br/>
						<label class="description" for="<?php echo 'summ_theme_options['.$item['id'].']'; ?>"><?php echo $item['desc']; ?></label>
					</td>
				</tr>
				<?php } else { ?>
				<tr valign="top" style="margin:0 10px;">
					<th scope="row"><?php echo $item['name']; ?></th>
					<td>
						<input name="<?php echo 'summ_theme_options['.$item['id'].']'; ?>" type="checkbox" value="true" <?php if ( $options[$item['id']] ) { $checked = "checked=\"checked\""; } else { $checked = ""; } echo $checked; ?> />
						<label class="description" for="<?php echo 'summ_theme_options['.$item['id'].']'; ?>"><?php echo $item['desc']; ?></label>
					</td>
				</tr>
				<?php } ?>
			<?php } ?>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'summ' ); ?>" />
			</p>
		</form>
	</div>
<?php
}
function summ_options_validate($input) {
	foreach ( summ_theme_options() as $item ) {
		$input[$item['id']] = wp_filter_nohtml_kses($input[$item['id']]);
	}
	return $input;
}