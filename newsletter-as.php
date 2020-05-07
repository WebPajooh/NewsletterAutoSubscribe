<?php
/*
Plugin Name: NewsletterAutoSubscribe
Description: It adds new registered users to the subscribers list.
Author: WebPajooh
Version: 1.0.1
Author URI: www.web-pajooh.ir
*/

define('NEWSLETTER_PLUGIN_PATH', WP_PLUGIN_DIR . '/newsletter/');
include_once(ABSPATH . 'wp-includes/pluggable.php');
include_once(NEWSLETTER_PLUGIN_PATH . 'plugin.php');

add_action('user_register', 'subscribe_new_user');
function subscribe_new_user($user_id) {
    $user = get_user_by('id', $user_id);
    $_REQUEST['ne'] = $user->user_email;
    $_REQUEST['nn'] = $user->user_nicename;
    (new NewsletterSubscription)->subscribe();
}
