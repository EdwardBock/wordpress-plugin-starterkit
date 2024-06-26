<?php

namespace WordPressPluginStarterkit;

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

class CLI {

	/**
	 * Run something
	 *
	 * ## OPTIONS
	 *
	 * [--value=<size>]
	 * : some value
	 * ---
	 * default: -1
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp starterkit --value=2
	 *
	 * @when after_wp_load
	 */
	public function run($args, $assoc_args){
		$size = isset($assoc_args["value"]) ? intval($assoc_args["value"]) : -1;

		$plugin = Plugin::instance();

		// TODO: do stuff

		\WP_CLI::success( "Success!" );
	}

}


\WP_CLI::add_command(
	"starterkit",
	__NAMESPACE__."\CLI",
	array(
		'shortdesc' => 'Starterkit commands.',
	)
);