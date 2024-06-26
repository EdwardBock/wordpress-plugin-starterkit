<?php

/**
 * Plugin Name: %PLUGIN_NAME%
 * Description: %PLUGIN_DESCRIPTION%
 * Version: 1.0.0
 * Requires at least: 5.0
 * Tested up to: 6.5.3
 * Requires PHP: 8.0
 * Text Domain: %PLUGIN_DOMAIN%
 * License: https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 *
 */

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Assets;

require_once __DIR__ . "/vendor/autoload.php";

class Plugin extends Components\Plugin {

	const REST_NAMESPACE_V1 = "starterkit/v1/";
	const SCHEDULE = "starterkit_tasks";

	private Assets $assets;

	function onCreate() {
		$this->assets = new Assets($this);

		new REST($this);
		new Schedule($this);
	}

	public function onSiteActivation() {
		// do something on plugin activation on site
	}
}

Plugin::instance();

require_once __DIR__ . "/public-functions.php";