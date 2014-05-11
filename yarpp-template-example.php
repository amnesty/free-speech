<?php
/*
YARPP Template: Simple
Author: Pepe.pro
Description: A simple example YARPP template.
*/
?><h3>Artículos relacionados</h3>
<?php if (have_posts()):?>
<ul class="large-block-grid-1">
	<?php while (have_posts()) : the_post(); ?>

  <li>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="foto_destacada">
        <div class="comentarios">
          <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
          <span class="comments_link"><?php comments_popup_link( '0', '1', '%' ); ?></span>
          <?php endif; ?>
        </div>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php the_post_thumbnail('thumbnail'); ?>
          <div class="titulo_bucle">
            <h2><?php the_title(); ?></h2>
          </div>
        </a>
      </div><br/>






    </article>
  </li>

	<?php endwhile; ?>
</ul>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
