<?php get_header(); ?>
	
	<!-- Contenido del sitio -->
	<div id="content">
	
		<?php 
		if (have_posts()) : the_post();
		?>
		
		<!-- Empieza el post -->
		<article class="entry">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		</article>
		<!-- FIN post -->
		
		<?php else : ?>
		
		<article class="notfound">
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that is not here.</p>
		</article>
		<?php endif; ?>
		
	</div>
	<!-- FIN contenido -->
	
<?php get_sidebar(); get_footer(); ?>
