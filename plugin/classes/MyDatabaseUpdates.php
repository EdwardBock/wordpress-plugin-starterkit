<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Update;

class MyDatabaseUpdates extends Update {

	function getVersion(): int {
		return 2;
	}

	function getCurrentVersion(): int {
		return intval(get_option(Plugin::OPTION_MY_DATABASE_VERSION, 0));
	}

	function setCurrentVersion(int $version) {
		update_option(Plugin::OPTION_MY_DATABASE_VERSION, $version);
	}


	function update_1() {
		// do the update
	}

}