<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package amnistia
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
<div class="row">
  <div class="large-4 columns">
    <div class="logo"><a href="<?php echo get_option('home'); ?>">
    <?php $fields = get_field_object('logo_principal', 'options'); ?>
    <img src="<?php echo $fields['value']['url']; ?>" alt="<?php echo $fields['value']['alt']; ?>" />
    </a></div>
  </div>
  <div class="large-8 columns"></div>
</div>


