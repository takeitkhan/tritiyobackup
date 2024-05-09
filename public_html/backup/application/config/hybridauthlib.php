<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "827634131564-jshbhbb0gu9a5bj8a0c58n2qsdtmpbhp.apps.googleusercontent.com", "secret" => "7ahyVursUX5BG3YTYOZ_Wsjn" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "715618375246168", "secret" => "176cfc7f1e2190ecdc38f041788baf29" ),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "2HJ6Vw7xjn4AsgM4FS3oKAQe7", "secret" => "K5bNQy93sc8grLBkd5VNd336sqLLnHtzbI7gJT4NHd9Og5ge5B" ) 
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "752mjsq4ipxjfj", "secret" => "72B1M6UQ2gGkXayD" )
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */