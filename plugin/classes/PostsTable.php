<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class PostsTable extends Component {

	public function onCreate(): void {
		parent::onCreate();

		add_action('init', [$this, 'init']);
	}

	public function init(): void {
		add_action("manage_pages_custom_column", [$this, 'custom_columns'], 10, 2);
		add_filter('manage_pages_columns', [$this, 'add_column']);

		$types = get_post_types(['public' => true]);
		foreach ($types as $type) {

			add_action("manage_{$type}_posts_custom_column", [$this, 'custom_columns'], 10, 2);
			add_filter("manage_{$type}_posts_columns", [$this, 'add_column']);

			add_filter("manage_edit-{$type}_sortable_columns", [$this, 'set_sortable']);
		}
	}

	public function add_column(array $columns): array {

		$columns[WPQueryExtension::ORDER_BY_READING_TIME] = __('Reading Time', Plugin::DOMAIN);

		return $columns;
	}

	public function custom_columns($column, $post_id): void {
		if ($column == WPQueryExtension::ORDER_BY_READING_TIME) {
			$time = $this->plugin->readingTimeDB->get($post_id);
			echo $time ?? "–";
		}
	}

	public function set_sortable(array $cols): array {
		$cols[WPQueryExtension::ORDER_BY_READING_TIME] = [WPQueryExtension::ORDER_BY_READING_TIME, 1];
		return $cols;
	}


}