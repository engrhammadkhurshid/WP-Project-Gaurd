<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Helper functions for WP Project Guard
 */

if (!function_exists('wppg_get_option')) {
    /**
     * Get a specific option from the plugin settings.
     *
     * @param string $key The key to retrieve.
     * @param mixed $default Optional default value.
     * @return mixed
     */
    function wppg_get_option($key, $default = false)
    {
        $options = get_option('wppg_settings', array());

        // Define global defaults
        $defaults = array(
            'status' => 'off',
            'bypass_key' => '',
            'template_mode' => 'polite',
            'dev_name' => '',
            'dev_photo' => '',
            'dev_company' => '',
            'dev_email' => '',
            'dev_phone' => '',
            'payment_link' => '',
        );

        // Merge defaults with saved options
        $options = wp_parse_args($options, $defaults);

        if (array_key_exists($key, $options)) {
            return $options[$key];
        }

        return $default;
    }
}

if (!function_exists('wppg_is_active')) {
    /**
     * Check if the guard is active.
     * 
     * @return bool
     */
    function wppg_is_active()
    {
        return 'on' === wppg_get_option('status');
    }
}
