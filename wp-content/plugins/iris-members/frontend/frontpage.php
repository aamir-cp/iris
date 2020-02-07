<?php if(!is_user_logged_in())
{
	wp_redirect( site_url().'/wp-login.php' );
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ )?>../assets/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ )?>../assets/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ )?>../assets/css/fixedHeader.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ )?>../assets/css/responsive.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/style.css"/>
 
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ )?>../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ )?>../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ )?>../assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ )?>../assets/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ )?>../assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ )?>../assets/js/responsive.bootstrap.min.js"></script>
	<?php wp_head(); 
	$user_meta_data = get_user_meta(wp_get_current_user()->ID);?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
		<header>
			<div class="container set_direction">
				<div class="row">
					<div class="col-sm-6">
						<div class="brand-wrapper">
							<a href="JavaScript:void(0);" class="brand"><img src="<?php echo site_url(); ?>/wp-content/uploads/2019/11/logo-header-aspire.jpg" alt=""/></a>
							<?php if(is_page(array(187, 185))) { ?>
								<h1>TEAM B - iris Office</h1>
							<?php } else if(is_page(248)) {?>
								<h1>TEAM C - iris Office</h1>
							<?php } else if(is_page(272)) {?>
								<h1>TEAM D - iris Office</h1>
							<?php } else {?>
								<h1><?php _e('TEAM A - iris Office' , 'iris-members'); ?></h1>
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="user-wrapper">
							<span class="profile_class" href="JavaScript:void(0);"><?php echo wp_get_current_user()->data->display_name ?> <i class="fa fa-chevron-down" aria-hidden="true"></i>
							 
							
							<ul class="profile_data_list">
								<?php /*<li><?php echo wp_get_current_user()->data->display_name ?></li>*/?>
								<li><a class="view_profile" href="<?php echo site_url(); ?>/profile/"><?php _e('View Profile' , 'iris-members'); ?></a></li>
                                <li><a class="logout_from_frontend" href="<?php echo wp_logout_url(home_url()) ?>"><?php _e('Log Out' , 'iris-members'); ?></a></li>
                                <li class="languages_select_li"><a class="language_select" href="JavaScript:void(0);"><?php _e('Language' , 'iris-members'); ?></a>
                                <ul class="languages_dropdown">
                                <?php
								foreach (icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str') as $languages)
								{
									?>
                                    <li><a class="language_select <?php echo ($languages['active'] == 1 ? 'selected' : ''); ?>" href="<?php echo $languages['url']; ?>"><?php echo $languages['native_name']; ?></a></li>
                                    <?php
								}
								 ?>
                                 </ul>
                                </li>
								
							</ul>
						   </span>
						</div>
					</div>
				</div>
			</div>
		</header>
        <?php $current_language = apply_filters( 'wpml_current_language', NULL ); ?>
		<?php if(is_page(array(187, 185))) : ?>
			<div class="header-2">
				<div class="container">
					<div class="wrapper-buttons">
						<button class="available"><?php _e('BUSY' , 'iris-members'); ?></button>
						<button class="counter"><?php _e('AVAILABLE' , 'iris-members'); ?></button>
					</div>
					<div class="back_btn_parent">
						<div class="back_btn"><a class="btn btn-default" href="<?php echo site_url().($current_language != 'en' ? '/'.$current_language : '').$user_meta_data['iris_home_url'][0]; ?>"><?php _e('Back to home', 'iris-members'); ?></a></div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div class="search-bar set_direction">
				<div class="container">
					<?php 
					/* 
					<div class="faserver">
						<i class="fa fa-server" aria-hidden="true"></i>
					</div> 
					*/ ?>
					<div class="counter_parent">
						<div class="counter">0</div>
					</div>
					<div class="form_parent">
					<form>
						<input type="text" class="top_search_bar" autocomplete="off">
						<button class="next_section"><?php _e('Re-open' , 'iris-members'); ?></button>
					</form>
					</div>
					<div class="back_btn_parent">
                    
						<div class="back_btn"><a class="btn btn-default" href="<?php echo site_url().($current_language != 'en' ? '/'.$current_language : '').$user_meta_data['iris_home_url'][0]; ?>"><?php _e('Back to home', 'iris-members'); ?></a></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<?php
					while ( have_posts() ) : the_post();
						the_content();
						print_r(the_post);
						echo 'test';
					endwhile;
				?>
			</div>
		</main>
	</section>
	<footer>
		<div class="container text-center">
			<p><?php _e('All rights reserved for <a target="_blank" href="http://inforr.co.uk/ ">iNFORR' , 'iris-members'); ?></a></p>
		</div>
	</footer>
<?php  wp_footer(); ?>
</body>
</html>

