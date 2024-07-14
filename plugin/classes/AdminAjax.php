<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class AdminAjax extends Component {

	public function onCreate(): void {
		parent::onCreate();

		// authenticated ajax endpoint
		add_action('wp_ajax_starterkit', [$this, 'starterkit']);
		// public ajax endpoint
		add_action('wp_ajax_nopriv_starterkit', [$this, 'starterkit']);
	}

	public function starterkit(): void {

	}
}