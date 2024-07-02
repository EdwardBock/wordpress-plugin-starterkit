<?php

namespace WordPressPluginStarterkit\Source;

use WordPressPluginStarterkit\Components\Database;

class ReadingTimeDatabase extends Database {

	public string $table;

	function init(): void {
		$this->table = $this->wpdb->prefix."reading_time";
	}

	function set(int $post_id, int $time): bool|int {
		return $this->wpdb->replace(
			$this->table,
			[
				"post_id" => $post_id,
				"reading_time" => $time,
			],
			["%d", "%d"]
		);
	}

	function get(int $post_id):int|null {
		$result = $this->wpdb->get_var(
			$this->wpdb->prepare(
				"SELECT reading_time from {$this->table} where post_id = ?",
				$post_id
			)
		);
		return is_string($result) ? intval($result) : null;
	}

	public function createTables(): void {
		parent::createTables();

		\dbDelta( "CREATE TABLE IF NOT EXISTS $this->table
			(
			 post_id bigint(20) unsigned,
			 reading_time int NOT NULL,
			 primary key (post_id),
			 key (reading_time)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;" );
	}
}