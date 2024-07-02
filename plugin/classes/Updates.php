<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Update;
use WordPressPluginStarterkit\Source\PluginSchemaVersion;

class Updates extends Update {

	public function __construct(
		private readonly PluginSchemaVersion $version
	) {
		parent::__construct();
	}

	function getVersion(): int {
		return 2;
	}

	function getCurrentVersion(): int {
		return $this->version->getCurrentVersion();
	}

	function setCurrentVersion(int $version): void {
		$this->version->setCurrentVersion($version);
	}

	function update_1(): void {
		// do the update
	}

}