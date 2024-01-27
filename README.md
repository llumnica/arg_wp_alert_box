# Arg WP Alert Box 
- Contributors: Llumnica 
- Tags: alert, notification, session 
- Requires at least: 4.0 
- Tested up to: 5.9 
- Stable tag: 1.0 
- License: GPL-2.0-or-later 

# Description 
Arg WP Alert Box is a WordPress plugin that displays alert messages stored in session variables.

# Installation 
1. Upload the `arg_alert_box` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

# Usage 
1. **Displaying Alerts:**
   - After installing the plugin, include the function `arg_display_alert()` within your theme header or wherever you want to display alerts.
   - Example usage: `<div class="ct-alert-container"><?php arg_display_alert(); ?></div>`

2. **Populating Alerts:**
   - To display alerts, you need to populate the session variable `$_SESSION['ct_alert']` with alert data.
   - For single alert:
     ```php
     $_SESSION['ct_alert'] = [
         'type' => 'success',
         'content' => 'Timer data updated successfully.'
     ];
     ```
   - For multiple alerts:
     ```php
     $_SESSION['ct_alert'][] = [
         'type' => 'error',
         'content' => 'Failed to update timer.'
     ];
     $_SESSION['ct_alert'][] = [
         'type' => 'warning',         
         'content' => 'Please review your input.'
     ];
     ```
   - Each alert should be an associative array with 'type' (e.g., success, error, warning) and 'content' keys.

# Frequently Asked Questions 
1. **How do I display alert messages?**
   - After installing the plugin, include the function `arg_display_alert()` within your theme header or wherever you want to display alerts.

2. **How do I populate alerts?**
   - Use PHP to populate the session variable `$_SESSION['ct_alert']` with alert data in the required format.

# Changelog
1.0 
Initial release.

# Upgrade Notice
1.0 
Initial release.
