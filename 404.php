<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package amnistia
 */

get_header(); ?>

<div class="row">
	<div class="large-9 columns">



		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row">
				<div class="large-4 columns">

				</div>
				<div class="large-8 columns">
					<div class="contenido">
						<br/><br/><br/><br/><p>Parece que no se ha encontrado nada en esta localización.</p>
					</div>


				</div>
			</div>
		</article>



	</div>

	<div class="large-3 columns">
		<?php get_sidebar() ?>
	</div>

</div>

<?php get_footer(); ?>
