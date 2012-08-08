<?php 
/**
 * Template Name: Ancho Total
 * Description: P�gina de sin sidebar
 */
get_header(); ?>
	
	<!-- Contenido del sitio -->
	<div id="content-full">
	
		<?php 
		if (have_posts()) : the_post();
		?>
		
		<!-- Empieza la p�gina -->
		<div class="entry">
		<h2 class="full"><?php the_title(); ?></h2>
		<?php the_content(); ?>
		</div><!-- FIN p�gina -->
		
		<?php else : ?>
		
		<div class="notfound">
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that is not here.</p>
		</div>
		<?php endif; ?>
		
	</div><!-- FIN contenido -->
	
<?php get_footer(); ?>
