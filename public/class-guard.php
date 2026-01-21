<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handles the frontend restricted access (Guard Mode).
 */
class WPPG_Guard
{

    public function init()
    {
        add_action('template_redirect', array($this, 'check_access'), 1);
    }

    public function check_access()
    {
        // 1. Is the guard active?
        if (!wppg_is_active()) {
            return;
        }

        // 2. Is the user an administrator?
        if (current_user_can('manage_options')) {
            return; // Admins are immune
        }

        // 3. Handle Bypass Logic
        $bypass_key = wppg_get_option('bypass_key');

        // Check URL parameter
        if (!empty($bypass_key) && isset($_GET['guard_bypass']) && $_GET['guard_bypass'] === $bypass_key) {
            // Valid key provided. Set a cookie for 24 hours to allow navigation.
            setcookie('wppg_bypass_auth', md5($bypass_key), time() + DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN);
            return;
        }

        // Check Cookie
        if (!empty($bypass_key) && isset($_COOKIE['wppg_bypass_auth']) && $_COOKIE['wppg_bypass_auth'] === md5($bypass_key)) {
            return;
        }

        // If we are here, access is DENIED.
        $this->render_lock_screen();
    }

    private function render_lock_screen()
    {
        // Send 503 Header (SEO Protection)
        header('HTTP/1.1 503 Service Unavailable');
        header('Status: 503 Service Unavailable');
        header('Retry-After: 3600');

        // Get Data for Template
        $template_mode = wppg_get_option('template_mode', 'polite');

        // Prepare Developer Data
        $dev_data = array(
            'photo' => wppg_get_option('dev_photo'),
            'name' => wppg_get_option('dev_name'),
            'company' => wppg_get_option('dev_company'),
            'email' => wppg_get_option('dev_email'),
            'phone' => wppg_get_option('dev_phone'),
            'link' => wppg_get_option('payment_link'),
        );

        // Locate Template
        $template_file = WPPG_PATH . 'public/templates/' . $template_mode . '.php';

        if (!file_exists($template_file)) {
            // Fallback if file missing
            echo '<h1>Site is currently unavailable.</h1>';
            exit;
        }

        // Load Template
        // We extract $dev_data so variables are available in the template as $photo, $name, etc.
        extract($dev_data);

        include $template_file;
        exit;
    }
}
