<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');
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

/**
 * DrawingBoard Core
 *
 * Loads all of the required files and routes the request through the
 * application.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	DrawingBoard
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
	// First we load in our base functions, this includes our core class loader
	//--------------------------------------------------------------------------

	require_once(DRAWINGBOARD_PATH.'core/functions.php');

	//--------------------------------------------------------------------------
	// Now that we have our core class loader, lets load our core classes
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
	 * Next is the Request class so we have access to the request parameters.
	 */
	$Request = load_core('Request');

	/**
	 * Finally the Loader class, this fellow handles models, views and all other
	 * goodies.
	 */
	$Loader = load_core('Loader');

	//--------------------------------------------------------------------------
	// We have our core setup, let's pull in the core controller and model
	//--------------------------------------------------------------------------

	require_once(DRAWINGBOARD_PATH.'core/controller.php');

	// require_once(DRAWINGBOARD_PATH.'core/model.php');

	//--------------------------------------------------------------------------
	// We've setup the DrawingBoard, let's get artistic!
	//--------------------------------------------------------------------------

	/**
	 * Get the requested controller or fall-back to the default.
	 */
	$controller = $Request->get_step(0);
	if (empty($controller)) {
		$controller = $Config->default_controller;
	}

	/**
	 * Get the requested action or fall-back to the default.
	 */
	$action = $Request->get_step(1);
	if (empty($action)) {
		$action = $Config->default_action;
	}

	/**
	 * Add the action suffix to the action.
	 */
	$action .= $Config->action_suffix;

	/**
	 * Check if the controller file exists.
	*/
	$controller_path = APP_PATH."controllers/{$controller}.php";
	if (file_exists($controller_path)) {
		require_once $controller_path;
	}
	else { throw new Exception("Requested controller does not exist: {$controller_path}"); }

	/**
	 * Everything is setup for the application to come in, so better make sure
	 * the application can grab access to the core if it needs to.
	 */
	/**
	 * Global DrawingBoard
	 * 
	 * Links directly to the global_DB method on the running controller.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @return		object	An instance of the running controller.
	 */
	function &global_DB()
	{
		return Controller::global_DB();
	}

	/**
	 * Ensure the controller is properly structured.
	*/
	if (class_exists($controller)) {
		$Controller = new $controller();
	}
	else { throw new Exception("Requested controller is invalid: {$controller_path}"); }

	/**
	 * Call the requested action.
	*/
	if (method_exists($Controller, $action)) {
		$Controller->$action();
	}
	else { throw new Exception("Requested action does not exist: {$action} in {$controller_path}"); }

	/**
	 * Clean the whistle and close the (buffer if needed).
	 */
	@ob_end_clean();

//------------------------------------------------------------------------------

/**
 * We are at the end of the application, if any errors were thrown they'll be
 * caught here for us to handle.
 */
} catch (Exception $e) {
	echo $e->getMessage();
}
