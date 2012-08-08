<div class="break"></div>
<div class="footer-widgets">
		<div class="box">
			<div>	
				<?php if ( !function_exists('dynamic_sidebar')
				
						|| !dynamic_sidebar(2) ) : ?>
				
				<?php endif; ?>	
			</div>	
		</div>
		<div class="box">
			<div>
				<?php if ( !function_exists('dynamic_sidebar')
					
						|| !dynamic_sidebar(3) ) : ?>
					
				<?php endif; ?>	
			</div>
		</div>
		<div class="box-last">
			<div>	
				<?php if ( !function_exists('dynamic_sidebar')
				
						|| !dynamic_sidebar(4) ) : ?>
				
				<?php endif; ?>	
			</div>	
		</div>			
	
<div class="break"></div>
</div>
</div>
<!-- Inicio footer -->
	<footer>
		<div class="creditos">
			<p>GRtheme funciona con <a href="http://wordpress.org/" target="_blank">WordPress</a> Theme por <a href="http://twitter.com/helmercol">@helmercol</a> y <a href="http://hgrdesign.es">HGR Design</a></p>
		</div>
	</footer>
<!-- FIN footer -->
	
<?php wp_footer(); ?>

<!-- Analytics -->
<!-- Fin Analytics -->
</body>
</html>