<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class WPQueryExtension extends Component {

	const ORDER_BY_READING_TIME = "reading_time";

	public function onCreate(): void {
		parent::onCreate();
		add_filter('posts_join', array($this, 'posts_join'), 10, 2);
		add_filter('posts_orderby', [$this, 'order_by'], 10, 2);
	}

	private function isNeeded(\WP_Query $wp_query): bool {
		if (!empty($wp_query->get('orderby'))) {
			$orderby = $wp_query->get("orderby");
			if (is_array($orderby)) {
				if (in_array(self::ORDER_BY_READING_TIME, array_keys($orderby))) return true;
			} else {
				$parts = explode(" ", $wp_query->get("orderby"));
				if (in_array(self::ORDER_BY_READING_TIME, $parts)) return true;
			}
		}

		return false;
	}

	function posts_join(string $join, \WP_Query $wp_query): string {
		if (!$this->isNeeded($wp_query)) {
			return $join;
		}

		global $wpdb;
		$table = $this->plugin->readingTimeDB->table;
		return "$join LEFT JOIN $table ON ($wpdb->posts.ID = $table.post_id )";
	}


	public function order_by(string $orderby, \WP_Query $wp_query) {
		if (!$this->isNeeded($wp_query)) {
			return $orderby;
		}

		$direction = $wp_query->get("order", "desc");
		$comma = !empty($orderby) ? "," : "";
		$table = $this->plugin->readingTimeDB->table;
		return "$table.reading_time $direction $comma $orderby";

	}
}