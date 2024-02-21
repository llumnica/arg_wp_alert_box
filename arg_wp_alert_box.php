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
    echo  '<div class="ct-alert-container" id="ct-alert-container">';
    if (isset($_SESSION['ct_alert'])) {
        $alerts = $_SESSION['ct_alert'];
        unset($_SESSION['ct_alert']);

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
                    echo '<script>
                            setTimeout(function() {
                                document.querySelector(".ct-alert").remove();
                            }, 7000); // 7 seconds
                          </script>';
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
                        echo '<script>
                            setTimeout(function() {
                                document.querySelector(".ct-alert").remove();
                            }, 7000); // 7 seconds
                          </script>';
                    }
                }
            }
        }
        unset($_SESSION['ct_alert']);
    }
    echo  '</div>';
}


// Enqueue CSS and JS files
function arg_enqueue_files()
{
    wp_enqueue_style('alert-custom-style', plugins_url('/assets/css/alert.css', __FILE__), array(), uniqid());
    wp_enqueue_script('alert-custom-script', plugins_url('/assets/js/alert.js', __FILE__), array(), uniqid(), true);
}
add_action('wp_enqueue_scripts', 'arg_enqueue_files');
add_action('admin_enqueue_scripts', 'arg_enqueue_files');

function wp_alert_custom_footer_script()
{
?>
    <script>
        function displayAjaxAlert(type, content) {
            var container = document.getElementById('ct-alert-container');

            // Create a new alert element
            var alertDiv = document.createElement('div');
            alertDiv.className = 'ct-alert ct-alert-' + type;

            let img_type = type.charAt(0).toUpperCase() + type.slice(1)

            // Create an image element for the alert icon
            var img = document.createElement('img');
            img.src = '/wp-content/plugins/arg_wp_alert_box/assets/images/' + img_type + '.svg';
            img.alt = img_type;
            alertDiv.appendChild(img);

            // Add the alert content
            alertDiv.appendChild(document.createTextNode(content));

            // Create a close button
            var closeBtn = document.createElement('span');
            closeBtn.className = 'close-btn';
            closeBtn.innerHTML = '&times;';
            closeBtn.onclick = function() {
                alertDiv.remove();
            };
            alertDiv.appendChild(closeBtn);

            // Append the alert to the container
            container.appendChild(alertDiv);

            // Set a timeout to remove the alert after 7 seconds
            setTimeout(function() {
                alertDiv.remove();
            }, 7000);
        }
    </script>
<?php
}
add_action('wp_footer', 'wp_alert_custom_footer_script');
