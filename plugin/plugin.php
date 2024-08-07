<?php

/**
 * Plugin Name:         WordPress Plugin Starterkit
 * Description:         It is a starterkit for plugin development
 * Version:             1.0.0
 * Requires at least:   6.0
 * Tested up to:        6.5.5
 * Author:              Edward Bock <hi@edwardbock.de>
 * Author URI:          http://www.edwardbock.de/starterkits/wordpress-plugin
 * Requires PHP:        8.1
 * Text Domain:         starterkit
 * Domain Path:         /languages
 * License:             GPLv3 or later
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 *
 */

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Assets;
use WordPressPluginStarterkit\Source\PluginSchemaVersion;
use WordPressPluginStarterkit\Source\ReadingTimeDatabase;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once __DIR__ . "/vendor/autoload.php";

class Plugin extends Components\Plugin {

	const DOMAIN = "starterkit";

	/*
	 * templates
	 */
	const THEME_FOLDER = "plugin-parts";

	/*
	 * ACTIONS and FILTERS
	 */
	const FILTER_ADD_TEMPLATES_PATHS = "starterkit_add_templates_paths";

	/*
	 * METAS and OPTIONS
	 */
	const OPTION_MY_DATABASE_VERSION = "my_database_version";

	/*
	 * SCRIPTS and STYLES
	 */
	const HANDLE_SCRIPT_SIMPLE_ADMIN = "simple-admin";
	const HANDLE_STYLE_SIMPLE_ADMIN = "simple-admin";
	const HANDLE_SCRIPT_ADMIN = "admin";
	const HANDLE_STYLE_ADMIN = "admin";
	const HANDLE_SCRIPT_GUTENBERG = "gutenberg";
	const HANDLE_STYLE_GUTENBERG = "gutenberg";

	/*
	 * REST
	 */
	const REST_NAMESPACE_V1 = "starterkit/v1/";

	/*
	 * Schedule
	 */
	const SCHEDULE = "starterkit_tasks";

	/*
	 * Properties
	 */
	public Assets $assets;
	public PluginSchemaVersion $pluginSchemaVersion;
	public ReadingTimeDatabase $readingTimeDB;
	public Templates $templates;

	function onCreate(): void {
		$this->assets = new Assets($this);

		$this->templates = new Templates($this);
		$this->templates->useThemeDirectory(self::THEME_FOLDER);
		$this->templates->useAddTemplatePathsFilter(self::FILTER_ADD_TEMPLATES_PATHS);

		$this->pluginSchemaVersion = new PluginSchemaVersion();
		$this->readingTimeDB = new ReadingTimeDatabase();
		new Updates($this->pluginSchemaVersion);

		new REST($this);
		new Schedule($this);
		new Admin($this);
		new PostsTable($this);
		new Gutenberg($this);
		new WPQueryExtension($this);
		new AdminNotice($this);

		if (defined('WP_CLI') && \WP_CLI) {
			new CLI();
		}
	}

	public function onSiteActivation(): void {
		$this->readingTimeDB->createTables();
	}
}

Plugin::instance();

require_once __DIR__ . "/public-functions.php";