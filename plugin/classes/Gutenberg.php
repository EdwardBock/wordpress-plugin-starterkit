<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class Gutenberg extends Component {
	public function onCreate(): void {
		parent::onCreate();

		add_action('init', [$this, 'init']);
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_assets' ] );
	}

	public function init(): void {
		$this->plugin->assets->registerScript(
			Plugin::HANDLE_SCRIPT_GUTENBERG,
			"dist/gutenberg.js",
		);
		$this->plugin->assets->registerStyle(
			Plugin::HANDLE_SCRIPT_GUTENBERG,
			"dist/gutenberg.css",
		);
	}

	public function enqueue_block_editor_assets(): void {
		// EDITOR
		wp_enqueue_script(Plugin::HANDLE_SCRIPT_GUTENBERG);
		wp_enqueue_style(Plugin::HANDLE_STYLE_GUTENBERG);
	}

	public function enqueue_block_assets(): void {
		// EDITOR & FRONTEND
	}
}