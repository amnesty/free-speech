<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package amnistia
 */

get_header(); ?>

<div class="row">
	<div class="large-9 columns">



		<div class="row"><!-- bucle de noticias -->
			<div class="large-4 columns">

			</div>
			<div class="large-8 columns">

			<ul class="large-block-grid-2">


			<?php while ( have_posts() ) : the_post(); ?>
			<li>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="foto_destacada">
						<div class="comentarios">
							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="comments_link"><?php comments_popup_link( '0', '1', '%' ); ?></span>
							<?php endif; ?>
						</div>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php	the_post_thumbnail('thumbnail'); ?>
							<div class="titulo_bucle">
								<h2><?php the_title(); ?></h2>
							</div>
						</a>
					</div>

					<div class="extracto_bucle">
						<?php the_excerpt(); ?>
					</div>

					<div class="meta_bucle">
						<?php amnistia_posted_on(); ?>
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( ' ' );
								if ( $categories_list && amnistia_categorized_blog() ) :
							?>
							<div class="meta_cat_bucle">
								<?php printf( '%1$s', $categories_list ); ?>
							</div>
							<?php endif; // End if categories ?>
						<?php endif; // End if 'post' == get_post_type() ?>
					</div>



				</article>
			</li>
			<?php endwhile; ?>
			</ul>


			</div>
		</div>

	</div>

	<div class="large-3 columns">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
