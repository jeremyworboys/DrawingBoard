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
 * Request
 *
 * Controls access to the request parameters (POST and GET) and parts of the
 * URI.
 *
 * @package		Sketch
 * @subpackage	Core
 * @category 	Request
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Request {

	/**
	 * Holds an array of "steps" in the URI path that we will use to route our 
	 * application.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_URI_steps = array();

	//--------------------------------------------------------------------------

	/**
	 * Constructor
	 * 
	 * Pulls in the required globals and runs "_get_steps" to fill $_URI_steps
	 * for later methods.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{
		/**
		 * We are going to need access to the user config, so lets bring it in 
		 * now.
		 */
		global $Config;
		$this->config = $Config;

		/**
		 * Let's prepare our steps so it is done and out of the way.
		 */
		$this->_get_steps();
	}

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
	private function _get_steps()
	{

	}
}
