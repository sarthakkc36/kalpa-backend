<?php
/**
 * Get a setting value from the database
 * 
 * @param string $key The setting key to retrieve
 * @param mixed $default Default value if setting doesn't exist
 * @return mixed The setting value or default if not found
 */
function get_setting($key, $default = '') {
    global $conn;
    
    // Check if the setting is already in cache
    if (isset($GLOBALS['settings_cache']) && isset($GLOBALS['settings_cache'][$key])) {
        return $GLOBALS['settings_cache'][$key];
    }
    
    // Initialize cache if needed
    if (!isset($GLOBALS['settings_cache'])) {
        $GLOBALS['settings_cache'] = array();
    }
    
    // Query the database
    $sql = "SELECT setting_value FROM site_settings WHERE setting_key = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        return $default;
    }
    
    $stmt->bind_param("s", $key);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $value = $row['setting_value'];
        
        // Cache the result
        $GLOBALS['settings_cache'][$key] = $value;
        
        return $value;
    }
    
    return $default;
}

/**
 * Get all settings from a specific group
 * 
 * @param string $group The settings group to retrieve
 * @return array The settings in that group
 */
function get_settings_group($group) {
    global $conn;
    
    $settings = array();
    
    // Query the database
    $sql = "SELECT setting_key, setting_value FROM site_settings WHERE setting_group = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        return $settings;
    }
    
    $stmt->bind_param("s", $group);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }
    
    return $settings;
}

/**
 * Output a setting value with optional escaping
 * 
 * @param string $key The setting key to output
 * @param mixed $default Default value if setting doesn't exist
 * @param bool $echo Whether to echo or return the value
 * @param bool $escape Whether to escape HTML
 * @return mixed The setting value or void if echo is true
 */
function the_setting($key, $default = '', $echo = true, $escape = true) {
    $value = get_setting($key, $default);
    
    if ($escape) {
        $value = htmlspecialchars($value);
    }
    
    if ($echo) {
        echo $value;
    } else {
        return $value;
    }
}

/**
 * Check if a boolean setting is enabled
 * 
 * @param string $key The setting key to check
 * @param bool $default Default value if setting doesn't exist
 * @return bool Whether the setting is enabled
 */
function is_setting_enabled($key, $default = false) {
    $value = get_setting($key, $default ? '1' : '0');
    return $value == '1';
}

/**
 * Initialize site settings cache
 * Loads all settings into memory at once to reduce database queries
 */
function init_settings_cache() {
    global $conn;
    
    if (isset($GLOBALS['settings_cache'])) {
        return; // Already initialized
    }
    
    $GLOBALS['settings_cache'] = array();
    
    // Query all settings
    $sql = "SELECT setting_key, setting_value FROM site_settings";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $GLOBALS['settings_cache'][$row['setting_key']] = $row['setting_value'];
        }
    }
}

// Initialize settings cache when this file is included
init_settings_cache();
?>