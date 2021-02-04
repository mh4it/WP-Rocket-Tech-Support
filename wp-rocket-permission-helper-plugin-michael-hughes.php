<?php
/*
Plugin Name:	WP Rocket No Cache - No Permission Error
Plugin URI:		https://github.com/mh4it
Description:	My custom functions.
Version:		1.0.0
Author:			Michael Hughes
Author URI:		https://github.com/mh4it
Functionality Plugin Template: https://github.com/srikat/my-custom-functionality/blob/master/plugin.php
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
*/

/*No Direct*/
if ( ! defined( 'WPINC' ) ) {
	die;
}

  /**
  *Assuming the host programmatically used public function no_cache_config() located in:
  *inc/ThirdParty/Hostings/AbstractNoCacheHost.php
  *Boundary condition FALSE for WordPress values:
  *    • 'rocket_set_wp_cache_constant'
  *    • 'rocket_generate_advanced_cache_file'
   *
   */
  if (( ( ! (bool) apply_filters( 'rocket_set_wp_cache_constant', false ) )  || ( ! (bool) apply_filters( 'rocket_generate_advanced_cache_file', false ) )  ) && ( ! function_exists( 'nocache_config_remove_permission_error' ) ))
  {

    add_action( 'admin_head', 'nocache_config_remove_permission_error' );

    function nocache_config_remove_permission_error() {
      /*
      rocket_warning_htaccess_permissions() located in:
      inc/admin/ui/notices.php

      These functions need to not trigger : notices.php:###
      rocket_warning_htaccess_permissions()
      rocket_warning_config_dir_permissions()
      rocket_warning_cache_dir_permissions()
      rocket_warning_minify_cache_dir_permissions()
      rocket_warning_busting_cache_dir_permissions()
      */

      remove_action( 'admin_notices', 'rocket_warning_htaccess_permissions' );
      remove_action( 'admin_notices', 'rocket_warning_config_dir_permissions' );
      remove_action( 'admin_notices', 'rocket_warning_cache_dir_permissions' );
      remove_action( 'admin_notices', 'rocket_warning_minify_cache_dir_permissions' );
      remove_action( 'admin_notices', 'rocket_warning_busting_cache_dir_permissions' );

    }  // end function
  }
