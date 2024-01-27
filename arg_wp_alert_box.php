<?php
/*
Plugin Name: ARG Alert Box
Description: Displays alert messages stored in session variables.
Version: 1.0
Author: Llumnica
*/

// Function to display alert
function arg_display_alert()
{
    if (isset($_SESSION['ct_alert'])) {
        $alerts = $_SESSION['ct_alert'];

        if (is_array($alerts)) {
            if (count($alerts) === count($alerts, COUNT_RECURSIVE)) {
                // Single alert
                $alert = $alerts;
                if (isset($alert['type']) && isset($alert['content'])) {
                    echo '<div class="ct-alert ct-alert-' . $alert['type'] . '">';
                    echo '<img src="' . plugins_url('/assets/images/' . ucfirst($alert['type']) . '.svg', __FILE__) . '" alt="' . $alert['type'] . '" />';
                    echo $alert['content'];
                    echo '<span class="close-btn">&times;</span>'; // Close button
                    echo '</div>';
                }
            } else {
                // Multiple alerts
                foreach ($alerts as $alert) {
                    if (isset($alert['type']) && isset($alert['content'])) {
                        echo '<div class="ct-alert ct-alert-' . $alert['type'] . '">';
                        echo '<img src="' . plugins_url('/assets/images/' . ucfirst($alert['type']) . '.svg', __FILE__) . '" alt="' . $alert['type'] . '" />';
                        echo $alert['content'];
                        echo '<span class="close-btn">&times;</span>'; // Close button
                        echo '</div>';
                    }
                }
            }
        }

        unset($_SESSION['ct_alert']);
    }
}


// Enqueue CSS and JS files
function arg_enqueue_files()
{
    wp_enqueue_style('alert-custom-style', plugins_url('/assets/css/alert.css', __FILE__));
    wp_enqueue_script('alert-custom-script', plugins_url('/assets/js/alert.js', __FILE__), array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'arg_enqueue_files');
add_action('admin_enqueue_scripts', 'arg_enqueue_files');
