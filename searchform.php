<?php
/**
 * Search form template
 *
 * @package Cascade
 */
?>

<form role="search" method="get" class="search-form clearfix" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'cascade' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e( 'Search...', 'cascade' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'cascade' ); ?>" />
	</label>
	<button type="submit" class="search-submit">
		<div class="cascade-icon-search"></div><span class="screen-reader-text"><?php _e( 'Search...', 'cascade' ); ?></span>
	</button>
</form>
