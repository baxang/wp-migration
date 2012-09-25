<?php
/*
Plugin Name: WP Migration
Plugin URI: https://github.com/baxang/wp-migration
Description: Rails style migration tool for WordPress.
Version: 0.1
Author: baxang
Author URI: http://baxang.com
License: not yet
*/

class WP_Migration {
}

if ( defined('WP_CLI') && WP_CLI ) :
class WP_Migration_Command extends WP_CLI_Command {
  function migrate( $args = array() ) {
    //
    WP_CLI::line( $args[0] );
    WP_CLI::line( $args[1] );
    WP_CLI::line( $assoc_args['name'] );
  }

  function rollback( $args = array() ) {
    //
  }

  static function help() {
    WP_CLI::line( 'usage: wp migration [migrate/rollback]' );
  }
}
WP_CLI::add_command('migration', 'WP_Migration_Command');
endif;
?>
