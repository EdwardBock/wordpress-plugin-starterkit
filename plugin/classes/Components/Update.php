<?php


namespace WordPressPluginStarterkit\Components;


abstract class Update {

	public function __construct() {
		add_action( 'admin_init', [ $this, 'checkUpdates' ] );
	}

	/**
	 * version of the final data structure
	 * @return int
	 */
	abstract function getVersion(): int;

	/**
	 * version of the data structure at this moment
	 * @return int
	 */
	abstract function getCurrentVersion(): int;

	/**
	 * @param int $version
	 *
	 */
	abstract function setCurrentVersion(int $version);

	/**
	 * check for updates
	 */
	function checkUpdates() {
		$current_version = $this->getCurrentVersion();

		for ( $i = $current_version + 1; $i <= $this->getVersion(); $i ++ ) {
			$method = "update_{$i}";
			if ( method_exists( $this, $method ) ) {
				$this->$method();
				$this->setCurrentVersion( $i );
			}
		}

	}

}