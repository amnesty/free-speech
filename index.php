<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package amnistia
 */

get_header(); ?>

<div class="row">
	<div class="large-9 columns">

		<?php
		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }
		$args = array('posts_per_page' => 1, 'paged' => $paged, 'post_type' => array('post'));
		query_posts($args);
		if ( have_posts() ) : while (have_posts()) : the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row">
				<div class="large-4 columns">

					<div class="meta_ultima_noticia">
						<div class="hide-for-small-only hide-for-medium-only">

							<div class="avatar">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
							</div>
							<div class="posted_on">
								<?php amnistia_posted_on(); ?>
								<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ' ', 'amnistia' ) );
								?>
								<div class="meta_cat">
								<?php printf( __( '%1$s', 'amnistia' ), $categories_list ); ?>
								</div>
							</div>

							<!-- AddThis Button BEGIN -->
							<div class="iconos_sociales">
							<p style="margin:0 0 5px 5px"><?php _e( 'Share', 'amnistia' ); ?></p>
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

				</div>
				<div class="large-8 columns">


					<div class="foto_destacada">
						<div class="comentarios">
							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="comments_link"><?php comments_popup_link( __( '0', 'amnistia' ), __( '1', 'amnistia' ), __( '%', 'amnistia' ) ); ?></span>
							<?php endif; ?>
						</div>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php	the_post_thumbnail('medium'); ?>
							<div class="titulo">
								<h1><?php the_title(); ?></h1>
							</div>
						</a>
					</div>


					<div class="show-for-small-only show-for-medium-only meta_ultima_noticia_small">

						<div class="avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
						</div>
						<div class="posted_on">
							<?php amnistia_posted_on(); ?>
							<?php
							/* translators: used between list items, there is a space after the comma */
							$categories_list = get_the_category_list( __( ' ', 'amnistia' ) );
							?>
							<div class="meta_cat">
								<?php printf( __( '%1$s', 'amnistia' ), $categories_list ); ?>
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

					</div><br/>

					<div class="extracto">
						<?php the_excerpt(); ?>  <a href="<?php the_permalink(); ?>" rel="bookmark"> Leer más... </a>
					</div>

				</div>
			</div>
		</article>

		<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>

		<div class="row"><!-- bucle de noticias -->
			<div class="large-4 columns">

			</div>
			<div class="large-8 columns">

			<ul class="large-block-grid-2">
			<?php
			if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
			elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
			else { $paged = 1; }
			$args = array('posts_per_page' => 8, 'paged' => $paged, 'post_type' => array('post'), 'offset' => 1);
			query_posts($args);
			if ( have_posts() ) : while (have_posts()) : the_post();
			?>
			<li>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="foto_destacada">
						<div class="comentarios">
							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="comments_link"><?php comments_popup_link( __( '0', 'amnistia' ), __( '1', 'amnistia' ), __( '%', 'amnistia' ) ); ?></span>
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
						<?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" rel="bookmark"> Leer más... </a>
					</div>

					<div class="meta_bucle">
						<?php amnistia_posted_on(); ?>
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ' ', 'amnistia' ) );
								if ( $categories_list && amnistia_categorized_blog() ) :
							?>
							<div class="meta_cat_bucle">
								<?php printf( __( '%1$s', 'amnistia' ), $categories_list ); ?>
							</div>
							<?php endif; // End if categories ?>
						<?php endif; // End if 'post' == get_post_type() ?>
					</div>



				</article>
			</li>
			<?php endwhile; ?>
			</ul>
			<?php else : ?>
			</ul>
			<?php endif; ?>



			</div>
		</div>

	</div>

	<div class="large-3 columns">
		<?php get_sidebar(); ?>
	</div>

</div>



<?php get_footer(); ?>
