<?php
/**
 * Polite Mode Template: "Scheduled Maintenance"
 * Theme: Clean, Professional Blue w/ Bento Grid Contact Info
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduled Maintenance</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --bg-color: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --primary-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            --surface-color: #ffffff;
            --border-color: #e2e8f0;
            --shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
            /* Soft shadow */
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            background-image:
                radial-gradient(at 0% 0%, hsla(217, 91%, 93%, 1) 0, transparent 50%),
                radial-gradient(at 100% 100%, hsla(219, 83%, 93%, 1) 0, transparent 50%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
        }

        .container {
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        /* Main Message Card */
        .message-card {
            text-align: center;
            margin-bottom: 30px;
            animation: fadeIn 0.6s ease-out;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #eff6ff;
            color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 0 0 8px rgba(59, 130, 246, 0.1);
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 12px;
            letter-spacing: -0.5px;
        }

        p.desc {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 16px;
            margin: 0 auto;
            max-width: 90%;
        }

        /* Bento Grid Layout for Developer Profile */
        .bento-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            animation: slideUp 0.7s ease-out;
        }

        .bento-card {
            background: var(--surface-color);
            padding: 16px;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .bento-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.1);
        }

        /* Profile Card (Full Width) */
        .profile-card {
            grid-column: span 2;
            display: flex;
            flex-direction: row;
            /* Horizontal layout */
            align-items: center;
            gap: 15px;
            text-align: left;
            padding: 20px;
        }

        .dev-avatar {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dev-details h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .dev-details span {
            font-size: 14px;
            color: var(--text-muted);
            display: block;
            margin-top: 4px;
        }

        /* Contact Action Cards */
        .contact-card {
            text-decoration: none;
            color: var(--text-main);
            align-items: center;
            text-align: center;
            gap: 10px;
        }

        .contact-icon {
            width: 36px;
            height: 36px;
            background: #f1f5f9;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            margin-bottom: 5px;
            transition: all 0.2s;
        }

        .contact-card:hover .contact-icon {
            background: #3b82f6;
            color: #fff;
        }

        .contact-label {
            font-size: 14px;
            font-weight: 500;
        }

        /* Footer / Primary Action (Full Width) */
        .action-card {
            grid-column: span 2;
            padding: 0;
            border: none;
            overflow: hidden;
        }

        .main-btn {
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            display: block;
            padding: 18px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            transition: opacity 0.2s;
        }

        .main-btn:hover {
            opacity: 0.9;
        }

        /* Icons */
        svg {
            stroke-width: 2;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer Credits */
        .wppg-footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: var(--text-muted);
            opacity: 0.7;
        }

        .wppg-footer a {
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .wppg-footer a:hover {
            color: #3b82f6;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Top Section: Status Message -->
        <div class="message-card">
            <div class="icon-circle">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z">
                    </path>
                </svg>
            </div>
            <h1>Under Maintenance</h1>
            <p class="desc">We're improving our website to serve you better. We'll be back online shortly with new
                features.</p>
        </div>

        <!-- Bottom Section: Developer Bento -->
        <?php if (!empty($name) || !empty($photo)): ?>
            <div class="bento-grid">

                <!-- 1. Profile Card -->
                <div class="bento-card profile-card">
                    <?php if (!empty($photo)): ?>
                        <img src="<?php echo esc_url($photo); ?>" alt="Developer" class="dev-avatar">
                    <?php endif; ?>
                    <div class="dev-details">
                        <h3><?php echo esc_html($name); ?></h3>
                        <?php if (!empty($company)): ?>
                            <span><?php echo esc_html($company); ?></span>
                        <?php else: ?>
                            <span>Lead Developer</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- 2. Contact Stats/Actions -->
                <?php if (!empty($email)): ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="bento-card contact-card">
                        <div class="contact-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <span class="contact-label">Email Us</span>
                    </a>
                <?php endif; ?>

                <?php if (!empty($phone)): ?>
                    <a href="tel:<?php echo esc_attr($phone); ?>" class="bento-card contact-card">
                        <div class="contact-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>
                        <span class="contact-label">Call Now</span>
                    </a>
                <?php endif; ?>

                <!-- 3. Primary Action (Full Width) -->
                <?php if (!empty($link)): ?>
                    <div class="bento-card action-card">
                        <a href="<?php echo esc_url($link); ?>" class="main-btn">
                            Visit Support Portal &rarr;
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <div class="wppg-footer-refined">
            <div class="footer-left">
                <span class="plugin-name">WP Project Guard</span>
                <a href="https://github.com/engrhammadkhurshid/WP-Project-Gaurd" target="_blank" class="get-plugin-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                        </path>
                    </svg>
                    Get Plugin
                </a>
            </div>
            <div class="footer-right">
                <span class="dev-credit">Developed by <strong>Engr. Hammad Khurshid</strong></span>
                <div class="social-links">
                    <a href="mailto:engr.hammadkhurshid@gmail.com" title="Email"><svg width="16" height="16"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                            <polyline points="22,6 12,13 2,6" />
                        </svg></a>
                    <a href="https://github.com/engrhammadkhurshid" target="_blank" title="GitHub"><svg width="16"
                            height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                            </path>
                        </svg></a>
                    <a href="https://linkedin.com/in/hammadkhurshid" target="_blank" title="LinkedIn"><svg width="16"
                            height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect x="2" y="9" width="4" height="12" />
                            <circle cx="4" cy="4" r="2" />
                        </svg></a>
                </div>
            </div>
        </div>

    </div>

</body>

</html>