<?php

namespace Tomodomo\Gutenberg\Block;

class TextAccordion
{

	/**
	 * Block attributes
	 *
	 * @var array
	 */
	protected $attributes;

	/**
	 * Start the plugin
	 *
	 * @return void
	 */
	public function init()
	{
		$this->registerHooks();

		return;
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @return void
	 */
	private function registerHooks()
	{
		add_action('init', [$this, 'register']);

		return;
	}

	/**
	 * Registers block (scripts/style)
	 *
	 * @return void
	 */
	public function register()
	{
		if (!function_exists('register_block_type')) {
			return;
		}

		// Front-end JS
		wp_register_script(
			'tomodomo-block-text-accordion-js-main',
			TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_URL . 'assets/script.js',
			[
				'jquery',
			],
			filemtime(TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_DIR . 'assets/script.js'),
			true
		);

		// Block editor JS
		wp_register_script(
			'tomodomo-block-text-accordion-js-editor',
			TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_URL . 'build/script.js',
			[
				'wp-i18n',
				'wp-blocks',
				'wp-element',
			],
			filemtime(TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_DIR . 'build/script.js')
		);

		// Global style
		wp_register_style(
			'tomodomo-block-text-accordion-css-main',
			TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_URL . 'build/style.css',
			[],
			filemtime(TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_DIR . 'build/style.css')
		);

		// Editor style
		wp_register_style(
			'tomodomo-block-text-accordion-css-editor',
			TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_URL . 'build/editor.css',
			[],
			filemtime(TOMODOMO_BLOCK_TEXT_ACCORDION_PLUGIN_DIR . 'build/editor.css')
		);

		// Register the block
		$args = [
			'attributes' => [
				'headerContent' => [
					'type' => 'array',
				],
			],
			'editor_script' => 'tomodomo-block-text-accordion-js-editor',
			'editor_style'  => 'tomodomo-block-text-accordion-css-editor',
		];

		// Conditionally load front-end CSS
		if (apply_filters('Tomodomo\Gutenberg\Block\TextAccordion\enqueueFrontEndCss', true)) {
			$args['style'] = 'tomodomo-block-text-accordion-css-main';
		}

		// Conditionally load front-end JS
		if (apply_filters('Tomodomo\Gutenberg\Block\TextAccordion\enqueueFrontEndJs', true)) {
			add_action('wp_enqueue_scripts', function () {
				wp_enqueue_script('tomodomo-block-text-accordion-js-main');
			});
		}

		register_block_type('tomodomo/block-text-accordion', $args);

		return;
	}

}
