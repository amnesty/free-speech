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
        <?php
            $logo_url = get_bloginfo( 'template_directory' ) . "/img/default_logo.png";
            $logo_alt = get_bloginfo( 'name' );

            if( function_exists( 'get_field_object' ) ) {
                $fields = get_field_object( 'logo_principal', 'options' );
                if( is_array( $fields['value'] ) ) {
                    if( array_key_exists( 'url', $fields['value'] ) ) {
                        $logo_url = $fields['value']['url'];
                        $logo_alt = $fields['value']['alt'];
                    }
                }
            }
        ?>
        <img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>" />
    </a></div>
  </div>
  <div class="large-8 columns"></div>
</div>


