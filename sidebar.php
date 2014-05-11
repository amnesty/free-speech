<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package amnistia
 */
?>
<div class="busqueda">
	<?php get_search_form(); ?>
</div>
<div class="iconos_perfil">
	<a href="<?php the_field('facebook', 'options');?>" class="perfiles perfil_facebook" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	<a href="<?php the_field('twitter', 'options');?>" class="perfiles perfil_twitter" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	<a href="<?php the_field('youtube', 'options');?>" class="perfiles perfil_youtube" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	<a href="<?php the_field('feed', 'options');?>" class="perfiles perfil_rss" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	<a href="<?php the_field('fickr', 'options');?>" class="perfiles perfil_flickr" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
	<a href="<?php the_field('pinterest', 'options');?>" class="perfiles perfil_pinterest" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/blank.png"></a>
</div>
<div class="logo_escuelas">
    <?php
        $sidebar_logo_url = get_bloginfo( 'template_directory' ) . "/img/default_sidebar_logo.png";
        $sidebar_logo_alt = get_bloginfo( 'name' );

        if( function_exists( 'get_field_object' ) ) {
            $fields = get_field_object( 'logo', 'options' );
            if( array_key_exists( 'url', $fields['value'] ) ) {
                $sidebar_logo_url = $fields['value']['url'];
                $sidebar_logo_alt = $fields['value']['alt'];
            }
        }
    ?>
    <img src="<?php echo $sidebar_logo_url; ?>" alt="<?php echo $sidebar_logo_alt; ?>" />
</div>

<?php
    $sidebar_fondo_url = get_bloginfo( 'template_directory' ) . "/img/default_sidebar_fondo.png";

    if( function_exists( 'get_field_object' ) ) {
        $fields2 = get_field_object( 'logo_fondo_menu', 'options' );
        if( array_key_exists( 'url', $fields2['value'] ) ) {
            $sidebar_fondo_url = $fields['value']['url'];
        }
    }
?>
<nav id="site-navigation" class="main-navigation" role="navigation" style="background: url(<?php echo $sidebar_fondo_url; ?>) no-repeat left center;">
	<div class="screen-reader-text skip-link">
		<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'amnistia' ); ?>"><?php _e( 'Skip to content', 'amnistia' ); ?></a>
	</div>
	<?php wp_nav_menu( array( 'theme_location' =>'primary' ) ); ?>
</nav>
<!-- #site-navigation -->

<div class="articulos_destacados">
	<ul>
	<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }
	$args = array('posts_per_page' => 3, 'paged' => $paged, 'post_type' => array('post'), 'cat' => 4);
	query_posts($args);
	if ( have_posts() ) : while (have_posts()) : the_post();
	?>

	<li>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 ><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if ( 'post' == get_post_type() ) : ?>
			<span><?php amnistia_posted_on(); ?></span>
			<?php endif; ?>
		</article>
	</li>
	<?php the_field('facebook');?>
	<?php endwhile; ?>
	</ul>
	<?php else : ?>
	</ul>
	<?php endif; ?>
</div>
<div class="ultimos_tweets">
	<?php /** dynamic_sidebar('tweets'); */ ?>
</div>

<div class="row related">
	<div class="large-12 columns">
		<?php related_posts(); ?>
	</div>
</div>

