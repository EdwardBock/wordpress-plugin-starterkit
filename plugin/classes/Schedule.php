<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class Schedule extends Component {
	public function onCreate(): void {
		parent::onCreate();
		add_action('admin_init', [$this, 'init']);
		add_action(Plugin::SCHEDULE, [$this, 'execute']);
	}

	public function init(): void {
		if(!wp_next_scheduled(Plugin::SCHEDULE)){
			wp_schedule_event(time(), 'hourly', Plugin::SCHEDULE);
		}
	}

	public function execute(): void {
		// TODO: implement code that runs on schedule
	}
}