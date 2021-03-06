<?php
/**
 * Plugin Name: Maintenance Mode
 * Plugin URI: https://github.com/lukasjuhas/lj-maintenance-mode
 * Description: Very simple Maintenance Mode & Coming soon page. Using default Wordpress markup, No ads, no paid upgrades.
 * Version: 1.3.2
 * Author: Lukas Juhas
 * Author URI: http://lukasjuhas.com
 * Text Domain: lj-maintenance-mode
 * License: GPL2
 * Domain Path: /languages/
 *
 * Copyright 2014-2015  Lukas Juhas  (email : hello@lukasjuhas.com)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package lj-maintenance-mode
 * @author Lukas Juhas
 * @version 1.3.2
 *
 */

// define stuff
define( 'LJMM_VERSION', '1.3.2' );
define( 'LJMM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'LJMM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'LJMM_PLUGIN_BASENAME', plugin_basename( __FILE__ ));
define( 'LJMM_PLUGIN_DOMAIN', 'lj-maintenance-mode' );
define( 'LJMM_CONTACT_EMAIL', 'hello@lukasjuhas.com' );

// activation hook
add_action( 'activate_' . LJMM_PLUGIN_BASENAME, 'ljmm_install' );

/**
 * Installation
 *
 * @since 1.0
*/
function ljmm_install() {
    // remove old settings. This has been deprecated in 1.2
    delete_option( 'ljmm-content-default' );

    // If content is not set, set the default content.
    $content = get_option( 'ljmm-content');
    if(empty($content)) :
        $content = '<h1>Website Under Maintenance</h1><p>Our Website is currently undergoing scheduled maintenance. Please check back soon.</p>';
        /**
        * if you are trying to ensure that a given option is created,
        * use update_option() instead, which bypasses the option name check
        * and updates the option with the desired value whether or not it exists.
        */
        update_option( 'ljmm-content', $content);
    endif;
}

/**
 * Load plugin textdomain.
 *
 * @since 1.3.1
*/
function ljmm_load_textdomain() {
    load_plugin_textdomain( LJMM_PLUGIN_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ljmm_load_textdomain' );

/**
 * main class
 *
 * @since 1.0
*/
class ljMaintenanceMode {

    function __construct() {
        add_action( 'admin_menu', array( $this, 'ui' ) );
        add_action( 'admin_head', array( $this, 'style' ) );
        add_action( 'admin_init', array( $this, 'settings' ) );

        // remove old settings. This has been deprecated in 1.2
        delete_option( 'ljmm-content-default' );

        $is_enabled = get_option('ljmm-enabled');

        if($is_enabled || isset($_GET['ljmm']) && $_GET['ljmm'] == 'preview') :
            add_action('get_header', array($this, 'maintenance'));
        endif;

        add_action( 'admin_bar_menu', array( $this, 'indicator' ), 100 );
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'action_links') );
    }

    /**
     * Settings page
     *
     * @since 1.0
    */
    function ui() {
        add_submenu_page( 'options-general.php', __('Maintenance Mode', LJMM_PLUGIN_DOMAIN), __('Maintenance Mode', LJMM_PLUGIN_DOMAIN), 'delete_plugins', 'wp-maintenance-mode', array($this, 'settingsPage') );
    }

    /**
     * Inject styling
     *
     * @since 1.1
    */
    function style() {
        echo '<style type="text/css">#wp-admin-bar-ljmm-indicator.Enabled { background: rgba(159, 0, 0, 1) }</style>';
    }

    /**
     * Settings
     *
     * @since 1.0
    */
    function settings() {
        register_setting('ljmm', 'ljmm-enabled');
        register_setting('ljmm', 'ljmm-content');

        $content = get_option( 'ljmm-content');
        if(empty($content)) :
            $content = '<h1>Website Under Maintenance</h1><p>Our Website is currently undergoing scheduled maintenance. Please check back soon.</p>';
            /**
            * f you are trying to ensure that a given option is created,
            * use update_option() instead, which bypasses the option name check
            * and updates the option with the desired value whether or not it exists.
            */
            update_option( 'ljmm-content', stripslashes($content));
        endif;
    }

    /**
     * Settings page
     *
     * @since 1.0
    */
    function settingsPage() { ?>
        <div class="wrap">
            <h2><?php _e('Maintenance Mode', LJMM_PLUGIN_DOMAIN ); ?></h2>
            <form method="post" action="options.php">
                <?php settings_fields( 'ljmm' ); ?>
                <?php do_settings_sections( 'ljmm' ); ?>

                <?php $this->notify(); ?>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php _e('Enabled', LJMM_PLUGIN_DOMAIN ); ?></th>
                          <td><input type="checkbox" name="ljmm-enabled" value="1" <?php checked( esc_attr( get_option('ljmm-enabled') ), 1 ); ?>></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" colspan="2"><?php _e('Content', LJMM_PLUGIN_DOMAIN ); ?></th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php
                              $content = get_option('ljmm-content');
                              $editor_id = 'ljmm-content';
                              wp_editor( $content, $editor_id );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( add_query_arg( 'ljmm', 'preview', bloginfo('url') ) ); ?>" target="_blank" class="button"><?php _e('Preview', LJMM_PLUGIN_DOMAIN); ?></a>
                            <a class="button support" href="mailto:<?php echo LJMM_CONTACT_EMAIL; ?>?subject=[lj-maintenance-mode] Hi, I need support"><?php _e('Support', LJMM_PLUGIN_DOMAIN); ?></a>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    <?php }

    /**
     * admin bar indicator
     *
     * @since 1.1
    */
    function indicator($wp_admin_bar) {
        if ( !current_user_can( 'delete_plugins' ) )
            return false;

        $is_enabled = get_option('ljmm-enabled');
        $status = _x('Disabled', LJMM_PLUGIN_DOMAIN);

        if($is_enabled)
            $status = _x('Enabled', LJMM_PLUGIN_DOMAIN);

        $indicator = array(
            'id' => 'ljmm-indicator',
            'title' => _x('Maintenance Mode', LJMM_PLUGIN_DOMAIN).': '.$status,
            'parent' => false,
            'href' => get_admin_url(null, 'options-general.php?page=wp-maintenance-mode'),
            'meta' => array(
                'title' => _x('Maintenance Mode', LJMM_PLUGIN_DOMAIN),
                'class' => $status,
            )
        );
        $wp_admin_bar->add_node($indicator);
    }

    /**
     * plugin action links
     *
     * @since 1.1
    */
    function action_links( $links ) {
        $links[] = '<a href="'. get_admin_url(null, 'options-general.php?page=wp-maintenance-mode') .'">'._x('Settings', LJMM_PLUGIN_DOMAIN).'</a>';
        return $links;
    }

    /**
     * Maintenance Mode
     *
     * @since 1.0
    */
    function maintenance() {
        if ( !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' )) || ( isset($_GET['ljmm']) && $_GET['ljmm'] == 'preview')) {
            $content = get_option('ljmm-content');
            if(empty($content)) {
                // fallback
                $content = '<h1>Website Under Maintenance</h1><p>Our Website is currently undergoing scheduled maintenance. Please check back soon.</p>';
            }
            $content = apply_filters('the_content', $content);

            wp_die($content, get_bloginfo( 'name' ) . ' - ' . __('Website Under Maintenance', LJMM_PLUGIN_DOMAIN), array('response' => '503'));
        }
    }

   /**
    * notify if cache plugin detected
    *
    * @since 1.2
   */
    function notify() {
        $cache_plugin_enabled = $this->cache_plugin();
        if(!empty($cahce_plugin_enabled)) {
            $class = "error";
            $message = $this->cache_plugin();
            if( isset($_GET['settings-updated']) ) {
                echo '<div class="'.$class.'"><p>'.$message.'</p></div>';
            }
        }
    }

    /**
     * detect cache plugins
     *
     * @since 1.2
    */
    function cache_plugin() {
        $message = '';
        // add wp super cache support
        if ( in_array( 'wp-super-cache/wp-cache.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $message = __("Important: Don't forget to flush your cache using WP Super Cache when enabling or disabling Maintenance Mode.", LJMM_PLUGIN_DOMAIN);
        }

        // add w3 total cache support
        if ( in_array( 'w3-total-cache/w3-total-cache.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $message = __("Important: Don't forget to flush your cache using W3 Total Cache when enabling or disabling Maintenance Mode.", LJMM_PLUGIN_DOMAIN);
        }

        return $message;
    }
}
/**
 * initialise plugin.
 *
 * @since 1.0
*/
$ljMaintenanceMode = new ljMaintenanceMode();
