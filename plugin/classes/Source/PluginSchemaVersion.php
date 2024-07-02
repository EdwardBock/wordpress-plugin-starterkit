<?php

namespace WordPressPluginStarterkit\Source;

use WordPressPluginStarterkit\Plugin;

class PluginSchemaVersion {
	function getCurrentVersion(): int {
		return intval(get_option(Plugin::OPTION_MY_DATABASE_VERSION, 0));
	}

	function setCurrentVersion(int $version): bool {
		return update_option(Plugin::OPTION_MY_DATABASE_VERSION, $version);
	}
}