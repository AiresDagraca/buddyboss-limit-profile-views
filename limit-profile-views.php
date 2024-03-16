<?php 
function bboss_track_profile_views() {
    // Assuming you're on a BuddyBoss profile page.
    if (function_exists('bp_is_user') && bp_is_user()) {
        $current_user_id = get_current_user_id();
        $viewed_profile_id = bp_displayed_user_id();
        $user_role = wp_get_current_user()->roles[0]; // Simplified; consider sites with multiple roles per user.

        // Allow users to view their own profile without restrictions.
        if ($current_user_id === $viewed_profile_id) {
            return;
        }

        // Define the view limit for roles.
        $role_view_limits = [
            'basic' => 5,
            'contributor' => 10,
            // Add other roles and their limits here.
        ];

        $limit = isset($role_view_limits[$user_role]) ? $role_view_limits[$user_role] : PHP_INT_MAX;

        // Key to store daily views.
        $meta_key = 'profile_views_' . date('Ymd');
        $views = (int) get_user_meta($current_user_id, $meta_key, true);

        if ($views >= $limit) {
            // Redirect to upsell page if limit is reached.
            wp_redirect(home_url('/silver/'));
            exit;
        } else {
            // Increment the view count for viewing others' profiles.
            update_user_meta($current_user_id, $meta_key, $views + 1);
        }
    }
}
add_action('wp', 'bboss_track_profile_views');

// Optionally, add a cron job or similar mechanism to clear the daily view counts.
