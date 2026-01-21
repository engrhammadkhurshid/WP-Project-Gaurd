<?php
/**
 * Standard Mode Template: "Project Handover in Progress"
 * Theme: Warm/Orange gradients, Professional "Construction" Vibe, Bento Grid for Dev Info
 */
?>
<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work in Progress</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;800&display=swap');

        :root {
            --bg-color: #ffffff;
            /* User requested white background */
            --text-main: #451a03;
            --text-muted: #92400e;
            --primary-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --accent-color: #f59e0b;
            --surface-color: #ffffff;
            --border-color: #fde68a;
            --shadow: 0 20px 50px -12px rgba(245, 158, 11, 0.15);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(#fde68a 1px, transparent 1px);
            background-size: 24px 24px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 25px;
            margin-top: 30px;
        }

        /* Layout */
        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: popIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Top Accent Line */
        .glass-panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--primary-gradient);
        }

        .icon-box {
            width: 72px;
            height: 72px;
            background: #fff7ed;
            color: var(--accent-color);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            transform: rotate(-5deg);
        }

        h1 {
            font-size: 26px;
            font-weight: 800;
            margin: 0 0 16px;
            letter-spacing: -0.5px;
            background: -webkit-linear-gradient(45deg, #d97706, #b45309);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.desc {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 16px;
            margin-bottom: 32px;
            font-weight: 500;
        }

        /* Bento Grid Component (Shared Logic, Custom Styling) */
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            text-align: left;
        }

        .bento-cell {
            background: #fff;
            border: 1px solid #fed7aa;
            padding: 14px;
            border-radius: 14px;
            transition: all 0.2s;
        }

        .bento-cell:hover {
            border-color: var(--accent-color);
            transform: translateY(-2px);
        }

        /* Profile Cell */
        .profile-cell {
            grid-column: span 2;
            display: flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(to right, #fff, #fff7ed);
        }

        .dev-img {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .dev-meta h3 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: #7c2d12;
        }

        .dev-meta span {
            font-size: 13px;
            color: #9a3412;
            opacity: 0.8;
            display: block;
            margin-top: 2px;
        }

        /* Action Links */
        .contact-link {
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #7c2d12;
            font-weight: 600;
            font-size: 13px;
            gap: 8px;
            padding: 16px;
        }

        .contact-link svg {
            color: var(--accent-color);
        }

        /* Primary Button */
        .primary-action {
            grid-column: span 2;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            padding: 16px;
            border-radius: 12px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            box-shadow: 0 10px 20px -5px rgba(245, 158, 11, 0.4);
            transition: transform 0.2s;
            border: none;
        }

        .primary-action:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 30px -5px rgba(245, 158, 11, 0.5);
        }

        @keyframes popIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Redesigned Footer Styles */
        .wppg-footer-refined {
            margin-top: 40px;
            padding: 30px 0 20px;
            background: #ffffff;
            border-top: 2px solid #fed7aa;
            text-align: center;
        }

        .footer-logo-row {
            margin-bottom: 20px;
        }

        .footer-logo {
            height: 100px;
            width: auto;
            display: inline-block;
            object-fit: contain;
            background: #ffffff;
            padding: 10px 20px;
            border-radius: 12px;
        }

        .footer-button-row {
            margin-bottom: 25px;
        }

        .get-plugin-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #ffffff;
            background: var(--primary-gradient);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 28px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .get-plugin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
        }

        .footer-credits-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid #ffedd5;
            gap: 20px;
        }

        .dev-credit {
            color: #92400e;
            font-size: 14px;
        }

        .dev-credit strong {
            color: #78350f;
            font-weight: 600;
        }

        .social-links {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: #fff7ed;
            color: #b45309;
            transition: all 0.2s ease;
        }

        .social-links a:hover {
            background: var(--accent-color);
            color: #ffffff;
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .footer-logo {
                height: 70px;
            }

            .footer-credits-row {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .get-plugin-btn {
                font-size: 14px;
                padding: 10px 24px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="glass-panel">

            <div class="icon-box">
                <!-- Hardhat / Construction Icon -->
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 17v-1c0-.828-.672-1.5-1.5-1.5h-17C2.672 14.5 2 15.172 2 16v1" />
                    <path d="M2 20h20" />
                    <path d="M12 3a7.5 7.5 0 0 0-7.5 7.5v4h15v-4A7.5 7.5 0 0 0 12 3z" />
                    <path d="M12 11h.01" />
                </svg>
            </div>

            <h1>Initial Handover in Progress</h1>
            <p class="desc">The site is currently in the final stages of development or pending final handover
                formalities. Public access is temporarily restricted.</p>

            <!-- Bento Grid for Profile -->
            <?php if (!empty($name) || !empty($photo)): ?>
                <div class="bento-grid">

                    <!-- Profile -->
                    <div class="bento-cell profile-cell">
                        <?php if (!empty($photo)): ?>
                            <img src="<?php echo esc_url($photo); ?>" alt="Developer" class="dev-img">
                        <?php endif; ?>
                        <div class="dev-meta">
                            <h3><?php echo esc_html($name); ?></h3>
                            <?php if (!empty($company)): ?>
                                <span><?php echo esc_html($company); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Contact Options -->
                    <?php if (!empty($email)): ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="bento-cell contact-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                            <span>Email</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($phone)): ?>
                        <a href="tel:<?php echo esc_attr($phone); ?>" class="bento-cell contact-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            <span>Call</span>
                        </a>
                    <?php endif; ?>

                    <!-- Complete Button -->
                    <?php if (!empty($link)): ?>
                        <a href="<?php echo esc_url($link); ?>" class="primary-action">
                            Complete Handover
                        </a>
                    <?php else: ?>
                        <!-- If no link specifically, span contact options to full or just leave as is/empty -->
                        <!-- Usually nicer to fill the gap if needed, but grid handles it ok -->
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <div class="wppg-footer-refined">
                <div class="footer-logo-row">
                    <img src="<?php echo esc_url(WPPG_URL . 'assets/images/logo-horizontal.webp'); ?>"
                        alt="WP Project Guard" class="footer-logo">
                </div>
                <div class="footer-button-row">
                    <a href="https://github.com/engrhammadkhurshid/WP-Project-Gaurd" target="_blank"
                        class="get-plugin-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                            </path>
                        </svg>
                        Get Plugin
                    </a>
                </div>
                <div class="footer-credits-row">
                    <div class="dev-credit">
                        Developed by <strong>Engr. Hammad Khurshid</strong>
                    </div>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/hammadkhurshid" target="_blank" title="LinkedIn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                        <a href="mailto:engr.hammadkhurshid@gmail.com" title="Email">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </a>
                        <a href="https://wa.me/923367126719" target="_blank" title="WhatsApp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>