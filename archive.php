<?php get_header(); ?>
	
	<div id="content-archive">
	
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h2 class="title">Art&iacute;culos de la categor&iacute;a: <strong><?php single_cat_title(); ?></strong></h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2 class="title">Entradas con el tag <strong><?php single_tag_title(); ?></strong></h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2 class="title">Archivos del d&iacute;a<?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2 class="title">Archivos del mes <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2 class="title">Archivos del a&ntilde;o <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2 class="title">Entradas escritas por</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 class="title">Archivo de entradas</h2>
	<?php } ?>
		
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
		<div class="break"></div>
		<p id="postnav">
			<?php next_posts_link('&laquo; Older Entries'); ?> &nbsp; 
			<?php previous_posts_link('Newer Entries &raquo;'); ?>
		</p>
		
		<?php else : ?>
		
		<div class="notfound">
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that is not here.</p>
		</div>
		<?php endif; ?>
		
	</div>
	
<?php get_footer(); ?>
