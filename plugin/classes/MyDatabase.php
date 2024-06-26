<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Database;

class MyDatabase extends Database {

	private string $table;

	function init(): void {
		$this->table = $this->wpdb->prefix."starterkit";
	}

	function setNumber(string $key, int $value) {
		$this->wpdb->replace(
			$this->table,
			[
				"number_key" => $key,
				"number_value" => $value,
			],
			["%d", "%d"]
		);
	}

	function getNumber(string $key):int|null {
		$result = $this->wpdb->get_var(
			$this->wpdb->prepare(
				"SELECT number_value from {$this->table} where number_key = ?",
				$key
			)
		);
		return is_string($result) ? intval($result) : null;
	}

	public function createTables(): void {
		parent::createTables();

		\dbDelta( "CREATE TABLE IF NOT EXISTS $this->table
			(
			 id bigint(20) unsigned auto_increment,
			 number_key varchar(60) NOT NULL,
			 number_value int NOT NULL,
			 primary key (id),
			 unique key (number_key)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;" );
	}
}