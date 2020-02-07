<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */ ?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>
    <?php oceanwp_schema_markup( 'html' ); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

<style>#site-logo #site-logo-inner {
    display: table !important;
    vertical-align: baseline !important;
    height: 74px;
}body, nav ul li a .text-wrap, h1.page-header-title.clr {
    font-family: "Open Sans",sans-serif;
}
h1.page-header-title.clr {text-align: center;}
#site-header-sticky-wrapper.oceanwp-sticky-header-holder.is-sticky {
    height: 115px !important;
}
</style>        
<?php /* get theme options */ //$options = get_option('theme_settings'); 
global $current_user;
wp_get_current_user();?>
	<?php wp_head(); ?>
        <link href='http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' type="text/css" rel="stylesheet"/>
        <script src='http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
	<style>.logout, .user, .sidr-class-user {display: none;} #menu-primary-menu li a span {color:#FFF !important;} #menu-primary-menu li ul li a span {color:#000 !important;}</style>
<?php if(is_user_logged_in()){?>
<style>#wpadminbar, .login, .register, .sidr-class-register, .sidr-class-login{display: none;}.logout, .user, .sidr-class-user {    display: block;text-transform: capitalize;} </style>
<script>
$ = jQuery;
var jq = $.noConflict();
jq(document).ready(function () {  
	jq('.user>a>span.text-wrap').html('<?=$current_user->display_name;?><span class="nav-arrow fa fa-angle-down"></span>');
 });
</script>
<?php } ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>
			
			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?>>

				<?php do_action( 'ocean_page_header' ); ?>
