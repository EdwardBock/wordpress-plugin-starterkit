<?php

/**
 * Plugin Name:         WordPress Plugin Starterkit
 * Description:         It is a starterkit for plugin development
 * Version:             1.0.0
 * Requires at least:   5.0
 * Tested up to:        6.5.3
 * Author:              Edward Bock <hi@edwardbock.de>
 * Author URI:          http://www.edwardbock.de/starterkits/wordpress-plugin
 * Requires PHP:        8.1
 * Text Domain:         start
 * License:             https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 *
 */

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Assets;

require_once __DIR__ . "/vendor/autoload.php";

class Plugin extends Components\Plugin {

	const HANDLE_SCRIPT_SIMPLE_ADMIN = "simple-admin";
	const HANDLE_STYLE_SIMPLE_ADMIN = "simple-admin";

	const REST_NAMESPACE_V1 = "starterkit/v1/";

	const SCHEDULE = "starterkit_tasks";

	const OPTION_MY_DATABASE_VERSION = "my_database_version";

	public Assets $assets;
	public MyDatabase $database;

	function onCreate(): void {
		$this->assets = new Assets($this);

		$this->database = new MyDatabase();
		new MyDatabaseUpdates();

		new REST($this);
		new Schedule($this);
		new Admin($this);
		new MyDatabaseUpdates($this);
		new PostsTable($this);

		if (defined('WP_CLI') && \WP_CLI) {
			new CLI();
		}
	}

	public function onSiteActivation(): void {
		$this->database->createTables();
	}
}

Plugin::instance();

require_once __DIR__ . "/public-functions.php";