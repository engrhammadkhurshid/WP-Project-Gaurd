<?php
/**
 * Urgent Mode Template: "Service Suspended - Payment Pending"
 * Theme: Critical Red, Dark Mode, High Contrast, Bento Grid for resolution
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Suspended</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap');

        :root {
            --bg-color: #0f172a;
            /* Very dark slate */
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --primary: #ef4444;
            /* Critical red */
            --primary-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            --surface-color: #1e293b;
            --border-color: #334155;
            --shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 24px;
        }

        /* Card Layout */
        .urgent-card {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow);
            text-align: center;
            border-top: 4px solid var(--primary);
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }

        .icon-pulse {
            width: 80px;
            height: 80px;
            background: rgba(239, 68, 68, 0.1);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
            animation: pulse-red 2s infinite;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            margin: 0 0 12px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        p.desc {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 15px;
            margin-bottom: 30px;
        }

        /* Bento Grid Component */
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            text-align: left;
        }

        .bento-cell {
            background: #253347;
            /* Slightly lighter than surface */
            border: 1px solid var(--border-color);
            padding: 14px;
            border-radius: 12px;
            transition: all 0.2s;
        }

        .bento-cell:hover {
            border-color: #475569;
            background: #2b3950;
        }

        /* Profile Cell */
        .profile-cell {
            grid-column: span 2;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .dev-img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #334155;
        }

        .dev-meta h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
        }

        .dev-meta span {
            font-size: 13px;
            color: #94a3b8;
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
            color: #cbd5e1;
            font-weight: 500;
            font-size: 13px;
            gap: 8px;
            padding: 16px;
        }

        .contact-link:hover {
            color: #fff;
        }

        .contact-link svg {
            color: var(--primary);
        }

        /* Essential Action Button */
        .urgent-action {
            grid-column: span 2;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            padding: 16px;
            border-radius: 12px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            font-size: 14px;
            box-shadow: 0 10px 30px -10px rgba(239, 68, 68, 0.5);
            transition: opacity 0.2s;
            border: none;
            margin-top: 5px;
        }

        .urgent-action:hover {
            opacity: 0.9;
        }

        @keyframes pulse-red {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 15px rgba(239, 68, 68, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }

        @keyframes shake {

            10%,
            90% {
                transform: translate3d(-1px, 0, 0);
            }

            20%,
            80% {
                transform: translate3d(2px, 0, 0);
            }

            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0);
            }

            40%,
            60% {
                transform: translate3d(4px, 0, 0);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="urgent-card">

            <div class="icon-pulse">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>

            <h1>Service Suspended</h1>
            <p class="desc">This website has been temporarily suspended pending a required action or payment. Please
                contact the administrator immediately to restore access.</p>

            <!-- Bento Grid Start -->
            <?php if (!empty($name) || !empty($photo)): ?>
                <div class="bento-grid">

                    <!-- Developer Identity -->
                    <div class="bento-cell profile-cell">
                        <?php if (!empty($photo)): ?>
                            <img src="<?php echo esc_url($photo); ?>" alt="Developer" class="dev-img">
                        <?php endif; ?>
                        <div class="dev-meta">
                            <h3>Contact <?php echo esc_html($name); ?></h3>
                            <?php if (!empty($company)): ?>
                                <span><?php echo esc_html($company); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Contact Buttons -->
                    <?php if (!empty($email)): ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="bento-cell contact-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
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

                    <!-- Critical Action -->
                    <?php if (!empty($link)): ?>
                        <a href="<?php echo esc_url($link); ?>" class="urgent-action">
                            Resolve Issue Now
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <div class="wppg-footer">
                <p>Protected by <a href="https://github.com/hammadkhurshid" target="_blank">WP Project Guard</a></p>
            </div>

        </div>
    </div>

</body>

</html>