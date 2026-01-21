<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handles registering the plugin settings.
 */
class WPPG_Settings
{

    public function init()
    {
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function register_settings()
    {
        register_setting(
            'wppg_settings_group',
            'wppg_settings',
            array($this, 'sanitize')
        );
    }

    public function sanitize($input)
    {
        $sanitized_input = array();

        if (isset($input['status'])) {
            $sanitized_input['status'] = ('on' === $input['status']) ? 'on' : 'off';
        }

        if (isset($input['bypass_key'])) {
            $sanitized_input['bypass_key'] = sanitize_text_field($input['bypass_key']);
        }

        if (isset($input['template_mode']) && in_array($input['template_mode'], array('polite', 'standard', 'urgent'))) {
            $sanitized_input['template_mode'] = sanitize_text_field($input['template_mode']);
        } else {
            $sanitized_input['template_mode'] = 'polite';
        }

        // Developer Profile
        $text_fields = array('dev_name', 'dev_company', 'dev_email', 'dev_phone', 'dev_photo');
        foreach ($text_fields as $field) {
            if (isset($input[$field])) {
                $sanitized_input[$field] = sanitize_text_field($input[$field]);
            }
        }

        if (isset($input['payment_link'])) {
            $sanitized_input['payment_link'] = esc_url_raw($input['payment_link']);
        }

        return $sanitized_input;
    }
}
