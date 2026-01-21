=== Project Guard ===
Contributors: hamm007
Tags: maintenance, coming soon, lock screen, client handover, access control
Requires at least: 5.8
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Professionally manage client projects with custom lock screens for maintenance, handover, or payment suspension.

== Description ==

**Project Guard** minimizes the risk of non-payment or scope creep by allowing you to restrict frontend access with professional, aesthetically pleasing lock screens. Whether you are performing maintenance, handing over a project, or need to temporarily suspend service, Project Guard has the perfect template for the situation.

This plugin is designed specifically for **freelancers and agencies** who need a simple but effective way to control client access while maintaining a professional image.

### ✨ Key Features

*   **Three Professional Lock Modes:**
    *   **🔵 Polite (Scheduled Maintenance):** A friendly, calmness-inducing blue theme to inform visitors of temporary updates.
    *   **🟠 Standard (Handover in Progress):** A professional "construction/work in progress" orange theme, perfect for the pre-launch phase.
    *   **🔴 Urgent (Service Suspended):** A high-contrast, critical red theme for situations requiring immediate attention (e.g., pending payments).

*   **🍱 Bento Grid Developer Profile:**
    *   Beautifully display your developer identity directly on the lock screen.
    *   Showcase your photo, name, and agency details.
    *   One-click contact buttons for **Email** and **Phone/WhatsApp**.
    *   Prominent "Action Button" (e.g., Link to Stripe Invoice, Calendly, or Support Portal).

*   **🔐 Secure Access Control:**
    *   **Admin Access:**Logged-in administrators can always access the site normally.
    *   **Bypass Key:** Generate a unique secret key (e.g., `?guard_bypass=secret123`) to give clients temporary access without creating user accounts.

*   **🎨 Modern & Responsive Design:**
    *   Built with modern CSS (Glassmorphism, Gradients, Grid).
    *   Fully responsive and mobile-friendly.
    *   Uses professional "Outfit" typography.
    *   Smooth entry animations.

---

## 🚀 Installation & Setup

1.  **Download:**
    *   Clone this repository or download the ZIP file.

2.  **Upload:**
    *   Upload the `wp-project-guard` folder to your WordPress site's `wp-content/plugins/` directory.
    *   *Alternatively*, zip the folder and upload it via **Plugins > Add New > Upload Plugin** in the WordPress Admin Dashboard.

3.  **Activate:**
    *   Go to **Plugins** in your dashboard and activate **WP Project Guard**.

4.  **Configure:**
    *   Navigate to the new **Project Guard** menu item in the sidebar.
    *   **Control Center:** Select your desired **Template Mode** (Polite, Standard, Urgent) and set the **Protection Status** to "On".
    *   **Developer Profile:** Enter your details (Name, Photo, Contact info, Payment Link) to populate the frontend cards.
    *   **Bypass:** Set a **Bypass Key** to share with your client for previewing the site.

---

## 🎮 Usage Guide

### 1. The "Standard" Handover Mode
Use this when you are finishing up a project. It tells the client "We are almost there" and presents a professional image. Use the Action Button to link to your final invoice or handover checklist.

### 2. The "Urgent" Suspension Mode
If a payment is overdue or a contract is breached, switch to this mode. It uses psychological color theory (Red/Dark) to create a sense of urgency. The "Resolve Issue" button should link directly to a payment page.

### 3. Client Preview (Bypass)
Don't want to create an admin account for the client yet? Just send them your homepage URL with the bypass key:
`https://yourclientwebsite.com/?guard_bypass=YOUR_SECRET_KEY`

---

## 📂 Project Structure

```
wp-project-guard/
├── assets/                  # CSS, JS, and Images
│   ├── admin.css           # Dashboard styling
│   ├── admin.js            # Dashboard interactivity
│   └── images/             # Logos and placeholders
├── includes/                # Core PHP Classes
│   ├── class-admin-ui.php  # Renders the plugin dashboard
│   ├── class-guard.php     # Frontend protection logic
│   ├── class-settings.php  # Settings API registration
│   └── helpers.php         # Utility functions
├── public/                  # Frontend Templates
│   └── templates/
│       ├── polite.php      # Maintenance Mode
│       ├── standard.php    # Handover Mode
│       └── urgent.php      # Suspension Mode
├── wp-project-guard.php     # Main Plugin File
└── uninstall.php            # Cleanup script
```

---

## 📝 Changelog

### Version 1.0.0 - 2026-01-22

**WordPress.org Compliance Updates:**
* ✅ Fixed security issue: Added proper escaping for WPPG_URL constant using esc_url()
* ✅ Updated "Tested up to" version from 6.7 to 6.9
* ✅ Shortened plugin description to meet 150 character limit
* ✅ All WordPress coding standards compliance issues resolved

**UI/UX Improvements:**
* 🎨 Enlarged dashboard logo from 80px to 150px for better visibility
* 🎨 Improved logo centering in WordPress admin dashboard
* 🎨 Enhanced footer design with three-row layout across all templates
* 🎨 Added white background with border-radius to footer logos
* 🎨 Fixed template thumbnail display in mode selector
* 📱 Added 30px top margin to all lock screen templates for better spacing

**Developer Experience:**
* 🔧 Removed personal information from default values
* 🔧 Added fallback dummy data for empty developer fields
* 🔧 Created placeholder avatar image for professional appearance
* 🔧 Improved "Reach out to" label positioning in urgent mode
* 🔧 Streamlined social icons (LinkedIn, Email, WhatsApp only)

**Security & Performance:**
* 🔒 All output properly escaped using WordPress escaping functions
* 🔒 Enhanced XSS protection across all templates
* ⚡ Optimized asset loading and template rendering

---

## 👨‍💻 Credits
**Developed by:** [Engr. Hammad Khurshid](https://github.com/engrhammadkhurshid)

Protected by **WP Project Guard**.

---

## 📄 License & Usage

**WP Project Guard** is free to use for personal and commercial projects.

*   ✅ **You are free to:** Use this plugin on unlimited websites, for yourself or your clients, free of charge.
*   ✅ **You are free to:** Modify the code for personal use or to fit specific project needs.
*   🚫 **You are NOT allowed to:** Redistribute, resell, or sub-license this plugin as a standalone product or as part of a package without explicit permission.
*   ✍️ **Attribution:** If you modify the source code, you must retain the credit to the original author ([Engr. Hammad Khurshid](https://github.com/engrhammadkhurshid)) in the plugin headers and documentation.

Copyright © 2026 Engr. Hammad Khurshid. All rights reserved.
