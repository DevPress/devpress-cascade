<?php
/**
 * Loop Nav Template
 *
 * This template is used to show your your next/previous post links on singular pages and
 * the next/previous posts links on the home/posts page and archive pages.
 *
 * @package Cascade
 * @subpackage Functions
 * @version 0.1.3
 * @author Justin Tadlock
 */
?>

	<?php if ( is_attachment() ) : ?>

		<div class="loop-nav">
			<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Return to entry', 'cascade' ) . '</span>' ); ?>
		</div><!-- .loop-nav -->

	<?php elseif ( is_singular( 'post' ) ) : ?>


		<div class="loop-nav">
			<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Previous', 'cascade' ) . '</span>' ); ?>
			<?php next_post_link( '%link', '<span class="next">' . __( 'Next <span class="meta-nav">&rarr;</span>', 'cascade' ) . '</span>' ); ?>
		</div><!-- .loop-nav -->

	<?php elseif ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) : loop_pagination( array( 'prev_text' => __( '<span class="meta-nav">&larr;</span> Previous', 'cascade' ), 'next_text' => __( 'Next <span class="meta-nav">&rarr;</span>', 'cascade' ) ) ); ?>

	<?php elseif ( !is_singular() && $nav = get_posts_nav_link( array( 'sep' => '', 'prelabel' => '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Previous', 'cascade' ) . '</span>', 'nxtlabel' => '<span class="next">' . __( 'Next &rarr;', 'cascade' ) . '</span>' ) ) ) : ?>

		<div class="loop-nav">
			<?php echo $nav; ?>
		</div><!-- .loop-nav -->

	<?php endif; ?>