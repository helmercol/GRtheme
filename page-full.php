<?php 
/**
 * Template Name: Ancho Total
 * Description: Página de sin sidebar
 */
get_header(); ?>
	
	<!-- Contenido del sitio -->
	<div id="content-full">
	
		<?php 
		if (have_posts()) : the_post();
		?>
		
		<!-- Empieza la página -->
		<article class="entry">
		<h2 class="full"><?php the_title(); ?></h2>
		<?php the_content(); ?>
		</article><!-- FIN página -->
		
		<?php else : ?>
		
		<article class="notfound">
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that is not here.</p>
		</article>
		<?php endif; ?>
		
	</div><!-- FIN contenido -->
	
<?php get_footer(); ?>
