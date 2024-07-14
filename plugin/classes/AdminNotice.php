<?php

namespace WordPressPluginStarterkit;

use WordPressPluginStarterkit\Components\Component;

class AdminNotice extends Component {

	public function onCreate(): void {
		parent::onCreate();

		add_action('admin_notices', [$this, 'createNotice']);
	}

	public function createNotice(): void {
		?>
        <div class="notice is-dismissible">
            <p><?php _e('Did the wordpress plugin starterkit help you and saved time?', Plugin::DOMAIN); ?></p>
            <p><a href="https://donate.stripe.com/test_5kA8wMbsf7aA7n24gj" class="button button-primary"><?php _e("Donation", Plugin::DOMAIN); ?></a>
            <p>
            <p><a href="https://donate.stripe.com/test_5kA8wMbsf7aA7n24gj" class="button button-primary"><?php _e("Github Sponsorship", Plugin::DOMAIN); ?></a></p>
            <p><a href="https://buymeacoffee.com/edwardbock"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy me a coffee"/></a></p>
        </div>
		<?php
	}
}