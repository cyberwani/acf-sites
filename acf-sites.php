<?php
/*
Plugin Name: Advanced Custom Fields: Sites
Plugin URI: https://github.com/jonathan-dejong/acf-sites
Description: Extension for ACF which provides the user with a dropdown of the multisites sites
Version: 1.0.0
Author: Jonathan de Jong
Author URI: tigerton.se
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class acf_field_sites_plugin
{
	/*
	*  Construct
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function __construct()
	{
		// set text domain
		/*
		$domain = 'acf-sites';
		$mofile = trailingslashit(dirname(__File__)) . 'lang/' . $domain . '-' . get_locale() . '.mo';
		load_textdomain( $domain, $mofile );
		*/


		// version 4+
		add_action('acf/register_fields', array($this, 'register_fields'));


		// version 3-
		add_action('init', array( $this, 'init' ), 5);
	}


	/*
	*  Init
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function init()
	{
		if(function_exists('register_field'))
		{
			register_field('acf_field_sites', dirname(__File__) . '/sites-v3.php');
		}
	}

	/*
	*  register_fields
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function register_fields()
	{
		include_once('sites-v4.php');
	}

}

new acf_field_sites_plugin();

?>
