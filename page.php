<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package amnistia
 */

get_header(); ?>

<div class="row">
	<div class="large-9 columns">

		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row">
				<div class="large-4 columns">

						<div class="meta_ultima_noticia">

							<div class="avatar">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
							</div>
							<div class="posted_on">
								<?php amnistia_posted_on(); ?>
									<?php
										/* translators: used between list items, there is a space after the comma */
										$categories_list = get_the_category_list( ' ' );
									?>
								<div class="meta_cat">
									<?php printf( '%1$s', $categories_list ); ?>
								</div>
							</div>

              <!-- AddThis Button BEGIN -->
              <div class="iconos_sociales">
	              <div class="addthis_toolbox addthis_default_style">
	                  <a class="addthis_button_facebook socials facebook"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	                  <a class="addthis_button_twitter socials twitter"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	                  <a class="addthis_button_google_plusone_share socials google"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	              </div>
              </div>
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50c864ed595e3642"></script>
              <!-- AddThis Button END -->


						</div>

				</div>
				<div class="large-8 columns">


					<div class="foto_destacada">
						<div class="comentarios">
							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="comments_link"><?php comments_popup_link( '0', '1', '%' ); ?></span>
							<?php endif; ?>
						</div>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php	the_post_thumbnail('medium'); ?>
							<div class="titulo">
								<h1><?php the_title(); ?></h1>
							</div>
						</a>
					</div>


				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
						<div class="imagenes_laterales">
							<?php the_field('galeria_izquierda'); ?>
						</div>
				</div>
				<div class="large-8 columns">
					<div class="extracto">
						<?php the_excerpt(); ?>
					</div>

					<div class="contenido">
						<?php the_content(); ?>
					</div>

					<div class="meta_bucle">
						<?php
						/* translators: used between list items, there is a space after the comma */
						$tags_list = get_the_tag_list( '', ' ' );
						if ( $tags_list ) :
						?>
						<div class="meta_tag">
						<?php printf( '%1$s', $tags_list ); ?>
						</div>
						<?php endif; // End if $tags_list ?>
					</div>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
					comments_template();
					?>
				</div>
		</article>

		<div class="row">
			<div class="large-4 columns">

			</div>
			<div class="large-8 columns">
				<?php
				    if ( function_exists( 'related_posts' ) ) {
					related_posts();
				    }
				?>
			</div>
		</div>

		<?php endwhile; ?>

	</div>

	<div class="large-3 columns">
		<?php get_sidebar() ?>
	</div>

</div>
<?php get_footer(); ?>
