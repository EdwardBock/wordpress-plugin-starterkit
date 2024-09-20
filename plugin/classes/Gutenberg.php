<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class Gutenberg extends Component {
	public function onCreate(): void {
		parent::onCreate();

		add_action('init', [$this, 'init']);
		add_action('enqueue_block_editor_assets', [$this, 'enqueue_block_editor_assets']);
		add_action('enqueue_block_assets', [$this, 'enqueue_block_assets']);
		add_filter('block_categories_all', [$this, 'block_categories_all']);
	}

	public function init(): void {
		$this->plugin->assets->registerScript(
			Plugin::HANDLE_SCRIPT_GUTENBERG,
			"dist/gutenberg.ts.js",
		);
		$this->plugin->assets->registerStyle(
			Plugin::HANDLE_SCRIPT_GUTENBERG,
			"dist/gutenberg.ts.css",
		);
		$path = $this->plugin->path;
		$dirs = glob("$path/blocks/*", GLOB_ONLYDIR);

		foreach ($dirs as $dir) {
			register_block_type($dir);
		}
	}

	public function enqueue_block_editor_assets(): void {
		// EDITOR
		wp_enqueue_script(Plugin::HANDLE_SCRIPT_GUTENBERG);
		wp_enqueue_style(Plugin::HANDLE_STYLE_GUTENBERG);
	}

	public function enqueue_block_assets(): void {
		// EDITOR & FRONTEND
	}

	public function block_categories_all($categories) {
		array_unshift($categories, [
			"slug" => "starterkit",
			"title" => "Starterkit",
		]);

		return $categories;
	}

}
