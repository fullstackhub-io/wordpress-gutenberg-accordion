<?php
/**
 * Plugin Name: Tomodomo › Gutenberg › Text Accordion Block
 * Plugin URI: https://tomodomo.co
 * Description: Simple text accordion for Gutenberg
 * Author: Tomodomo
 * Author URI: https://tomodomo.co
 * Version: 1.0.0
 * Text Domain: tomodomo-block-text-accordion
 * Domain Path: /languages
 * Tags: gutenberg, block
 * Stable tag: 1.0.0
 * License: MIT
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

// Plugin folder path
if (!defined('TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_DIR')) {
	define('TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// Plugin folder URL
if (!defined('TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_URL')) {
	define('TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_URL', plugin_dir_url(__FILE__));
}

// Initialise the block
if (!class_exists('\Tomodomo\Gutenberg\Block\TextAccordion')) {
	require 'lib/TextAccordion.php';

	$block = new \Tomodomo\Gutenberg\Block\TextAccordion();
	$block->init();
}
