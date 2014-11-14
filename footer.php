<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cascade
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php if ( is_active_sidebar( 'footer' ) ) : ?>
<div class="footer-widgets <?php echo esc_attr( cascade_footer_class() ); ?> clearfix">
	<div class="col-width">
		<?php dynamic_sidebar( 'footer' ); ?>
	</div>
</div><!-- .footer-widgets -->
<?php endif; ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="col-width">

		<?php if ( get_theme_mod( 'footer-text', customizer_library_get_default( 'footer-text' ) ) != '' ) : ?>
		<div class="site-info">
			<?php echo get_theme_mod( 'footer-text', customizer_library_get_default( 'footer-text' ) ); ?>
		</div><!-- .site-info -->
		<?php endif; ?>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav id="footer-navigation" class="clearfix" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'footer',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'depth' => -1
			) ); ?>
		</nav>
		<?php endif; ?>

	</div><!-- .col-width -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
