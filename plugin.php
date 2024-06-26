<?php

/**
 * Plugin Name:       WordPress Plugin Starterkit - DEV
 * Description:       Dev inc file
 * Version:           X.X.X
 * Requires at least: X.X
 * Tested up to:      X.X.X
 * Author:            Edward Bock <hi@edwardbock.de>
 * Author URI:        http://www.edwardbock.de
 * Domain Path:       /plugin/languages
 */

use WordPressPluginStarterkit\Plugin;

include dirname(__FILE__) . "/plugin/plugin.php";

register_activation_hook(__FILE__, function($multisite){
	Plugin::instance()->onActivation($multisite);
});

register_deactivation_hook(__FILE__, function($multisite){
	Plugin::instance()->onDeactivation($multisite);
});