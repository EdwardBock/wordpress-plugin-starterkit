<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class Admin extends Component {
	public function onCreate(): void {
		parent::onCreate();
		add_action('admin_init', [$this, 'admin_init']);
		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
	}

	public function admin_init(): void {
		$this->plugin->assets->registerScript(
			Plugin::HANDLE_SCRIPT_SIMPLE_ADMIN,
			"assets/simple-admin.js"
		);
		$this->plugin->assets->registerStyle(
			Plugin::HANDLE_STYLE_SIMPLE_ADMIN,
			"assets/simple-admin.css"
		);

		$this->plugin->assets->registerScript(
			Plugin::HANDLE_SCRIPT_ADMIN,
			"dist/admin.ts.js"
		);
		$this->plugin->assets->registerStyle(
			Plugin::HANDLE_STYLE_ADMIN,
			"dist/admin.ts.css"
		);

	}

	public function admin_enqueue_scripts(): void {
		wp_enqueue_script(Plugin::HANDLE_SCRIPT_SIMPLE_ADMIN);
		wp_enqueue_style(Plugin::HANDLE_STYLE_SIMPLE_ADMIN);

		wp_enqueue_script(Plugin::HANDLE_SCRIPT_ADMIN);
		wp_enqueue_style(Plugin::HANDLE_STYLE_ADMIN);
	}

}
