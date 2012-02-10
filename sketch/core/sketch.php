
<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');
/**
 * Sketch
 *
 * A small lightweight PHP HMVC application framework. Its core design is to be
 * a simple starting point for small web application projects.
 *
 * @package		Sketch
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @copyright	Copyright (c) 2012 - date('Y', time()), Complex Compulsions
 * @version     0.1
 * @filesource
 */

//------------------------------------------------------------------------------

/**
 * Sketch Core
 *
 * Loads all of the required files and routes the request through the
 * application.
 *
 * @package		Sketch
 * @subpackage	Core
 * @category 	Sketch
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */

//------------------------------------------------------------------------------

echo "<pre>";

/**
 * Wrap everything in a try catch loop so we can handle exceptions manually 
 * depending on the application environment.
 */
try {

	//--------------------------------------------------------------------------
	// First we load in our base functions
	//--------------------------------------------------------------------------

	require_once(SKETCH_PATH.'core/functions.php');

	//--------------------------------------------------------------------------
	// Now that we have our core loader, lets load our core classes
	//--------------------------------------------------------------------------

	/**
	 * We want to get the Error class in ASAP so we can handle anything that may
	 * go wrong.
	 */
	$Errors = load_core('Errors');

	/**
	 * Next is the Config class so we have access to user defined settings.
	 */
	$Config = load_core('Config');

	/**
	 * Next is the Request class so we have access to the request's parameters.
	 */
	$Request = load_core('Request');

	/**
	 * Finally the Loader class, this fellow handles models and views.
	 */
	$Loader = load_core('Loader');

	//--------------------------------------------------------------------------
	// We have our core setup, lets start the application shall we!
	//--------------------------------------------------------------------------


	echo "\n\n";
	print_r(array($Errors, $Config, $Request, $Loader));
	

//------------------------------------------------------------------------------

/**
 * We are at the end of the application, if any errors were thrown they'll be
 * caught here for us to handle.
 */
} catch (Exception $e) {
	echo $e->getMessage();
}
