<?php
/**
 * Helper functions for the website
 */

/**
 * Get testimonials from the database
 * 
 * @param int $limit Maximum number of testimonials to return
 * @return array Array of testimonials
 */
function get_testimonials($limit = 8) {
    global $conn;
    
    $testimonials = array();
    $testimonials_query = "SELECT * FROM testimonials WHERE is_active = 1 ORDER BY display_order ASC, id DESC LIMIT " . intval($limit);
    $testimonials_result = mysqli_query($conn, $testimonials_query);
    
    if ($testimonials_result) {
        while ($row = mysqli_fetch_assoc($testimonials_result)) {
            $testimonials[] = $row;
        }
    }
    
    return $testimonials;
}

/**
 * Get partners/organizations from the database
 * 
 * @return array Array of partners
 */
function get_partners() {
    global $conn;
    
    $partners = array();
    $partners_query = "SELECT * FROM partners WHERE is_active = 1 ORDER BY display_order ASC, id DESC";
    $partners_result = mysqli_query($conn, $partners_query);
    
    if ($partners_result) {
        while ($row = mysqli_fetch_assoc($partners_result)) {
            $partners[] = $row;
        }
    }
    
    return $partners;
}
/**
 * Get awards from the database
 * 
 * @param int $limit Maximum number of awards to return
 * @return array Array of awards
 */
function get_awards($limit = 5) {
    global $conn;
    
    $awards = array();
    $awards_query = "SELECT * FROM awards WHERE is_active = 1 ORDER BY display_order ASC, award_date DESC LIMIT " . intval($limit);
    $awards_result = mysqli_query($conn, $awards_query);
    
    if ($awards_result) {
        while ($row = mysqli_fetch_assoc($awards_result)) {
            $awards[] = $row;
        }
    }
    
    return $awards;
}