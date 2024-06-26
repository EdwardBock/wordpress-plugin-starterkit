<?php


namespace WordPressPluginStarterkit\Components;

abstract class Component {

	protected \WordPressPluginStarterkit\Plugin $plugin;

	public function __construct(\WordPressPluginStarterkit\Plugin $plugin) {
		$this->plugin = $plugin;
		$this->onCreate();
	}

	/**
	 * overwrite this method in component implementations
	 */
	public function onCreate(): void {
		// init your hooks and stuff
	}
}