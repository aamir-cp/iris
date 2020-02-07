<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer>
		<div class="row r_footer">
			<p>Register Now</p>
			<button type="button" class="btn btn-primary"><a href="http://demoaspire.com/2019/iris/register/"></a>Register</button>
		</div>
		<div class="row end_footer">
			<div class="col-sm-4 quick_link">
				menu
			</div>
			<div class="col-sm-4 address">
				<ul>
					<li>7507 Old Chapel Drive Bowie Maryland 20715 United States</li>
					<li>Emergency# 1 – 855-487-0777</li>
					<li>Office# 1 – 301-367-1042</li>
					<li>Onsite Contact # 1 – 301-367-1042</li>
					<li>Fax: 301-805-9417</li>
					<li>Email: admin@autismfyi.org</li>
				</ul>
			</div>
			<div class="col-sm-4 follow">
				<i>Copyright © Afyi-Iris 2018</i>
			</div>
			
		</div>








	</footer>
<?php /* ?>
	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		<div class="site-info">
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
			<?php endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentynineteen' ) ); ?>" class="imprint">
				<?php
				/* translators: %s: WordPress. 
				printf( __( 'Proudly powered by %s.', 'twentynineteen' ), 'WordPress' );
				?>
			</a>
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?>
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon --> <?php */ ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</div>
</body>
</html>
