<?php

/**
 * Post permalink community package for WP-CLI
 *
 * @package     WP-CLI
 * @subpackage  Postpermalink
 * @author      superhuit <tech@superhuit.ch>, Felipe Paul Martins aka Kuuak <felipe.paulmartins@outlook.com>
 * @license     http://www.opensource.org/licenses/bsd-license.php BSD
 * @filesource
 */

namespace SUPT\WPCliCommand\PostPermalink;

if (!defined('WP_CLI')) {
    return;
}

use WP_CLI;
use function WP_CLI\Utils\format_items;

/**
 * Get a list of post permalink.
 *
 * ## OPTIONS
 *
 * <id>...
 * : One or more IDs of posts to retrieve the permalink.
 *
 * [--format=<format>]
 * : Render output in a particular format.
 * ---
 * default: table
 * options:
 *   - table
 *   - csv
 *   - json
 *   - yaml
 * ---
 *
 * ## EXAMPLES
 *
 *     $ wp post permalink 3114 3040
 *     +------+--------------------------------------+
 *     | ID   | permalink                            |
 *     +------+--------------------------------------+
 *     | 3114 | https://www.example.com/hello-world/ |
 *     | 3040 | https://www.example.com/hello-mars/  |
 *     +------+--------------------------------------+
 * 
 *     $ wp post permalink 3114 3040 --format=csv
 *     ID,permalink
 *     3114,https://www.example.com/hello-world/
 *     3040,https://www.example.com/hello-mars/
 * 
 */
function post_permalink_cmd( $args, $assoc_args = [] ) {
	format_items(
		$assoc_args['format'],
		array_map( __NAMESPACE__.'\prepare_post_permalink_item', $args ),
		['ID', 'permalink']
	);
};

/**
 * Prepare each post permalink item.
 * 
 * @param number $post_id The post_id for which to prepare the item.
 * @return array An assoc array containing `ID`, `permalink` keys.
 */
function prepare_post_permalink_item($post_id) {
	return [
		'ID'        => $post_id,
		'permalink' => get_permalink($post_id),
	];
}


/**
 * Register WP-CLI commands
 */
WP_CLI::add_command( 'post permalink', __NAMESPACE__.'\post_permalink_cmd' );
