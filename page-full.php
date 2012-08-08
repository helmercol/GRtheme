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
		<div class="entry">
		<h2 class="full"><?php the_title(); ?></h2>
		<?php the_content(); ?>
		</div><!-- FIN página -->
		
		<?php else : ?>
		
		<div class="notfound">
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that is not here.</p>
		</div>
		<?php endif; ?>
		
	</div><!-- FIN contenido -->
	
<?php get_footer(); ?>
