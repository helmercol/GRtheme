<?php
# WIDGET: Top Sidebar
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Top Sidebar',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
		'before_widget' => '<div class="box">',
        'after_widget' => '</div>',
    ));
# Inicio Widegts para el pie de página
# WIDGET: Footer Uno
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer uno',
        'before_title' => '<h2 class="box">',
        'after_title' => '</h2>',
		'before_widget' => '<div class="w-footer">',
        'after_widget' => '</div>',
    ));
# WIDGET: Footer Dos
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer dos',
        'before_title' => '<h2 class="box">',
        'after_title' => '</h2>',
		'before_widget' => '<div class="w-footer">',
        'after_widget' => '</div>',
    ));
# WIDGET: Footer Tres
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer tres',
        'before_title' => '<h2 class="box">',
        'after_title' => '</h2>',
		'before_widget' => '<div class="w-footer">',
        'after_widget' => '</div>',
    ));

# Displays post image attachment (sizes: thumbnail, medium, full)
function dp_attachment_image($postid=0, $size='thumbnail', $attributes='') {
	if ($postid<1) $postid = get_the_ID();
	if ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_mime_type' => 'image',)))
		foreach($images as $image) {
			$attachment=wp_get_attachment_image_src($image->ID, $size);
			?><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> /><?php
		}
}

# Imagen de gravatar en el usuario
function dp_gravatar($size=50, $attributes='', $author_email='') {
	global $comment, $settings;
	if (dp_settings('gravatar')=='enabled') {
		if (empty($author_email)) {
			ob_start();
			comment_author_email();
			$author_email = ob_get_clean();
		}
		$gravatar_url = 'http://www.gravatar.com/avatar/' . md5(strtolower($author_email)) . '?s=' . $size . '&amp;d=' . dp_settings('gravatar_fallback');
		?><img src="<?php echo $gravatar_url; ?>" <?php echo $attributes ?>/><?php
	}
}

# Retrieves the setting's value depending on 'key'.
function dp_settings($key) {
	global $settings;
	return $settings[$key];
}
# Limite caracteres entradas.
function custom_excerpt_length( $length ) {
	return 14;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

# Soporte para imagen destacada.
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

add_image_size( 'index', 310, 235, true );
add_image_size( 'post', 980, 300, true );

#tweets en index
function displayLatestTweet($twitterID){
	include_once(ABSPATH.WPINC.'/rss.php');
	$latest_tweet = fetch_rss("http://search.twitter.com/search.atom?q=from:" . $twitterID . "&rpp=1");
	echo $latest_tweet->items[0]['atom_content'];
}
#menu personalizado
if ( function_exists( 'register_nav_menus' ) ) {
register_nav_menus(
array(
  'nombre-menu1' => 'nav1',  //primer menu
  'nombre-menu2' => 'nav2' 	 //segundo menu
)
);
}
?>
