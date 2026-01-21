<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renders the Admin Dashboard UI.
 */
class WPPG_Admin_UI
{

    public function init()
    {
        add_action('admin_menu', array($this, 'add_menu_page'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function add_menu_page()
    {
        add_menu_page(
            'Project Guard',
            'Project Guard',
            'manage_options',
            'wp-project-guard',
            array($this, 'render_page'),
            'dashicons-lock',
            90
        );
    }

    public function enqueue_assets($hook)
    {
        if ('toplevel_page_wp-project-guard' !== $hook) {
            return;
        }

        wp_enqueue_media(); // For image uploader

        wp_enqueue_style('wppg-admin-css', WPPG_URL . 'assets/admin.css', array(), WPPG_VERSION);
        wp_enqueue_script('wppg-admin-js', WPPG_URL . 'assets/admin.js', array('jquery'), WPPG_VERSION, true);
    }

    public function render_page()
    {
        // Retrieve current settings
        $options = get_option('wppg_settings', array());
        $status = wppg_get_option('status');
        $template_mode = wppg_get_option('template_mode');

        ?>
        <div class="wrap wppg-dashboard">
            <div class="wppg-header-brand">
                <img src="<?php echo esc_url(WPPG_URL . 'assets/images/logo-horizontal.webp'); ?>" alt="WP Project Guard"
                    class="wppg-main-logo">
            </div>

            <div class="wppg-tabs-nav">
                <button class="wppg-tab-link active" data-tab="control-center">Control Center</button>
                <button class="wppg-tab-link" data-tab="dev-profile">Developer Profile</button>
                <button class="wppg-tab-link" data-tab="about">About & Credits</button>
            </div>

            <form method="post" action="options.php">
                <?php settings_fields('wppg_settings_group'); ?>

                <div class="wppg-content">
                    <!-- Tab A: Control Center -->
                    <div id="control-center" class="wppg-tab-content active">

                        <!-- Status Switch -->
                        <div class="wppg-card status-card">
                            <h2>Protection Status</h2>
                            <label class="wppg-switch">
                                <input type="checkbox" name="wppg_settings[status]" value="on" <?php checked($status, 'on'); ?>>
                                <span class="wppg-slider round"></span>
                            </label>
                            <p class="description">Activate to lock the frontend.</p>
                        </div>

                        <!-- Bypass Key -->
                        <div class="wppg-card">
                            <h2>Bypass Key</h2>
                            <p>Allow clients to view the site without logging in by appending
                                <code>?guard_bypass=YOUR_KEY</code> to the URL.
                            </p>
                            <input type="text" name="wppg_settings[bypass_key]"
                                value="<?php echo esc_attr(wppg_get_option('bypass_key')); ?>" class="regular-text"
                                placeholder="e.g. secret123">
                        </div>

                        <!-- Template Selector -->
                        <div class="wppg-card">
                            <h2>Select Lock Screen Mode</h2>
                            <div class="wppg-template-selector">

                                <label class="template-option <?php echo ('polite' === $template_mode) ? 'selected' : ''; ?>">
                                    <input type="radio" name="wppg_settings[template_mode]" value="polite" <?php checked($template_mode, 'polite'); ?>>
                                    <div class="preview polite"></div>
                                    <div class="info">
                                        <h3>Polite</h3>
                                        <span>Scheduled Maintenance</span>
                                    </div>
                                </label>

                                <label class="template-option <?php echo ('standard' === $template_mode) ? 'selected' : ''; ?>">
                                    <input type="radio" name="wppg_settings[template_mode]" value="standard" <?php checked($template_mode, 'standard'); ?>>
                                    <div class="preview standard"></div>
                                    <div class="info">
                                        <h3>Standard</h3>
                                        <span>Project Handover</span>
                                    </div>
                                </label>

                                <label class="template-option <?php echo ('urgent' === $template_mode) ? 'selected' : ''; ?>">
                                    <input type="radio" name="wppg_settings[template_mode]" value="urgent" <?php checked($template_mode, 'urgent'); ?>>
                                    <div class="preview urgent"></div>
                                    <div class="info">
                                        <h3>Urgent</h3>
                                        <span>Service Suspended</span>
                                    </div>
                                </label>

                            </div> <!-- /template-selector -->
                        </div>
                    </div>

                    <!-- Tab B: Developer Profile -->
                    <div id="dev-profile" class="wppg-tab-content">
                        <div class="wppg-card">
                            <h2>Developer Information</h2>
                            <p>This info is displayed on the lock screen.</p>

                            <table class="form-table">
                                <tr>
                                    <th scope="row">Developer Photo</th>
                                    <td>
                                        <div class="image-preview-wrapper">
                                            <img id="wppg-img-preview"
                                                src="<?php echo esc_url(wppg_get_option('dev_photo')); ?>"
                                                style="max-width:100px; display: <?php echo wppg_get_option('dev_photo') ? 'block' : 'none'; ?>;" />
                                        </div>
                                        <input type="hidden" name="wppg_settings[dev_photo]" id="wppg-dev-photo"
                                            value="<?php echo esc_attr(wppg_get_option('dev_photo')); ?>">
                                        <button type="button" class="button" id="wppg-upload-btn">Upload Photo</button>
                                        <button type="button" class="button wppg-remove-img" id="wppg-remove-btn"
                                            style="display: <?php echo wppg_get_option('dev_photo') ? 'inline-block' : 'none'; ?>;">Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><input type="text" name="wppg_settings[dev_name]"
                                            value="<?php echo esc_attr(wppg_get_option('dev_name')); ?>" class="regular-text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Company / Agency</th>
                                    <td><input type="text" name="wppg_settings[dev_company]"
                                            value="<?php echo esc_attr(wppg_get_option('dev_company')); ?>"
                                            class="regular-text"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><input type="email" name="wppg_settings[dev_email]"
                                            value="<?php echo esc_attr(wppg_get_option('dev_email')); ?>" class="regular-text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone / WhatsApp</th>
                                    <td><input type="text" name="wppg_settings[dev_phone]"
                                            value="<?php echo esc_attr(wppg_get_option('dev_phone')); ?>" class="regular-text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment / Action Link</th>
                                    <td>
                                        <input type="url" name="wppg_settings[payment_link]"
                                            value="<?php echo esc_attr(wppg_get_option('payment_link')); ?>"
                                            class="regular-text">
                                        <p class="description">Optional. e.g., Stripe Invoice, Calendly, or Support
                                            Portal.<br>If left empty, this button will be hidden.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Tab C: About (Static, no inputs needed here usually, but keeping form structure is fine) -->
                    <div id="about" class="wppg-tab-content">
                        <div class="wppg-card about-card">
                            <div class="about-header-branding">
                                <img src="<?php echo esc_url(WPPG_URL . 'assets/images/brandmark.webp'); ?>"
                                    alt="WP Project Guard" class="wppg-brandmark-logo">
                            </div>
                            <h2>About WP Project Guard</h2>
                            <p><strong>Developer:</strong> Engr. Hammad Khurshid</p>
                            <p><strong>Email:</strong> <a
                                    href="mailto:engr.hammadkhurshid@gmail.com">engr.hammadkhurshid@gmail.com</a></p>
                            <p><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/hammadkhurshid"
                                    target="_blank">View Profile</a></p>

                            <hr>

                            <a href="https://www.buymeacoffee.com/" target="_blank" class="button button-primary">☕ Buy me a
                                Coffee</a>
                        </div>
                    </div>

                </div> <!-- /wppg-content -->

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
