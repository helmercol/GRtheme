<?php get_header(); ?>
	
	<!-- Contenido del sitio -->
	<div id="content-fullindex">
		
		<!-- The Loop -->
		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<!-- Empieza el artículo -->
		<article class="postindex">
		
		<?php the_post_thumbnail('index'); ?>
		
		<div class="mask">
		 <!-- Mostramos el titulo con el enlace al post. -->
		 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		 
		 <!-- Mostramos la fecha del post. -->
		 <small>Publicado el <?php the_time('l, F j, Y') ?></small>
		 
		 <!-- Mostramos el contenido del post. -->
		   <p><?php the_excerpt(); ?></p>
		   <a class="info" href="<?php echo get_permalink(); ?>">Leer entrada</a>
		 </div>
		
		</article>
		<!-- Fin del artículo -->
		 
		<!-- Finaliza en parte el loop, Si no se encuentran posts  mostramos un mensaje de error o advertencia. -->
		 <?php endwhile; else: ?>
		
		 <!-- Mensaje que se muestra si no hay posts -->
		 <p>Lo sentimos, no hemos encontrado la página que busca.</p>
		
		 <!-- FIN The Loop -->
		 <?php endif; ?>
		 <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		 
		</div>
		<!-- FIN Contenido -->

		<div class="break"></div>
		
		<div class="tweetimg">
			<a href="http://twitter.com/helmercol" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/tweetimage.png" title="Seguir a @helmercol"/></a>
		</div>
		<div class="tweet">
			<p><?php displayLatestTweet('helmercol'); ?></p>
		</div>
	
<?php get_footer(); ?>
