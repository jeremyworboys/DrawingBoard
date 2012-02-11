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
 * Base Functions
 *
 * Defines a basic set of functions required by the DrawingBoard core.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Base Functions
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */

/**
 * Loaded Core
 * 
 * Create a global variable to store core classes as they are loaded 
 * pre-controller so the controller can pull them in when it is loaded. This 
 * variable is unset after the controller has been instantiated.
 * 
 * @access 		private
 * @since 		Version 0.1
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * 
 * @global		array	Holds core classes an association of names to class 
 * 						references
 */
$GLOBALS['_loaded_core'] = array();

//------------------------------------------------------------------------------

/**
 * We don't want to define functions more than once if this file is pulled in
 * multiple times so we wrap all functions in a function_exists block.
 */

//------------------------------------------------------------------------------

/**
 * Core Loader
 * 
 * Loads core classes and returns their instance by reference. Holds a cache of 
 * instantiated classes so loading only actually occurs the first time they are
 * requested.
 * 
 * @access 		public
 * @since 		Version 0.1
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 *
 * @param  		string 	$class 		The name of the class to load / retrieve.
 * @return 		object 	Reference to the requested class.
 */
if (!function_exists('load_core')) {
	function &load_core($class)
	{
		global $_loaded_core;

		$class_name = strtolower($class);

		// Check if we have already loaded the class
		if (!isset($_loaded_core[$class_name])) {

			// Ensure the requested class exists
			$class_path = DRAWINGBOARD_PATH."core/{$class}.php";
			if (file_exists($class_path)) {
				require_once $class_path;
			}
			else { throw new Exception("Requested core class does not exist: {$class_path}"); }

			// Load the class into our cache
			$_loaded_core[$class_name] = new $class();
		}

		// Return the class from out cache
		return $_loaded_core[$class_name];
	}
}
