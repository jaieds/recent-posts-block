<?php
/**
 * Plugin Name:       Recent Posts
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       recent-posts
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */
function create_block_recent_posts_block_init() {
	register_block_type( __DIR__, array(
		'render_callback' => 'recent_posts_callback'
	));
}
add_action( 'init', 'create_block_recent_posts_block_init' );


function recent_posts_callback($attributes) {
	$recent_posts = get_posts(array(
		'numberposts' => $attributes['num_posts']
	));

	$output = '<div class="rps-block">';
	$output .= '<h4>Recent Posts: </h4>';
	$output .= '<ul>';
	foreach ($recent_posts as $single_post) {
		$output .= '<li><a href="/'. $single_post->post_name .'">' . $single_post->post_title . '</a></li>';
	}
	$output .= '</ul></div>';
	return $output;
}
