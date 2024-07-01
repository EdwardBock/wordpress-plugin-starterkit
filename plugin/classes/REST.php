<?php

namespace WordPressPluginStarterkit;

class REST extends Components\Component {

	public function onCreate(): void {
		parent::onCreate();
		add_action( 'rest_api_init', [ $this, 'rest_api_init' ] );
	}

	public function rest_api_init(): void {

		// public endpoint
		register_rest_route( Plugin::REST_NAMESPACE_V1, 'entities', array(
			'methods'             => \WP_REST_Server::READABLE,
			'callback'            => [ $this, 'get_all_entities' ],
			'permission_callback' => '__return_true',
		) );

	}

	public function get_all_entities(): array {
		// TODO: get data and return it
		return [];
	}

}