<?php
/*
  Plugin Name: Old Post Warning
  Plugin URI: 
  Description: Show warning on old post.
  Version: 0.1
  Author: Midori IT Office, LLC
  Author URI: http://midoriit.com/
  License: GPLv2 or later
*/

function old_warn_handler( $atts ) {
	if ( is_single() )  {
		if( date('U') - get_the_time('U') > 60*60*24*365 ) { 
			return '<p><div class="old_post_warning">
			この記事は1年以上前に書かれました。<br/>
			内容が古くなっている可能性がありますのでご注意下さい。</div></p>';
		}
	}
}

add_shortcode('old_warn', 'old_warn_handler');

/*
 * CSS for Warning
 */
add_action( 'wp_print_styles', 'old_warn_css' );
function old_warn_css() {
	$css_file = plugins_url( 'wp-old-warn.css', __FILE__ );
	wp_enqueue_style( 'wp_old_warn', $css_file );
}
?>
