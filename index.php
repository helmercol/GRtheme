<?php get_header(); ?>
	
	<!-- Contenido del sitio -->
	<div id="content-fullindex">
		
		<!-- Start the Loop -->
		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="postindex">
		
		<?php if (  (function_exists('dp_attachment_image')) && (dp_attachment_image())) : ?>
		<?php dp_attachment_image($post->ID, 'index', 'alt="' . $post->post_title . '"'); ?>
		<?php endif;?>
		
		<div class="mask">
		 <!-- Mostramos el titulo con el enlace al post. -->
		 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		 
		 <!-- Mostramos la fecha del post. -->
		 <small>Publicado el <?php the_time('l, F j, Y') ?></small>
		 
		 <!-- Mostramos el contnido del post. -->
		   <p><?php the_excerpt(); ?></p>
		   <a class="info" href="<?php echo get_permalink(); ?>">Leer entrada</a>
		 </div>
		
		</div><!-- Cerramos el div post -->
		 
		<!-- Finaliza en parte el loop, Si no se ecnuentran posts  mostramos un mensaje de error o advertencia. -->
		 <?php endwhile; else: ?>
		
		 <!-- Mensaje que se muestra si no hay posts -->
		 <p>Lo sentimos, no hemos encontrado la p&aacute;gina que busca.</p>
		
		 <!-- FIN The Loop -->
		 <?php endif; ?>
		
	</div><!-- FIN Contenido -->
	<div class="break"></div>
	<div class="tweetimg">
		<a href="http://twitter.com/helmercol" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/tweetimage.png" title="Seguir a @helmercol"/></a>
	</div>
	<div class="tweet">
		<p><?php displayLatestTweet('helmercol'); ?></p>
	</div>
	
<?php get_footer(); ?>
