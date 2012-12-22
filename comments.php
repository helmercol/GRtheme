<?php if (function_exists('wp_list_comments')) : ?>

<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Este es un post protegido. Por favor ingrese con su cuenta para poder dejar un comentario.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<h2>Comentarios<?php comments_number('', ' (1)', ' (%)' );?></h2>

	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // esto se muestra si no hay ningún comentario hasta el momento ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- Si los comentarios están abiertos, pero no hay. -->

	 <?php else : // comentarios cerrados ?>
		<!-- Si los comentarios están cerraods. -->
		<p class="nocomments">Comentarios cerrados.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h2><?php comment_form_title( 'Escribir un comentario', 'Escribir un comentario para %s' ); ?></h2>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Ha iniciado sesion como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Cerrar sesion">Cerrar sesion &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Nombre <?php if ($req) echo "(necesario)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Mail (No ser&aacute; publicado) <?php if ($req) echo "(necesario)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><button name="submit" type="submit" id="submit">Enviar comentario</button>
<?php comment_id_fields(); ?>
</p>
<?php # do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // Si es necesario el registro y no lo está ?>
</div>

<?php endif; ?>

<?php else: ?>

<?php
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // Si esto es un password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  //  y no está de acuerdo con la cookie
			?>
			<p>Entrada protegida por contraseña. Por favor, introduzca la contraseña para poder ver los comentarios.<p>
			<?php
			return;
		}
	}
/* Fondo de los comentarios */
$oddcomment = 'comment1';
?>
<h2>Comentarios<?php comments_number('', ' (1)', ' (%)' );?></h2> 
	<?php comments_number('<p>No hay comentarios</p>', '', '' );?>
	<?php if ($comments) : $first = true; ?>
	<?php foreach ($comments as $comment) : ?>
<div class="<?php echo $oddcomment; ?><?php if ($first) { echo ' first'; $first = false; } ?>" id="comment-<?php comment_ID() ?>">
	<div class="commentdetails">
		<p class="commentauthor"><?php comment_author_link() ?></p>
			<?php if ($comment->comment_approved == '0') : ?>
		<em>Comentario en espera. Debe ser moderado por un administrador.</em>
			<?php endif; ?>
		<p class="commentdate"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?>
		&nbsp; &nbsp; <?php edit_comment_link('Edit Comment','',''); ?>
		</p>
	</div>
		<?php dp_gravatar(); ?>
	<br class="break" />
	<?php comment_text() ?>
</div>
<?php endforeach; /* fin de cada comentario */ ?>
<?php endif; ?>
<h2 id="respond">Escribir un comentario</h2>
<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if ( $user_ID ) : ?>
	<p>Ha iniciado sesi&oacute;n como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Cerrar sesion">Cerrar sesion &raquo;</a></p>
	<?php else : ?>
		<p><input size="36" type="text" name="author" /> Name <span class="required">*</span></p>
		<p><input size="36" type="text" name="email" /> Mail <span class="required">*</span></p>
		<p><input size="36" type="text" name="url" /> Website</p>
	<?php endif; ?>
		<p><textarea rows="12" cols="42" name="comment"></textarea></p>
		<p><button name="submit" type="submit" id="submit" tabindex="5">Enviar comentario</button>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		<?php # do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; ?>
	<?php endif; ?>
	
<?php endif; ?>
