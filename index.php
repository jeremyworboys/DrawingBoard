<?php 
/**
 * DrawingBoard
 *
 * A small lightweight PHP HMVC application framework. Its core design is to be
 * a simple starting point for small web application projects.
 *
 * @package		DrawingBoard
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @copyright	Copyright (c) 2012 - date('Y', time()), Complex Compulsions
 * @version     0.1
 * @filesource
 */

//------------------------------------------------------------------------------
// Define environment to run the application in
//------------------------------------------------------------------------------

/**
 * The application running environment.
 * 
 * The value here defines how errors and logs are handled. Values are as
 * follows:
 * 
 *   development - PHP errors are displayed to the user and logging is enabled.
 *   testing     - PHP errors are turned off but logging is enabled.
 *   production  - all error reporting is disabled.
 * 
 * If no (or invalid) value is set we will assume production environment for
 * security.
 * 
 * @since 0.1
 * 
 * @todo Change back to production for release
 */
define('ENVIRONMENT', 'development');

//------------------------------------------------------------------------------
// Define the global paths for the framework
//------------------------------------------------------------------------------

/**
 * Path to root directory.
 * 
 * This directory should contain an "application" folder for the application 
 * specific files and a "drawingboard" folder for all of the system specific files.
 * 
 * @since 0.1
 */
define('BASE_PATH', realpath(dirname(__FILE__)).'/');

/**
 * Path to application directory.
 * 
 * This directory contains all the application specific files.
 * 
 * @since 0.1
 */
define('APP_PATH', BASE_PATH.'application/');

/**
 * Path to drawingboard directory.
 * 
 * This directory contains all the system specific files.
 * 
 * @since 0.1
 */
define('DRAWINGBOARD_PATH', BASE_PATH.'drawingboard/');

//------------------------------------------------------------------------------
// Set error reporting based on environment
//------------------------------------------------------------------------------

/**
 * We only handle error reporting here and will deal with the logging once we
 * can import the logging library.
 */
switch (ENVIRONMENT) {
	// PHP errors are displayed
	case 'development':
		error_reporting(E_ALL);
		break;

	// PHP errors are turned off
	case 'testing':
	case 'production':
	default:
		error_reporting(0);
		break;
}

//------------------------------------------------------------------------------
// Verify that our paths are all valid
//------------------------------------------------------------------------------

// First lets check our base path exists
if (!(file_exists(BASE_PATH) && is_dir(BASE_PATH))) {
	exit('Unable to locate base path... This is really quite awkward!');
}

// Next we'll make sure the application directory exists
if (!is_dir(APP_PATH)) {
	exit('Unable to locate the "application" directory.');
}

// Finally we'll make sure the drawingboard directory exists
if (!is_dir(DRAWINGBOARD_PATH)) {
	exit('Unable to locate the "drawingboard" directory.');
}

//------------------------------------------------------------------------------
// Turn the page, its time to start drawingboarding
//------------------------------------------------------------------------------

require_once(DRAWINGBOARD_PATH.'core/drawingboard.php');
