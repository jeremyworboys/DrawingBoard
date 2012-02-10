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
 * Config
 *
 * Handles access to the user defined settings in the /application/config 
 * directory.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Config
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Config {

	/**
	 * Holds all of the applications loaded configuration data.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_config_store = array();

	//--------------------------------------------------------------------------

	/**
	 * Constructor
	 * 
	 * Does nothing at this stage.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{
		
	}

	//--------------------------------------------------------------------------

	/**
	 * Load
	 * 
	 * Loads a configuration file into the application config store.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string	$config_name	The name of the configuration file
	 * 										to load.
	 */
	public function load($config_name)
	{

	}

	//--------------------------------------------------------------------------

	/**
	 * [Magic Method] Get
	 * 
	 * Overloads the class __get magic method to retrive data from
	 * _config_store.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string	$name 		The name of the key to retrieve.
	 * @return 		mixed 	The value of $key in _config_store or null if it
	 * 						it doesn't exist. You must test the return value ===
	 * 						null and should not assume == false means the config
	 * 						param is actually set to false.
	 */
	public function __get($name)
	{
		/**
		 * Test if the key exists.
		 */
		if (!isset($this->_config_store[$name])) {
			return null;
		}

		return $this->_config_store[$name];
	}

	//--------------------------------------------------------------------------

	/**
	 * [Magic Method] Set
	 * 
	 * Overloads the class __set magic method to update data in _config_store.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string	$name		The name of the key to store.
	 * @param  		mixed	$value		The value to store.
	 */
	public function __set($name, $value)
	{
		/**
		 * Ensure $name is valid
		 */
		if (is_string($name) && !empty($name)){
			$this->_config_store[$name] = $value;
		}
	}
}
