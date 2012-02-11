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
 * Core Controller
 *
 * This is the core controller that all other controllers should inherit.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Controllers
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Controller {

	/**
	 * Instance
	 * 
	 * Makes controller act as singleton design pattern.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var			object	An instance of the running controller.
	 */
	private static $instance;

	/**
	 * Constructor
	 * 
	 * Stores an reference to the running controller to $instance so it can be 
	 * accessed globally.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{
		/**
		 * Create a global link back to this controller when initialized.
		 * 
		 * Makes controller act as singleton design pattern.
		 */
		self::$instance =& $this;

		/**
		 * Pull in all the classes that have already been initialized.
		 */
		global $_loaded_core;
		while (list($name, $reference) = each($_loaded_core)) {
			$this->$name = $reference;
		}

		/**
		 * Kill the $_loaded_core global for safety and memory management.
		 */
		unset($GLOBALS['_loaded_core']);

		/**
		 * Rename $this->loader to $this->load for convenience and code 
		 * readability.
		 */
		$this->load =& $this->loader;
		unset($this->loader);
	}

	/**
	 * Global DrawingBoard
	 * 
	 * Gives public access to the running controller (as all controllers extend
	 * this class).
	 * 
	 * Makes controller act as singleton design pattern.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @return		object	An instance of the running controller.
	 */
	public static function &global_DB()
	{
		return self::$instance;
	}
}
