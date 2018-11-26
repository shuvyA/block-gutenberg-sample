<?php
/**
 * Plugin Name: Gutenberg Block- shuvy: block Example
 * Plugin URI: https://github.com/shuvyA/block-gutenberg-sample
 * Description: A example Gutenberg block with content.
 * Author: shuvy
 * Author URI: https://shuvy.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue the block's assets for the editor.
 *
 * wp-blocks:  The registerBlockType() function to register blocks.
 * wp-element: The wp.element.createElement() function to create elements.
 * wp-i18n:    The __() function for internationalization.
 *
 * @since 1.0.0
 */
function mdlr_static_block_example_backend_enqueue() {
	wp_enqueue_script(
		'mdlr-static-block-example-backend-script', // Unique handle.
		plugins_url( 'block-static/block.js', __FILE__ ), // block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block-static/block.js' ) // filemtime — Gets file modification time.
	);
}
add_action( 'enqueue_block_editor_assets', 'mdlr_static_block_example_backend_enqueue' );




	function mdlr_editable_block_example_backend_enqueue() {
		// Scripts.
		wp_enqueue_script(
			'mdlr-editable-block-example-backend-script', // Unique handle.
			plugins_url( 'block-editable/block.js', __FILE__ ), // Block.js: We register the block here.
			array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
			filemtime( plugin_dir_path( __FILE__ ) . 'block-editable/block.js' ) // filemtime — Gets file modification time.
		);

	// Styles.
	// wp_enqueue_style(
	// 	'mdlr_block_editable', // Handle.
	// 	plugins_url( 'block_editable/editor.css', __FILE__ ), // Block editor CSS.
	// 	array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
	// 	filemtime( plugin_dir_path( __FILE__ ) . 'block_editable/editor.css' ) // filemtime — Gets file modification time.
	// );
} // End function mdlr_block_editable().

// Hook: Frontend assets.
add_action( 'enqueue_block_editor_assets', 'mdlr_editable_block_example_backend_enqueue' );