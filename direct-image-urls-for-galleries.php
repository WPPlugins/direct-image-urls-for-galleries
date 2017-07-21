<?php /*

**************************************************************************

Plugin Name:  Direct Image URLs For Galleries
Plugin URI:   http://www.viper007bond.com/wordpress-plugins/direct-image-urls-for-galleries/
Description:  Makes the thumbnails in <code>[gallery]</code> link to the fullsize image file rather than the page containing the medium thumbnail.
Version:      1.0.0
Author:       Viper007Bond
Author URI:   http://www.viper007bond.com/

**************************************************************************

Copyright (C) 2008 Viper007Bond

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/

add_filter( 'attachment_link', 'direct_image_urls_for_galleries', 10, 2 );

function direct_image_urls_for_galleries( $link, $id ) {
	if ( is_admin() ) return $link;

	$mimetypes = array( 'image/jpeg', 'image/png', 'image/gif' );

	$post = get_post( $id );

	if ( in_array( $post->post_mime_type, $mimetypes ) )
		return wp_get_attachment_url( $id );
	else
		return $link;
}

?>