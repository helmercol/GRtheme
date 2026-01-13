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
		$gravatar_url = 'https://www.gravatar.com/avatar/' . md5(strtolower($author_email)) . '?s=' . $size . '&amp;d=' . dp_settings('gravatar_fallback');
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

#Paginación de entradas
function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
 
  $total = 1; //1 - muestra el texto "Página N de N", 0 - para no mostrar nada
  $a['mid_size'] = 5; //cuantos enlaces a mostrar a izquierda y derecha del actual
  $a['end_size'] = 1; //cuantos enlaces mostrar al comienzo y al fin
  $a['prev_text'] = '&laquo; Anterior'; //texto para el enlace "Página siguiente"
  $a['next_text'] = 'Siguiente &raquo;'; //texto para el enlace "Página anterior"
 
  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">P&aacute;gina ' . $current . ' de ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
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

function grtheme_setup() {
	load_theme_textdomain( 'grtheme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'grtheme_setup' );

function grtheme_enqueue_assets() {
	wp_enqueue_style(
		'grtheme-fonts',
		'https://fonts.googleapis.com/css2?family=Dosis:wght@200;400&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'grtheme-style', get_stylesheet_uri(), array( 'grtheme-fonts' ), null );
}
add_action( 'wp_enqueue_scripts', 'grtheme_enqueue_assets' );

function grtheme_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.gstatic.com';
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'grtheme_resource_hints', 10, 2 );
?>
