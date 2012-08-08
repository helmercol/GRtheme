<?php get_header(); ?>
	
	<div id="content-archive">
	
	<h2 class="title">Resultados para <strong><?php the_search_query(); ?></strong></h2>
		
		<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post();
		?>
		
		<div class="archive">
		<div class="thumb"><a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'thumbnail', 'alt="' . $post->post_title . '"'); ?></a></div>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_excerpt(); ?></p>
		</div>
		
		<?php endwhile; ?>
		
		<p id="postnav">
			<?php next_posts_link('&laquo; Older Entries'); ?> &nbsp; 
			<?php previous_posts_link('Newer Entries &raquo;'); ?>
		</p>
		
		<?php else : ?>
		
		<div class="notfound">
			<h2>No encontrado</h2>
			<p>Lo sentimos, no hemos encontrado la p&aacute;gina que busca. Volver al <a href="/">Inicio</a></p>
			<p>
			
			<h2>Entradas recientes</h2>
				<?php query_posts('showposts=5'); ?>
				<ul>
				  <?php while (have_posts()) : the_post(); ?>
				  <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
				  <?php endwhile;?>
				</ul>
			</p>
		</div>
		<?php endif; ?>
		
	</div>
	
<?php get_footer(); ?>
