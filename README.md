# Arg WP Alert Box 
- Contributors: Llumnica 
- Tags: alert, notification, session 
- Requires at least: 4.0 
- Tested up to: 5.9 
- Stable tag: 1.0 
- License: GPL-2.0-or-later 

# Description 
Arg WP Alert Box is a versatile WordPress plugin that offers a customizable solution for displaying alert messages. It supports two modes of operation:

1. **Session-Based Alerts:** Utilize session variables to display static alert messages stored in `$_SESSION['ct_alert']`. This mode is suitable for displaying alerts that persist across page loads.

2. **Dynamic AJAX Alerts:** Trigger dynamic alert messages using AJAX calls within your WordPress site. Use the provided `displayAjaxAlert` function to show custom alerts dynamically based on user interactions or backend processes.

With Arg WP Alert Box, you can effortlessly integrate both static and dynamic alerts into your WordPress site to provide users with important information, notifications, or warnings.


# Installation 
1. Upload the `arg_alert_box` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

# Usage 
1. **Displaying Alerts:**
   - After installing the plugin, include the function `arg_display_alert()` within your theme header or wherever you want to display alerts.
   - Example usage:  
    ```php
        <?php if (function_exists('arg_display_alert')) arg_display_alert(); ?>
    ```

2. **Populating Alerts:**
   - To display alerts, you need to populate the session variable `$_SESSION['ct_alert']` with alert data.
   - For single alert:
     ```php
     $_SESSION['ct_alert'] = [
         'type' => 'success',
         'content' => 'Data updated successfully.'
     ];
     ```
   - For multiple alerts:
     ```php
     $_SESSION['ct_alert'][] = [
         'type' => 'error',
         'content' => 'Failed to update data.'
     ];
     $_SESSION['ct_alert'][] = [
         'type' => 'warning',         
         'content' => 'Please review your input.'
     ];
     ```
   - Each alert should be an associative array with 'type' (e.g., success, error, warning) and 'content' keys.

3. **Displaying AJAX Alerts:**
   - To display AJAX alerts, utilize the `displayAjaxAlert` function provided by the plugin after performing AJAX requests in your JavaScript code. This function allows you to show custom alerts dynamically.
   - Ensure the `displayAjaxAlert` script is included in your WordPress theme or plugin.
   - Call the function with appropriate parameters (`type` and `content`) after AJAX calls to display alerts based on the outcome.
   - Example usage:
     ```javascript
     // Example AJAX call
     $.ajax({
         url: 'your-ajax-url',
         type: 'POST',
         data: yourData,
         success: function(response) {
             // Display success message
             displayAjaxAlert('success', 'Data updated successfully.');
         },
         error: function(xhr, status, error) {
             // Display error message
             displayAjaxAlert('error', 'Failed to update data.');
         }
     });
     ```
   - Customize the alert type ('success', 'warning', 'error') and content message according to your application's requirements.

# Frequently Asked Questions 
1. **How do I display alert messages?**
   - After installing the plugin, include the function `arg_display_alert()` within your theme header or wherever you want to display alerts.

2. **How do I populate alerts?**
   - Use PHP to populate the session variable `$_SESSION['ct_alert']` with alert data in the required format.
   - Use JavaScript to call the `displayAjaxAlert` function after AJAX calls to show dynamic alerts.

# Changelog
1.0 
Initial release.

# Upgrade Notice
1.0 
Initial release.
