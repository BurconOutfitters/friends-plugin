<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package    Friends_Plugin
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Uninstall avatars.
 *
 * During uninstallation, remove the custom field from the users
 * and delete the local avatars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function friends_user_avatars_uninstall() {

	$friends_user_avatars = new friends_user_avatars;
	$users            = get_users_of_blog();

	foreach ( $users as $user ) {
		$friends_user_avatars->avatar_delete( $user->user_id );
	}

	delete_option( 'friends_user_avatars_caps' );

}
register_uninstall_hook( __FILE__, 'friends_user_avatars_uninstall' );