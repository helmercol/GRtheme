<?php get_header(); ?>
	
	<!-- Contenido del sitio -->
	<div id="content-full">
	
		<?php 
		if (have_posts()) : the_post();
		?>
		
		<!-- begin post -->
		<div class="thumbpost">
		<?php the_post_thumbnail('post'); ?>
		</div>
		<h2><?php the_title(); ?></h2>
		<article class="entry">
		<div class="fecha">Art&iacute;culo publicado el <?php the_time('l, F j, Y') ?>. Guardado en la categor&iacute;a: <?php the_category(', ') ?></div>
		<?php the_content(); ?>
		</article>
		<!-- end post -->
		
		<div class="redessociales">
		<ul class="social" id="css3">
		<li class="compartir">
			<p>Compartir:</p>
		</li>
		   <li class="twitter">
			  <a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?> v&iacute;a @helmercol" title="Env&iacute;a este art&iacute;culo a Twitter!" target="_blank">
				 <strong>twitter</strong>
			  </a>
		   </li>
		   <li class="facebook">
			  <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Env&iacute;a este art&iacute;culo a facebook!" target="_blank">
				 <strong>facebook</strong>
			  </a>
		   </li>
		</ul>
		<div class="break"></div>
		</div>
		
		<div id="comments">
			<?php comments_template(); ?>
		</div>
		
		<?php else : ?>
		
		<div class="notfound">
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that is not here.</p>
		</div>
		<?php endif; ?>
		
	</div>
	<!-- FIN contenido -->
	
<?php get_footer(); ?>
