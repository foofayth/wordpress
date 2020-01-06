<?php
/**
automatically create and assign css id with achor icon to heading titles
 */
function auto_id_headings( $content ) {
	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'id=' ) ) :
			$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link"><i class="fas fa-link"></i></a>';
			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $heading_link . $matches[3] . $matches[4];
		endif;
		return $matches[0];
	}, $content );
    return $content;
}
add_filter( 'the_content', 'auto_id_headings' );
