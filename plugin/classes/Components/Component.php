<?php


namespace WordPressPluginStarterkit\Components;

abstract class Component {


	public function __construct(
		public \WordPressPluginStarterkit\Plugin $plugin
	) {
		$this->onCreate();
	}

	/**
	 * overwrite this method in component implementations
	 */
	public function onCreate(): void {
		// init your hooks and stuff
	}
}