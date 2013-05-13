<?php
/**
 * A dark theme for Campaignify.
 *
 * @version 1.0
 */

/**
 * Set the background color default
 *
 * @since Campaignify Dark 1.0
 */
function campaignify_dark_default_background() {
	add_theme_support( 'custom-background', array(
		'default-color' => '242829'
	) );

	add_theme_support( 'custom-header', array(
		'default-text-color' => 'ffffff',
	) );
}
add_action( 'after_setup_theme', 'campaignify_dark_default_background' );

/**
 * Set the header color the same as the custom background.
 *
 * @since Campaignify Dark 1.0
 */
function campaignify_dark_background_color() {
?>
	<style id="campaignify-dark-header">
		.site-header,
		.nav-menu-primary .sub-menu,
		.nav-menu-primary .children,
		.site-primary-navigation,
		.campaign-backers-slider-item { 
			background-color: #<?php echo get_theme_mod( 'background_color' ); ?> 
		}

		@media (max-width: 1180px) {
			.nav-menu-primary li.login a {
				color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
			}
		}
	</style>
<?php
}
add_action( 'wp_head', 'campaignify_dark_background_color' );

/**
 * Set default customizer colors.
 *
 * @since Campaignify Dark 1.0
 */
function campaignify_dark_theme_mods( $mods ) {
	$mods[ 'colors' ][ 'campaignify_primary' ][ 'default' ] = '#02daaf';
	$mods[ 'colors' ][ 'campaignify_accent' ][ 'default' ]  = '#02daaf';

	$widgets = campaignify_campaign_widgets();

	if ( empty( $widgets ) )
		return $mods;

	$count = 0;

	foreach ( $widgets as $widget ) {
		$mods[ 'colors' ][ $widget[ 'id' ] . '_text' ][ 'default' ] = '#adadad';
		$mods[ 'colors' ][ $widget[ 'id' ] ][ 'default' ]           = $count % 2 ? '#242829' : '#1b1f1f';

		$count++;
	}

	return $mods;
}
add_filter( 'campaignify_theme_mods', 'campaignify_dark_theme_mods', 20 );