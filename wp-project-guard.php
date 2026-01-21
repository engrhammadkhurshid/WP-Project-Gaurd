<?php
/**
* Plugin Name: Project Guard
* Description: Restricts website access for client sites pending payment or final handover with professional lock
screens.
* Version: 1.0.0
* Author: Engr. Hammad Khurshid
* Author URI: https://www.linkedin.com/in/hammadkhurshid
* Text Domain: wp-project-guard
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
	exit;
}

// Define Constants
define('WPPG_VERSION', '1.0.0');
define('WPPG_PATH', plugin_dir_path(__FILE__));
define('WPPG_URL', plugin_dir_url(__FILE__));

// Include Files
require_once WPPG_PATH . 'includes/helpers.php';
require_once WPPG_PATH . 'includes/class-settings.php';
require_once WPPG_PATH . 'includes/class-admin-ui.php';
require_once WPPG_PATH . 'public/class-guard.php';

/**
 * Main Plugin Class
 */
class WP_Project_Guard
{

	private static $instance = null;

	public static function get_instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct()
	{
		// Initialize Sub-classes
		add_action('plugins_loaded', array($this, 'init'));
	}

	public function init()
	{
		// Settings
		$settings = new WPPG_Settings();
		$settings->init();

		// Admin UI
		if (is_admin()) {
			$admin_ui = new WPPG_Admin_UI();
			$admin_ui->init();
		}

		// Frontend Guard
		$guard = new WPPG_Guard();
		$guard->init();
	}
}

// Kick it off
WP_Project_Guard::get_instance();