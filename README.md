# BuddyBoss Profile View Limiter

The `bboss_track_profile_views()` function is designed to limit the number of profile views a user can perform daily on a BuddyBoss-powered WordPress site, based on their user role. Once a user reaches their limit, they are redirected to an upsell page. This functionality helps in controlling the site's bandwidth usage and encourages users to upgrade their membership for increased access.

## Features

- **Role-Based Limitation**: Limits are applied based on WordPress user roles, allowing for flexible configuration.
- **Daily Reset**: The view count is reset daily, ensuring users have consistent access based on their role.
- **Custom Redirect**: Users who reach their view limit are redirected to a specified upsell page.

## Requirements

- WordPress 5.0 or higher
- BuddyBoss Theme or Plugin

## Installation

1. Open your WordPress site's `functions.php` file or create a custom plugin.
2. Copy and paste the provided `bboss_track_profile_views()` function into your `functions.php` file or your custom plugin file.
3. Save the changes.

## Configuration

1. **Set Role Limits**: Modify the `$role_view_limits` array within the function to define view limits for each user role. For example:

```php
$role_view_limits = [
    'basic' => 5,
    'contributor' => 10,
    // Add other roles and their limits here.
];

```
Customize Redirect URL: Change the URL in the wp_redirect(home_url('/silver/')); line to the desired upsell page.
## Usage
Once installed, the function automatically tracks and limits profile views based on the user's role. Users attempting to view more profiles than allowed will be redirected to the configured upsell page.

## Daily Reset
To reset the view counts daily, consider implementing a WordPress cron job that clears the view count meta fields. This is not included in the function and requires additional setup.

## Customization
The function can be extended or modified to include additional checks, messages, or logging functionalities.
Adjust the role limits and redirect URL as needed to fit the specific requirements of your site.
## Support
This script is provided as-is, without warranty of any kind. For support with the BuddyBoss theme or plugin, please contact BuddyBoss support. For customization or development assistance, consider hiring a WordPress developer.
